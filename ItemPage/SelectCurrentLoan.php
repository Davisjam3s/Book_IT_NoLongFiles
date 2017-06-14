<!--
    ** This page to check the current loan we added to the loan table, as we need an ID, as this ID is created by the database, as we need this ID it Would be a good idea to go and get it 

    This SQL only selects one Row from the table where the user is the same as the one logged in and then selects it by decending which means the most recent one 

    **This page was Created by James Davis
    **Commented by James Davis

-->
<?php
$sql_select = "SELECT LoanUID FROM Loan WHERE UserUID = '$user' ORDER BY LoanUID DESC LIMIT 1";
$result     = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $LoanUID = $row["LoanUID"];
    }
    include 'insertLoanContent.php';
}
?>