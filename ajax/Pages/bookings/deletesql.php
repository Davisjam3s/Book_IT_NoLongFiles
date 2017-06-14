<!--
    ** This Is a pages for soley for deleting bookings that where made on the website or app
	**This connects to the database, it then gets the current bookings and then it deletes them

    **This page was Created by 
    **Commented by Dominic Moseley

    **What I have done
	
	**Added the top comments
	**Spellchecked the comments below
    **Code was untouched	
        
        
-->
<?php
//require db connection
require '../../../php/Conection.php';
//get LoanUID from current bookings page
$LoanID = $_POST['LoanID'];
//sql to delete from LoanContent table first
$delete_sql = "DELETE FROM LoanContent
WHERE LoanUID = $LoanID ";
	if (mysqli_query($conn, $delete_sql))
	{
		echo "succesfully deleted your loan request"; 
	}
	else
	{
		echo ("error" .mysqli_error($conn));
	}
//sql to delete from Loan table next
	$delete2_sql = "DELETE FROM Loan
WHERE LoanUID = $LoanID";
if (mysqli_query($conn, $delete2_sql))
	{
		echo "succesfully deleted your loan request"; 
	}
	else
	{
		echo ("error" .mysqli_error($conn));
	}
	//close db connection
	mysqli_close($conn);
?>

