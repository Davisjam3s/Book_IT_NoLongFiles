<?php
echo "<p>Lego</p>";
?>

<?php require '../../../php/Conection.php';


$sql = "SELECT * FROM Asset where AssetTypeUID =3";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$ItemID =$row["AssetUID"];
    	$OwnerID =$row["OwnerUID"];
    	$ItemName =$row["AssetDescription"];
    	$ImageLink =$row["AssetImage"];
        echo "<div class='catalog_item'><div class='item_overlay'>$ItemName</div> <img src='$ImageLink' height='160' width='170'> </div>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>