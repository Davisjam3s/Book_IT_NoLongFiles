<!-- 
**this page shows the user all of their current loans by connection to the db. 
**This connects to the database, it then gets the current bookings and then it deletes them

    
**This page was Created by 
**Commented by Dominic Moseley

**What I have done
	
**Added the top comments
**Added Comments Below
**Spellchecked the comments below
**Code was untouched	

<?php
//This connects to the database
require '../../../php/Conection.php'; 
$status = $_POST['Status'];
$LoanID = $_POST['LoanID'];


$sql_confirm = "UPDATE Loan set LoanConfirm = $status WHERE LoanUID = $LoanID";
if (mysqli_query($conn, $sql_confirm))
{
	$sql_emailInfo ="SELECT Asset.AssetDescription,Loan.LoanDate, LoanContent.ReturnDate, User.UserEmail
	FROM User 
	JOIN Loan on User.UserUID = Loan.UserUID 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	WHERE Loan.LoanUID = '$LoanID'";

		$result = mysqli_query($conn, $sql_emailInfo);	
  		//once we got that stuff from the db
  		if (mysqli_num_rows($result) > 0) 
  		{
     	 // output data of each row
    		while($row = mysqli_fetch_assoc($result)) 
    		{
     		$Asset =$row["AssetDescription"];
			$LoanDate =$row["LoanDate"];
			$ReturnDate = $row["ReturnDate"];
			$UserEmail = $row['UserEmail'];
  			}
  			if ($status == 1) 
			{
  				$status = "Confirmed";
				$to      = "$UserEmail";
				$subject = "RE: Your Loan of $Asset ";
				$txt     = "Your Loan of  $Asset  has been $status feel free to pick it up on $LoanDate and return it by $ReturnDate ";
				$headers = "From: BookIT@noreply.ac.uk" . "\r\n" . "CC:";
				mail($to, $subject, $txt, $headers);
  			}
  			elseif($status==2)
			{
  				$status = "Refused";
				$to      = "$UserEmail";
				$subject = "RE: Your Loan of $Asset ";
				$txt     = "Your Loan of $Asset has been $status Sorry about that, feel free to email the owner if you believe this to be a mistake ";
				$headers = "From: BookIT@noreply.ac.uk" . "\r\n" . "CC:";
				mail($to, $subject, $txt, $headers);
			
				$sql_deny = "UPDATE LoanContent set setReturn = 0 WHERE LoanUID = $LoanID";
			
				if (mysqli_query($conn, $sql_deny))
				{
					echo "sorry no loan";
				}else
				{
					echo "something went wrong";
				}
			}elseif($status==3)
			{
				$status ="Returned";
				$to = "$UserEmail";
				$subject = "RE: Your Loan of $Asset ";
				$txt = "Your Loan of $Asset has been succesfully $status, thank you for taking part in this project";
				$headers="From: BookIT@noreply.ac.uk" . "\r\n" . "CC:";
				mail($to, $subject, $txt, $headers);
				
				$sql_returned = "UPDATE LoanContent set setReturn = 0 WHERE LoanUID = $LoanID";
			
				if (mysqli_query($conn, $sql_returned))
				{
					echo "well done on returning your asset";
				}else
				{
					echo "something went wrong";
				}
			}
		}
		//used to update the menu bar of how many bookings the owner has
		require '../../../php/CountMyLoans.php';
		//used to update the menu bar for how many bookings the user has
		require '../../../php/CountMyBookings.php';
		
	}

?>




  