<!--
    ** This page checks to see if the user has been been banned from the website, it does this by checking the database to see the value of the banned column, if it is 1 then they are banned and cannot the website, they will be redicrected to a page telling them that they have been banned from the website 

    ** This pages was created by James D
    ** This page was commented by James D
-->
<?php
require 'user_info.php';
?>
<?php
require 'Conection.php';
$sql    = "SELECT UserUID, UserBanned FROM User WHERE UserUID ='$user'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    // output data of each row
    while ($row = mysqli_fetch_assoc($result))
    {
        $UserUID    = $row["UserUID"];
        $UserBanned = $row["UserBanned"];
        if ($UserBanned == 1)
        {
            $UserBanned = "banned";
            header('Location: php/bannedPage.php');
        }
    }
}
else
{
    echo "0 results";
}
mysqli_close($conn);
?>