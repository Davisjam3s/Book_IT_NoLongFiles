<?php
require 'Conection.php';
$Date   = $_POST['Date'];
$sql    = "SELECT * FROM Asset 
        INNER JOIN LoanContent ON Asset.AssetUID=LoanContent.AssetUID 
        INNER JOIN Loan ON LoanContent.LoanUID=Loan.LoanUID 
        WHERE '$Date' NOT BETWEEN Loan.LoanDate AND LoanContent.ReturnDate";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    // output data of each row
    while ($row = mysqli_fetch_assoc($result))
    {
        $ItemID    = $row["AssetUID"];
        $OwnerID   = $row["OwnerUID"];
        $ItemName  = $row["AssetDescription"];
        $ImageLink = $row["AssetImage"];
        echo "<div class='catalog_item'><div class='item_overlay'>$ItemName</div> <img src='$ImageLink' height='160' width='170'> </div>";
    }
}
else
{
    echo "0 results";
}
mysqli_close($conn);
?>