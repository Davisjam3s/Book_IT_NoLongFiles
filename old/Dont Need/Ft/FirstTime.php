<?php
$servername = "dragon.kent.ac.uk"; //server name
$username = "m04_bookit"; // username for server
$password = "b*asiis"; // password for server
$dbname = "m04_bookit"; // name of the database on the server

$user=$_SERVER['REMOTE_USER'];

$email=$_SERVER['MELLON_urn:oid:0_9_2342_19200300_100_1_3'];

$userType=$_SERVER['MELLON_unikentaccountType_0'];


if ($userType = 'ugtstudent') // this is checking what type the user is
{
  $databaseUT = 1; // set it to this
}
elseif ($userType = 'staff') 
{
  $databaseUT = 3;
}
elseif ($userType = 'pgrstudent')
{
	$databaseUT = 4;
}
elseif ($userType = 'pgtstudent')
{
	$databaseUT = 4;
} // we have 2 4's is this intennded? 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // check for connection error
}



	  $sql_Check_User = "SELECT * FROM User WHERE UserUID = '$user'"; // chnage this ot only get the values we need
	  $result = mysqli_query($conn, $sql_Check_User );

	  if (mysqli_num_rows($result) > 0) {

	  while ($row = mysqli_fetch_assoc($result)) {
	  	$UserID = $row["UserUID"]; // needed
	  	$UserTypeUID =$row["UserTypeUID"]; //needed
	  	$UserYear =$row["UserYear"]; //needed
	  	$UserFname =  $row["UserFname"]; // needed
	  	$UserCampus = $row["UserCampus"]; // needed 
	  	$UserAgreed = $row["UserAgreed"]; // needed
	  	
	  	
	  	// this checks if the user has entered their name or any info
	  	if ($UserFname == null || $UserYear == null || $UserCampus == null) { // either of these are null
	  		if ($userType == 'ugtstudent') { // check the type of the user to show them a different from
	  			include 'StudentForm.php'; // if they are a student show them this
	  		}else{
	  			include 'StaffForm.php'; // if they are staff show them this
	  		}
	  		

	  		// script to go here to enter their infor
	  	}

	  	// this script is for changing if the user has agreed or not, here it automatically chnages it so they have
	  	if ($UserAgreed == 0) { // if this is 0
	  		include 'AgreeForm.php';
	  		
	  	}
	  
	  }
	}else{
		echo "User Does not exist"; // does this person exist? this is where we can insert the user
		sleep(1);
		$sql_New_User = "INSERT INTO User (UserUID, UserTypeUID, UserEmail, UserAgreed, UserBanned, IsOwner) VALUES ('$user','$databaseUT ','$email',0,0,0)"; // if they dont exist put this information in about them

		if (mysqli_query($conn, $sql_New_User)) {
			header("Location: index.php"); // relaod the page
		}else{
			echo "There has been an error, please try again";
			header("Location: index.php"); // relaod the page
		}
		
	}

?>

