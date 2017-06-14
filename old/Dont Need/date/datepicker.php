

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
	<title></title>
	<style>
		
	</style>
</head>
<body>
<label>Pick Up date</label>
	<select id="advanced" name="advanced">
		<?php // this is for getting the days, the user can choose the day they want to collect the item
			$dayday = 1; // this is a verible used to count and set the value
			$mydate2 = date("Y/m/d"); // set the date for today 
			while($dayday<= 7) { // lets do 7 days 
			$dateadd2 = date('Y/m/d', strtotime($mydate2. '+'.$dayday.' days')); // this is the value we needl, we needed to add 7 days to the current date so lets add them days 
    		echo "<option value='$dayday'>$dateadd2</option>"; // echo them out in within the option box 
   			$dayday++; // add one to this so it can add more day
			} 
		?>
	</select>
	<br>
	<label>For how many days</label>
	<select id="DaysBooked" name="DaysBooked">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
	</select>
	<button id="CheckDate">Check</button>
	<div id="result">
		
	</div>
<script>
	$('#CheckDate').click(function() { 
	   	var val1 = $('#advanced').val();	
		var val2 = $('#DaysBooked').val();
		$.ajax({ 
		type: 'POST', 
        url: 'dateChecker.php', 
        data: { advanced: val1 , DaysBooked: val2 }, 
        success: function(response) {
            $('#result').html(response);

        }
        });
});
</script>
</body>
</html>

