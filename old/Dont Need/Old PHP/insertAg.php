<?php
require('Conection.php');
// Check connection
if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error()); // check for connection error
}
$AgDesc     = "fiddlediddle";
$Supervised = 1;
$sqll       = "INSERT INTO Agreement (AgreementDescription, Supervised) VALUES ('$AgDesc', '$Supervised');";
if (mysqli_query($conn, $sqll))
{
	echo "yes";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); // close our connection
?>