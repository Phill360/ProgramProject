<?php
// Fetching Values From URL
    echo "My first PHP script!";
    
    print("Connect is running");
    $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
    $port=3306;
    $socket="";
    $user="proProg";
    $password="pawprogramming";
    $dbname="pawCompanion";
    $connection = new mysqli($host, $user, $password, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());

$name = $_POST['name'];
$email = $_POST['email'];
$postcode = $_POST['postcode'];

$db = mysql_select_db($dbname, $connection); // Selecting Database
if (isset($_POST['Name'])) {
$query = mysql_query("insert into form_element(Name, Email, Postcode) values ('$name', '$email', '$postcode')"); //Insert Query
echo "Form Submitted succesfully";
}
mysql_close($connection); // Connection Closed
?>