<?php

require_once('../common.php');


// Connect AWS MYSQL Server
require_once('../_php/connect.php');





 if(is_post_request()) {
    
    
    $rspcaID = $_POST['rspcaID'];
    $petName = $_POST['petName'];
    $breedID = $_POST['breedID'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $imagePath = $_POST['file'];
    $description = $_POST['description'];
  

  
		echo  "rspca - " . $rspcaID . "<br />";
    	echo  "breed ID - " . $breedID . "<br />";
    	echo  "pet name - " . $petName . "<br />";
		echo  "Gender - " . $gender . "<br />";
		echo  "Image path - " . $imagePath . "<br />";
		echo  "Description - " . $description . "<br />";
		echo  "Age - " . $age . "<br />";
		



    
	// 2. Perform Query
	$query = "INSERT INTO animals ";
	$query .= "(rspcaID, petName, breedID, gender, imagePath, age, description) ";
	$query .= "VALUES (";
	$query .= "'" . $rspcaID . "',";
	$query .= "'" . $petName . "',";
	$query .= "'" . $breedID . "',";
	$query .= "'" . $gender . "',";
	$query .= "'" . $imagePath . "',";
	$query .= "'" . $age . "',";
	$query .= "'" . $description . "'";
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