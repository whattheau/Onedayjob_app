<?php
	$objConnect = mysql_connect("localhost","dumbbell_kaiau","Anew3355");
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
	$objDB = mysql_select_db("dumbbell_kaiau");




	$strUsername = $_POST["strUser"];
	$strPassword = $_POST["strPass"];
	$strSQL = "SELECT * FROM users WHERE 1 
		AND username = '".$strUsername."'  
		AND password = '".$strPassword."'  
		";

	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$intNumRows = mysql_num_rows($objQuery);
	if($intNumRows==0)
	{
		$arr['StatusID'] = "0"; 
		$arr['MemberID'] = "0"; 
		$arr['Username'] = "0"; 
		$arr['Error'] = "Incorrect Username and Password";	
	}
	else
	{
		$arr['StatusID'] = "1"; 
		$arr['MemberID'] = $objResult["user_id"]; 
		$arr['Username'] = $objResult["user_name"]; 
		$arr['Error'] = "Complete";	
	}

	/**
		$arr['StatusID'] // (0=Failed , 1=Complete)
		$arr['MemberID'] // MemberID
		$arr['Error' // Error Message
	*/
	
	mysql_close($objConnect);
	
	echo json_encode($arr);
?>