<?php
define("true-access", true);


//if(!$hostname || !$user || !$password || !$dbName)
//{
		//header ("Location: installation.php");
	//		p("Please, make sure you introduced every data");
//}
//else{
$hostname = getAttribute("Prueba/hostname.txt");
$user = getAttribute("Prueba/user.txt");
$password = getAttribute("Prueba/password.txt");
$dbName = getAttribute("Prueba/dbName.txt");

	function getAttribute($path){
		if (file_exists($path))
	{
	$allData = file_get_contents($path);
	$arrayOfLines = file($path);
	$result = $arrayOfLines[sizeof($arrayOfLines)-1];
	}
	return $result;
	}


define("SALT","word");
define("DB_HOST",$hostname);
define("DB_USER",$user);
define("DB_PASSWORD",$password);
define("DB_NAME",$dbName);
//echo "estos son mis params".SALT;
//echo "host".DB_HOST;
//echo DB_USER;
//echo DB_PASSWORD;
//echo DB_NAME;


	

//}

//echo "<a href='index.php'>Go to init page</a>";


?>