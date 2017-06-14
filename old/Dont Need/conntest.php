<?php // connect the server and display if done
$servername = "dragon.kent.ac.uk";
$username = "m04_bookit";
$password = "b*asiis";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
<?php // display the name user name
    if(isset ($_SERVER['REMOTE_USER']))
    	{
            $user=$_SERVER['REMOTE_USER'];
               if ($user == 'jd601'|| $user == 'jd603')
               		{
                 		echo " $user ";  // put this on the page
               		}
        }				
?>
<?php 
	if(isset ($_SERVER['MELLON_unikentaccountType']))
		{
			$mail=$_SERVER['MELLON_unikentaccountType'];
			echo $mail;
		}
		else
		{
			echo "Obv not correct, try again";
		}
?>
<?php 
	if(isset ($_SERVER['MELLON_urn:oid:0_9_2342_19200300_100_1_3']))
		{
			$email=$_SERVER['MELLON_urn:oid:0_9_2342_19200300_100_1_3'];
			echo " ";
			echo $email;
		}
		else
		{
			echo " Obv not correct, try again";
		}
?>
