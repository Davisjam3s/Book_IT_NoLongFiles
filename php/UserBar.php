<!--
 **This page checks to see the type of the user, if they are a staff memember, then it will give them more options on the navagation bar

 ** will need to change to staff at a later time

 **Page was Created by James davis
 ** Commented by James Davis
 ** Tasks for this page 
 	* Change student to staff
-->
<?php
$user = $_SERVER['REMOTE_USER'];
if (isset($_SERVER['MELLON_unikentaccountType']))
{
	$userType = $_SERVER['MELLON_unikentaccountType'];
	if ($userType == 'staff' or $user == 'mh708' or $user == 'jd601' or $user == 'mh709' or $user == 'dm458') // just for lol's fam, this needs changing 
	{
		// put this on the page
		echo "<li class='lihead'><a href='#' onclick='InventoryNav()'>My Inventory</a></li>"; // and this whilst you're at it
		// these could be echoed at the same time, but its too confusing and long, well not realling confusing, just makes the code look ugly
	}
}
?>