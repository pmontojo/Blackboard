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
	p("<h2><b>Here is the list of your current enrollments:<b></h2><br>");
	//users_renderLoginForm();
	$history = $data["Enrollment"];
	//h1("Your Enrollments");
	foreach($history as $enrollment)
	{
		purchases_render($enrollment);
	}
	endOfPage();
}

function purchases_render($purchase)
{
	h2($purchase['Course_number']);
	p("<h4>Name: ".$purchase['Name']."</h4>");
	echo "<hr>".PHP_EOL;
}



?>