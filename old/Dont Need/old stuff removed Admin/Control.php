<!--
    ** This is the page for the admin to manage the users on the website, here the admin should be able to Ban users, Remove Users and make other Users Admins/Owners

    **This page starts with the style tag, this was to fix a bug where the from was showing on the page when it should not have

    ** JQuery is used  this is for the button press when the button named owner is pressed it will disaplay the form to that the user can fill it out and completr it, this is so that the user can add a new owner to the owner table

    ** PHP is used to echo the page contents of the page, it is used to echo a table where the user can see the users that have created an account, it echos buttons so thaty the user is able to intereact with indivudal users THe PHP uses SQL in order to echo out the users within the User table using SELECT * 

    ** it uses a small if statement in order to modify the values from the database into an readable format so the user can read it, as numbers dont mean anything to people 

    ** Blow this is the hidden form , this is where the user will eneter the information about the new owner, this from is only activated when the make owner button is pressed, its value is also dictated buy the value of the button this meaning that it SHOULD add a new owner based on the button pressed

    ** it has more Jqueery to get the value from the the button and put it in the text box, that is disabled so the admin can 


    **The page was created by James Davis, Matt Hood
    **Commented by James Davis
    **Tasks for this page 
        * The Admin cannot ban Users
        * The admin cannot edit a users information
        * the user cant modify any users info
        * make a button for the user to remove an owner, you will need to delete their assest first 
        *the make owner button still shows when the user already is an owner 


-->
<style>
.phpechofront, .phpechofront1, .phpechofront2
{
    display:none
}
</style> <!--this is to make the from disapear when we dont need it-->

<script>
$(document).ready(function() // wait till the page is ready
{
    $(".Make").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront").show(); // show the main nav
      });
  });
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".Remove").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront1").show(); // show the main nav
      });
  });
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".Edit").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront2").show(); // show the main nav
      });
  });
</script>



<?php
echo "<p>Admin Owner Controls</p>"; // dont delete this
echo "<h2 class='response'></h2>";
?>
<?php require '../../../php/Conection.php';?>
<?php
$sql = "SELECT UserUID, UserTypeUID,UserEmail,UserCampus,IsOwner FROM User where UserTypeUID>='1' order by UserUID";//this will be changed when we need admin level changed
$result = mysqli_query($conn, $sql);
echo "<table>
		<tr>
			<th>UserUID</th>
			<th>UserTypeUID</th>
			<th>UserEmail</th>

			<th>UserCampus</th>
			<th>Owner Control</th>
			
			<th>Edit Owner</th>

		</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
    	$UserUID =$row["UserUID"];
    	$UserTypeUID =$row["UserTypeUID"];
    	$UserEmail =$row["UserEmail"];
		$IsOwner = $row["IsOwner"];
    	$UserCampus =$row["UserCampus"];

    	//lazy way of checking user types
    	if ($UserTypeUID == '1') {
    		$UserTypeUID = 'Student';
    	}
    	elseif ($UserTypeUID = '2') {
    		$UserTypeUID = 'Admin';
    	}
    	elseif ($UserTypeUID = '3') {
    		$UserTypeUID = 'Staff';
    	}
		elseif ($UserTypeUID = '4'){
			$UserTypeUID = 'Post Grad';
		}
		

		 if ($UserCampus == 1) {
            $UserCampus = 'Canterbury';
        }
        elseif ($UserCampus == 2) {
            $UserCampus = 'Medway';
        }
       
		if ($IsOwner == 0) {
			$btnClass = "Make owner"; // the class needed two values, each class needs a space between
			$btnText = "Make Owner";
			$btnID="Infobutton";
			$btnClass2="";
			$btnID2="";
			$btnText2="";

			
		}else{
			$btnClass = "Remove Downer";
			$btnText = "Remove Owner";
			$btnID = "Infobutton1";
			$btnClass2= "Edit Eowner";
			$btnID2="Infobutton2";
			$btnText2= "Edit Owner";
		}


    	echo "<tr>
		    	 <td>$UserUID</td>
		    	 <td>$UserTypeUID</td>
		    	 <td>$UserEmail</td>

		    	 <td>$UserCampus</td>
				 
				 
			
				<td><button class='$btnClass'id='$btnID' Value='$UserUID'>$btnText</button></td>
				 
				 <td><button value='$UserUID' class='$btnClass2' id='$btnID2'>$btnText2</button></td>

    	 		</tr>"; // delete does not do anything yet
    }
} else
{
    echo "<h2>No Owners On Database yet</h2>";
}

mysqli_close($conn);
?> 

