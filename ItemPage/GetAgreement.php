<!-- 
** this page gathers the information about the items agreement, this means that the items agreement can be loaded onto the page with the item, this means that the user can read and accept the terms to the agreement before booking the item

** To do
    * Bring up the form when the user presses the book button, then this will allow them to agree to the items Agreement before it adds the booking to the databse  (this has not been done)

**commented by james davis
**Created By James Davis, Marie H

-->
<?php
require '../php/Conection.php';

    $sql_select = " SELECT * From  Agreement  
	JOIN Asset ON Asset.AgreementUID=Agreement.AgreementUID 
	WHERE AssetUID = '$AssetUID' ";
	
	$result     = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $AgreementUID = $row["AgreementUID"];
        $AgreementDescription   = $row["AgreementDescription"];
        
        
        $fileName = $AgreementDescription;
        $myfile = fopen("../$fileName", "r") or die("Unable to open file!");
		while(!feof($myfile)) {
			echo fgets($myfile) . '&#13';
		}
        fclose($myfile);
    }
    
}
?>