<?php
// Simon's DB
include 'myDB.php';

// connection string
$conn = myDB::getDB();

// if Ajax call brings all the info
if(!empty($_POST['address']) && !empty($_POST['longitude']) & !empty($_POST['latitude']) & !empty($_POST['venueName']) & !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['details']) && !empty($_POST['zoom'])){
    
    // set values
    $address = $_POST['address'];
    $long = $_POST['longitude'];
    $lat = $_POST['latitude'];
    $venueName = $_POST['venueName'];
    $zoom = $_POST['zoom'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $details = $_POST['details'];


    
    // SQL QUERY
    $query = "INSERT INTO game_location
            (location_name, address, lat, lon, zoom, gdate, gtime, details)
          VALUES
            ('$venueName','$address', '$lat', '$long', '$zoom', '$date', '$time', '$details')";
    
    //EXECUTE QUERY
    $execute = $conn->exec($query);
    
    
    // this returns message for the success box in ajax
    if($execute > 0){
     
        // IF more than 0 rows have been inserted, sucess!
    echo 'Game location has been saved in database';

                
    } else {
        
        // If not, we get a Zero in the project
        echo 'Oops there is a problem, please contact the admins of the site';
    }
}

