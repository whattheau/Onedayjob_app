<?php
	$objConnect = mysql_connect("localhost","dumbbell_kaiau","Anew3355");
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
	$objDB = mysql_select_db("dumbbell_kaiau");
// $_POST["txtKeyword"] = "a"; // for Sample


$strKeyword = $_POST["txtKeyword"];
//$id = $_GET['CatID'];
//$strSQL = "SELECT * FROM product2 as t JOIN category as s   ON t.CatID = s.CatID    WHERE s.CatID=$id  AND product_name LIKE '%".$strKeyword."%'  ORDER BY id ASC  ";


$strSQL = "SELECT * FROM jobs WHERE  job_ID  AND job_Name LIKE '%".$strKeyword."%'  ORDER BY job_ID ASC  ";


	$objQuery = mysql_query($strSQL);
	$intNumField = mysql_num_fields($objQuery);
	$resultArray = array();
	while($obResult = mysql_fetch_array($objQuery))
	{
		$arrCol = array();
		for($i=0;$i<$intNumField;$i++)
		{
			$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
		}
		array_push($resultArray,$arrCol);
	}

	mysql_close($objConnect);

	echo json_encode($resultArray);


?>
