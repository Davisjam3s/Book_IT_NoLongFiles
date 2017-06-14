<!--
	** This page is desigend for displaying a form where the user is able to add a new item to the database, not only does it show the from it runs the script from itself so it can all be done on the same page 

	** It allows the user to add an item name, tyoe, agreement, restriction and condtion as well as now an image, these all get stored on the database in order for it to be pulled out when it is needed.

	** This page uses the user_info.php page in order to get the users user ID so that we can link it to that user when adding it to the database as owners should be linked to their own items 

	**  This scrip also adds an image to a file on the server as well as adding a link to that image to the databse so that it can be called from within an image tag, on the catalog page.

	** This page also directly uses the connection script that can be pulled out later, but for now it is working and thats ok.

	** When running the PHP from the same page we use if(isset) this checks to see if the button has been pressed before runnning the code, which is somthing that needs to happen or it will run it without sending any information which will give us an error.

	** The path to where we want the image to be saved is then set using $target and $_FILES 

	** The scrip then uses strap tags and mysqli_real_escape_string to prevent against attacks to the database 

	** The SQL the put the information into the databse and adding the user it is attached to using the user_info.php script

	** once it has been uploaded it runs a page to make it look like it is doing somthing,. this being the loading.php page that shows a loading bar to show some sort of progression. is it nessasary? No. is it annoying? yes very

	** The page also uses jquery to load infromation into the text box. at the bottom of the page, when the user wants to select an agreement type they can then select which one they want by readin the information
	
	** Other than that this page contains some CSS scripts and a from where the user eneters the information for the item

	** This pages was created by James D, Marie H, Matt H
	** This page Has been commented by James D, Marie

	** To Do list for this page 
		* create a function to check the image for security purposes! ****yes this is done but I now want to jump off a bridge! xmariex
		* Include the connection scrip rather than using it again *** done xmariex
		* prevent SQL injections  **Done 
		* Prevent XSS attacks **Done
		* Fix Bug where it would not add to the database if the Restriction was set to 'all' or 'third year only' **Done
		* Call Types from the database instead of hard coding them **done xmariex
		* Call Agreements from the database instead of hard coding them **done xmariex
		* Clean Up code - made the HTML and php a bit prettier, not touching any scripts! xmariex
		* Add Scripts to their own file
		* Add CSS to their own file 

-->

<?php 
//need this to get user info 
require 'user_info.php';
//need this for filling drop down menus in form
require 'fillmenu.php';
?>
<?php
if (isset($_POST['upload'])) 
	{
		//require the use of the checkUploads file
		require 'checkUploads.php';	
		//connect to server	
		require '../../../php/Conection.php'; 

		//set all variables from the form 	
		$image = $_FILES['image']['name'];
		$ItemName = $_POST['ItemName'];
		$ItemType = $_POST['ItemType'];
		$Agreement = $_POST['Agreement'];
		$Restriction = $_POST['Restriction'];
		$Supervision = $_POST['Supervision'];
		$Condition = $_POST['Condition'];

		// prevent injections and XSS
		$ItemName = mysqli_real_escape_string($conn, $ItemName);
		$ItemName = strip_tags($ItemName);
		$ItemType = mysqli_real_escape_string($conn, $ItemType);
		$ItemType = strip_tags($ItemType);
		$Agreement = mysqli_real_escape_string($conn, $Agreement);
		$Agreement = strip_tags($Agreement);
		$Restriction = mysqli_real_escape_string($conn, $Restriction);
		$Restriction = strip_tags($Restriction);
		$Supervision = mysqli_real_escape_string($conn, $Supervision);
		$Supervision = strip_tags($Supervision);
		$Condition = mysqli_real_escape_string($conn, $Condition);
		$Condition = strip_tags($Condition);

		//check the image, if its all ok then do the sql to put item in DB
		if (checkImage())
			{

				$sql = "INSERT INTO Asset (AgreementUID, OwnerUID, AssetTypeUID, AssetDescription, AssetCondition, AssetImage, AssetRestriction, AssetInBasket, AssetSupervised) VALUES ('$Agreement','$user','$ItemType','$ItemName',$Condition,'$image',$Restriction,0,$Supervision)";
				mysqli_query($conn, $sql);
				//send to loading page	
				header('Location: loading.php');
			}
			//if it fails show user a message
			else	
				{
					echo"there was a problem, please try again";//replaced by the notUploaded.php page called in the checkImage function.
				}
		
		
	}

