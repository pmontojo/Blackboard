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
	//$title = get_Title();
	//siteTitle("$title");
		//startOfPage();
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
	p("<h2>Here is the list of your current enrollments</h2>");
	//users_renderLoginForm();
	$history = $data["Enrollment"];
	h1("Your Enrollments");
	foreach($history as $enrollment)
	{
		purchases_render($enrollment);
	}
	endOfPage();
}

function purchases_render($purchase)
{
	h3($purchase['Course_number']);
	p("Name: ".$purchase['Name']);
}



?>