<?php
defined("true-access") or die("No script kiddies please!");

/*
* common layout
*/

function startOfPages()
{
	echo '<!doctype html> '.PHP_EOL;
	echo '<html>          '.PHP_EOL;
echo '<html lang="en">'.PHP_EOL;
 echo ' <head>'.PHP_EOL;
   echo '<meta charset="utf-8">'.PHP_EOL;
    echo '<title>Enrollments</title>'.PHP_EOL;


?>

    <!-- Le styles -->
    <link href="content/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

        table{
        display: table;
        border:black 5px solid;
        border-collapse: separate;
        border-spacing: 7px;
        border-color: gray;
        padding:2px;

      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing messages */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
		background: url(img/sue.jpg);
		color: orange;
      }

      .jumbotron2 {
         margin: 60px 0;
        text-align: center;
    background: grey;
    color: blue;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;

      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }

     <?php
     $path = "Prueba/prueba.txt";
	$result = "Create database";
	if (file_exists($path))
	{
	$allData = file_get_contents($path);
	$arrayOfLines = file($path);
	$result = $arrayOfLines[sizeof($arrayOfLines)-1];
	}
   echo ' </style>'.PHP_EOL;
   echo ' <link href="content/css/bootstrap-responsive.css" rel="stylesheet">'.PHP_EOL;

   echo ' <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->'.PHP_EOL;
    echo '<!--[if lt IE 9]>'.PHP_EOL;
    echo '  <script src="js/html5shiv.js"></script>'.PHP_EOL;
    echo '<![endif]-->'.PHP_EOL;

    echo '<!-- Fav and touch icons -->'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">'.PHP_EOL;
    echo '<link rel="shortcut icon" href="ico/favicon.png">'.PHP_EOL;
 
  echo '</head>'.PHP_EOL;

  echo '<body>'.PHP_EOL;

    echo '<div class="container-narrow">'.PHP_EOL;

     echo ' <div class="masthead">'.PHP_EOL;
       echo ' <ul class="nav nav-pills pull-right">'.PHP_EOL;
         echo ' <li class="active"><a href="index.php">Home</a></li>'.PHP_EOL;
         //echo ' <li><a href="">Courses</a></li>'.PHP_EOL;
         //echo ' <li><a href="#">Contact</a></li>'.PHP_EOL;
       echo ' </ul>'.PHP_EOL;
     //  echo ' <h3 class="muted">Reliable Repair</h3>'.PHP_EOL;
     echo ' </div>'.PHP_EOL;

     echo ' <hr>'.PHP_EOL;

     echo ' <div class="jumbotron">'.PHP_EOL;
    //$titl = getTitl();
      echo '<h1 >'.$result.'</h1>'.PHP_EOL;
       echo ' <p class="lead">This is the enrollment page for students and professors</p>'.PHP_EOL;
     echo ' </div>'.PHP_EOL;

      echo '<hr>'.PHP_EOL;

      echo '<div class="row-fluid marketing">'.PHP_EOL;
		echo '<h1></h1>'.PHP_EOL;
       echo ' <div class="span6">'.PHP_EOL;
       echo '<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>'.PHP_EOL;
		echo ' <script src="content/js/bootstrap.js"></script>'.PHP_EOL;
}

function endOfPages()
{
echo '</body>'.PHP_EOL;
echo '</html>'.PHP_EOL;
}


function siteTitle($content)
{
	echo "<h1><a style='color:grey' href='index.php'>".$content."<a></h1>".PHP_EOL;
}

function startContent()
{
	echo '<article>'.PHP_EOL;
}

function endContent()
{
	echo '</article>'.PHP_EOL;
}

function startAside()
{
	echo '<aside>'.PHP_EOL;
}

function endAside()
{
	echo '</aside>'.PHP_EOL;
}

function h1($content)
{
	echo "<h1>".$content."</h1>".PHP_EOL;
}
function tb($content)
{
  echo "<table>".$content."</table>".PHP_EOL;
}
function h3($content)
{
	echo "<h3>".$content."</h3>".PHP_EOL;
}

function h2($content)
{
	echo "<h2>".$content."</h2>".PHP_EOL;
}

function p($content)
{
	echo "<p>".$content."</p>".PHP_EOL;
}

function users_loggedIn()
{
	return (isset($_SESSION['user']));
}


function users_username()
{
	
}
function get_Titl(){
	$path = "Prueba/prueba.txt";
	$result = "caca";
	if (file_exists($path))
	{
	$allData = file_get_contents($path);
	$arrayOfLines = file($path);
	$result = $arrayOfLines[sizeof($arrayOfLines)-1];
	}
	return $result;
	}

function users_renderLoginForm()
{
	if (!users_loggedIn()) {
		echo "<a href='index.php?option=store&view=admin'>If you are a professor, login here</a>".PHP_EOL;

		echo '<form action="index.php?option=store&view=login" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/>'.PHP_EOL;
		echo '	<input type="submit" value="Login"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
		

	else{
		p("Welcome user!");
		echo '<form action="index.php?option=store&view=logout" method="post">                          '.PHP_EOL;
		echo '	<input type="submit" value="Logout"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}

}

function admins_renderLoginForm()
{
	if (!users_loggedIn()) {
		p("Welcome to IIT Web Site, please login as an admin");
		echo '<form action="index.php?option=store&view=loginAdm" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/>'.PHP_EOL;
		echo '	<input type="submit" value="Login"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
		

	else{
		p("Welcome professor!");
		echo '<form action="index.php?option=store&view=logout" method="post">                          '.PHP_EOL;
		echo '	<input type="submit" value="Logout"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}

}




?>