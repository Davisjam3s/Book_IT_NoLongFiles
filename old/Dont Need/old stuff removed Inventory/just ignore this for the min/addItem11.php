<?php
require 'user_info.php'

//$img=$_FILES['fileToUpload']['name'];
$target_dir = "/teaching/proj/co600/project/m04_bookit/public_html/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}




//use the image name as a variable to put in database
		$itemImage = "/teaching/proj/co600/project/m04_bookit/public_html/uploads/".( $_FILES["fileToUpload"]["name"]);
		//test echo variable name (just checking!)
		//echo "the path is  :  ".$itemImage;
$ItemName = $_POST['ItemName'];
$Type = $_POST['Type'];
$Agreement = $_POST['Agreement'];
$Restriction = $_POST['Restriction'];
$Condition = $_POST['Condition'];
$servername = "dragon.kent.ac.uk";
$username = "m04_bookit";
$password = "b*asiis";
$dbname = "m04_bookit";



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$ItemName = mysqli_real_escape_string($conn, $ItemName);
$ItemName = strip_tags($ItemName);
$Type = mysqli_real_escape_string($conn, $Type);
$Type = strip_tags($Type);
$Agreement = mysqli_real_escape_string($conn, $Agreement);
$Agreement = strip_tags($Restriction);
$Restriction = mysqli_real_escape_string($conn, $Restriction);
$Restriction = strip_tags($Restriction);
$Condition = mysqli_real_escape_string($conn, $Condition);
$Condition = strip_tags($Condition);
		
$sql = "INSERT INTO Asset (AgreementUID,OwnerUID,AssetTypeUID,AssetDescription,AssetCondition,AssetImage,AssetRestriction,AssetInBasket) 
VALUES ('$Agreement','$owner','$Type','$ItemName','$Condition','$itemImage',$Restriction,0)";





if (mysqli_query($conn, $sql)) {
    echo " New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);		

//then upload photo into uploads folder
		
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		
	
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
		



?>