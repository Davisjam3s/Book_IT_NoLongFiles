<?php require '../../../php/Conection.php';


  $Fullname = $_POST['Fullname'];
  //if ($Fullname == NULL) {
   // echo "nothing";
    
  //}
    $Fullname = mysqli_real_escape_string($conn, $Fullname);
    $Fullname = strip_tags($Fullname);
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

          if ($AssetType == 1) { // Book
       $AssetType = "Book"; // Book
       $TypeCss = "ItemBook"; // ItemBook
       $MyHeight = 283;
       $MyWidth = 220;
       // set the hight and width for different types of Item that is on the page 
     }
     if ($AssetType == 2) { //lego
       $AssetType = "Lego"; // Lego
       $TypeCss = "ItemLego"; //  ItemLego
       $MyHeight = 283;
       $MyWidth = 400;
     }
      if ($AssetType == 3) { // Pi
       $AssetType = "Pi"; // Pi
       $TypeCss = "ItemPi"; // ItemPi
       $MyHeight = 283;
       $MyWidth = 400;
     }
      if ($AssetType == 4) { // EEG HEADSET
       $AssetType = "EEG Headset"; // Pi
       $TypeCss = "ItemEEGHeadset"; // ItemPi
       $MyHeight = 283;
       $MyWidth = 400;
     }


     echo "<div class='catalog_item $TypeCss' value='$ItemID'><div class='item_overlay'>$ItemName</div> <img src='ajax/Pages/Inventory/images/$ImageLink' height='$MyHeight' width='$MyWidth'> </div>";
   }
 }
 ?>
 <script>
    $(document).ready(function() {
        $('.catalog_item').click(function() {
            var jamjam = $(this).attr("value");
            $(".holder").load("ItemPage/GetItemInfro.php?id="+jamjam+"");
        });
    });
</script>
