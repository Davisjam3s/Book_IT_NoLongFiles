<?php
if (isset($_SERVER['MELLON_urn:oid:0_9_2342_19200300_100_1_3']))
{
	$email = $_SERVER['MELLON_urn:oid:0_9_2342_19200300_100_1_3'];
}
else
{
	echo " Obv not correct, try again";
}
?>