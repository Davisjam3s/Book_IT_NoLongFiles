<?php
if (isset($_SERVER['REMOTE_USER']))
{
	$user = $_SERVER['REMOTE_USER'];
}
else
{
	echo "Please Log in";
}
?> <!--this script is for displaying the username on the page, getting it from the remote server, known as mellon, we need to get other things from the server, but we dont know what they are.-->