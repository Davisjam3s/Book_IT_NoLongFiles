<?php 
	if(isset ($_SERVER['MELLON_unikentaccountType_0']))
		{
			$usertype=$_SERVER['MELLON_unikentaccountType_0'];
			echo "$usertype <br>";
		}
		else
		{
			echo "Please Log in";
		}



		if ($usertype == 'ugtstudent' ) {
			$newval = 1;
			echo "$newval";
		}else{
			echo "no";
		}
?>