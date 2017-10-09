<?php

require_once('./functions.php');


// Connect AWS MYSQL Server
require_once('_php/connect.php');





 if(is_post_request()) {
    
    $petname = $_POST['petname'];
    $sex = $_POST['sex'];
    $desexed = $_POST['desexed'];
    $vaccinated = $_POST['vaccinated'];

    	echo "The pet name is: " . $petname . "<br />";
		echo "The pet name is: " . $sex . "<br />";
		//echo "The pet name is: " . $desexed . "<br />";


    
	// 2. Perform Query
	$query = "INSERT INTO test ";
	$query .= "(petName, sex, desexed, vaccinated) ";
	$query .= "VALUES (";
	$query .= "'" . $petname . "',";
	$query .= "'" . $sex . "',";
	$query .= "'" . $desexed . "',";
	$query .= "'" . $vaccinated . "'";
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
