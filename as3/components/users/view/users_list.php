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
	startContent();
	//echo '<hr>'.PHP_EOL;
	echo '<div class="container-narrow">'.PHP_EOL;
	//$content = "this is the title";
	//$title = get_Title();
	//siteTitle("$title");
	//p("<h2>Welcome to IIT Web Site. Please login and enroll to a course</h2>");
	
	//users_renderLoginForm();
	//echo "<a href='index.php?option=store&view=admin'>If you are a professor, login here</a>".PHP_EOL;
	$users = $data["Tbl_Users"];
	if (!empty($users))
	{
		foreach ($users as $user)
		{
			users_render($user);
		}
	}

	endContent();
	endOfPage();

}

/*
* books layout helpers
*/
function users_render($user)
{

	$role = $user['role'];
	if($role == "Professor"){
		h2("<hr><b>Professors</b>");

	p("User name:".$user['username']);
	p("User role:".$role);
	p("User email:".$user['email']);
}
else {
	h2("<b>Students</b>");
	p("User name:".$user['username']);
	p("User role:".$role);
	p("User email:".$user['email']);
	}

	//h3("<a href='index.php?option=store&view=details&v1=$id'>Course number:".$course['Course_number']." Name:".$course['Name']."</a>");
	//p("Description: ".$course['Description']);
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