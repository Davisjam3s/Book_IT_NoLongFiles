<?php
function checkchoice()
{
	//require the db connection
	require "../php/Conection.php";
	
	//take the number from the selected date picker and addit to todays date to get the selected date
	//turn the date from string into date format
	$mydate     = date("Y/m/d"); // todays date
	$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); //adding no. to todays date and string into date 

	//sql to check the item on the date selected is available for booking
	$checkbetween_sql = "select * 
	from LoanContent join Loan on LoanContent.LoanUID = Loan.LoanUID 
	where '$dateadd' between Loan.LoanDate and LoanContent.ReturnDate 
	and LoanContent.AssetUID=$AssetUID";

	$result = mysqli_query($conn, $checkbetween_sql);
	//if we return any rows it means the item is already booked on the date selected
		if (mysqli_num_rows($result) >0)
		{
			//tell user item already booked
			echo "not available";
			$btn=0;
		}
		//if no rows returned, item is available to be booked 
		else
		{
			//tell user it ok to book
			echo "available";	
			$btn=1;
		}
	mysqli_close($conn);
}
?>