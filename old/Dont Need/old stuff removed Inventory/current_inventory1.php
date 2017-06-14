<!--
  ** This page was created so the inventoiry owner can see their own items, this will allow them to see what items they have in their own inventory

  ** this Page also allows the the user to edit their items which they have, incase they need to update the status of a certain item or if they made a mistake when adding the item 

  ** css on this page directly means that we only want the css to work on this page. although if we diecied to edit like this on other pages it might be needed 

  ** this page uses jquery in order to active boxes, create varibles and move IDs around, this was done so that only one editable box would have one ID at a time as if each textfield had the same id it would not work

  ** Matt should comment about the SQL he did it not me - James
  
  ** there are alot of PHP if statements on this page, this was just a cheap way to turn numbers into text, although this could be read from the datbase 

  ** The page echos out a table that shows the inventory of the currentowner who is logged in 

  ** The page has script that gets that finds the class of a particular field and gives it a new ID, this ID is used to collected the information when it is entered into the database, it does this by gettting the varible from the button that is clicked, this being given to the button when it is echoed out onto the page. it then gathers this information and then uses ajax to put this information into the page. giving the approprate text feilds the correct ID's. it also hides the other table elements that are not needed as we dont need to worry about those when we're not using them

  ** This pages was created by James D, Marie H, Matt H
  ** This page Has been commented by James D

  ** To Do list for this page 
    *refactor code
    * styles need their own home, altough they are only read b this page or they will mess up styles on other pages 
    * scripts could do with being moved

-->
<style>
    .phpechofront1,.phpechofront2{
        display: none;
    }
    input, select{
      width: 100%;
      border: none;
    }
    input:disabled, select:disabled{
      border: none;
      background-color: transparent;
    }
    input:disabled, select:disabled{
      color: black;
    }
    .deleteItem, .editItem {
      width: 100%;
      height: 100%;
    }

</style>

<script>
// this script is from showing the form when the deleteItem Button is clicked
$(document).ready(function() // wait till the page is ready
{
    $(".deleteItem").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront1").show(); // show the main nav
      });
  });
</script>
<script>
// this script is for showing the from whent he edit item button is pressed 
$(document).ready(function() // wait till the page is ready
{
    $(".editItem").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront2").show(); // show the main nav
      });
  });
