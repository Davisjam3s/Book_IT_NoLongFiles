<?php

include 'upload.php';

$ItemName = $_POST['ItemName'];
$Type = $_POST['Type'];
$Agreement = $_POST['Agreement'];
$Restriction = $_POST['Restriction'];
$Condition = $_POST['Condition'];

?>
<?php require 'user_info.php' ?>
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
$ItemName = mysqli_real_escape_string($conn, $ItemName);
$ItemName = strip_tags($ItemName);
$Type = mysqli_real_escape_string($conn, $Type);
$Type = strip_tags($Type);
$Agreement = mysqli_real_escape_string($conn, $Agreement);
$Agreement = strip_tags($Restriction);
$Restriction = mysqli_real_escape_string($conn, $Restriction);
$Restriction = strip_tags($Restriction);
$Condition = mysqli_real_escape_string($conn, $Condition);
$Condition = strip_tags($Condition);

if ($Type == 1) {
	$Image = 'images/items/pi.jpg';
}
if ($Type == 2) {
	$Image = 'images/items/books.jpg';
}
if ($Type == 3) {
	$Image = 'images/items/lego.jpg';
}
if ($Type == 4) {
	$Image = 'images/items/fry.jpg';
}

$sql = "INSERT INTO Asset (AgreementUID,OwnerUID,AssetTypeUID,AssetDescription,AssetCondition,AssetImage,AssetRestriction,AssetInBasket) 
VALUES ('$Agreement','$owner','$Type','$ItemName','$Condition','$itemImage',$Restriction,0)";





if (mysqli_query($conn, $sql)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>