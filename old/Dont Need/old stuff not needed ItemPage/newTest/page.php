<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
require '../../php/Conection.php';
?>
<?php
$Item_ID = 471;
$sql     = "SELECT * FROM Asset join Agreement on Asset.AgreementUID=Agreement.AgreementUID WHERE AssetUID = $Item_ID  ";
$result  = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	// output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
		$AssetUID         = $row["AssetUID"];
		$AgreementType    = $row["AgreementUID"];
		$AgreementName    = $row["AgreementName"];
		$OwnerUID         = $row["OwnerUID"];
		$AssetType        = $row['AssetTypeUID'];
		$AssetDescription = $row["AssetDescription"];
		$AssetCondition   = $row["AssetCondition"];
		$AssetImage       = $row["AssetImage"];
		$AssetType        = $row["AssetTypeUID"];
		$Restriction      = $row["AssetRestriction"];
		$AssetInBasket    = $row["AssetInBasket"];
	}
}
else
{
	echo "This Item Does not exist";
}

if ($AssetType == 1)
{
	$AssetType = 'Book';
	$MyHeight  = 500;
	$MyWidth   = 450;
}
if ($AssetType == 2)
{
	$AssetType = 'Lego';
	$MyHeight  = 500;
	$MyWidth   = 450;
}
if ($AssetType == 3)
{
	$AssetType = 'Pi';
	$MyHeight  = 350;
	$MyWidth   = 450;
}
if ($AssetType == 4)
{
	$AssetType = 'EEG Headset';
	$MyHeight  = 350;
	$MyWidth   = 450;
}
if ($AssetCondition == 1)
{
	$AssetCondition = 'Perfect';
}
if ($AssetCondition == 2)
{
	$AssetCondition = 'Minor Scuffs';
}
if ($AssetCondition == 3)
{
	$AssetCondition = 'Some Damage';
}
if ($AssetCondition == 4)
{
	$AssetCondition = 'Broken';
}
if ($Restriction == 1)
{
	$Restriction = 'All';
}
if ($Restriction == 2)
{
	$Restriction = 'Third Year and Above';
}
if ($Restriction == 3)
{
	$Restriction = 'Post Grads only';
}
if ($Restriction == 4)
{
	$Restriction = 'Tutors only';
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php
echo "$AssetDescription";
?></title>
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
			background-color: #05345C;
			width: 20em;
			font-size: 1.5em;
			color: white;
			overflow: auto;
			margin-bottom: 1px;

		}
		.BookButton{
  			background:none;
  			border: none;
  			background-color: #05345C;
  			width: 15em;
  			font-size: 2em;
  			color: white;
  			margin-bottom: 1px;
  			min-width: 25%;
  			cursor: pointer;
		}
		@media only screen and (max-width: 768px) {
			.BookButton, .ItemStats{
				width: 100%;
			}
		}
	</style>
</head>
<body>



<?php
echo "<p>$AssetDescription</p>";
?>

<div class="ItemImage">
	<?php
echo "<img src='ajax/Pages/Inventory/images/$AssetImage' height='$MyHeight' width='$MyWidth'>";
?>
</div>

<div class="ItemStats">
	ItemID : <?php
echo "$AssetUID";
?><br>
	Type : <?php
echo "$AssetType";
?><br>
	Condition : <?php
echo "$AssetCondition  ";
?><br>
	Restriction : <?php
echo "$Restriction";
?><br>
	AgreementType : <?php
echo "$AgreementName";
?><br>
	In Basket? : <?php
echo "$AssetInBasket";
?><br>
	Owner : <?php
echo "$OwnerUID ";
?><br>

</div>

<div class="buttonHolder">




	<select id="advanced" class="BookButton" required name="advanced" >
	<option value='0' selected disabled>Select a Date</option>
		<?php // this is for getting the days, the user can choose the day they want to collect the item
		$dayday  = 1; // this is a variable used to count and set the value
		$mydate2 = date("Y/m/d"); // set the date for today 
		while ($dayday <= 91) // 3 months ish
		{
			$dateadd2 = date('Y/m/d', strtotime($mydate2 . '+' . $dayday . ' days')); // this is the value we needl, we needed to add 7 days to the current date so lets add them days 
			echo "<option value='$dayday'  >$dateadd2</option>"; // echo them out in within the option box 
			$dayday++; // add one to this so it can add more day
		}
