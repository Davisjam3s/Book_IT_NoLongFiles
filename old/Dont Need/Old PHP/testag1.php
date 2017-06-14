<?php
require ('Conection.php');

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error()); // check for connection error
}
	
 $sqll = "SELECT AgreementDescription FROM Agreement WHERE AgreementUID = '3';";
 $result = mysqli_query($conn, $sqll);
 $num=mysqli_num_rows($result);
 if ($num>0)
 {echo "<table>";
echo "<tr>";
while ($row=mysqli_fetch_array($result))
{$blah=$row["AgreementDescription"];
echo "<tr> <td>$blah</td> </tr></table>";
}
 }

 //echo "result". $result;
 mysqli_close($conn); // close our connection
 
?>