<?php 
require 'user_info.php'; 
require 'fillmenu.php';
?>
<?php

$msg ="";
if (isset($_POST['upload'])) {
	$target = "images/".basename($_FILES['image']['name']);

	
	$servername = "dragon.kent.ac.uk"; //server name
	$username = "m04_bookit"; // username for server
	$password = "b*asiis"; // password for server
	$dbname = "m04_bookit"; // name of the database on the server

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // check for connection error
	}

	
	$image = $_FILES['image']['name'];
	$ItemName = $_POST['ItemName'];
	$ItemType = $_POST['ItemType'];
	$Agreement = $_POST['Agreement'];
	$Restriction = $_POST['Restriction'];
	$Condition = $_POST['Condition'];
	$sql = "INSERT INTO Asset (AgreementUID, OwnerUID, AssetTypeUID, AssetDescription, AssetCondition, AssetImage, AssetRestriction, AssetInBasket) VALUES ('$Agreement','$user','$ItemType','$ItemName',$Condition,'$image',$Restriction,0)";
	mysqli_query($conn, $sql);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "uploaded";

	}else{
		$msg = "error uploading";
	}
	header('Location: loading.php');
}

?>
<script>
	$('.agreeselect').on('change', function() {
		if (this.value == 3) 
		{
			$(".boxbox").load("Agreements/EEG_Agreement.txt");
		}
		else if (this.value == 4) 
		{
			$(".boxbox").load("Agreements/Ians_Agreement.txt");
		}
		else if (this.value == 5) 
		{
			$(".boxbox").load("Agreements/Matteo_Agreement.txt");
		}
	})
</script>
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

</style><!-- dont worry fam, i will move these later-->
	<p>Add Item(Image)</p> <!--did you know, I The amazing james, Forgot to add this and broke the page for 3 hours?-->
	<form method="POST" class="addItemForm" action="ajax/Pages/Inventory/add_inventoryImage.php" enctype="multipart/form-data">



<input type="text" class="formItems" id="ItemName" name="ItemName" required="true" placeholder="Item Name"><br>
<select class="formItems" id="ItemType" name="ItemType">
			<option value="" selected disabled>Type</option> <!--haha trying using that-->
			<?php
			fill_type();
			?>
		</select>
		<br>
		<select class="formItems agreeselect" id="Agreement" name="Agreement">
			<option value="" selected disabled class="">Agreement Type</option>
			<?php
			fill_agree();
			?>
		</select>
		<br>
		<select class="formItems" id="Restriction" name="Restriction">
			<option value="" selected disabled class="">Restrictions</option>
			<option value="1">All</option>
			<option value="2">Third Year or Above</option>
			<option value="3">PostGrad only</option>
			<option value="4">Tutors Only</option>
		</select>
				<select class="formItems con" id="Condition" name="Condition">
			<option value="" selected disabled class="">Condition</option>
			<option value="1">Perfect</option>			
			<option value="2">Minor scuffs</option>
			<option value="3">Some Damage</option>
			<option value="4">Broken</option>
			
		</select>

		<input type="hidden" name="size" value="1000000">
		<input type="file" name="image">
		<input  class="formItems" id="upload" name="upload" type="submit" value="Confirm" name="add_item">
	</form>			
	<br>
	<textarea class="boxbox"></textarea>




        
