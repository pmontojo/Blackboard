<?php
if (!defined("true-access"))
{
	die("cannot access");
}
include_once("common.php");
/*
* books database
*/

function courses_getAll()
{
	$courses = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT * FROM Tbl_Courses;";
		
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($course = mysqli_fetch_array($result))
			{
				$courses[] = $course;
			}
		}
	}
	return $courses;
}

function getDescription($course){
	$details = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT * FROM Tbl_Courses WHERE Course_id = $course;";
		
		
		$details = mysqli_query($dbc,$query);
		
	}
	//ya tengo los detalles. y ahora
	return $details;

}


?>