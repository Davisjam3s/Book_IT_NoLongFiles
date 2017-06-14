<?php
        
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
        
?>


