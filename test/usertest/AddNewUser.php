<?php
sleep(0.5);
$sql_New_User = "INSERT INTO User (UserUID, UserTypeUID, UserEmail, UserAgreed, UserBanned, IsOwner) VALUES ('$user','$databaseUT ','$email',0,0,0)"; // if they dont exist put this information in about them

		if (mysqli_query($conn, $sql_New_User)) {
			sleep(2);
			header("Location: index.php");
			
		}else{
			echo "There has been an error, please try again";
			
		}
?>