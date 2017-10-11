<?php
    //print("Connect is running");
    $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
    $port=3306;
    $socket="";
    $user="proProg";
    $DBpassword="pawprogramming";
    $dbname="pawCompanion";
    $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());
?>