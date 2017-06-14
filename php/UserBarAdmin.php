<?php
$servername = "dragon.kent.ac.uk"; //server name
$username   = "m04_bookit"; // username for server
$password   = "b*asiis"; // password for server
$dbname     = "m04_bookit"; // name of the database on the server
// Create connection
$conn       = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
// Check connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error()); // check for connection error
}
$user   = $_SERVER['REMOTE_USER'];
$sql    = "SELECT UserTypeUID FROM User WHERE UserUID = '$user'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    // output data of each row
    while ($row = mysqli_fetch_assoc($result))
    {
        $UserType = $row["UserTypeUID"];
        if ($UserType == 2 or $user == 'mh708' or $user == 'jd601' or $user == 'mh709' or $user == 'dm458')
        {
            echo "<li class='lihead'><a href='#' onclick='AdminNav()'>Admin</a></li>";
        }
    }
}
else
{
    echo "error getting name";
}
?>