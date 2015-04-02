<?php 
include 'myDB.php';

$conn = myDB::getDB();

$query = "SELECT title FROM about";
$result = $conn->prepare($query);
$result->execute();
$title = $result->fetch();

$query2 = "SELECT content FROM about";
$resultC = $conn->prepare($query2);
$resultC->execute();
$content = $resultC->fetch();


?>

<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" />
  	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lobster|Montserrat|Oswald|Open+Sans' type='text/css'>
	<link rel="stylesheet" href="css/layout.css" type="text/css">
        <link rel="stylesheet" href="css/about.css" type="text/css">
</head>
	<body>
		<input  type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
		<label for="drawer-toggle" id="drawer-toggle-label"></label>
		<header>
                    <a href="index.php"><img id="logo" src="Images/footie-logo.png" /></a>
			<nav id="main-nav">
				<ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="games.php">Games</a></li>
	  				<li><a href="#">Teams</a></li>
                                        <li><a class="active" href="about.php">About</a></li>
	  				<li><a href="#">Contact</a></li>			
				</ul>
			</nav>
		</header>
		<section id="drawer">
			<nav id="mobile-nav">
				<ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="games.php">Games</a></li>
	  				<li><a href="#">Teams</a></li>
                                        <li><a class="active" href="about.php">About</a></li>
	  				<li><a href="#">Contact</a></li>
				</ul>
			</nav>
			<form>
				<input class="login" type=text value placeholder="Username"><br>
				<input class="login" type=password value placeholder="Password"><br>
				<input id="signIn" type="submit" value="Sign In" >
				<hr>
		    	<input id="reg" type="submit" value="Register">
			</form>
		</section>
		<div id="page-content">
                    <section id="about">
                        <h1><?php echo $title[0] ?></h1>
                        <p><?php echo $content[0] ?></p>
                    </section>
		</div>
	</body>
</html>
