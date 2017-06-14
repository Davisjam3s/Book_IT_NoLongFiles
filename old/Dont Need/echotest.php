<?php require 'php/Conection.php';


$sql = "SELECT * FROM StubAsset";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$ItemID =$row["AssetUID"];
    	$OwnerID =$row["OwnerUID"];
    	$ItemName =$row["AssetDescription"];

        echo "id: $ItemID <br> Owner: $OwnerID <br> Item: $ItemName";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>