?>

<script>//fills drop down for agreement names and hidden field agreementuid
    $('.agreeselect').on('change',function() {

        var jamjam = $(this).val(); 
        var val1 = jamjam;
        $.ajax({ 
        type: 'POST', 
        url: 'ajax/Pages/Inventory/getAgreementDesc.php', 
        data: { Description: val1}, 
        success: function(response) {
            $('#result').html(response);
        }
        });
});
</script>

<script>
$(document).ready(function() // wait till the page is ready
{
    $(".AddAgreement").click(function() // wait till this button has been pressed
      { 
       $(".holder").load("ajax/Pages/Inventory/AgreeUploadForm.php");
      });
  });
</script>
<style>
	.addItemForm
	{
	background-color: transparent;
	text-align: center;
	}
	.restext
	{
		display: none;
		font-family: 'Amaranth', sans-serif;
	}
	.formItems
	{
		margin-top: 1em;
		text-align: center;
		font-family: 'Amaranth', sans-serif; /*what a nice font*/
		font-size: 1em;
		height: 4em;
		width: 75%;
	}
	.addextra
	{
		width: 25em;
		height: 5em;
	}
	.AgreementBox
	{
		width: 60%;
		height: 15em;
		
	}

</style><!-- dont worry fam, i will move these later-->
	<p>Add an Item</p> <!--did you know, I The amazing james, Forgot to add this and broke the page for 3 hours?-->
	<form method="POST" class="addItemForm" action="ajax/Pages/Inventory/add_inventoryImage.php" enctype="multipart/form-data">


<!-- various drop down menus for user to select from-->
		<input type="text" class="formItems" id="ItemName" name="ItemName" required="true" placeholder="Item Name"><br>
		<select class="formItems" id="ItemType" name="ItemType">
			<option value="" selected disabled>Type</option> <!--haha trying using that-->
			<?php
			//use types that are in the database - this uses the function on the fillmenu.php page
			fill_type();
			?>
		</select>
		<br>
		<select class="formItems agreeselect" id="Agreement" name="Agreement">
			<option value="" selected disabled class="">Agreement Type</option>
			<?php
			//use agreements that are in the database - this uses the function on the fillmenu.php page
			fill_agree();
			?>
		</select>
		<!--James this href doesnt work..well it does but its wrong..., how do I send them to another page?!-->
		<br><br>If you would like to add your own agreement use this button
		<button class='AddAgreement' style='margin-right:25%'>Add Agreement</button>
		<br>
		<select class="formItems" id="Restriction" name="Restriction">
			<option value="" selected disabled class="">Restrictions</option>
			<option value="1">No Restriction</option>
			<option value="2">Third Year or Above</option>
			<option value="3">PostGrad only</option>
			<option value="4">Tutors Only</option>
		</select>
		<br>
		<select class="formItems" id="Supervision" name="Supervision">
			<option value="" selected disabled class="">Supervision required?</option>
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select>
		<br>
		<select class="formItems con" id="Condition" name="Condition">
			<option value="" selected disabled class="">Condition</option>
			<option value="1">Perfect</option>			
			<option value="2">Minor scuffs</option>
			<option value="3">Some Damage</option>
			<option value="4">Broken</option>			
		</select>
		<br><br>
		<!--part of form to get the image-->
		<input type="hidden" name="size" value="500000">
		<input type="file" name="image"><br>
		<input  class="formItems" id="upload" name="upload" type="submit" value="Add New Item" name="add_item">
	</form>			
	<br>
<div align="center">
	<textarea disabled class="AgreementBox" id='result'></textarea>
</div>



        
