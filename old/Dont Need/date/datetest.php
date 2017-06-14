<?php
        if (isset($_POST['check'] )) // when we press this button 
        {
          	$dayAdd = $_POST['advanced']; // get the value from this 
          	$BookedDays = $_POST['DaysBooked']; // get the value from this
          	$daySum = $dayAdd + $BookedDays; // add them together for later 
	 		$mydate = date("Y/m/d"); // what is todays day?
	 		$dateadd = date('Y/m/d', strtotime($mydate. '+'.$dayAdd.' days')); // add the pick up day to the date 
	 		$dayDrop = date('Y/m/d', strtotime($mydate. '+'.$daySum.' days')); // how long does the user need it 

	 		echo "days to pick up $dayAdd <br>"; // day to pick up
	 		echo "days with item $BookedDays <br>"; // how long they will have it 
	 		echo "Days together $daySum <br> "; // lets add them
	 		echo "Day to collect $dateadd <br>"; //when does the user need to pick it up?
	 		echo "Day to return $dayDrop  <br>"; // when does the user need to return it
        }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		body{
			font-size: 3em;
		}
	</style>
</head>
<body>
<form method="POST" action="<?php $PHP_SELF ;?>">
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
	<input type="submit" name="check">

</form>
</body>
</html>

