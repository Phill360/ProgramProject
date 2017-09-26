<?php
echo("<p>Connect is running</p>");
$host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
$port=3306;
$socket="";
$user="proProg";
$password="pawprogramming";
$dbname="pawCompanion";
$connection = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
?>