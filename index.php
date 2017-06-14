 <!--We better get on this lads and ladies thats right, im not sexist, take that feminists-->
<!--don't break anything
              _
             | |
             | |===( )   //////
             |_|   |||  | o o|
                    ||| ( c  )                  ____
                     ||| \= /                  ||   \_
                      ||||||                   ||     |
                      ||||||                ...||__/|-"
                      ||||||             __|________|__
                        |||             |______________|
                        |||             || ||      || ||
                        |||             || ||      || ||
------------------------|||-------------||-||------||-||-------
                        |__>            || ||      || ||


I dont know why you're reading the code, there is nothing intresting here, unless you're a code stealer, if so, go away-->
<!--dont undertand our code? well then ask, or dont, dont worry after a while we wont understand it anyway-->
<!--
	** This is the index page, here the user will be able to accesss the website

	** This page does not contain much as things are loaded to it rather 
-->
<?php require 'php/Conection.php';?> <!--This is the connection file-->
<?php require 'php/user_info.php';?>
<?php require 'php/CountMyBookings.php';?>
<?php require 'php/CountMyLoans.php';?>
<?php //require 'test/Ft/FirstTime.php';?>
<?php require 'test/usertest/checkExist.php';?>
<?php require 'test/usertest/HasUserAgreed.php';?>
 <!--give me the user name-->
<?php require 'php/email.php';?> <!--give me the users email-->
 <!--this will check if the user exists, if they dont it will add them into the database, if they do it will carry on as normal-->
<?php require 'php/banned.php';?>
<!--this is some php for adding the user when they first log in-->
<!DOCTYPE html>
<html>
<head>
<title>Bookit</title>

		<!--this content is from the uni kent website, there is no point of wrting it if we have acsess to it view-source:https://www.kent.ac.uk/ for refrence -->
		<link rel="apple-touch-icon" sizes="57x57" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/manifest.json">
		<link rel="mask-icon" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/safari-pinned-tab.svg" color="#003882">
		<link rel="shortcut icon" href="https://static.kent.ac.uk/pantheon/kent-theme-assets/assets/images/favicons/favicon.ico">
		<!--end of stuff taken from the uni kent website-->
<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=0"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--thats right jquery is being used here, you better use them libarys rather than doing it the long way-->
<script src="ajax/Scripts/Load_items.js"></script> <!--want to load them items on the page? this does it-->
<script src="ajax/Scripts/Bookings.js"></script> <!--want to see them bookings? you know what does it-->
<script type="text/javascript" src="js/header.js"></script> <!-- this is for the navation bar, well most of it, my code is everywhere, we better clean it up and change this when we did -->
<script type="text/javascript" src="js/agreeForm.js"></script><!--them users better agree, or else!-->
<script type="text/javascript" src="js/InventoryHeader.js"></script><!--yes yes, the inventory header, this does some loading -->
<!--end of scripts-->
<!--this is some amaxingtests fam-->
<script src="js/adminHeader.js"></script>
<link rel="stylesheet" type="text/css" href="css/cat_items.css"/> <!--this for the items in the catalog-->
<link rel="stylesheet" type="text/css" href="css/agreeForm.css"/> <!--this is for the agree form-->
<link rel="stylesheet" type="text/css" href="css/tables.css"/> <!--this is for the tables on the booking pages-->
<link rel="stylesheet" type="text/css" href="css/InfoFrom.css"/>
<link rel="stylesheet" type="text/css" href="css/TableHeaders.css">
<link rel="stylesheet" type="text/css" href="css/index2.css">

<script>
$(document).ready(function()
{
    $(".shownav").click(function()
      {
          $(".test").toggle();    
      });
    
});
</script>
<script>

 $(window).resize(function() {
  if ($(window).width() < 748) {
     //bigger than phone
  }
 else {
    $(".test").show();  
 }
});

</script>
</head>
<body>
<div class="header">
<img class="shownav" alt="expand navagation" src="images/expand.png" >
<br>
<a href="index.php"><img onclick="HomeClick()" alt="University of Kent" src="images/uni_logo.png"></a>
<div class="test">
<ul class="ulmain mainnav"> <!--this is the orginal navagation menu-->            
	<li class="lihead"><a href="#" class="all">Catalogue</a></li> <!--whats this? you want to see the catalog? you better click here then-->
	<li class="lihead"><a href="#" class="currentBookings">My Bookings <?php echo "($countb)"; ?> </a></li><!--oh you now want to see the bookings? guess you will be clcking this-->
	<?php require 'php/UserBar.php';?> <!--oh no, some wild PHP appeard, james Used display these items if the user is one of these, it was super effective-->
    <?php require 'php/UserBarAdmin.php';?> <!--oh no, some wild PHP appeard, james Used display these items if the user is one of these, it was super effective-->
</ul><!--end of orginal header-->

<ul class="ulmain ul4  invnav"><!--start of contact us-->
	<li class="lihead"><a href="#" class="addi">Add Asset</a></li>
	<li class="lihead"><a href="#" class="UploadAgree">Add Agreement</a></li>
	<li class="lihead"><a href="#" class="CurrentAgreement">View Agreements</a></li>
	<li class="lihead"><a href="#" class="ManageBookings">Manage Bookings <?php echo "($countL)"; ?></a></li>
	<li class="lihead"><a href="#" class="CurrentInventory">Manage Inventory</a></li>
<li class="lihead"><a href="#" class="back">Back</a></li>
</ul> <!--end of the contact us menu-->

<ul class="ulmain ul5  adminnav"> <!--start of bookings menu-->
	<li class="lihead"><a href="#" class="Manage">Manage Users</a></li>
	<li class="lihead"><a href="#" class="Control">Owner Control</a></li>
	<li class="lihead"><a href="#" class="Edit">Edit Owner</a></li>
	<li class="lihead"><a href="#" class="back">Back</a></li>
</ul> <!--end of bookings menu-->
</div>
  	
</div>
<script>
$( document ).ready(function() 
{ // the doc better be ready
	$(".holder").show();  // show this
	$(".holder").load("Slideshow.php");// load this into it
});
</script>

<div class="MainBody">
<p class="mainp" style="text-align: center;margin-top: 10px; font-size: 2em;">Welcome to bookIT <?php  echo " $user";?></p>
	<div class="holder">Nothing to display
	</div>
</div>

<div class="Footer">CO600 Project m04_Bookit created by : James, Matt, Marie and Dominic</div>
<script>
	setInterval(function(){blink()}, 1000);
                
              
    function blink() {
        //$(".Footer").fadeTo(100, 0.1).fadeTo(200, 1.0);
    }
</script>
</body>
</html>
