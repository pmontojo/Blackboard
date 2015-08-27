<?php

if (!defined("true-access"))
{
	die("cannot access");
}

include_once("common.php");
/*
* Purchases database
*/

function getCourse($course, $username)
{
	//siempre que quiero obtener algo de la base de datos me conecto
	list($dbc, $error) = connect_to_database();
	
	$course_safe = mysqli_real_escape_string($dbc, $course); //protect ourselves
	$username_safe = mysqli_real_escape_string($dbc,$username); //protect ourselves
	//$now = new date();
	//$prueba = mysqli_query($dbc,"select course_id from Enrollment where username = $username_safe;");
	//cuando el usuario se enrola en una asignatura se apunta en la tabla de relación entre ambas.
	$results = mysqli_query($dbc,"insert into Enrollment (course_id, username) values ('$course_safe','$username_safe')");
	
	return $results;
}

function enrollments_getAll($username)
{
	//again como quiero algo de la base de datos conecto
	list($dbc, $error) = connect_to_database();

	$username_safe = mysqli_real_escape_string($dbc,$username); //protect ourselves
	
	$results = mysqli_query($dbc,"select * from Enrollment join Tbl_Courses on Enrollment.course_id = Tbl_Courses.course_id where username='$username_safe'");
	
	$allEnrollments = array();
	
	if ($results)
	{
		while ($enrollment = mysqli_fetch_array($results,MYSQLI_ASSOC))
		{
			$allEnrollments[] = $enrollment;
		}
	}
	
	return $allEnrollments;
}

function isRepeated($course, $username){	
	list($dbc, $error) = connect_to_database();
	$repeated = false;
	$course_safe = mysqli_real_escape_string($dbc, $course); //protect ourselves
	$username_safe = mysqli_real_escape_string($dbc,$username); //protect ourselves
	//$now = new date();
	//echo $course_safe;
	//echo $username_safe;
	//echo $course;
	//echo $username;
	
	$results = mysqli_query($dbc,"select course_id from Enrollment where username= '$username_safe'");
	$allEnr = array();
	if ($results)
	{
		while ($enrollments = mysqli_fetch_array($results,MYSQLI_ASSOC))
		{
			$allEnr[] = $enrollments;
		//	echo $enrollments;
		}
	
	foreach ($allEnr as $enr){
		//echo $enr;
		//echo $enr['course_id'];
		//echo $course_safe;
		if($enr['course_id'] == $course_safe){
			$repeated = true;
		}
	}
	//echo $repeated;
	//if($repeated)
		//p("You are already enrolled in this course");
	
}
return $repeated;
}



?>