<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" />
  	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lobster|Montserrat|Oswald|Open+Sans' type='text/css'>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
	<body>
		<input  type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
		<label for="drawer-toggle" id="drawer-toggle-label"></label>
		<header>
			<img id="logo" src="Images/footie-logo.png" />
			<nav id="main-nav">
				<ul>
                                    <li><a class="active" href="index.php">Home</a></li>
	  				<li><a href="games.php">Games</a></li>
	  				<li><a href="#">Teams</a></li>
	  				<li><a href="about.php">About</a></li>
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
                                        <li><a href="about.php">About</a></li>
	  				<li><a href="#">Contact</a></li>
				</ul>
			</nav>
			<form>
				<input class="login" type=text value placeholder="Username"><br>
				<input class="login" type=password value placeholder="Password"><br>
				<input id="signIn" type="submit" value="Sign In" >
			</form>
		</section>
		<div id="page-content">
			<img id="mainImg" src="Images/main.png" /> 
			<input id="reg" type="submit" value="SIGN UP">
		</div>
	</body>
</html>