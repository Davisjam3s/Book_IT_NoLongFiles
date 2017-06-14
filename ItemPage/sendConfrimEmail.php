<!--
    ** This is the Page that sends the email to the user once they have booked an item, here it sends thre email with infromation regarding the users booking, this letting the user know that their item is now being processed 

    ** this is run from the InsertLoan.php page where it also gets the varibles from, this allow the email to be sent to the right person, with the right information regarding the item booked and who is booking it and who it is booked from

    Used http://php.net/manual/en/function.mail.php to look how to do this correctly, nothing copied and pasted but i looked at it anyway

    **This page was Created by James Davis
    **Commented by James Davis

    **Tasks for this page
        * Tell the user They day they have booked it for
        * Tell the user how long they have booked it for
        * Tell the user The Day they will have to return the Item 
-->

<?php
include '../php/user_info.php';
include '../php/email.php';
?>

<?php
$to      = $email;
$cc      = $BookingInfo_UserFName;
$subject = "Regarding you booking ID $BookingInfo_Asset ";
$txt     = "Hello $user , this is an email regarding your booking #$LoanUID to confirm your booking is now being processed, once $cc has confirmed your booking you will receive another email confirming your booking, you can also see the status of your booking on the 'My Bookings' page ";
$headers = "From: BookIT@noreply.ac.uk" . "\r\n" . "CC: $BookingInfo_OwnerUID ";
mail($to, $subject, $txt, $headers);
?>