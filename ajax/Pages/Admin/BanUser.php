<!--
    ** This Is a page for deleting a user into the Owner Database, this is actvated when the admin user wants to remove a user from the database. of course this page would first need to delete the assets that that user has within the database first 

    ** It first gets the values from the ajax from on the Control.php page (found on /ajax/Pages/Admin) it sets the values posted and then uses them to create the first SQL statement

    ** Once it has been connected to the database using Conection.php it will strip all the tags, these being things like ' ect. as we want to prevent the user from creating an sql injection this is done by using "mysqli_real_escape_string($connection, $ExampleVariable)" this should in theory prevent them from that

    ** It also makes sure to strip the tags, this should prevent the user from XSS attacks, this of course can ruin the websute if it was used. So it would be good to stop that from happening 

    ** The fist SQL statement is to select from the database, this is done because the Owner table within the database needs some information From the User table once we get this information it is then set into varibles so they can be used in the second SQL statement.

    ** The second SQL statement is for acctually inserting the information to the Owner table, it gathers the information from both the form that the user filled out and from the data that is capturerd from the first SQL.

    **This page was Created by Matt Hood, James Davis
    **Commented by James Davis

    **Tasks for this page
        *Code Clean
        *Code Format *done* marie
        *use the include file for the connection rather than the whole connection script *done*
        
-->
<?php
//read in variables 
// for that username 
$UserName = $_POST['UserName']; 
//connect to server
require '../../../php/Conection.php'; 

//prevent attacks
$UserName = mysqli_real_escape_string($conn, $UserName);
$UserName = strip_tags($UserName);
$UserBanned= 1;

	// gather information from their user account
	$sql = "SELECT * FROM User WHERE UserUID = '$UserName'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) 
		{
			// we need to set the values of the info that we got from the user
			$sql2 = "UPDATE User SET UserBanned=$UserBanned WHERE UserUID='$UserName'";

			//display success or failure
			if (mysqli_query($conn, $sql2)) 
			{
				echo "Banning succesful ";
			} 
			else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		}
	} 
	else{
			echo "0 results";
		}
	//close db connection
	mysqli_close($conn);
?>