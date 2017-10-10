<?php

require_once('./functions.php');


// Connect AWS MYSQL Server
require_once('_php/connect.php');

echo "hello there";



 if(is_post_request()) {
    
    // $species = $_POST['species'];
    $species = $_POST['species'];
    $breedName = $_POST['breedName'];
    $breedSize = $_POST['breedSize'];
    $temperament = $_POST['temperament'];
    $active = $_POST['active'];


    
	// 2. Perform Query
	$query = "INSERT INTO breed ";
	$query .= "(type, name, size, temperament, active) ";
	$query .= "VALUES (";
	$query .= "'" . $species . "',";
	$query .= "'" . $breedName . "',";
	$query .= "'" . $breedSize . "',";
	$query .= "'" . $temperament . "',";
	$query .= "'" . $active . "'";
	$query .= ")";
	$result = mysqli_query($connection, $query);
	// Test for query error
	if($result) {
	    $new_id = mysqli_insert_id($connection);
	} else {
		echo mysqli_error($connection);
			mysqli_close($connection);
			exit;
	}


} else {
	// Redirect to another page if it is not a POST request
}



	// 5. Close database connection
	mysqli_close($connection);
?>