<div class='phpechofront'>
	<h1 class='agreeTitle'>Add New Owner</h1>
	<h2 class="help">Please fill out the form below</h2>
        <input type='text' id='UserName' required class='FormItems testname' disabled="true">
        <input type='text' id='RoomName' required class='FormItems' placeholder='RoomName'>
     
        <select class='FormItems' id='Group' required>
            <option value='' selected disabled >Group</option>
            <option value='1'>School of Computing</option>
            <option value='2'>Digital Humanities</option>
        </select>
        
    <span id='error'></span>
        <button id='Infobutton' class='FormItems'> Submit </button>
        <button id='CancelAdd' class='FormItems'> Cancel </button>
                
</div>
<div class='phpechofront1'>
	<h1 class='agreeTitle'>Removing Owner</h1>
	<h2 class='help'>By deleting this user all the Assets will be lost</h2>
		<input type='text' id='UserName2' required class ='FormItems testname' disabled='true'>
	<span id='error'></span>
		<button id='Infobutton1' class='FormItems'> Submit </button>
        <button id='CancelDelete' class='FormItems'> Cancel </button>
</div>
<div class='phpechofront2'>
	<h1 class='agreeTitle'>Edit Owner</h1>
	<h2 class="help">Please fill out the form below</h2>
        <input type='text' id='UserName1' required class='FormItems testname' disabled="true">
        <input type='text' id='RoomName1' required class='FormItems' placeholder='RoomName'>
     
        <select class='FormItems' id='Group1' required>
            <option value='' selected disabled >Group</option>
            <option value='1'>School of Computing</option>
            <option value='2'>Digital Humanities</option>
        </select>
        
    <span id='error'></span>
        <button id='Infobutton2' class='FormItems'> Submit </button>
        <button id='CancelEdit' class='FormItems'> Cancel </button>      
</div>
<script>
$(document).ready(function() {
        $('.owner').click(function() {
            $(".testname").val($(this).val());

        });
    });
    
</script>
<script>
$(document).ready(function() {
        $('.Downer').click(function() {
            $(".testname").val($(this).val());

        });
    });  
</script>
<script>
$(document).ready(function() {
        $('.Eowner').click(function() {
            $(".testname").val($(this).val());

        });
    });  
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $("#CancelDelete").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront1").hide(); // show the main nav
      });
  });
$(document).ready(function() // wait till the page is ready
{
    $("#CancelAdd").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront").hide(); // show the main nav
      });
  });
$(document).ready(function() // wait till the page is ready
{
    $("#CancelEdit").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront2").hide(); // show the main nav
      });
  });
</script>
<script>
	$('#Infobutton').click(function() { //wait for the button to be pressed, this will need a name change 
       var val1 = $('#RoomName').val(); // set val1 to the value in fullname
	   var val2 = $('#Group').val(); // set val 2 to the value in campus
	   var val3 = $('#UserName').val();
	  
    if (val2 == '1' || val2 =='2' && val1 !== '') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ajax/Pages/Admin/CreateOwner3.php', // this is where we're posting 
        data: { RoomName: val1,Group: val2, UserName: val3}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $('.response').html("successfully added to the database");
            $('.phpechofront').hide();
            $(".holder").load("ajax/Pages/Admin/Control.php");
        }
        });
    }
     else
     {
        $('.help').css( "color", "red" );
        $('.help').html("You are Missing a Value");
     };

});
</script>
<script>
	$('#Infobutton1').click(function() { //wait for the button to be pressed, this will need a name change 
	   var val1 = $('#UserName2').val();	
		
		$.ajax({ // now the ajax
		type: 'POST', // we are posting it 
        url: 'ajax/Pages/Admin/DeleteOwner.php', // this is where we're posting 
        data: { UserName: val1}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $('.response').html("Successfully removed from the database");
            $('.phpechofront1').hide();
            $(".holder").load("ajax/Pages/Admin/Control.php");
        }
        });
});
</script>
<script>
	$('#Infobutton2').click(function() { //wait for the button to be pressed, this will need a name change 
       var val1 = $('#RoomName1').val(); // set val1 to the value in fullname
	   var val2 = $('#Group1').val(); // set val 2 to the value in campus
	   var val3 = $('#UserName1').val();
	  
    if (val2 == '1' || val2 =='2' && val1 !== '') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ajax/Pages/Admin/EditOwner.php', // this is where we're posting 
        data: { RoomName: val1,Group: val2, UserName: val3}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $('.response').html("successfully added to the database");
            $('.phpechofront2').hide();
        }
        });
    }
     else
     {
        $('.help').css( "color", "red" );
        $('.help').html("You are Missing a Value");
     };

});
</script>