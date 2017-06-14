<!DOCTYPE html>
<html>
<head>
	<title>home</title> <!--title of page-->
	<!--start of styles-->
	<link rel="stylesheet" type="text/css" href="css/Header_navagation.css"/> <!--this is for the header on each page-->
	<link rel="stylesheet" type="text/css" href="css/catalogArea.css"/> <!-- this is for the area where items are displayed as well as for the items within in them-->
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> <!--this is for a font that is from googles api-->
	<!--End of styles-->

	<!--start of scripts-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> <!--this is for a libary of jquery from google-->

	<script type="text/javascript" src="ajax/Scripts/Load_items.js"></script>
	<script type="text/javascript" src="js/homescript.js"></script> <!--this is the script that is run-->
	<!--end of scripts-->
	
</head>
<body onclick="hideMenu()"> <!--the on click is for hiding the dropdown menu if it is open-->
	<div class="global_header"> <!--start of header-->
		<div class="logo"><img src="images/uni_logo.PNG"></div> <!--this is for the logo-->
		
		<div class="username">
		<?php
			require 'php/user_info.php';
		?>
		</div> <!--This is for the username-->
		
	</div><!--end of header-->
	<div class="navbar"> <!--start of nav bar-->
		<a href="index.php"><div class="navbar_options end_left">Home</div></a> <!--this is a link for the homepage it has two classes and a href to go to the homepage -->
		<div class="navbar_options" onmouseover="catDrop()">Catalogue</div> <!--this is for the catalogue, the on mouse over is for brining the dropdown onto the screen-->
		<div class="navbar_options" onmouseover="bookingsDrop()">My bookings</div>
		<div class="navbar_options" onmouseover="contactDrop()">Contact us</div>
		<form class="nav_search_form">
			<input type="text" name="Search" placeholder="Search" class="navbar_options nav_search_text"> <!--this is for the search box-->
		</form>
		</div> <!--end of navbar-->
	
	<div class="menu_dropdown">
		<ul class="contact_Menu">
		<li><a href="###"><div class="navbar_options">Email</div></a></li>
		<li><a href="###"><div class="navbar_options">Form</div></a></li>
	</ul>
	<ul class="bookings_Menu">
		<li><a href="###"><div class="navbar_options">Current Bookings</div></a></li>
		<li><a href="###"><div class="navbar_options">Past Bookings</div></a></li>
	</ul>
	<ul class="catalog_Menu">
		<li><a href="###"><div class="navbar_options 1" onclick="CatalogAll()">All</div></a></li>
		<li><a href="###"><div class="navbar_options 2" onclick="Catalog1()">Lego</div></a></li>
		<li><a href="###"><div class="navbar_options 3" onclick="Catalog2()">Pi's</div></a></li>
		<li><a href="###"><div class="navbar_options 4" onclick="Catalog3()">Type 3</div></a></li>
		<li><a href="###"><div class="navbar_options 5" onclick="Catalog4()">Type 4</div></a></li>
	</ul>
	</div>
	<div class="catalog_area">
		<div class="holder">Nothing to display</div>
	</div>
	<div>
			<?php
			
			?>
	</div>

</body>
</html>