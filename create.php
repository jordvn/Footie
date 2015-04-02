<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Create a Game</title>
        <link rel="stylesheet" type="text/css" href="css/create.css">
        <link rel="stylesheet" href="css/layout.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="js/registerMap.js"></script>

    </head>
    <body>
    		<input  type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
		<label for="drawer-toggle" id="drawer-toggle-label"></label>
		<header>
                    <a href="index.php"><img id="logo" src="Images/footie-logo.png" /></a>
			<nav id="main-nav">
				<ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a class="active" href="games.php">Games</a></li>
	  				<li><a href="#">Teams</a></li>
	  				<li><a href="#">About</a></li>
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
	  				<li><a href="#">About</a></li>
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
        <section id="page-content">
        <div id="wrapper">
            <h1>Please Select a Location</h1>
            <!-- Textbox for map -->
            <input id="pac-input" class="controls" type="text" placeholder="Enter the location of the game" />
            
            <!-- Google Map div -->
            <div id="map-canvas"></div>
            
            <!-- Dynamic Result Box -->
             <div id="results"></div>
             
             <!-- inputs with no form to avoid postback of the page -->
             <ul id="form">
                    <li>
                        <label>Date:</label>
                        <input type="date" name="date" id="date" />
                     
                    </li>
                    <li>
                        <label>Time:</label>
                        <input type="time" name="time" id="time" />
                        
                    </li>
                    <li>
                        <label>Details:</label>
                    </li>
                    <li>
                        <textarea type="text" name="details" id="details" placeholder="Enter Details" ></textarea>
                        
                    </li>
                    <li>
                        <input id="send" type="button" name="submit" value="Create!" />
                    </li>
                </ul>
        </div>
      </section>
    </body>
</html>