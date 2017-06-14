<?php
require '../../../php/Conection.php';//connect to database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$UserName = $_POST['UserUID'];
$OwnerLocation = $_POST['RoomName'];
$Group = $_POST['Group'];



$sql = "SELECT * FROM User WHERE UserUID = '$UserName'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$UserEmail =$row["UserEmail"];
    	$UserFname =$row["UserFname"];
		

    	
    	
    }
} else 
{
    echo "error getting name";
}


$sql2 = "INSERT INTO Owner (OwnerUID, GroupUID,OwnerLocation,OwnerEmail,OwnerFname) Values('$owner','$Group','$OwnerLocation','$UserEmail','$UserFname')";

if (mysqli_query($conn, $sql2)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
?>

