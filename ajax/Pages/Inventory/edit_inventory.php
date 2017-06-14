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
$AssetUID = $_POST['AssetUID'];
$Description= $_POST['Description'];
$Agreement = $_POST['Agreement'];
$Restriction = $_POST['Restriction'];
$Condition = $_POST['Condition'];
$Supervision = $_POST['Supervision'];
require '../../../php/Conection.php'; //connect to server


$AssetUID = mysqli_real_escape_string($conn, $AssetUID);
$AssetUID = strip_tags($AssetUID);
$Description = mysqli_real_escape_string($conn, $Description);
$Description = strip_tags($Description);
$Agreement = mysqli_real_escape_string($conn, $Agreement);
$Agreement = strip_tags($Agreement);
$Restriction = mysqli_real_escape_string($conn, $Restriction);
$Restriction = strip_tags($Restriction);
$Condition = mysqli_real_escape_string($conn, $Condition);
$Condition = strip_tags($Condition);
$Supervision = mysqli_real_escape_string($conn, $Supervision);
$Supervision = strip_tags($Supervision);



echo "$AssetUID";
echo "$Description";
echo "$Agreement";
echo "$Restriction";
echo "$Condition";
echo "$Supervision";
$sql = "UPDATE Asset SET AgreementUID=$Agreement,AssetDescription='$Description',AssetCondition=$Condition,AssetRestriction=$Restriction, AssetSupervised=$Supervision Where AssetUID='$AssetUID'";





if (mysqli_query($conn, $sql)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>