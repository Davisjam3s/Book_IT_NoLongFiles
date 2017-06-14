<head>
</head>
<body>
<h1>Hello World!</h1>

<?php 
if(isset ($_SERVER['REMOTE_USER']))
{
	$user=$_SERVER['REMOTE_USER'];
	echo "<h2>Welcome user " . $user."</h2>";
}else
{
	echo "Please Log in";
}
?>
</body>