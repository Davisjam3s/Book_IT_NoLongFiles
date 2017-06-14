
<?php
require '../../../php/Conection.php';

    $Description = $_POST['Description'];
    $sql_select = "SELECT * From  Agreement WHERE AgreementUID = $Description";
	$result     = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $AgreementUID = $row["AgreementUID"];
        $AgreementDescription   = $row["AgreementDescription"];
        
        
        $fileName = $AgreementDescription;
        $myfile = fopen("../../../$fileName", "r") or die("Unable to open file!");
		while(!feof($myfile)) {
			echo fgets($myfile) . '&#13';
		}
        fclose($myfile);
    }
    
}
?>