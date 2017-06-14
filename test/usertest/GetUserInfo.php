<?php
sleep(0.5);
include '../../php/Conection.php';

$user=$_SERVER['REMOTE_USER'];
$user = "stub1";
$email=$_SERVER['MELLON_urn:oid:0_9_2342_19200300_100_1_3'];
$email = "stub1@kent.ac.uk";
$usertype=$_SERVER['MELLON_unikentaccountType_0'];
$usertype = 'staff';
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

	  		echo "$UserID $UserTypeUID $UserYear $UserFname $UserCampus $UserAgreed <br>";
	  	}

	  }else{
	  	echo "user does not exist <br>";
	  }
	  	

?>






<?php



if ($usertype == 'ugtstudent' ) 
		{
			$databaseUT = 1;
			echo "
					Username: $user<br>
					User Type: $usertype <br>
					User Email: $email<br>
					User Type Val: $databaseUT

			 ";
		}
		elseif ($usertype == 'staff') {
			$databaseUT = 3;
			echo "
					Username: $user<br>
					User Type: $usertype <br>
					User Email: $email<br>
					User Type Val: $databaseUT
			 ";
		}
		elseif ($usertype == 'pgrstudent') {
			$databaseUT = 4;
			echo "
					Username: $user<br>
					User Type: $usertype <br>
					User Email: $email<br>
					User Type Val: $databaseUT
			 ";
		}
		elseif ($usertype == 'pgtstudent') {
			$databaseUT = 4;
			echo "
					Username: $user<br>
					User Type: $usertype <br>
					User Email: $email<br>
					User Type Val: $databaseUT
			 ";
		}

?>



