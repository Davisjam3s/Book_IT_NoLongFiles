
<?php require 'php/Conection.php';?> <!--This is the connection file-->
<?php require 'test/Ft/FirstTime.php';?>
<?php require 'php/user_info.php';?> <!--give me the user name-->
<?php require 'php/email.php';?> <!--give me the users email-->
 <!--this will check if the user exists, if they dont it will add them into the database, if they do it will carry on as normal-->
<?php require 'php/banned.php';?>

<!--this is some php for adding the user when they first log in-->
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

<!DOCTYPE html> <!--yo, i heard you like HTML 5-->
<head> <!--start of head put things in here to load them, CSS, PHP, JS/Jquery-->
<title>BookIT</title> <!--Title of the page--> <!--Did you know BookIT was one word? I did not, so I changed it-->

<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--This single line is for mobile users"DM"-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
<!--Styles-->
<link rel="stylesheet" type="text/css" href="css/PageMainStyle.css"/> <!--this loads the main style of the page-->
<link rel="stylesheet" type="text/css" href="css/cat_items.css"/> <!--this for the items in the catalog-->
<link rel="stylesheet" type="text/css" href="css/agreeForm.css"/> <!--this is for the agree form-->
<link rel="stylesheet" type="text/css" href="css/tables.css"/> <!--this is for the tables on the booking pages-->
<link rel="stylesheet" type="text/css" href="css/InfoFrom.css"/>
<link rel="stylesheet" type="text/css" href="css/TableHeaders.css">
<!--end of styles-->
 <!--Scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--thats right jquery is being used here, you better use them libarys rather than doing it the long way-->
<script src="ajax/Scripts/Load_items.js"></script> <!--want to load them items on the page? this does it-->
<script src="ajax/Scripts/Bookings.js"></script> <!--want to see them bookings? you know what does it-->
<script type="text/javascript" src="js/header.js"></script> <!-- this is for the navation bar, well most of it, my code is everywhere, we better clean it up and change this when we did -->
<script type="text/javascript" src="js/agreeForm.js"></script><!--them users better agree, or else!-->
<script type="text/javascript" src="js/InventoryHeader.js"></script><!--yes yes, the inventory header, this does some loading -->
<!--end of scripts-->
<!--this is some amaxing tests fam-->

<script src="js/adminHeader.js"></script>
<script>
  $( document ).ready(function() 
    { // the doc better be ready
      $(".holder").show();  // show this
      $(".holder").load("Slideshow.php");// load this into it
    });
</script>
      <!--we will discus this-->
</head> <!--end of head-->
<body> <!--start of body-->



      <header class="large"> <!--set to large instantly, this gives the bigger header-->
        <div class="container"> <!--this is the container within the header-->
          <nav> <!--this is for the navagation area-->
            <a href="index.php"><img onclick="HomeClick()" src="images/uni_logo.png"></a> <!--this is for the logo-->
            
            <ul class="ulmain mainnav"> <!--this is the orginal navagation menu-->
             
              <li class="lihead"><a href="#" class="all">Catalogue</a></li> <!--whats this? you want to see the catalog? you better click here then-->
              <li class="lihead"><a href="#" class="currentBookings">My Bookings</a></li><!--oh you now want to see the bookings? guess you will be clcking this-->
              <?php require 'php/UserBar.php';?> <!--oh no, some wild PHP appeard, james Used display these items if the user is one of these, it was super effective-->
              <?php require 'php/UserBarAdmin.php';?> <!--oh no, some wild PHP appeard, james Used display these items if the user is one of these, it was super effective-->
           </ul><!--end of orginal header-->

           <ul class="ulmain ul4  invnav"><!--start of contact us-->
             <li class="lihead"><a href="#" class="addi">Add Asset</a></li>
             <li class="lihead"><a href="#" class="UploadAgree">Add Agreement</a></li>
			 <li class="lihead"><a href="#" class="CurrentAgreement">View Agreements</a></li>
             <li class="lihead"><a href="#" class="CurrentInventory">Manage Inventory</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li>
           </ul> <!--end of the contact us menu-->
           <ul class="ulmain ul5  adminnav"> <!--start of bookings menu-->
             <li class="lihead"><a href="#" class="Manage">Manage Users</a></li>
			 <li class="lihead"><a href="#" class="Control">Owner Control</a></li>
			 <li class="lihead"><a href="#" class="Edit">Edit Owner</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li>
           </ul> <!--end of bookings menu-->
         </nav> <!--end of the navagation menu-->
       </div> <!--end of the contanier-->
     </header> <!--end of the header-->
     <section class="stretch"> <!--things should be placed within here to work-->
      <p class="mainp">Welcome to bookIT<?php  echo " $user";?></p> <!--title of the page-->
     

      
    




      <div class="holder">Nothing to display</div> <!--hidden div which will contain working 
      ajax when needed-->

    </section> <!--end of section which should contain things within the page.--> 
  </body>
  </html>