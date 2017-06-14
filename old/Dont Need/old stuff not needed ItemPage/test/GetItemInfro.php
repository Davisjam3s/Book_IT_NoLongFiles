<?php require '../../php/Conection.php';?>
<?php
$Item_ID = $_REQUEST['id'];
$sql = "SELECT * FROM Asset WHERE AssetUID = $Item_ID  ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) 
    {
    	$AssetUID =$row["AssetUID"];
		$AgreementType =$row["AgreementUID"];
		$OwnerUID =$row["OwnerUID"];
		$AssetType = $row['AssetTypeUID'];
    	$AssetDescription =$row["AssetDescription"];
		$AssetCondition =$row["AssetCondition"];
		$AssetImage = $row["AssetImage"];
    	$AssetType =$row["AssetTypeUID"];   	
    	$Restriction =$row["AssetRestriction"];
    	$AssetInBasket =$row["AssetInBasket"];    	 
    }
} else
{
    echo "This Item Does not exist";
}
if ($AgreementType == 3 ) {
    		$AgreementType = 'EEG Agree';
    	}
        if ($AgreementType == 4 ) {
            $AgreementType = 'Ian Agree';
        }
         if ($AgreementType == 5 ) {
            $AgreementType = 'Matteo Agree';
        }
         if ($AgreementType == 6 ) {
            $AgreementType = 'None';
        }
    	
    	if ($AssetType == 1 ) {
    		$AssetType = 'Book';
    		$MyHeight = 400;
       		$MyWidth = 350;
    	}
    	if ($AssetType == 2 ) {
    		$AssetType = 'Lego';
    		$MyHeight = 250;
       		$MyWidth = 150;
    	}
    	if ($AssetType == 3 ) {
    		$AssetType = 'Pi';
    		$MyHeight = 350;
       		$MyWidth = 450;
    	}
      	if ($AssetType == 4 ) {
        	$AssetType = 'EEG Headset';
        	$MyHeight = 350;
       		$MyWidth = 450;
      	}
    	if ($AssetCondition == 1 ) {
    		$AssetCondition = 'Perfect';
    	}
    	if ($AssetCondition == 2 ) {
    		$AssetCondition = 'Minor Scuffs';
    	}
    	if ($AssetCondition == 3 ) {
    		$AssetCondition = 'Some Damage';
    	}
    	if ($AssetCondition == 4 ) {
    		$AssetCondition = 'Broken';
    	}
		if ($Restriction ==1){
			$Restriction = 'All';
		}
		if ($Restriction ==2){
			$Restriction = 'Third Year and Above';
		}
		if ($Restriction ==3){
			$Restriction = 'Post Grads only';
		}
		if ($Restriction ==4){
			$Restriction = 'Tutors only';
		}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "$AssetDescription";  ?></title>
	<style>
		body, html{
			background-color: #ebebeb;
		}
		.ItemHolder{
			width: 100%;
			height: auto;
			margin-left: 0;
			background-color: yellow;
			text-align:none;
		}
		.ItemTitle{
			text-align: center;
			background-color: blue;
			width: 100%;
			font-size: 2em;
			overflow: auto;
			
		}
		.ItemImage{
			overflow: auto;
			float: left;
			height: auto;
			width: auto;
			
		}
		.ItemStats{
			background-color: pink;
			width: 10em;
			font-size: 1.5em;
			overflow: auto;

		}
		.BookButton{
  			background:none;
  			border: none;
  			background-color: #05345C;
  			width: 10em;
  			font-size: 2em;
  			color: white;
  			margin-bottom: 1px;
  			min-width: 25%;
		}
		@media only screen and (max-width: 768px) {
			.BookButton, .ItemStats{
				width: 100%;
			}
		}
	</style>
</head>
<body>



<?php echo "<p>$AssetDescription</p>"; ?>

<div class="ItemImage">
	<?php echo "<img src='../../ajax/Pages/Inventory/images/$AssetImage' height='$MyHeight' width='$MyWidth'>";  ?>
</div>

<div class="ItemStats">
	ItemID : <?php echo "$AssetUID"; ?><br>
	Type : <?php echo "$AssetType"; ?><br>
	Condition : <?php echo "$AssetCondition  "; ?><br>
	Restriction : <?php echo "$Restriction"; ?><br>
	AgreementType : <?php echo "$AgreementType"; ?><br>
	In Basket? : <?php echo "$AssetInBasket"; ?><br>
	Owner : <?php echo "$OwnerUID "; ?><br>
</div>


<?php echo "<button class='BookButton' name='Book' id='Book'>BOOK NOW</button><br>";?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<div id="result"></div>


<script>

    $('.BookButton').click(function() { //wait for the button to be pressed, this will need a name change 
        
        var val1 = $('#ItemName').val();
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'InsertLoan.php', // this is where we're posting 
        data: {AssetUID: val1}, // set the php values
        success: function(response) {$('#result').html(response);} 
        });
});
</script>

</body>
</html>