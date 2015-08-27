<?php
defined("true-access") or die("No script kiddies please!");

/*
* common layout
*/

function startOfPage()
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
  <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
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
/*        margin: 60px 0;
        text-align: center;
		background: url(img/sue.jpg);
		color: orange;*/
       margin: 60px 0;
        text-align: center;
        color: orange;
        background-color: #E6E6E6;
      }
      .jumbotron h1 {
        font-size: 72px;
        font-family: 'Indie Flower', cursive;
        font-style:italic;

         }

        h2{
        font-family: 'Poiret One', cursive;
        
      }
      .jumbotron2 {
        margin: 60px 0;
        font-style:bold;

        text-align: center;
        color: grey;
        background-color: white;
      }

        .jumbotron2 h1 {
        font-size: 72px;
        font-family: 'Indie Flower', cursive;
        font-style:italic;

         }
        .jumbotron2 h2{
        font-family: 'Indie Flower', cursive;
        
      }

       .jumbotron h2{
        font-family: 'Indie Flower', cursive;
        
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
     $path = "Prueba/title.txt";
	$result = "Blackboard";
	if (file_exists($path))
	{
	$allData = file_get_contents($path);
	$arrayOfLines = file($path);
	$result = $arrayOfLines[sizeof($arrayOfLines)-1];
	}
  
  $pathSub = "Prueba/subtitle.txt";
  $res = "A space for you";
  if (file_exists($pathSub))
  {
  $allData2 = file_get_contents($pathSub);
  $arrayOfLines2 = file($pathSub);
  $res = $arrayOfLines2[sizeof($arrayOfLines2)-1];
  }
   echo ' </style>'.PHP_EOL;
  // echo ' <link href="content/css/bootstrap-responsive.css" rel="stylesheet">'.PHP_EOL;

   echo ' <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->'.PHP_EOL;
    echo '<!--[if lt IE 9]>'.PHP_EOL;
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>'.PHP_EOL;
    //echo '  <script src="js/html5shiv.js"></script>'.PHP_EOL;
    echo '<![endif]-->'.PHP_EOL;

    echo '<!-- Fav and touch icons -->'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">'.PHP_EOL;
    echo '<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">'.PHP_EOL;
    echo '  <link href="http://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet" type="text/css">'.PHP_EOL;
    echo '<link rel="shortcut icon" href="ico/favicon.png">'.PHP_EOL;
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">'.PHP_EOL;
 
  echo '</head>'.PHP_EOL;

  echo '<body>'.PHP_EOL;

    

     //echo ' <div class="masthead">'.PHP_EOL;
       echo ' <ul class="nav nav-pills pull-right">'.PHP_EOL;
         echo ' <li class="active"><a href="index.php">Home</a></li>'.PHP_EOL;
         echo ' <li><a href="index.php?option=users&view=list">Users</a></li>'.PHP_EOL;
         //echo ' <li><a href="index.php?option=users&view=purchase">Enrollments</a></li>'.PHP_EOL;
         //echo ' <li><a href="#">Contact</a></li>'.PHP_EOL;
       echo ' </ul>'.PHP_EOL;
     //  echo ' <h3 class="muted">Reliable Repair</h3>'.PHP_EOL;
    // echo ' </div>'.PHP_EOL;

//      echo ' <hr>'.PHP_EOL;

     echo ' <div class="jumbotron2">'.PHP_EOL;
     echo '<h1><img src= ./content/img/bblogo.png WIDTH=150 HEIGHT=150>'.PHP_EOL;
    //$titl = getTitl();
      echo ''.$result.'</h1>'.PHP_EOL;
       //echo ' <p class="lead">This is the enrollment page for students and professors</p>'.PHP_EOL;
      echo ' <h2>'.$res.'</h2>'.PHP_EOL;
     echo ' </div>'.PHP_EOL;

      echo '<hr>'.PHP_EOL;
//echo '<div class="container-narrow">'.PHP_EOL;
//       echo '<div class="row-fluid marketing">'.PHP_EOL;
		echo '<h1></h1>'.PHP_EOL;
//        echo ' <div class="span6">'.PHP_EOL;
       //echo '<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>'.PHP_EOL;
		//echo ' <script src="content/js/bootstrap.js"></script>'.PHP_EOL;
}

function endOfPage()
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
   // echo "<div class='jumbotron'>".PHP_EOL;
		echo "<a href='index.php?option=courses&view=admin'>If you are a professor, login here</a>".PHP_EOL;
   p("<h2>Welcome to IIT Web Site.</h2><h3> Please login and enroll to a course</h3>");
		echo '<form action="index.php?option=courses&view=login" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/><br>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/>'.PHP_EOL;
		echo '	<br><button type="submit" class="btn btn-success" value="Login">Login</button>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
  //  echo '</div>'.PHP_EOL;
	}
		

	else{
	 echo "<h2>Welcome student!</h2>".PHP_EOL;
		echo '<form action="index.php?option=courses&view=logout" method="post">                          '.PHP_EOL;
		echo '	<button type="submit" class="btn btn-danger" value="Logout">Logout</button>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}

}


function admins_renderLoginForm()
{
	if (!users_loggedIn()) {
		p("<h2>Welcome to IIT Web Site, please login as an admin</h2>");
		echo '<form action="index.php?option=courses&view=loginAdm" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/><br>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/><br>'.PHP_EOL;
		echo '	<button type="submit" class="btn btn-success">Login</button>                      '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
		

	else{
		p("<h2>Welcome professor!</h2>");
		echo '<form action="index.php?option=courses&view=logout" method="post">                          '.PHP_EOL;
		echo '	<button type="submit" class="btn btn-danger">Logout</button>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}

}




?>