</script>
<?php
echo "<p>Your Inventory</p>"; // dont delete this
?>
<?php require 'user_info.php' ?>
<?php require '../../../php/Conection.php';?>
<?php
$sql = "SELECT Asset.AssetUID,Agreement.AgreementUID,Agreement.AgreementName,Owner.OwnerUID,Asset.AssetTypeUID,Asset.AssetDescription,Asset.AssetCondition,Asset.AssetRestriction,Asset.AssetSupervised FROM Asset LEFT JOIN Owner ON Asset.OwnerUID=Owner.OwnerUID LEFT JOIN Agreement ON Asset.AgreementUID=Agreement.AgreementUID WHERE Owner.OwnerUID='$user'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table>
		<tr class='toptitles'>
			<th>Asset UID</th>

			<th>Agreement Name</th>
			<th>Asset Type</th>
			<th>Asset Description</th>
			<th>Asset Condition</th>
			<th>Asset Restriction</th>
			<th>Asset Supervision</th>
			<th>Delete</th>
            <th>Edit</th>
			
		</tr>";
    while($row = mysqli_fetch_assoc($result)) 
    {
    	$Asset =$row["AssetUID"];
		$AgreementType =$row["AgreementUID"];
		$AgreementName = $row["AgreementName"];
		$AssetType = $row['AssetTypeUID'];
    	$AssetDescription =$row["AssetDescription"];
		$AssetCondition =$row["AssetCondition"];
    	$AssetSupervised =$row["AssetSupervised"];
    	$ItemType =$row["AssetTypeUID"];   	
    	$Restriction =$row["AssetRestriction"];
    	
    	

    	if ($AgreementType == 3 ) {
    		$AgreementType = 'EEG Agree';
    	}
        if ($AgreementType == 4 ) {
            $AgreementType = 'Ian Agree';
        }
         if ($AgreementType == 5 ) {
            $AgreementType = 'Matteo Agree';
        }
         if ($AgreementType == 6 ) {
            $AgreementType = 'None';
        }
    	
    	if ($ItemType == 1 ) {
    		$ItemType = 'Book';
    	}
    	if ($ItemType == 2 ) {
    		$ItemType = 'Lego';
    	}
    	if ($ItemType == 3 ) {
    		$ItemType = 'Pi';
    	}
      if ($ItemType == 4 ) {
        $ItemType = 'EEG Headset';
      }
    	if ($AssetCondition == 1 ) {
    		$AssetCondition = 'Perfect';
    	}
    	if ($AssetCondition == 2 ) {
    		$AssetCondition = 'Minor Scuffs';
    	}
    	if ($AssetCondition == 3 ) {
    		$AssetCondition = 'Some Damage';
    	}
    	if ($AssetCondition == 4 ) {
    		$AssetCondition = 'Broken';
    	}
		if ($Restriction ==1){
			$Restriction = 'All';
		}
		if ($Restriction ==2){
			$Restriction = 'Third Year and Above';
		}
		if ($Restriction ==3){
			$Restriction = 'Post Grads only';
		}
		if ($Restriction ==4){
			$Restriction = 'Tutors only';
		}
		if ($AssetSupervised ==0){
			$AssetSupervised = 'No';
		}
		if ($AssetSupervised ==1){
			$AssetSupervised = 'Yes';
		}


    	 echo "<tr class='$Asset'>
		    	 <td>$Asset</td>

		    	 <td>
                    <select class='Agreement$Asset' disabled='true'>
                        <option value='' selected disabled>$AgreementType</option>
                        <option value='3'>EEG Agreement</option>
                        <option value='4'>Ians Agreement</option>
                        <option value='5'>Matteo Agreement</option>
                        <option value='6'>None</option>
                    </select>
                 </td>

		    	 <td>$ItemType</td>
		    	 <td><input class='Description$Asset' disabled='true'  value='$AssetDescription'></td>
		    	 <td>
                    <select class='Condition$Asset' disabled='true'>
                        <option value='' selected disabled>$AssetCondition</option>
                        <option value='1'>Perfect</option>          
                        <option value='2'>Minor scuffs</option>
                        <option value='3'>Some Damage</option>
                        <option value='4'>Broken</option>
                     </select>
                 </td>
		    	 <td>
                    <select class='Restriction$Asset' disabled='true'>
                        <option value='' selected disabled>$Restriction</option>
                        <option value='1'>All</option>
                        <option value='2'>Third Year or Above</option>
                        <option value='3'>PostGrad only</option>
                        <option value='4'>Tutors Only</option>
                    </select>
                 </td>
				 <td><select class='Supervision$Asset' disabled='true'>
                        <option value='' selected disabled>$AssetSupervised</option>
                        <option value='0'>No</option>
                        <option value='1'>Yes</option>
					</select>
				</td>
                 <td><button class='deleteItem $Asset' value='$Asset' id='Infobutton1'>Delete</button></td>
                 <td><button class='editItem $Asset' value='$Asset' id='Infobutton2'>Edit</button></td>
    	 		</tr>"; // delete does not do anything yet
    }
} else
{
    echo "<table>
    <tr class='toptitles'>
      <th>Asset UID</th>

      <th>Agreement Name</th>
      <th>Asset Type</th>
      <th>Asset Description</th>
      <th>Asset Condition</th>
      <th>Asset Restriction</th>
      <th>Asset Supervision</th>
      <th>Delete</th>
            <th>Edit</th>
      
    </tr>";
}

mysqli_close($conn);
?>

