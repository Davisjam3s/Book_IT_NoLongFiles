<?php
//require the db connection
require "../php/Conection.php";

//get the asset uid, date and amount of days requested  from the getiteminfo page
$AssetUID = $_POST ['asset'];
$dayAdd     = $_POST['date']; 
$BookedDays = $_POST['bookedDays']; 
$sql1 = 0;
$sql2=0;



//take the number from the selected date picker and addit to todays date to get the selected date
//turn the date from string into date format
$mydate     = date("Y/m/d"); // todays date
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); //adding no. to todays date and string into date 
$daySum     = $dayAdd + $BookedDays; // add them together for later 
//$mydate     = date("Y/m/d"); // what is todays day?
//$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); // add the pick up day to the date 
$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days')); // how long does the user need it



	//sql to check the item on the date selected is available for booking
	$checkdate1_sql = "select * 
	from LoanContent join Loan on LoanContent.LoanUID = Loan.LoanUID 
	where '$dateadd' between Loan.LoanDate and LoanContent.ReturnDate 
	and LoanContent.AssetUID=$AssetUID";
	
	

	$result = mysqli_query($conn, $checkdate1_sql);
	//if we return any rows it means the item is already booked on the date selected
		if (mysqli_num_rows($result) >0)
		{
			//change value of $sql1
			$sql1=1;	
			echo "1";
			return;			
			
		}
		//if no rows returned, item is available to be booked 
		else
		{
			//ensure $sql1 is 0;
			$sql1=0;
			$checkreturn_sql = "select * 
		from LoanContent join Loan on LoanContent.LoanUID = Loan.LoanUID 
		where '$dayDrop' between Loan.LoanDate and LoanContent.ReturnDate 
		and LoanContent.AssetUID=$AssetUID";
		
				$result2 = mysqli_query($conn, $checkreturn_sql);
		//if we return any rows it means the item is already booked on the return date selected
			if (mysqli_num_rows($result) >0)
			{
				//change value of $sql2
				$sql2=1;	
				echo "1";
				return;
				
			}
			//if no rows returned, item is available to be booked 
			else
			{
				//ensure $sql2 is 0;
				$sql2=0;
				echo "0";
				return;
			
			}
			
		
		}
		
		
		
		//sql to check the return date does not overlap a current booking
		

	
		
		//if both sql results are 0 then return a 1 indication "ok to book"
		//if ($sql1==0 and $sql2==0)
		//{
		//	echo "1";
		//	return;
		//}
		//if either $sql1 or $sql2 value is a 1 then return 0 to indicate "not ok to book"
		//else{
		//	echo "0";
		//	return;
		//}
mysqli_close($conn);
?>