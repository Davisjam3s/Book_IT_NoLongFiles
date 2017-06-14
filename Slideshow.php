<!--
    ** This is The page that gets loade onto the index.php page when the site is loaded, this page loads in a slideshow of images that the user can see, these images are of the campus and many other things about the campus, possibly

    ** This Page uses jquery aswell as normal javascript, the javascript was from W3cShools as it was quick and easy to place it in the code rather than wasting time trying to fiquire how do it when there is more important things to be doing 

    ** This page also allows for some of the items in the database ot be loaded onto this page, at the moment we are just loading a few books onto the page, this is just a quick way to so the users what they can book on the website


    **This page was Created by  James Davis, Marie H
    **Commented by James Davis

    **Tasks for this page
        *For the love of god we need to change the images 
        *Code Clean *Done by james 
        *Code Format *Done By james
        *use the include file for the connection rather than the whole connection script *done*
        
-->
<script>
$(document).ready(function()
{
  $('.catalog_item').click(function()
  {
    var ItemID = $(this).attr("value");
    $(".mainp").hide();
    $(".holder").load("ItemPage/GetItemInfro.php?id=" + ItemID + "");
  });
});
</script>
<style>
.mySlides {
display:none;
height:400px;
width:100%;
}
.w3-content {
margin-left:0;
}
.w3-section {
margin-top:16px!important;
margin-bottom:16px!important;
}
.newhold {
width:100%;
height:inherit;
background-color:#000;
color:#FFF;
text-align:center;
text-transform:capitalize;
}
.innerbox {
width:33.333333333333%;
background-color:red;
height:250px;
float:left;
color:#000;
overflow:hidden;
}
h1 {
color:#000;
background-color:#FFF;
font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
text-transform:uppercase;
}
@media only screen and max-width 768px{
.mySlides {
display:none;
height:150px;
width:100%;
}
.innerbox {
width:100%;
}
h1 {
font-size:1em;
}
}
</style>
<body>


<div class="w3-content w3-section" style="width: 100%;">
  <img class="mySlides" alt="slideshow image" src="images/slideshow/wide1.jpg">
  <img class="mySlides" alt="slideshow image" src="images/slideshow/wide2.jpeg">
  <img class="mySlides" alt="slideshow image" src="images/slideshow/wide3.jpeg">
  <img class="mySlides" alt="slideshow image" src="images/slideshow/pic4.jpg">
  
  <img class="mySlides" alt="slideshow image" src="images/slideshow/pic5.jpg">
  <img class="mySlides" alt="slideshow image" src="images/slideshow/pic6.jpg">
  <img class="mySlides" alt="slideshow image" src="images/slideshow/pic7.jpg">
  <img class="mySlides" alt="slideshow image" src="images/slideshow/pic8.jpg">
</div>

<script>
// this code was taken from W3c schools
var myIndex = 0;
carousel();

function carousel()
{
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++)
  {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length)
  {
    myIndex = 1
  }
  x[myIndex - 1].style.display = "block";
  setTimeout(carousel, 2500); // Change image speed
}
</script>
<?php
require 'php/Conection.php';
// selecting all the assets from the asset table, then ordering them, maybe we dont need order by random, but its looks different each time yo
$sql    = "SELECT * FROM Asset where AssetTypeUID = 1 ORDER BY RAND() limit 11";
$result = mysqli_query($conn, $sql);
//once we got that stuff from the db
if (mysqli_num_rows($result) > 0)
{
  // output data of each row
  while ($row = mysqli_fetch_assoc($result))
  {
    $ItemID    = $row["AssetUID"];
    $AssetType = $row["AssetTypeUID"];
    $OwnerID   = $row["OwnerUID"];
    $ItemName  = $row["AssetDescription"];
    $ImageLink = $row["AssetImage"];
    if ($AssetType == 1) // Book
    {
      $AssetType = "Book"; // Book
      $TypeCss   = "ItemBook"; // ItemBook
      $MyHeight  = 250;
      $MyWidth   = 145;
      // set the hight and width for different types of Item that is on the page 
    }
    echo "<div class='catalog_item $TypeCss' value='$ItemID '><div class='item_overlay'>$ItemName $AssetType </div> <img src='ajax/Pages/Inventory/images/$ImageLink' height='$MyHeight' width='$MyWidth'> </div>";
  }
}
else
{
  echo "0 results";
}
mysqli_close($conn);
?>




