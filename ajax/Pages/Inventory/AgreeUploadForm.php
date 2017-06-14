<?php 
//need the users info
require 'user_info.php';
//need this to check the upload is secure
require 'checkUploads.php';
//need this to connect to the database
require '../../../php/Conection.php';
?>
<?php


if (isset($_POST['upload'])) 
	{
		//set the directory the file is going into
		$target = "Agreements/".basename($_FILES['file']['name']);
		//get the file details and name provided via the form
		$file = $_FILES['file']['name'];
		$file = "ajax/Pages/Inventory/Agreements/".$file;
		$agName = $_POST['docName'];
		//protect against SQL injection
		$agName = mysqli_real_escape_string($conn, $agName);
		$agName = strip_tags($agName);
		
		//check the file, if its all ok then put the details into the database (file is moved in the check function)
		if (checkDoc())
		{
			$sql = "INSERT INTO Agreement (AgreementDescription, AgreementName) VALUES ('$file','$agName')";
			mysqli_query($conn, $sql);
			//send user to the loading screen so they can see its working
			header('Location: loading.php');
			}
			//if its not ok, send the user to the screen telling them its failed
			else
				{
					echo "error uploading";	//this was replaced by the notUploaded.php page called in the checkDoc function
				}
				
	}


?>

<style>
	.addItemForm
	{
	background-color: transparent;

	text-align: center;
	}
	.restext
	{
		display: none;
		font-family: 'Amaranth', sans-serif;
	}
	.formItems
	{
		margin-top: 1em;
		text-align: center;
		font-family: 'Amaranth', sans-serif; /*what a nice font*/
		font-size: 1em;
	}
	.addextra
	{
		width: 25em;
		height: 5em;
	}
	.boxbox
	{
		width: 100%;
		height: 25em;
		
	}

</style>

	<p>Add an agreement - you will then be able to use this agreement in the selection menu on the add item page</p>
	<!--form to add the file and get a name for it from the user-->
	<form method="POST" class="addItemForm" action="ajax/Pages/Inventory/AgreeUploadForm.php" enctype="multipart/form-data">
		<!-- must have a name for the agreement to put in the database-->
		<p>Please give your agreement a name </p>
		<input required="true" type="text" name="docName">
		<!--the file upload goes in here-->
		<input type="hidden" name="size" value="1000000">
		<input type="file" name="file">
		<input  class="formItems" id="upload" name="upload" type="submit" value="Confirm" name="add_item">
	</form>			
	<br>