<script>
// some complicated script. actuyally written by James, i made it myself lolololol, no joke it worked, it worked so well i named the var after me 
$(document).ready(function() // wait till the page is ready
{
    $(".editItem").click(function() // wait till this button has been pressed
      { 
            var  jam =  $(this).val(); // value of the button 
           
          $( "input[class*="+jam+"]" ).prop('disabled',false).height(40); // enable any class with varible
          $( "select[class*="+jam+"]" ).prop('disabled',false).height(40); // enable any input type select with varible 
          $( "input[class|='Description"+jam+"']" ).attr("id","Description");
          $( "select[class|='Agreement"+jam+"']" ).attr("id","Agreement");
          $( "select[class|='Condition"+jam+"']" ).attr("id","Condition");
          $( "select[class|='Restriction"+jam+"']" ).attr("id","Restriction");
		  $( "select[class|='Supervision"+jam+"']" ).attr("id","Supervision");
          $( "#Infobutton2").addClass(jam);
          $( ".CancelDelete").addClass(jam);


          $(".toptitles").addClass(jam);
          $("button").not("button[class*="+jam+"]").prop('disabled',true);

          // this jquery enables the text box when the button is pressed, it also sets an attribute to the ones that are selected, givving them the ID that will be used to send to the database 
          // var jam is used to store the value that is collected from the button 
          $("tr").not("tr[class*="+jam+"]").hide("slow"); // this only shows the field that you would want to edit
      });
  });
$(document).ready(function() // wait till the page is ready
{
    $(".Done").click(function() // wait till this button has been pressed
      { 
            var  jam =  $(this).val();
          $( "input[class*="+jam+"]" ).prop('disabled',true);
      });
  });
</script>


<div class='phpechofront1'>
    <h1 class='agreeTitle'>Removing Item</h1>
    <h2 class='help'>By deleting this Item all the Assets will be lost</h2>
        <input type='text' id='ItemName' required class ='FormItems testname' disabled='true'>
    <span id='error'></span>
        <button id='Infobutton1' class='FormItems'> Submit </button>
        <button  class='FormItems CancelDelete'> Cancel </button>
</div>

<div class='phpechofront2'>
    <h1 class='agreeTitle'>Editing Item</h1>
    <h2 class='help'>Edit this fine Asset</h2>
        <input type='text' id='ItemName' required class ='FormItems testname' disabled='true'>
    <span id='error'></span>
        <button id='Infobutton2' class='FormItems'> Submit </button>
        <button class='FormItems CancelDelete'> Cancel </button>
</div>
<script>
$(document).ready(function() {
        $('.deleteItem').click(function() {
            $(".testname").val($(this).val());

        });
    });
    
</script>
<script>
$(document).ready(function() {
        $('.editItem').click(function() {
            $(".testname").val($(this).val());

        });
    });
    
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".CancelDelete").click(function() // wait till this button has been pressed
      { 
       $(".holder").load("ajax/Pages/Inventory/current_inventory.php");
      });
  });
</script>
<script>
    $('#Infobutton1').click(function() { //wait for the button to be pressed, this will need a name change 
       var val1 = $('#ItemName').val(); 

        
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ajax/Pages/Inventory/remove_inventory.php', // this is where we're posting 
        data: { AssetUID: val1}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $(".holder").load("ajax/Pages/Inventory/current_inventory.php");
        }
        });
});
</script>
<script>
    $('#Infobutton2').click(function() { //wait for the button to be pressed, this will need a name change 
     var val1 = $('#ItemName').val();
	   var val2 = $('#Description').val();
	   var val3 = $('#Agreement').val();
	   var val4 = $('#Condition').val();
	   var val5 = $('#Restriction').val();
	   var val6 = $('#Supervision').val();
        
		 if (val2 !== '' && val3 == '3' || val3 =='4' || val3 =='5' || val3 =='6' && val4 =='1' || val4 =='2' || val4 =='3'|| val4 =='4' && val5 =='1'|| val5 =='2'|| val5 =='3'|| val5 =='4' && val6 =='0'|| val6 =='1') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ajax/Pages/Inventory/edit_inventory.php', // this is where we're posting 
        data: { AssetUID: val1,Description: val2,Agreement: val3,Condition: val4,Restriction: val5, Supervision:val6}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $(".holder").load("ajax/Pages/Inventory/current_inventory.php");
        }
        });
	}
});
</script>
</table>