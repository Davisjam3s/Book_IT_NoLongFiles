<?php
require '../../../php/Conection.php';//connect to database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$owner=$_POST['UserUID'];
$OwnerLocation = $_POST['RoomName'];
$Group = $_POST['Group'];
$ownerEmail = $_POST['UserEmail'];
$ownerName = $_POST['UserFname'];


$sql = "INSERT INTO Owner (OwnerUID, GroupUID,OwnerLocation,OwnerEmail,OwnerFname) Values($owner,$Group,$OwnerLocation,$ownerEmail,$ownerName)";





if (mysqli_query($conn, $sql)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

