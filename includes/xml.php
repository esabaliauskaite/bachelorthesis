<?php

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a MySQL server

$connection=mysqli_connect("localhost" , "root", "Takiukas11" , "bakalauras");
if (!$connection) {  die('Not connected : ' . mysqli_error($connection));}

// Set the active MySQL database

$db_selected = mysqli_select_db($connection, "bakalauras");
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error($connection));
}

// Select all the rows in the markers table

$query = "SELECT * FROM zemelapis";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("ly", $row['ly']);
  $newnode->setAttribute("lcf", $row['lcf']);
  $newnode->setAttribute("pav_en", $row['pav_en']);
  $newnode->setAttribute("pav", $row['pav']);
  $newnode->setAttribute("longti", $row['longti']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("icon", $row['icon']);
  $newnode->setAttribute("adresas", $row['adresas']);
  $newnode->setAttribute("telnr", $row['telnr']);
  $newnode->setAttribute("web", $row['web']);
  $newnode->setAttribute("webc", $row['webc']);
  $newnode->setAttribute("aut", $row['aut']);
  $newnode->setAttribute("teis", $row['teis']);
  $newnode->setAttribute("photo", $row['photo']);
}

echo $dom->saveXML();

?>