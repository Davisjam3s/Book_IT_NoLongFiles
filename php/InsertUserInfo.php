<?php
$Fullname  = $_POST['Fullname'];
$Campus    = $_POST['Campus'];
$YearGroup = $_POST['YearGroup'];
//echo "$Fullname";
?>
<?php
require 'user_info.php';
?>
<?php
$servername = "dragon.kent.ac.uk";
$username   = "m04_bookit";
$password   = "b*asiis";
$dbname     = "m04_bookit";
// Create connection
$conn       = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}
$Fullname  = mysqli_real_escape_string($conn, $Fullname);
$Fullname  = strip_tags($Fullname);
$Campus    = mysqli_real_escape_string($conn, $Campus);
$Campus    = strip_tags($Campus);
$YearGroup = mysqli_real_escape_string($conn, $YearGroup);
$YearGroup = strip_tags($YearGroup);
$sql       = "UPDATE User SET UserYear='$YearGroup', UserFname = '$Fullname', UserCampus ='$Campus' WHERE UserUID = '$user'";
if (mysqli_query($conn, $sql))
{
	echo " New record created successfully ";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>