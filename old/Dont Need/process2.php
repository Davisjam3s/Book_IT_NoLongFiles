<?php
$Fullname = $_POST['Fullname'];
echo "$Fullname";
?>
<?php 
	if(isset ($_SERVER['REMOTE_USER']))
		{
			$user=$_SERVER['REMOTE_USER'];
		}
		else
		{
			echo "Please Log in";
		}
?>
<?php
$servername = "dragon.kent.ac.uk";
$username = "m04_bookit";
$password = "b*asiis";
$dbname = "m04_bookit";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE User SET UserFname = '$Fullname' WHERE UserUID = '$user'";



if (mysqli_query($conn, $sql)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>