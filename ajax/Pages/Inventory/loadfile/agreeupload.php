<?php

//http://www.jijokjose.com/programming-2/php/upload-dco-and-docx-file-using-php/

//if we clicked on Upload button

if($_POST['Upload'] == 'Upload')

  {

  //make an array of the allowed extensions

  $fileTypes = array(

  '.doc',

  '.docx',
  
  '.txt',

  ); 

  $error='';

  //set the current directory where you wanna upload the doc/docx files

  $uploaddir = '../../../../Agreements/';

  $name = $_FILES['filename']['name'];//get the name of the file that will be uploaded

  $min_filesize=10;//set up a minimum file size(a doc/docx can't be lower then 10 bytes)

  $stem=substr($name,0,strpos($name,'.'));

  //take the file extension

  $extension = substr($name, strpos($name,'.'), strlen($name)-1);

  //verify if the file extension is doc or docx

   if(!in_array($extension,$fileTypes))

     $error.='Extension not allowed<br>';

echo "<span> </span>"; //verify if the file size of the file being uploaded is greater then 1

   if(filesize($_FILES['filename']['tmp_name']) < $min_filesize)

		$error.='File size too small<br>'."\n";

		$uploadfile = $uploaddir . $stem.$extension;

		$filename=$stem.$extension;

		if ($error=='')

	{
	require '../../../../php/Conection.php';
	
	$sql = "INSERT INTO Agreement (AgreementDescription) VALUES ('$uploadfile')";
	mysqli_query($conn, $sql);
	

//upload the file to

		if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
		
		echo $uploadfile;

		echo 'File Uploaded. Thank You.';

		}

	}

	else echo $error;

}

?>