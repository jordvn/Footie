<?php

?>
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Games</title>
    <link rel="stylesheet" href="css/layout.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/map.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
    //<![CDATA[
    
    // Holds the path for the custom marker
    var customIcons = {
      soccer: {
        icon: 'marker.png'
    }

    };
    
    //loading the map
    function load() {
      var map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: new google.maps.LatLng(43.7027608, -79.3641449),
        zoom: 10,
        mapTypeId: 'roadmap'
      });
      
      // new instance of the info window
      var infoWindow = new google.maps.InfoWindow;

      // Fetching the created XML File
      downloadUrl("allgamesinfo.php", function(data) {
        var xml = data.responseXML;
        
        //getting parent node from xml
        var markers = xml.documentElement.getElementsByTagName("marker");
        
        // looping trough the child elements of markers and set variables
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("location_name");
          var address = markers[i].getAttribute("address");
          var date = markers[i].getAttribute("gdate");
          var time = markers[i].getAttribute("gtime");
          var details = markers[i].getAttribute("details");
          
          // determinet time of markers
          var type = "soccer";
          
          //setting lon and lat for the markers
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lon")));
              
          // settin contento of infowindow including php snippet with potential link
          // creating an instance of the date object to format date and an array with the months.
          var month=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
          var d = new Date(date);
         
          
          // format of the information window (it can be cooler with CSS if we want to)
          var html = "<img src='footie_logo.png' /><p><b>Location: </b>" + name + "</p><p><b>Address: </b>" + address + "</p><p><b>" + month[d.getMonth()] + " " + date.split("-")[2] + ", " + d.getFullYear() + " at " + time.split(":")[0] + " : " + time.split(":")[1] + "</b></p><p>" + details + "</p>" + "<?php echo '<a href=\"#\">Join the game</a>' ?>";
          
          // get custom icon
          var icon = customIcons[type] || {};
          
          //display marker in selected location coming from DB
          var marker = new google.maps.Marker({
            map: map,
            animation: google.maps.Animation.DROP,
            position: point,
            icon: icon.icon
            
          });
          
          // create infowindow
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
    
    // ajax call
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
      
      // defaults from google maps
      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script>
  </head>
<body onload="load()">
		<input  type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
		<label for="drawer-toggle" id="drawer-toggle-label"></label>
		<header>
                    <a href="index.php"><img id="logo" src="Images/footie-logo.png" /></a>
			<nav id="main-nav">
				<ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a class="active" href="games.php">Games</a></li>
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
				<hr>
		    	<input id="reg" type="submit" value="Register">
			</form>
		</section>
		<div id="page-content">
                    <div id="main">
                        <div id="map-canvas"></div>
                        <ul id="createLink">
                            <li><a id="createBTN" href="create.php">Create a Game</a></li>
                        </ul>
                    </div>
		</div>
	</body>
</html>