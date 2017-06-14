<!--
    ** Tthis page Add the first part of the loan into the database, it gets gets the User ID, the loan Date and the Confrim Value, the confirm value is set to 0 instantly as the item has not been confrimed by the staff memeber yet

    when this is done it carries on the script by including another script 
    

    **This page was Created by James Davis
    **Commented by James Davis

-->
<?php
$sql = "INSERT INTO Loan (UserUID, LoanDate, LoanConfirm) VALUES ('$user', '$dateadd', 0)";
if (mysqli_query($conn, $sql))
{
	include 'SelectCurrentLoan.php';
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>