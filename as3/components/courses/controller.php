<?php
defined("true-access") or die("No script kiddies please!");
//el controlador es el único que incluye todos los models
include_once("model/common.php");
include_once("model/courses.php");
include_once("model/purchases.php");
include_once("model/users.php");
include_once("view/common.php");

/**
* Store component controller
*/
function get_view_enabled($view)
{
	if ($view == "list")
		return "execute_course_list";
	else if ($view == "login")
		return "execute_login";
	else if ($view == "logout")
		return "execute_logout";
	//else if ($view == "purchase")
	//	return "execute_purchase";
	else if ($view == "admin")
		return "execute_admin";
	else if ($view == "details")
		return "execute_details";
	else if ($view == "loginAdm")
		return "execute_loginAdm";
	else if ($view == "edit")
		return "execute_edit";
	else if ($view == "edited")
		return "execute_edition";
	else
		return false;
}

function controller_route($view)
{
	if ($method = get_view_enabled($view))
	{
		$method(); //dynamic method invocation
	}
	else
	{
		die ("404 not found"); //this could be a view too!
	}
	
}


function execute_course_list()
{
	include_once("view/course_list.php");
	$data = array();
	$data["Tbl_Courses"] = courses_getAll();
	view($data);
}

function execute_login()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$success = users_checkExists($username,$password);
	execute_course_list(); //view courses after logging in
}

function execute_logout()
{
	/*
	* Logout and clear the session submission page
	*/
	session_unset ();
	execute_course_list(); //view books after logging out
}

/*function execute_purchase()
{
	include_once("view/purchase.php");
	echo "executing purchase";
	//guarda el id del course
	$course = $_POST['course'];
	echo $course;
	//guarda el usuario
	$username = $_POST['username'];
	echo $username;
	$result = isRepeated($course,$username);
	echo $result;
	if(!$result)
	getCourse($course,$username);
	$data = array();
	//guardo en la variable data todos los enrolments del usuario indicado
	$data["Enrollment"] = enrollments_getAll($username);
	//guarda todos los enrollments del estudiante concreto
	view($data);
	
}
*/
function execute_details()
{
	//en el modelo de los cursos puedo hacer un método para ver los detalles
	include_once("view/details.php");
	//guarda el id del course
	$course = $_GET['v1'];
	//echo $course;
	//guarda el usuario
	//$detail = getDescription($course);
	$data = array();
	//guardo en la variable data todos los enrolments del usuario indicado
	$data["Enrollment"] = getDescription($course);
	//guarda todos los enrollments del estudiante concreto
	view($data);
	
	
}
function execute_loginAdm()
{
	$username = $_POST['username'];
	//echo "username is $username";
	$password = $_POST['password'];
	$success = users_checkExists($username,$password);
	//echo $success;
	$admin = users_checkAdmin($username);
	//echo "admin is $admin";
	if($admin){
	execute_admin(); //view courses after logging in
	}
	else{
	h1("You don't have permission to access this section");
	h3("<a href='index.php?option=courses&view=list'>Click here to be logged as an student</a>");
	}
	}

function execute_admin()
{
	include_once("view/admin.php");
	$data = array();
	$data["Tbl_Courses"] = courses_getAll();
	view($data);
}

function execute_edit(){
	include_once("view/admin.php");
	edit_titleForm();
}

function execute_edition(){
	include_once("view/admin.php");
	$newTitle = $_POST['newTitle'];
	$newSubTitle = $_POST['newSubTitle'];
	//echo $newTitle;
	$path = "Prueba/title.txt";
	$pathSub = "Prueba/subtitle.txt";
	if (!file_exists($path))
	{
		echo "no existe";
		touch($path);
	}
	if(file_put_contents($path, htmlspecialchars($newTitle).PHP_EOL, FILE_APPEND | LOCK_EX)){
	//echo "exitoso";//$_SESSION['Title'] = $newTitle;
}

if (!file_exists($pathSub))
	{
		echo "no existe";
		touch($pathSub);
	}
	if(file_put_contents($pathSub, htmlspecialchars($newSubTitle).PHP_EOL, FILE_APPEND | LOCK_EX)){
	//echo "exitoso";//$_SESSION['Title'] = $newTitle;
}
	execute_admin();
}


?>