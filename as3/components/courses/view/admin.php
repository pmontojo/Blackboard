<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");

/*
* Main function
*/
function view($data)
{
		
	startOfPage();
		echo "<div class='jumbotron'>".PHP_EOL;
	startContent();
	//$title = get_Title();
	//siteTitle("$title");



	admins_renderLoginForm();
	echo "</div>".PHP_EOL;
	echo '<hr>'.PHP_EOL;
	echo '<div class="container-narrow">'.PHP_EOL;
	//echo "<a href='index.php?option=store&view=admin'>If you are a professor, login here</a>".PHP_EOL;
	$courses = $data["Tbl_Courses"];

		if (users_loggedIn()){
	echo "<h2><a href='index.php?option=courses&view=edit'>Edit title and subtitle</a></h2>";
	}
	// if (!empty($courses))
	// {
	// 	foreach ($courses as $course)
	// 	{
	// 		courses_render($course);
	// 	}
	// }

	endContent();
	endOfPage();

}

/*
* books layout helpers
*/
function courses_render($course)
{
	$id = $course['Course_id'];
	//h3("<a href='index.php?option=store&view=delete&v1=$id'>Remove Course</a>");
	h2("Course number:".$course['Course_number']." Name:".$course['Name']);
	p("<h3>Description: ".$course['Description']."</h3>");
	//if (users_loggedIn()) {
		//p("<a href='index.php?option=courses&view=delete&v1=$id'>Remove Course</a>");
		//Course number:".$course['Course_number']." Name:".$course['Name'].";
	//}
}

function edit_titleForm(){
	//include_once("common.php");
	echo '<div class="container-narrow">'.PHP_EOL;
	echo ' <link href="content/css/bootstrap.css" rel="stylesheet">'.PHP_EOL;
	  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">'.PHP_EOL;
	
	echo '<form id="title" action="index.php?option=courses&view=edited" method="POST">       '.PHP_EOL;
	echo '<input name="newTitle" type="text" value="Title"/>'.PHP_EOL;
	echo '<br><input name="newSubTitle" type="text" value="Subtitle"/>'.PHP_EOL;
	echo '<p><button type="submit" class="btn btn-info" value="Submit"> Submit </button>'.PHP_EOL  ;
	echo '</form>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
}

function get_Title(){
	$path = "Prueba/prueba.txt";
	$result = "caca";
	if (file_exists($path))
	{
	$allData = file_get_contents($path);
	$arrayOfLines = file($path);
	$result = $arrayOfLines[sizeof($arrayOfLines)-1];
	//echo "$result";
}
return $result;
	
}

//function books_renderEnrollForm($course) {

//	echo '<form id="Enroll'.$course['Course_number'].'" action="index.php?option=store&view=purchase" method="POST">       '.PHP_EOL;
//	echo '	<input name="username" type="hidden" value="'.$_SESSION['user']['username'].'"/>'.PHP_EOL;
//	echo '	<input name="course" type="hidden" value="'.$course['Course_id'].'"/>'.PHP_EOL;
//	echo '	<input type="submit" value="Enroll"/>                     '.PHP_EOL;
//	echo '</form> ';    
//}


?>