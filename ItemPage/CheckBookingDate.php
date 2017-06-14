<?php
include '../php/Conection.php';

$AssetUID   = $_POST ['asset'];
$dayAdd     = $_POST['date']; 
$BookedDays = $_POST['bookedDays']; 


$sql_GetDays = "SELECT Asset.AssetDescription, Loan.LoanUID, Loan.LoanDate, Loan.LoanConfirm, LoanContent.ReturnDate, User.UserFName, Owner.OwnerLocation, User.UserCampus 
	FROM Loan 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID 
	JOIN User on Owner.OwnerUID = User.UserUID  
	WHERE LoanContent.AssetUID = '$AssetUID' 
	AND (Loan.LoanConfirm = 0 OR Loan.LoanConfirm = 1) ORDER BY Loan.LoanUID DESC";

$result = mysqli_query($conn, $sql_GetDays);


	if (mysqli_num_rows($result) > 0) 
	{
		$mydate     = date("Y/m/d"); // todays date
		$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days'));
		//$MyDayBooked = $MyDayBooked->format("Y/m/d");
		$daySum     = $dayAdd + $BookedDays -1;
		$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days'));
		//echo " Choosen Day: $dateadd Return day: $dayDrop  <br> <br>";

		while($row = mysqli_fetch_assoc($result)) 
		{
			$LoanID = $row["LoanUID"];
			$LoanDate = $row["LoanDate"];
			$ReturnDate = $row["ReturnDate"];
			$LoanDate = date_create($LoanDate);
			$LoanDate = $LoanDate->format("Y/m/d");
			$ReturnDate = date_create($ReturnDate);
			$ReturnDate = $ReturnDate->format("Y/m/d");

			if (($dateadd  >= $LoanDate && $dateadd <= $ReturnDate) && ($dayDrop >= $LoanDate && $dayDrop <=$ReturnDate)) 
			{
				echo "1";
				return;				
			}
			else 
			{
			echo "0";
				return;			
			}
		}

	}	
	 mysqli_close($conn);
?>