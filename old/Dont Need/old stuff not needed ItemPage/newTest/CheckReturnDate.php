<?php
//require the db connection
require "../../php/Conection.php";
$btn=0;
//get the asset uid, date from the getiteminfo page
$AssetUID = $_POST ['asset'];
$dayAdd     = $_POST['date'];
$BookedDays = $_POST['bookedDays'];  

$mydate     = date("Y/m/d"); // todays date
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); //adding no. to todays date and string into date 

$daySum     = $dayAdd + $BookedDays; // add them together for later 
$mydate     = date("Y/m/d"); // what is todays day?
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); // add the pick up day to the date 
$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days')); // how long does the user need it


echo "$dateadd $dayDrop ";
return;
?>