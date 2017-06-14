<?php 
	if(isset ($_SERVER['REMOTE_USER']))
		{
			$user=$_SERVER['REMOTE_USER'];
			echo $user;
		}
		else
		{
			echo "Please Log in";
		}
?>