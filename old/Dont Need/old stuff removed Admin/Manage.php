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
.phpechofront1, .phpechofront2,.phpechofront3,.phpechofront4
{
    display:none
}
</style> <!--this is to make the from disapear when we dont need it-->


<script>
$(document).ready(function() // wait till the page is ready
{
    $(".DUser").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront1").show(); // show the main nav
      });
  });
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".EUser").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront2").show(); // show the main nav
      });
  });
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".Ban").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront3").show(); // show the main nav
      });
  });
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".Unban").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront4").show(); // show the main nav
      });
  });
</script>



<?php
echo "<p>Admin User Controls</p>"; // dont delete this
echo "<h2 class='response'></h2>";
?>
<?php require '../../../php/Conection.php';?>
<?php
$sql = "SELECT UserUID,UserTypeUID,UserBanned,UserYear,UserEmail, UserFname, UserCampus FROM User where UserTypeUID='1' order by UserUID";//this will be changed when we need admin level changed
$result = mysqli_query($conn, $sql);
echo "<table>
		<tr>
			<th>UserUID</th>
			<th>UserTypeUID</th>

			<th>UserYear</th>
			<th>UserEmail</th>
			<th>UserFname</th>
			<th>UserCampus</th>
			<th>Delete User</th>
			<th>Edit User</th>
			<th>Ban User</th>

		</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
    	$UserUID =$row["UserUID"];
    	$UserTypeUID =$row["UserTypeUID"];
    	$UserBanned =$row["UserBanned"];
    	$UserYear =$row["UserYear"];
    	$UserEmail =$row["UserEmail"];
    	$UserFname =$row["UserFname"];
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
       
		if ($UserBanned == 0) {
			$btnClass = "Ban BUser"; // the class needed two values, each class needs a space between
			$btnText = "Ban User";
			$btnID="Infobutton3";


			
		}else{
			$btnClass = "Unban UBUser";
			$btnText = "Unban User";
			$btnID = "Infobutton4";
		}


    	 echo "<tr>
		    	 <td>$UserUID</td>
		    	 <td>$UserTypeUID</td>

		    	 <td>$UserYear</td>
		    	 <td>$UserEmail</td>
		    	 <td>$UserFname</td>
		    	 <td>$UserCampus</td>
		    	
				 <td><button value='$UserUID' class='DUser' id='Infobutton1'>Remove User</button></td>
				 <td><button value='$UserUID' class='EUser' id='Infobutton2'>Edit User</button></td>
		    	 <td><button value='$UserUID' class='$btnClass' id='$btnID'>$btnText</button></td>

    	 		</tr>"; // delete does not do anything yet
    }
} else
{
    echo "<h2>No Users On Database yet</h2>";
}

mysqli_close($conn);
?>
<div class='phpechofront1'>
	<h1 class='agreeTitle'>Removing User</h1>
	<h2 class='help'>By deleting this user all the Bookings & Owner Assets will be lost</h2>
		<input type='text' id='UserName' required class ='FormItems testname' disabled='true'>
	<span id='error'></span>
		<button id='Infobutton1' class='FormItems'> Submit </button>
        <button id='CancelDelete' class='FormItems'> Cancel </button>
</div>
<div class='phpechofront2'>
	<h1 class='agreeTitle'>Edit User</h1>
	<h2 class="help">Please fill out the form below</h2>
        <input type='text' id='UserName' required class='FormItems testname' disabled="true">
        <input type='text' id='UserFName' required class='FormItems' placeholder='User Full Name'>
     
        <select class='FormItems' id='UserType' required>
            <option value='' selected disabled >User Type</option>
            <option value='1'>Student</option>
            <option value='2'>Admin</option>
			<option value='3'>Staff</option>
			<option value='4'>Post Grad</option>
        </select>
        
		<select class='FormItems' id='UserCampus' required>
            <option value='' selected disabled >User Campus</option>
            <option value='Canterbury'>Canterbury</option>
            <option value='Medway'>Medway</option>
			
        </select>
    <span id='error'></span>
        <button id='Infobutton2' class='FormItems'> Submit </button>
                
