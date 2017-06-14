<?php
function remove_image()
{
	require "../../../php/Conection.php";
	$AssetUID = $_POST['AssetUID'];
	$sqlqry = 'SELECT * FROM Asset WHERE AssetUID=$AssetUID';
	$result = mysqli_query($conn,$sqlqry);
		while ($row=mysqli_fetch_array($result)) 
				{
					//get these returned rows and turn into variables
					$AssetImage = $row["AssetImage"];
				}

	unlink(realpath('$AssetImage'));
}
?>	