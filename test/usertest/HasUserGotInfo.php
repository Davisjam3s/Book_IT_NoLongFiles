<?php
if ($UserFname == null || $UserYear == null || $UserCampus == null) { 
	 if ($UserTypeUID == '1' or $UserTypeUID == '4' ) 
	 { 
	 	include 'StudentForm.php'; 
	 }else
	 {
	 	include 'StaffForm.php'; 
	 }
}
?>