?>
	</select>
	<br>
	
	<select id="DaysBooked" class="BookButton" required name="DaysBooked">
		<option value='0' selected disabled>Booking Duration</option>
		<option value="1">1 Day</option>
		<option value="2">2 Days</option>
		<option value="3">3 Days</option>
		<option value="4">4 Days</option>
		<option value="5">5 Days</option>
		<option value="6">6 Days</option>
		<option value="7">1 Week</option>
	</select>
	<input disabled style="display:none;" type="text" id="inputId" />
	<input disabled style="" type="text" id="inputId2" />
	<div id="result">
		
	</div>

<?php
echo "<button class='BookButton BookBook' value='$AssetUID'>Book</button><br>";
?>


	
	<button class="BookButton Catalogue">Catalogue</button><br>
	<span style="font-size: 0.7em;">You Can press this button all you want but it dont work yet</span>
</div>


<script>
//this runs each time the selected date is changed and calls checkdate.php (just in case you wondered where it came from! ;) Marie)  
  $('#advanced').change(function() {   
    //sends the values from the date selector and the book button (the AssetUID) as variables to checkdate.php
	var date = $(this).val(); 
    var val1 = date;
	var val2 = $('.BookBook').val();
	$.ajax({ 
    type: 'POST', 
        url: 'CheckDate.php', 
        data: { date: val1, asset:val2}, 
		
        success: function(data)
		{
		$( "#inputId" ).val(data);
		var myValnew = 	$('#inputId').val(); 
		if (myValnew == 1)
		{
			$(".BookBook").attr("disabled", true).css("background-color", "grey").text("Not available");
		}
		else
		{
			$(".BookBook").attr("disabled", false).css("background-color", "#05345C").text("Available");
		}

			
		}
        
		
			});
});

</script>
<script>
//this runs each time the days requested is changed and calls checkreturndate.php (just in case you wondered where it came from! ;) Marie)  
  $('#DaysBooked').change(function() {   
    //sends the values from the date selector and the book button (the AssetUID) as variables to checkdate.php
	var date = $('#advanced').val(); 
    var val1 = date;
	var val2 = $('.BookBook').val();
	var bookedDays = $(this).val();
	var val4 = bookedDays;
	$.ajax({ 
    type: 'POST', 
        url: 'CheckReturnDate.php', 
        data: { date: val1, asset: val2, bookedDays: val4 }, 
		
        success: function(data)
		{
		$( "#inputId2" ).val(data);
		var myValnew = 	$('#inputId2').val(); 
		if (myValnew == 1)
		{
			$(".BookBook").attr("disabled", true).css("background-color", "grey").text("Not available");
		}
		else
		{
			$(".BookBook").attr("disabled", false).css("background-color", "#05345C").text("Available");
		}

			
		}
        
		
			});
});

</script>

<script>
	$(document).ready(function() // when the document is ready
    {
    	$(".Catalogue").click(function() // when has this div been pressed?
            {
            	
                $("Title").text("BookIT|Catalogue"); // change the title
            	$(".holder").show(); // show the hidden div
            	$(".holder").load("ajax/Pages/items/all_items.php"); // fill the hidden div
            });
    });
    // end of bacl to catalog
</script>
<script>
	$('.BookBook').click(function() {
		var jamjam = $(this).attr("value"); 
	   	var val1 = $('#advanced').val();	
		var val2 = $('#DaysBooked').val();

			if (val1 == null || val2 == null) {
		alert("Fill in the form");
	}else{
		$.ajax({ 
		type: 'POST', 
        url: 'ItemPage/InsertLoan.php?id='+jamjam+'', 
        data: { advanced: val1 , DaysBooked: val2 }, 
        success: function(response) {
            $('#result').html(response);
            $(".BookBook").attr("disabled", true).css("background-color", "yellow");
        }
        });
	}

		
});
</script>
<div id='result'>

</div>

</body>
</html>