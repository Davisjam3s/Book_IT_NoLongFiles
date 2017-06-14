<?php require '../../php/Conection.php';


  $Fullname = $_POST['Fullname'];
  // selecting all the assets from the asset table, then ordering them, maybe we dont need order by random, but its looks different each time yo
  $sql = "SELECT * FROM Asset WHERE AssetDescription LIKE '$Fullname%'";
  $result = mysqli_query($conn, $sql);

  //once we got that stuff from the db
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     $ItemID =$row["AssetUID"];
     $AssetType = $row["AssetTypeUID"];
     $OwnerID =$row["OwnerUID"];
     $ItemName =$row["AssetDescription"];
     $ImageLink =$row["AssetImage"];
     echo "<div class='catalog_item $TypeCss' value='$ItemID'><div class='item_overlay'>$ItemName</div> <img src='ajax/Pages/Inventory/images/$ImageLink' height='$MyHeight' width='$MyWidth'> </div>";
   }
 }