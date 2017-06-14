<!-- 
**This page gathers the information about the date that the useer cas choosen, this is a quick php script to get the values choosen from the user about the days they would like to book it, once it it has this information it can use php date to string allowing us to add and remove days to the date choosen, you can also see that it does a -1 this means that the user can also book an item for the same day as they would like to book it and then return it the same day 

    
**This page was Created by James Davis
**Commented by James davis



-->
<?php
$dayAdd     = $_POST['advanced']; // get the value from this 
$BookedDays = $_POST['DaysBooked']; // get the value from this
$daySum     = $dayAdd + $BookedDays-1; // add them together for later 
$mydate     = date("Y/m/d"); // what is todays day?
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); // add the pick up day to the date 
$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days')); // how long does the user need it 
?>