<?php
$ItemName = $_POST['ItemName'];

$ItemType = $_POST['ItemType'];

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
$ItemType = mysqli_real_escape_string($conn, $ItemType);
$ItemType = strip_tags($ItemType);
$Agreement = mysqli_real_escape_string($conn, $Agreement);
$Agreement = strip_tags($Agreement);
$Restriction = mysqli_real_escape_string($conn, $Restriction);
$Restriction = strip_tags($Restriction);
$Condition = mysqli_real_escape_string($conn, $Condition);
$Condition = strip_tags($Condition);



if ($ItemType == 1) {
	$Image = 'images/items/pi.jpg';
}
if ($ItemType == 2) {
	$Image = 'images/items/books.jpg';
}
if ($ItemType == 3) {
	$Image = 'images/items/lego.jpg';
}
if ($ItemType == 4) {
	 $testme = rand(1, 2);
		if ($testme == 1) {
			$Image = 'images/items/fry.jpg';
		}
		else{
			$Image = 'images/items/jezz.jpg';
		}
	
}


$sql = "INSERT INTO Asset (AgreementUID, OwnerUID, AssetTypeUID, AssetDescription, AssetCondition, AssetImage, AssetRestriction, AssetInBasket) VALUES ('$Agreement','$user','$ItemType','$ItemName',$Condition,'$Image',$Restriction,0)";





if (mysqli_query($conn, $sql)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>