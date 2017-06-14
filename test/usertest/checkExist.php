<?php
sleep(0.5);
include 'php/Conection.php';

$user=$_SERVER['REMOTE_USER'];
$email=$_SERVER['MELLON_urn:oid:0_9_2342_19200300_100_1_3'];
$usertype=$_SERVER['MELLON_unikentaccountType_0'];

?>
<?php
if ($usertype == 'ugtstudent' ) 
		{
			$databaseUT = 1;
		}
		elseif ($usertype == 'staff') {
			$databaseUT = 3;
		}
		elseif ($usertype == 'pgrstudent') {
			$databaseUT = 4;

		}
		elseif ($usertype == 'pgtstudent') {
			$databaseUT = 4;
		}

?>

<?php
	$sql_Check_User = "SELECT * FROM User WHERE UserUID = '$user'"; // chnage this ot only get the values we need
	  $result = mysqli_query($conn, $sql_Check_User );

	  if (mysqli_num_rows($result) > 0) {
	  	while ($row = mysqli_fetch_assoc($result)) 
	  	 {
	  		$UserID = $row["UserUID"]; // needed
	  		$UserTypeUID =$row["UserTypeUID"]; //needed
	  		$UserYear =$row["UserYear"]; //needed
	  		$UserFname =  $row["UserFname"]; // needed
	  		$UserCampus = $row["UserCampus"]; // needed 
	  		$UserAgreed = $row["UserAgreed"]; // needed
	  	}
	  	include 'HasUserGotInfo.php';
	  	
	  }else{
	  	echo "user does not exist <br>";
	  	include 'AddNewUser.php';
	  	header("Location: index.php"); // relaod the page
	  }
	  	

?>