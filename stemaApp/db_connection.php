<?php
function OpenCon()
 {

$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "stema";
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 };
 return $conn;
 }
 $conn= OpenCon();
 ?>
