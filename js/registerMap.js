$(document).ready(function () {
    // Form to force user to pick a location first
    $('#form').hide();

    // initializing markers
    var markers = [];
    // new Google map starts with the Toronto Coordinates, zoom 10
    var myLatlng = new google.maps.LatLng(43.7027608, -79.3641449);
    var mapOptions = {
        zoom: 10,
        center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    google.maps.event.addListenerOnce(map, 'idle', function () {
        // Create the search box and link it to the UI element.

        var input = /** @type {HTMLInputElement} */(
                document.getElementById('pac-input'));
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // dinamically created search box. Ony allows searches in Canada
        var searchBox = new google.maps.places.Autocomplete(
                /** @type {HTMLInputElement} */(input), {componentRestrictions: {country: 'ca'}});



        // initialize places variable
        var place = null;

        // [START region_getplaces]
        // Listen for the event fired when the user selects an item from the
        // pick list. Retrieve the matching places for that item.
        google.maps.event.addListener(searchBox, 'place_changed', function () {
            place = searchBox.getPlace();


            var image = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
                map: map,
                icon: image,
                animation: google.maps.Animation.DROP,
                title: place.name,
                position: place.geometry.location
            });

            markers.push(marker);
            map.setCenter(new google.maps.LatLng(place.geometry.location.k, place.geometry.location.D));
            map.setZoom(15);
            //bounds.extend(place.geometry.location);
            //console.log(place)

            // Display Send button when address is picked and message
            $('#form').show();
            
            //Message
            $('#results').html('If this location is correct, please fill the form. If not, do another search')
            
            // map.fitBounds(bounds);
        });
        $('#send').click(function () {

            // Getting postal code from formatted string


            // retrieving Address, Latitude, Longitude information coming from Google Maps
            var addString = place.formatted_address;

            var nameVenue = place.name;

            var longitude = place.geometry.location.D;

            var latitude = place.geometry.location.k;

            var date = $("#date").val();

            var time = $("#time").val();

            var details = $("#details").val();


            // Checks if the form is not empty
            if (nameVenue.length > 0 && details.length > 0 && time.length > 0 && date.length > 0 && addString.length > 0) {
                
                // if everything is fine, runs the AJAX  method
                $.ajax({
                    type: "POST",
                    url: "processinfo.php",
                    data: {address: addString, latitude: latitude, longitude: longitude, venueName: nameVenue, zoom: 5, date: date, time: time, details: details},
                    success: function (data) {

                        $('#results').html(data);
                    },
                    error: function () {
                        $('#results').html('Ajax Call failed');
                    }
                });

            } else {
                
                // if not, display this message.
                $('#results').html("Please complete the form");
            }

        });

        
    });



});
