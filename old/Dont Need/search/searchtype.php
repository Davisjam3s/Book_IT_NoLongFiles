<?php require '../../php/Conection.php';


  $Fullname = $_POST['Fullname'];
  if ($Fullname == 0 or $Fullname == 4) {
          // selecting all the assets from the asset table, then ordering them, maybe we dont need order by random, but its looks different each time yo
  $sql = "SELECT * FROM Asset";
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
     echo "$ItemName <br>";
   }
 }
  }else{
      // selecting all the assets from the asset table, then ordering them, maybe we dont need order by random, but its looks different each time yo
  $sql = "SELECT * FROM Asset WHERE AssetTypeUID = '$Fullname'";
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
     echo "$ItemName <br>";
   }
 }
  }


 ?>