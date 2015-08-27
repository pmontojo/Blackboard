<?php
if (!defined("true-access"))
{
	die("cannot access");
}

include_once("common.php");

/**
* Check if a user exists in the database, adds user to session if exists
*/
function users_checkExists($username, $password)
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	if ($dbc)
	{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		//$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
		//echo $username_safe;
		//echo $password_safe;

		$query = "SELECT * from Tbl_Users where username='$username_safe' AND password='$password_safe'";	
		$result = mysqli_query($dbc,$query);

		
		if ($result)
		{
			//aha we found you!
			
			while($user = mysqli_fetch_array($result,MYSQLI_BOTH))
			{
				$_SESSION['user'] = $user;
				$success = true;
			}
			
			
		}
		else
		{
			echo "<b>Your username/password was incorrect. Try it again</b>";
		}
	}
	return $success;
}
//remember: hacer unico el username
function users_checkAdmin($username){
	list($dbc,$error) = connect_to_database();
	$admin = false;
	if ($dbc)
	{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		//$password_safe = mysqli_real_escape_string($dbc,sha1($password + SALT));
		//echo $username_safe;
		//echo $password_safe;

		$query = "SELECT * from Tbl_Users where username='$username_safe' AND role='Professor';";	
		$result = mysqli_query($dbc,$query);
		///$allrols = array();
		if ($result){
		while ($rols = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$admin = true;
		}
	
	}

	}
	return $admin;


}

function users_getAll()
{
	$users = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT * FROM Tbl_Users;";
		
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($user = mysqli_fetch_array($result))
			{
				$users[] = $user;
			}
		}
	}
	return $users;
}

?>