<?php
$dbServername="localhost";
$dbUsername="id13785926_root";
$dbPassword="p2NCVNiFa/i1S1e!";
$dbName="id13785926_bakalauras";

$conn= mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>