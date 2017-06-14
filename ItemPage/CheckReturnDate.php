<?php
//require the db connection
require "../php/Conection.php";

//get the asset uid, date and amount of days requested  from the getiteminfo page
$AssetUID = $_POST ['asset'];
$dayAdd     = $_POST['date']; 
$BookedDays = $_POST['bookedDays']; 
echo $AssetUID;
//take the number from the selected date picker and addit to todays date to get the selected date
//turn the date from string into date format
$mydate     = date("Y/m/d"); // todays date
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); //adding no. to todays date and string into date 

$daySum     = $dayAdd + $BookedDays; // add them together for later 
$mydate     = date("Y/m/d"); // what is todays day?
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); // add the pick up day to the date 
$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days')); // how long does the user need it
echo $dayDrop;
//sql to check the item on the date selected is available for booking
$checkbetween_sql = "select * 
from LoanContent join Loan on LoanContent.LoanUID = Loan.LoanUID 
where '$dayDrop' between Loan.LoanDate and LoanContent.ReturnDate 
and LoanContent.AssetUID=$AssetUID";

$result = mysqli_query($conn, $checkbetween_sql);
//if we return any rows it means the item is already booked on the date selected
	if (mysqli_num_rows($result) >0)
	{
		//tell user item already booked
		echo "1";
		return;
		
	}
	//if no rows returned, item is available to be booked 
	else
	{
		//tell user it ok to book
		echo "0";	
		return;
	
	}
mysqli_close($conn);
?>