<?php

define("true-access", true);

include "layout/layout.php";

//ordinarily we would check the database using a core component for views to be registered
function get_Form()
{
	h1("First step:Create your database");
echo '<form id="CreateDataBase" action="installation.php" method="POST">       '.PHP_EOL;
h3("Introduce a Hostname");
echo '<p><input name="hostname" type="text"/></p>'.PHP_EOL;
h3("Introduce an User");
echo '<p><input name="user" type="text" /></p>'.PHP_EOL;
h3("Introduce a password");
echo '<p><input name="password" type="text" /></p>'.PHP_EOL;
h3("Introduce a name for the database");
echo '<p><input name="db_name" type="text"/></p>'.PHP_EOL;
echo '	<input type="submit" value="Submit"/>                     '.PHP_EOL;
echo '</form> ';  

}







//A Basic Router Function
//requires registering components and their router files

//invoke basic router - the starting point of the journey

startOfPages();


get_Form();

$hostname = $_POST['hostname'];
$user = $_POST['user'];
$password = $_POST['password'];
$dbName = $_POST['db_name'];
/*
$hostPath = "Prueba/hostname.txt":
$userPath = "Prueba/user.txt";
$passwordPath = "Prueba/password.txt";
$dbNamePath = "Prueba/dbName.txt";
file_put_contents($hostPath,htmlspecialchars($hostname),)
*/
putAttribute("Prueba/hostname.txt",$hostname);
putAttribute("Prueba/user.txt",$user);
putAttribute("Prueba/password.txt",$password);
putAttribute("Prueba/dbName.txt",$dbName);

function putAttribute($path,$atr){
if (!file_exists($path))
	{
		echo "no existe";
		touch($path);
	}
	if(file_put_contents($path, htmlspecialchars($atr), FILE_APPEND | LOCK_EX)){
	echo "exitoso";//$_SESSION['Title'] = $newTitle;
}
}



if(!$hostname || !$user || !$password || !$dbName)
{
		p("<b>Please, make sure you introduced every data</b>");
}
else{
$enlace = mysql_connect($hostname, $user, $password);
	if (!$enlace) 
	{
    die('No pudo conectarse: ' . mysql_error());
	}

	$sql = 'CREATE DATABASE '.$dbName;
	if (mysql_query($sql, $enlace)) {
    h3("Database ".$dbName." created");
	} else {
    echo 'Error al crear la base de datos: ' . mysql_error() . "\n";
	}



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

$dbc = mysqli_connect($hostname,$user,$password,$dbName);
include_once("configuration.php");
mysqli_query($dbc,"CREATE TABLE Enrollment (
enrollment_id int(11) NOT NULL,
  username varchar(300) NOT NULL,
  course_id int(11) NOT NULL
)");

mysqli_query($dbc,"CREATE TABLE Tbl_Users (
User_id int(11) NOT NULL,
username varchar(300) NOT NULL,
password varchar(300) NOT NULL,
email varchar(300) NOT NULL,
role enum('Professor','Student') NOT NULL
)");

mysqli_query($dbc,"CREATE TABLE Tbl_Courses (
Course_id int(11) NOT NULL, 
Course_number int(11) NOT NULL,
 Name varchar(300) NOT NULL,
 Description varchar(300) NOT NULL,
 Credit_hours int(11) NOT NULL
)");

mysqli_query($dbc,"ALTER TABLE Enrollment
 ADD PRIMARY KEY (enrollment_id)");
mysqli_query($dbc,"ALTER TABLE Tbl_Courses
 ADD PRIMARY KEY (Course_id)");
mysqli_query($dbc,"ALTER TABLE Tbl_Users
 ADD PRIMARY KEY (User_id)");

mysqli_query($dbc,"ALTER TABLE Enrollment
MODIFY enrollment_id int(11) NOT NULL AUTO_INCREMENT");


mysqli_query($dbc,"ALTER TABLE Tbl_Courses
MODIFY Course_id int(11) NOT NULL AUTO_INCREMENT");

mysqli_query($dbc,"ALTER TABLE Tbl_Users
MODIFY User_id int(11) NOT NULL AUTO_INCREMENT");

mysqli_query($dbc,"INSERT INTO Tbl_Courses
	VALUES(1,515,'Advanced Software Development','Course about advanced Java',3)");
mysqli_query($dbc,"INSERT INTO Tbl_Users
	VALUES(1,'pmontojo','473fff727e3006860d92473551eab717209e35a2','p.montojo91@gmail.com','Student')");
mysqli_query($dbc,"INSERT INTO Tbl_Courses
	VALUES(2,422,'Advanced SQL','Course about advanced SQL and its applications',3)");
mysqli_query($dbc,"INSERT INTO Tbl_Courses
	VALUES(3,544,'Cloud computing','Course about the implementation of cloud computing on AWS',3)");
mysqli_query($dbc,"INSERT INTO Tbl_Users
	VALUES(2,'jlambert','0614a93dc957db54ed29f897388c90d8a3533bb8','jlambert@hawk.iit.edu','Professor')");


}


endOfPages();


?>