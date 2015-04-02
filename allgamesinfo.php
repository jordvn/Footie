<?php

// Creating XML file from database

include 'myDB.php';


// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server
$dbcon = myDB::getDB();


// Select all the rows in the maps table

$sql = "SELECT * FROM game_location WHERE 1";
$result = $dbcon->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

  foreach($result as $rows){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("location_name", $rows['location_name']);
  $newnode->setAttribute("address", $rows['address']);
  $newnode->setAttribute("gdate", $rows['gdate']);
  $newnode->setAttribute("gtime", $rows['gtime']);
  $newnode->setAttribute("details", $rows['details']);
  $newnode->setAttribute("lat", $rows['lat']);
  $newnode->setAttribute("lon", $rows['lon']);
  

  }

  // saves as an XML
echo $dom->saveXML();

