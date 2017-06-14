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
	** This page Has been commented by James D

	** To Do list for this page 
		* Include the connection scrip rather than using it again
		* prevent SQL injections  **Done 
		* Prevent XSS attacks **Done
		* Fix Bug where it would not add to the database if the Restriction was set to 'all' or 'third year only' **Done
		* Call Agreements from the database inseatd of hard coding them
		* Call Condtions from the database inseatd of hard coding them
		* Call restrictions from the database instead of hard coding them 
		* Clean Up code
		* Add Scripts to their own file
		* Add CSS to their own file 

-->

<?php require 'user_info.php' ?>
<?php

$msg ="";
if (isset($_POST['upload'])) {
	$target = "images/".basename($_FILES['image']['name']);

	
	$servername = "dragon.kent.ac.uk"; //server name
	$username = "m04_bookit"; // username for server
	$password = "b*asiis"; // password for server
	$dbname = "m04_bookit"; // name of the database on the server

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // check for connection error
	}

	
	$image = $_FILES['image']['name'];
	$ItemName = $_POST['ItemName'];
	$ItemType = $_POST['ItemType'];
	$Agreement = $_POST['Agreement'];
	$Restriction = $_POST['Restriction'];
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
	$Condition = mysqli_real_escape_string($conn, $Condition);
	$Condition = strip_tags($Condition);

	$sql = "INSERT INTO Asset (AgreementUID, OwnerUID, AssetTypeUID, AssetDescription, AssetCondition, AssetImage, AssetRestriction, AssetInBasket) VALUES ('$Agreement','$user','$ItemType','$ItemName',$Condition,'$image',$Restriction,0)";
	mysqli_query($conn, $sql);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "uploaded";

	}else{
		$msg = "error uploading";
	}
	header('Location: loading.php');
}

?>
<script>
	$('.agreeselect').on('change', function() {
		if (this.value == 3) 
		{
			$(".boxbox").load("Agreements/EEG_Agreement.txt");
		}
		else if (this.value == 4) 
		{
			$(".boxbox").load("Agreements/Ians_Agreement.txt");
		}
		else if (this.value == 5) 
		{
			$(".boxbox").load("Agreements/Matteo_Agreement.txt");
		}
	})
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
	}
	.addextra
	{
		width: 25em;
		height: 5em;
	}
	.boxbox
	{
		width: 100%;
		height: 25em;
		
	}

</style><!-- dont worry fam, i will move these later-->
	<p>Add Item(Image)</p> <!--did you know, I The amazing james, Forgot to add this and broke the page for 3 hours?-->
	<form method="POST" class="addItemForm" action="ajax/Pages/Inventory/add_inventoryImage.php" enctype="multipart/form-data">



<input type="text" class="formItems" id="ItemName" name="ItemName" required="true" placeholder="Item Name"><br>
<select class="formItems" id="ItemType" name="ItemType">
			<option value="" selected disabled>Type</option> <!--haha trying using that-->
			<option value="1">Pi</option>
			<option value="2">Book</option>
			<option value="3">Lego</option>
			<option value="4">Other</option>
		</select>
		<br>
		<select class="formItems agreeselect" id="Agreement" name="Agreement">
			<option value="" selected disabled class="">Agreement Type</option>
			<option value="3">EEG Agreement</option>
			<option value="4">Ians Agreement</option>
			<option value="5">Matteo Agreement</option>
			<option value="6">None</option>
		</select>
		<br>
		<select class="formItems" id="Restriction" name="Restriction">
			<option value="" selected disabled class="">Restrictions</option>
			<option value="1">All</option>
			<option value="2">Third Year or Above</option>
			<option value="3">PostGrad only</option>
			<option value="4">Tutors Only</option>
		</select>
				<select class="formItems con" id="Condition" name="Condition">
			<option value="" selected disabled class="">Condition</option>
			<option value="1">Perfect</option>			
			<option value="2">Minor scuffs</option>
			<option value="3">Some Damage</option>
			<option value="4">Broken</option>
			
		</select>

		<input type="hidden" name="size" value="1000000">
		<input type="file" name="image">
		<input  class="formItems" id="upload" name="upload" type="submit" value="Confirm" name="add_item">
	</form>			
	<br>
	<textarea class="boxbox"></textarea>




        
