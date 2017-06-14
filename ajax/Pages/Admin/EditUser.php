<!--
    ** This Is a page for adding a new user into the Owner Database, this is actvated when the admin user wants to add a new user into the database for staff where they can then add items into the database 

    ** It first gets the values from the ajax from on the Control.php page (found on /ajax/Pages/Admin) it sets the values posted and then uses them to create the first SQL statement

    ** At the moment has the connection to the datbase directly in here, this can be moved later, but for now it is working 

    ** Once it has been connected to the database it will strips all the tags these being things like ' ect as we want to prevent the user from creating an sql injection this is done by using "mysqli_real_escape_string($connection, $ExampleVariable)" this should in theory prevent them from that

    ** IT also makes sure to strip the tags, this should prevent the user from XSS attacks, this of course can ruin the websute if it was used. So it would be good to stop that from happening 

    ** The fist SQL statement is to select from the database, this is done because the Owner table within the database needs some information From the User table once we get this information it is then set into varibles so they can be used in the second SQL statement.

    ** The second SQL statement is for acctually inserting the information to the Owner table, it gathers the information from both the form that the user filled out and from the data that is capturerd from the first SQL.

    **This page was Created by Matt Hood, James Davis
    **Commented by James Davis

    **Tasks for this page
        *Code Clean
        *Code Format
        *use the include file for the connection rather than the whole connection script
        
-->
<?php

//Read variables from previous page
$UserFname = $_POST['UserFname']; // for the full name
$UserType = $_POST['UserType']; // for the user type
$UserName = $_POST['UserName']; // for that username 
$UserCampus = $_POST['UserCampus'];//for the user campus
$UserYear = $_POST['UserYear'];//for the user year

require '../../../php/Conection.php'; //connect to server

// escape special characters
$UserFname = mysqli_real_escape_string($conn, $UserFname); // get rid of them injections
$UserFname = strip_tags($UserFname); // what you tryin to do? dont be tryin that
$UserType = mysqli_real_escape_string($conn, $UserType);
$UserType = strip_tags($UserType);
$UserName = mysqli_real_escape_string($conn, $UserName);
$UserName = strip_tags($UserName);
$UserCampus = mysqli_real_escape_string($conn, $UserCampus);
$UserCampus = strip_tags($UserCampus);
$UserYear = mysqli_real_escape_string($conn, $UserYear);
$UserYear = strip_tags($UserYear);

/* 		 if ($UserCampus == 1) {
            $UserCampus = 'Canterbury';
        }
        elseif ($UserCampus == 2) {
            $UserCampus = 'Medway';
        } */


		
$sql = "SELECT UserTypeUID,UserFname,UserCampus,UserYear FROM User WHERE UserUID = '$UserName'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // we need to set the values of the info that we got from the user
        $sql1 = "UPDATE User SET UserTypeUID = $UserType, UserFname='$UserFname', UserCampus=$UserCampus, UserYear=$UserYear WHERE UserUID='$UserName'";

		//display success or failure
		if (mysqli_query($conn, $sql1)) {
			echo " Updated User details correctly ";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
}


//Clean up
mysqli_close($conn);
?>