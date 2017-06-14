<?php
    $paymentDate = date('Y-m-d');
    $paymentDate=date('Y-m-d', strtotime($paymentDate));;
    echo "$paymentDate <br>"; // echos today! 

    $contractDateBegin = date('Y-m-d', strtotime("01/03/2017"));
    $contractDateEnd = date('Y-m-d', strtotime("01/01/2018"));
    
    if (($paymentDate > $contractDateBegin) && ($paymentDate < $contractDateEnd))
    {
      echo " is between <br>";
      echo "$contractDateBegin <br>";
      echo "$contractDateEnd  <br>";
    }
    else
    {
      echo "is not between <br>";
      echo "$contractDateBegin <br>";
      echo "$contractDateEnd  <br>";  
    }
?>