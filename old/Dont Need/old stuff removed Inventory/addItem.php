<?php
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

if ($Type == 1) {
	$Image = 'images/items/pi.jpg';
}
if ($Type == 2) {
	$Image = 'images/items/books.jpg';
}
if ($Type == 3) {
	$Image = 'images/items/lego.jpg';
}

$sql = "INSERT INTO StubAsset (OwnerUID, AssetDescription,Image,ItemType, AgreementType,Restrictions,Conditions, InBasket ) VALUES ('$user','$ItemName','$Image','$Type', '$Agreement', '$Restriction','$Condition' ,0)";





if (mysqli_query($conn, $sql)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

