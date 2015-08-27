<?php
define("true-access", true);
include_once("configuration.php");
session_start();
ob_start();
//ordinarily we would check the database using a core component for views to be registered
function get_option_enabled($option)
{
	if ($option == "courses") //we have this component enabled (hard coded)
		return "courses/controller.php";

	if ($option == "users") //we have this component enabled (hard coded)
		return "users/controller.php";	

	else
		return false;
}

//A Basic Router Function
//requires registering components and their router files
function route()
{
		//get query params from header
		$option = empty($_GET["option"]) ? "courses" : $_GET["option"];
		$view = empty($_GET["view"]) ? "list" : $_GET["view"];
		
		//get files to include from database
		if ($controller = get_option_enabled($option))
		{
			//echo $controller;
			//echo $option;
			//echo $view;
			//include correct router
			include_once('components/'.$controller);
			controller_route($view); //router in controller should execute for a particular view - router in controller should implement function router_route($view)
		}
		else
		{
			die("404 - No Controller for specified option");
		}
}

//invoke basic router - the starting point of the journey
route();
ob_end_flush();


?>