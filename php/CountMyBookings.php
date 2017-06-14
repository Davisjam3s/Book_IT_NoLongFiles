<?php
require 'user_info.php';
 $sql_countBookings= " SELECT count(Loan.LoanUID) as CountBookings 
					FROM Loan JOIN LoanContent 
					ON LoanContent.LoanUID=Loan.LoanUID 
					Where Loan.UserUID ='$user' 
					AND Loan.LoanConfirm <2 
					AND LoanContent.SetReturn=1";

$result = mysqli_query($conn, $sql_countBookings);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) 
		{
			$countb =$row["CountBookings"];
			
		}
	}
?>