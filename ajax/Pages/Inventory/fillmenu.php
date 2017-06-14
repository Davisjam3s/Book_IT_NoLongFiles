<?php
//functions to fill popup menus with existing data
//fill popup with site names & data
function fill_type()
{
	//include db connection
require "../../../php/Conection.php";

//fill popup with type data
$type_query = ("SELECT * FROM AssetType");
$type_result = mysqli_query($conn,$type_query);
  		//while we are getting a resulting row...
			while ($row=mysqli_fetch_array($type_result)) 
				{
					//get these returned rows and turn into variables
					$AssetID = $row["AssetTypeUID"];
					$AssetName = $row["AssetTypeDescription"];
					
				//put the values into the select as option name and value	
				echo "<option value='$AssetID'>$AssetName</option>";
			
				}
//clean up
			mysqli_free_result($type_result);
  			mysqli_close($conn);

}

//fill popup with agreement data
function fill_agree()
{
require "../../../php/Conection.php";

$agree_query = ("SELECT * FROM Agreement");
$agree_result = mysqli_query($conn,$agree_query);
  		
			while ($row=mysqli_fetch_array($agree_result)) 
				{
					$AgreeID = $row["AgreementUID"];
					$AgreeName = $row["AgreementName"];
					
					
				echo "<option value='$AgreeID'>$AgreeName</option>";
			
				}

			mysqli_free_result($agree_result);
  			mysqli_close($conn);
}

?>
