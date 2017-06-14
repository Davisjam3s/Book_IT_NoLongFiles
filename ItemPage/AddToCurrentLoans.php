<!--
    ** This page counts how many loans the current logged in user has, this will then display to the user how many loans they currently have on the website 

    ** To do
    * add script to remove a loan when an item as been returned 

    **This page was Created by James Davis
    **Commented by James Davis

-->
<?php
$sql_CheckCurrentLoans = "SELECT * FROM User WHERE UserUID = '$user' ";
$result                = mysqli_query($conn, $sql_CheckCurrentLoans);
if (mysqli_num_rows($result) > 0)
{
    // output data of each row
    while ($row = mysqli_fetch_assoc($result))
    {
        $CurrentLoans = $row["CurrentLoans"];
        if ($CurrentLoans == NUll)
        {
            $CurrentLoans = 0;
        }
        $CurrentLoansSum = $CurrentLoans + 1;
        $sql_UpdateLoans = "UPDATE User SET CurrentLoans=$CurrentLoansSum WHERE UserUID = '$user' ";
        if (mysqli_query($conn, $sql_UpdateLoans))
        {
        }
        else
        {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
else
{
    echo "0 results";
}
mysqli_close($conn);
?>