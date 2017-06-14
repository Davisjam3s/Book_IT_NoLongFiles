<?php
	//first get all the required things from the db to check if a user is able to book an item
	$sql_check = "SELECT User.UserBanned, User.UserAgreed,User.UserYear,User.UserTypeUID,UserType.UserTypeDescription 
	FROM User 
	JOIN UserType on User.UserTypeUID = UserType.UserTypeUID
	WHERE UserUID ='$user'";
	
	$check_result = mysqli_query($conn, $sql_check);
	if (mysqli_num_rows($check_result)>0)
	{
		while ($row = mysqli_fetch_assoc($check_result))
		{  
	//then use all the results from the sql as variables for checking against	
			$Banned = $row["UserBanned"];
			$UserAgreed = $row["UserAgreed"];
			$UserYear = $row["UserYear"];
			$UserTypeUID = $row["UserTypeUID"];
			$UserType = $row["UserTypeDescription"];
		}
    }
	else 
	{	
		echo "no results found";
	}
	
	//do the same with the restrictions attached to the asset
	$sql_restriction = "SELECT AssetRestriction 
	FROM Asset WHERE AssetUID = '$Item_ID'";
	$restriction_result = mysqli_query($conn, $sql_restriction);
	if (mysqli_num_rows($restriction_result)>0)
	{
		while ($row = mysqli_fetch_assoc($restriction_result))
		{    
			$Restrictions = $row["AssetRestriction"];
		}
		
    }
	else
	{
			echo "no item restriction found";
	}
	
	//make sure the user is not banned and has agreed to the main usage agreement..	
		//depending on the restriction of the asset
		//if there is no restriction (all allowed to borrow)
		if ($Banned == 0 and $UserAgreed == 1 and $Restrictions == 1)
			//allow and insert the loan into db via this .php script
			{
				include'InsertSQLLoan.php';
			}
		//if its restricted to 3rd yr and above and the user is a third year or postgrad/admin/staff	
		elseif(($Banned == 0 and $UserAgreed == 1 and $Restrictions == 2) and ($UserYear >= 3) or ($UserTypeUID !==1))
		//allow and insert the loan into db via this .php script
			{
				include'InsertSQLLoan.php';
			}
		//if its restricted to postgrad and above and the user is a postgrad/admin/staff
		elseif(($Banned == 0 and $UserAgreed == 1 and $UserTypeUID >2) and ($Restrictions == 3) or ($Restrictions == 4))
		
		//allow and insert the loan into db via this .php script
			{include'InsertSQLLoan.php';}
		//if its restricted to staff only and the user is staff	
		//elseif ($Banned == 0 && $UserAgreed == 1 && $Restrictions == 4 && $UserUID >= 2)
		//allow and insert the loan into db via this .php script
		//	{include 'InsertSQLLoan.php';}
		//otherwise  echo a problem
		else
			{echo "You are not permitted to borrow this item, please check the items year restriction";}
	
				
			
	
	
	

?>