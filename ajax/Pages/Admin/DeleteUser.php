<!--
    ** This Is a page for deleting a  user into the Owner Database, this is actvated when the admin user wants to remove a user from the database. of course this page would first need to delete the assests that that user has within the database first 

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
//read in variables
$UserName = $_POST['UserName']; // for that username 

require '../../../php/Conection.php'; //connect to server

$UserName = mysqli_real_escape_string($conn, $UserName);
$UserName = strip_tags($UserName);


// gather information from their user account
$sql1 = "SELECT LoanContentUID FROM LoanContent 
		JOIN Loan ON LoanContent.LoanUID=Loan.LoanUID
		JOIN User ON Loan.UserUID=User.UserUID WHERE User.UserUID = '$UserName'";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // we need to set the values of the info that we got from the user

		$sql2=" DELETE LoanContent FROM LoanContent
				JOIN Loan ON LoanContent.LoanUID=Loan.LoanUID 
				JOIN User ON Loan.UserUID=User.UserUID 
				WHERE User.UserUID='$UserName'";
		
		//display success or failure
		if (mysqli_query($conn, $sql2)) {
			echo " Deleted all contents from Loans ";
		} else {
			echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
} 
// gather information from their user account
$sql3 = "SELECT LoanUID  FROM Loan WHERE UserUID = '$UserName'";
$result1 = mysqli_query($conn, $sq3);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
        // we need to set the values of the info that we got from the user
        $sql4 = "DELETE FROM Loan Where UserUID='$UserName'";

		//display success or failure
		if (mysqli_query($conn, $sql4)) {
			echo " Deleted Loans assosiated with user ";
		} else {
			echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
}

//make sure if the user thats being delete also has its ownership removed and all assets and loans associated with it

$sql5 = "SELECT LoanContentUID FROM LoanContent 
		JOIN Asset ON Asset.AssetUID=LoanContent.AssetUID
		JOIN Owner ON Owner.OwnerUID=Asset.OwnerUID 
		WHERE Owner.OwnerUID = '$UserName'";
$result2 = mysqli_query($conn, $sql5);

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
        // we need to set the values of the info that we got from the user

		$sql6=" DELETE LoanContent FROM LoanContent 
				JOIN Asset ON Asset.AssetUID=LoanContent.AssetUID
				JOIN Owner ON Owner.OwnerUID=Asset.OwnerUID 
				WHERE Owner.OwnerUID='$UserName'";
		
		//display success or failure
		if (mysqli_query($conn, $sql6)) {
			echo " Deleted all contents from Loans for the owner being deleted";
		} else {
			echo "Error: " . $sql6 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
} 
// Deleting Loans Assosiated with LoanContents that the owner has
$sql7 = "SELECT Loan.LoanUID FROM Loan 
		JOIN LoanContent ON LoanContent.LoanUID=Loan.LoanUID
		JOIN Asset ON Asset.AssetUID=LoanContent.AssetUID 
		JOIN Owner ON Owner.OwnerUID=Asset.OwnerUID
		WHERE Owner.OwnerUID= '$UserName'";
$result3 = mysqli_query($conn, $sql7);

if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result3)) {
        // we need to set the values of the info that we got from the user

		$sql8=" DELETE Loan FROM Loan 
				JOIN LoanContent ON LoanContent.LoanUID=Loan.LoanUID
				JOIN Asset ON Asset.AssetUID=LoanContent.AssetUID 
				JOIN Owner ON Owner.OwnerUID=Asset.OwnerUID
				WHERE Owner.OwnerUID ='$UserName'";
		
		//display success or failure
		if (mysqli_query($conn, $sql8)) {
			echo " Deleted all contents from Loans ";
		} else {
			echo "Error: " . $sql8 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
} 
// gather information from their user account
$sql9 = "SELECT LoanUID  FROM Loan WHERE UserUID = '$UserName'";
$result4 = mysqli_query($conn, $sql9);

if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result4)) {
        // we need to set the values of the info that we got from the user
        $sql10 = "DELETE FROM Loan Where UserUID='$UserName'";

		//display success or failure
		if (mysqli_query($conn, $sql10)) {
			echo " Deleted Loans assosiated with user ";
		} else {
			echo "Error: " . $sql10 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
}

// gather information from their user account
$sql11 = "SELECT AssetUID  FROM Asset WHERE OwnerUID = '$UserName'";
$result5 = mysqli_query($conn, $sql11);

if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result5)) {
        // Clear out Assets from owner that is being deleted
        $sql12 = "DELETE FROM Asset Where OwnerUID='$UserName'";

		//display success or failure
		if (mysqli_query($conn, $sql12)) {
			echo " New record created successfully ";
		} else {
			echo "Error: " . $sql12 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
}

// set take away owner priviledges and delete owner
$sql13 = "SELECT OwnerUID  FROM Owner WHERE OwnerUID = '$UserName'";
$result6 = mysqli_query($conn, $sql13);

if (mysqli_num_rows($result6) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result6)) {
        //delete the Owner
        $sql14 = "DELETE FROM Owner Where OwnerUID='$UserName'";
		$sql15 = "UPDATE User set IsOwner=0 Where OwnerUID='$UserName'";
		

		//display success or failure
		if (mysqli_query($conn, $sql14)) {
			echo " Deleted Owner success";
			if (mysqli_query($conn, $sql15)) {
				echo " Setting IsOwner to 0 success";
				} else {
				echo "Error: " . $sql15 . "<br>" . mysqli_error($conn);
			}
		} else {
			echo "Error: " . $sql14 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
}

$sql16 = "SELECT UserUID  FROM User WHERE UserUID = '$UserName'";
$result7 = mysqli_query($conn, $sql16);

if (mysqli_num_rows($result7) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result7)) {
        // we need to set the values of the info that we got from the user
        $sql17 = "DELETE FROM User Where UserUID='$UserName'";

		//display success or failure
		if (mysqli_query($conn, $sql17)) {
			echo " Deleted user ";
		} else {
			echo "Error: " . $sql17 . "<br>" . mysqli_error($conn);
		}
    }
} else {
    echo "0 results";
}





mysqli_close($conn);
?>