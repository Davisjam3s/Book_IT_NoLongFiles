
<?php 
    if ( isset( $_POST['EmailForm'] ) ) 
    {
       	$bookingNum = 145041655;
		$to = $_POST['To'];
		$from = $_POST['From'];

		$subject = "Your Booking #$bookingNum";
		$txt = $_POST['Message'];
		$headers = "From: $from" . "\r\n" . "CC: somebodyelse@example.com";
		
		mail($to,$subject,$txt,$headers);
    	echo "Your email has been sent to $to";
    }
?>
<form name="EmailForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="text" name="To" placeholder="To whom"> <br>
	<input type="text" name="From" placeholder="From Whom"> <br>
	<input type="text" name="Message" placeholder="Message">
	<input type="submit" value="submit">
</form>
