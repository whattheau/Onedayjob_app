<?php

	$objConnect = mysql_connect("localhost","dumbbell_kaiau","Anew3355");
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
	$objDB = mysql_select_db("dumbbell_kaiau");
 

	$sMemberID = 2;
	// $sMemberID = $_POST["user_id"];
	$strSQL = "SELECT * FROM users WHERE user_id = '".$sMemberID."' ";
	// '".$sMemberID."'
	$objQuery = mysql_query($strSQL);
	$obResult = mysql_fetch_array($objQuery);
	if($obResult)
	{

		$arr["MemberID"] = $obResult["user_id"];
		$arr["Username"] = $obResult["username"];
		$arr["Password"] = $obResult["password"];
		$arr["email"] = $obResult["email"];
		$arr["tel"] = $obResult["tel"];
		$arr["address"] = $obResult["address"];
		$arr["picture"] = $obResult["picture"];
	
	}

	
	mysql_close($objConnect);

	/*** return JSON by MemberID ***/
	/* Eg :
	{"MemberID":"2",
	"Username":"aaa",
	"Password":"bbbbb",
	"Name":"cccc",
	"Tel":"22222",
	"Email":"nnnnn@ssss.com"}
	*/
	
	echo json_encode($arr);
?>