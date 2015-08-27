<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");
/*
* Purchases layout
*/

/*
* Main function
*/
function view($data)
{
	startOfPage();
echo "<div class='jumbotron'>".PHP_EOL;
startContent();
	users_renderLoginForm();
	echo "</div>".PHP_EOL;
	echo '<div class="container-narrow">'.PHP_EOL;
	endContent();

	$history = $data["Enrollment"];
	h1("Details of this course");
	foreach($history as $enrollment)
	{
	//echo $data;
		display_render($enrollment);
	}
	//endOfPage();
}

function display_render($course)
{
	h3("Number: ".$course['Course_number']);
	p("Name: ".$course['Name']);
	p("Description: ".$course['Description']);
	
	p("Hours: ".$course['Credit_hours']);
	if (users_loggedIn()) {
		disp_renderEnrollForm($course);
		disp_renderEnrollsForm($course);
		//echo '<a href="index.php?option=users&view=enrolls&user=$_SESSION">View enrollments</a>'.PHP_EOL;
	}

}
function disp_renderEnrollForm($course) {

	echo '<form id="Enroll'.$course['Course_number'].'" action="index.php?option=users&view=purchase" method="POST">       '.PHP_EOL;
	echo '	<input name="username" type="hidden" value="'.$_SESSION['user']['username'].'"/>'.PHP_EOL;
	echo '	<input name="course" type="hidden" value="'.$course['Course_id'].'"/>'.PHP_EOL;
	echo '	<button class="btn btn-info" type="submit" value="Enroll">Enroll</button>                     '.PHP_EOL;
	echo '</form> ';    
}

function disp_renderEnrollsForm($course) {

	echo '<form id="Enrolls'.$course['Course_number'].'" action="index.php?option=users&view=enrolls" method="POST">       '.PHP_EOL;
	echo '	<input name="username" type="hidden" value="'.$_SESSION['user']['username'].'"/>'.PHP_EOL;
	echo '	<input name="course" type="hidden" value="'.$course['Course_id'].'"/>'.PHP_EOL;
	echo '	<button class="btn btn-info" type="submit" value="View enrollments">View Enrollments</button>                    '.PHP_EOL;
	echo '</form> ';    
}



?>