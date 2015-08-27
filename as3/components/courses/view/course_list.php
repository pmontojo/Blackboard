<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");
//$content = "Prueba Título";

/*
* Main function
*/
function view($data)
{
		
	startOfPage();
	//startContent();
	//$content = "this is the title";
	//$title = get_Title();
	//siteTitle("$title");
	echo "<div class='jumbotron'>".PHP_EOL;
	
	startContent();
	users_renderLoginForm();

	echo "</div>".PHP_EOL;
	echo '<hr>'.PHP_EOL;
	echo '<div class="container-narrow">'.PHP_EOL;
	endContent();
	//echo "<a href='index.php?option=store&view=admin'>If you are a professor, login here</a>".PHP_EOL;
	$courses = $data["Tbl_Courses"];
	if (!empty($courses))
	{
		
	
			courses_render($courses);
		

		
	}

	//endContent();
	endOfPage();

}



function courses_render($courses)
{
	
	foreach($courses as $course){
	$id = $course['Course_id'];
	
	h3("<li><h2><a href='index.php?option=courses&view=details&v1=$id'>Course number:".$course['Course_number']."</a></h2></li><h3>".$course['Name']."</h3>");
	p("Description: ".$course['Description']);
	
	echo '<hr>'.PHP_EOL;
  }
 
	//if (users_loggedIn()) {
		//books_renderEnrollForm($course);
	//}
}



//function books_renderEnrollForm($course) {

//	echo '<form id="Enroll'.$course['Course_number'].'" action="index.php?option=store&view=purchase" method="POST">       '.PHP_EOL;
//	echo '	<input name="username" type="hidden" value="'.$_SESSION['user']['username'].'"/>'.PHP_EOL;
//	echo '	<input name="course" type="hidden" value="'.$course['Course_id'].'"/>'.PHP_EOL;
//	echo '	<input type="submit" value="Enroll"/>                     '.PHP_EOL;
//	echo '</form> ';    
//}


?>