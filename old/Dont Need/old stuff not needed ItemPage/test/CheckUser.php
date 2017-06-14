<?php require '../../php/Conection.php';?>
<?php
$user = 'jd601';
$sql = "SELECT UserUID, UserTypeUID, UserBanned, UserAgreed, CurrentLoans FROM User WHERE UserUID = '$user'   ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) 
    {
        $UserUID =$row["UserUID"];
        $UserTypeUID =$row["UserTypeUID"];
        $UserBanned =$row["UserBanned"];
        $UserAgreed =$row["UserAgreed"];
        $CurrentLoans =$row["CurrentLoans"];
        if($CurrentLoans == null)
        {
            $CurrentLoans = 0;
        }

    if ($UserTypeUID == 1 AND $UserBanned == 0  and $UserAgreed == 1 and $CurrentLoans <= 3) {
        echo "<script>alert('You Can Book This item');</script>";
    }else{
        if ($UserBanned == 1) {
            echo "<script>alert('You Have Been Banned ');</script>";
        }
        if ($UserAgreed == 0 ) {
            echo "<script>alert('You Cannot Book An Item Until you Agree  ');</script>";
        }
        if ($CurrentLoans == 3) {
            echo " <script>alert('You Already have 3 Bookings');</script>";
        }
    }

        
        }
    }else{
    echo "0 results";
        }

mysqli_close($conn);
?>
