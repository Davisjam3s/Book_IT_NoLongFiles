<!--
    ** This page is to make sure the user exists in the datbase. bassically if they logged in but did not fill out the user information form, of course this from need to be complete before they look for items

    ** connects to the database
    ** se
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
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

?>
<?php

$sql = "SELECT * FROM User where UserUID = '$user' "; // does this user already exist
$result = mysqli_query($conn,$sql); // get the result
if(mysqli_num_rows($result)>=1) // if it already exists
  {
    $row = mysqli_fetch_assoc($result); // if it does exist let me get the rows
    $DB_UserUID = $row["UserUID"]; // i only want this for now
    $DB_UserTypeUID  = $row["UserTypeUID"];
    $DB_UserBanned = $row["UserBanned"];
    $DB_UserYear = $row["UserYear"];
    $DB_UserEmail = $row["UserEmail"];
    $DB_UserFname = $row["UserFname"];
    $DB_UserCampus = $row["UserCampus"];
    $DB_UserAgreed = $row["UserAgreed"];
    $DB_CurrentLoans = $row["CurrentLoans"];

    if ($DB_UserTypeUID == 1) {
    	$DB_UserTypeUID = 'Student';
    }
    if ($DB_UserBanned == null) {
    	$DB_UserBanned = 'Not Banned';
    }
    if ($DB_UserAgreed == 1) {
    	$DB_UserAgreed = 'Agreed';
    }
     if ($DB_CurrentLoans == null) {
    	$DB_CurrentLoans = 'no items';
    }

    if ($DB_UserFname == null ||$DB_UserYear == null || $DB_UserCampus == null) {
    	echo "
    	<div class='phpechoback'></div>
			<div class='phpechofront'>
    			<h1 class='agreeTitle'>Welcome New User</h1>
    			<h2>Please fill out the form below</h2>
    			<form class='infoFormArea'>
        			<input type='text' id='Fullname' required class='FormItems' placeholder='Fullname'>
     
       			 <select class='FormItems' id='Campus' required>
            		<option value='' selected disabled >Campus</option>
            		<option value='Canterbury'>Canterbury</option>
            		<option value='Medway'>Medway</option>
        		</select>
        		<select class='FormItems' id='YearGroup' required>
            		<option value='' selected disabled >Year Group</option>
            		<option value='1'>year 1</option>
            		<option value='2'>year 2</option>
            		<option value='3'>year 3</option>
           		 	<option value='4'>Post Grad</option>
        		</select>
        		<span id='error'></span>
        		<button id='Infobutton' class='FormItems'> Submit </button>
    			</form>
			</div>";
    }
    
      
  }


?>
  <script>
	$('#Infobutton').click(function() { //wait for the button to be pressed, this will need a name change 
    var val1 = $('#Fullname').val(); // set val1 to the value in fullname
	  var val2 = $('#Campus').val(); // set val 2 to the value in campus
	  var val3 = $('#YearGroup').val(); // set val3 to the value in yeargroup
    if (val2 == 'Medway' || val2 =='Canterbury' && val1 !== '') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'php/InsertUserInfo.php', // this is where we're posting 
        data: { Fullname: val1,Campus: val2, YearGroup: val3}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
        }
        });
    }
     else
     {
      $('#error').html("You are Missing a Value");
     };

});
</script>