<?php
$ItemName = $_POST['ItemName'];
$Type = $_POST['Type'];
$Agreement =$_POST['Agreement'];
$Restriction =$_POST['Restriction'];
$Condition =$_POST['Condition'];

?>
<?php require 'user_info.php';?>
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
$Type = mysqli_real_escape_string($conn, $Type);
$Agreement = mysqli_real_escape_string($conn, $Agreement);
$Restriction = mysqli_real_escape_string($conn, $Restriction);
$Condition = mysqli_real_escape_string($conn, $Condition);

$sql = "INSERT INTO Asset (AssetDescription, AssetTypeUID,AssetRestriction,AssetCondition,OwnerUID)VALUES ('$ItemName', '$Type','$Restriction','$Condition','$user')";





if (mysqli_query($conn, $sql)) {
    echo " New item added ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>