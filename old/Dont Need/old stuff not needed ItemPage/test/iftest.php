<?php
$Create = date_create('2000/01/01');
$Create = $Create->format("Y/m/d");
$TodaysDay = date("Y/m/d");
$TestDate = date("Y/m/d");
$BookedDay    = date('Y/m/d', strtotime($TestDate . '+ 1 days'));
echo "
Todays day: $TodaysDay <br>
Todays day Before Add: $TestDate <br>
Today With Added day(s): $BookedDay <br>
$Create <br>";


if ($Create == $TodaysDay) {
	echo "Booked For Today";
}
elseif ($Create < $TodaysDay) {
	echo "Past Booking";
}
elseif ($Create > $TodaysDay) {
	echo "Future Booking";
}

?>
<?php
$MyDayBooked = date_create('2017/03/10');
$MyDayBooked = $MyDayBooked->format("Y/m/d");
$Booked1 = date_create('2017/03/08');
$Booked1 = $Booked1->format("Y/m/d");
$Booked2 = date_create('2017/03/7');
$Booked2 = $Booked2->format("Y/m/d");
echo "<br>";


if ($MyDayBooked >= $Booked1 && $MyDayBooked <= $Booked2) {
	echo "<br>";
	echo "$MyDayBooked  is between $Booked1 and $Booked2 You cannot Book This Item";
}else {
	echo "<br>";
	echo "$MyDayBooked  is between not $Booked1 and $Booked2 You can Book This Item";
}
?>