</div>
<div class='phpechofront3'>
	<h1 class='agreeTitle'>Ban User</h1>
	<h2 class='help'>Ban this user from creating Loans</h2>
		<input type='text' id='UserName' required class ='FormItems testname' disabled='true'>
	<span id='error'></span>
		<button id='Infobutton3' class='FormItems'> Submit </button>
        <button id='CancelDelete' class='FormItems'> Cancel </button>
</div>
<div class='phpechofront4'>
	<h1 class='agreeTitle'>UnBan User</h1>
	<h2 class='help'>Allow the User to make Loans again</h2>
		<input type='text' id='UserName' required class ='FormItems testname' disabled='true'>
	<span id='error'></span>
		<button id='Infobutton4' class='FormItems'> Submit </button>
        <button id='CancelDelete' class='FormItems'> Cancel </button>
</div>
<script>
$(document).ready(function() {
        $('.DUser').click(function() {
            $(".testname").val($(this).val());

        });
    });  
</script>
<script>
$(document).ready(function() {
        $('.EUser').click(function() {
            $(".testname").val($(this).val());

        });
    });  
</script>
<script>
$(document).ready(function() {
        $('.BUser').click(function() {
            $(".testname").val($(this).val());

        });
    });  
</script>
<script>
$(document).ready(function() {
        $('.UBUser').click(function() {
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
</script>

<script>
	$('#Infobutton1').click(function() { //wait for the button to be pressed, this will need a name change 
	   var val1 = $('#UserName').val();	
		
		$.ajax({ // now the ajax
		type: 'POST', // we are posting it 
        url: 'ajax/Pages/Admin/DeleteUser.php', // this is where we're posting 
        data: { UserName: val1}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $('.response').html("Successfully removed from the database");
            $('.phpechofront1').hide();
        }
        });
});
</script>
<script>
	$('#Infobutton2').click(function() { //wait for the button to be pressed, this will need a name change 
       var val1 = $('#UserFName').val(); // set val1 to the value in fullname
	   var val2 = $('#UserType').val(); // set val 2 to the value in User Type
	   var val3 = $('#UserName').val();
	   var val4 = $('#UserCampus').val();//set val 4 to the User Campus
	  
    if (val2 == '1' || val2 =='2' || val2=='3' || val2=='4' && val1 !== '' && val4=='1'|| val4=='2') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ajax/Pages/Admin/EditUser.php', // this is where we're posting 
        data: { UserFName: val1,UserType: val2, UserName: val3, UserCampus: val4}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $('.phpechofront2').hide();
			$(".holder").load("ajax/Pages/Admin/Manage.php");
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
	$('#Infobutton3').click(function() { //wait for the button to be pressed, this will need a name change 
	   var val1 = $('#UserName').val();	
		
		$.ajax({ // now the ajax
		type: 'POST', // we are posting it 
        url: 'ajax/Pages/Admin/BanUser.php', // this is where we're posting 
        data: { UserName: val1}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $('.response').html("Successfully removed from the database");
            $('.phpechofront3').hide();
            $(".holder").load("ajax/Pages/Admin/Manage.php");
        }
        });
});
</script>
<script>
	$('#Infobutton4').click(function() { //wait for the button to be pressed, this will need a name change 
	   var val1 = $('#UserName').val();	
		
		$.ajax({ // now the ajax
		type: 'POST', // we are posting it 
        url: 'ajax/Pages/Admin/UnBanUser.php', // this is where we're posting 
        data: { UserName: val1}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $('.response').html("Successfully removed from the database");
            $('.phpechofront4').hide();
            $(".holder").load("ajax/Pages/Admin/Manage.php");
        }
        });
});
</script>