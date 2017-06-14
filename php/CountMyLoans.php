<?php
require 'user_info.php';
 $sql_countLoans= "SELECT count(Loan.LoanUID) as CountLoans
	FROM User 
	JOIN Loan on User.UserUID = Loan.UserUID 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID  
	WHERE Owner.OwnerUID = '$user' 
	AND Loan.LoanConfirm <2
	AND LoanContent.SetReturn=1";
	
	
$result = mysqli_query($conn, $sql_countLoans);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) 
		{
			$countLoans =$row["CountLoans"];
			
			$countL=$countLoans;
			
		}
	}
?>