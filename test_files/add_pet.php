<?php

require_once('../common.php');


// Connect AWS MYSQL Server
require_once('../_php/connect.php');





 if(is_post_request()) {
    
    
    $rspcaID = $_POST['rspcaID'];
    $petName = $_POST['petName'];
    $breedID = $_POST['breedID'];
    $gender = $_POST['gender'];
    $imagePath = $_POST['file'];
    $description = $_POST['$escription'];
  
    // $species = $_POST[''];

  
		echo  $rspcaID . "<br />";
    	echo  $breedID . "<br />";
    	echo  $petname . "<br />";
		echo  $gender . "<br />";
		echo  $imagePath . "<br />";
		echo  $description . "<br />";
		



    
	// 2. Perform Query
	$query = "INSERT INTO animals ";
	$query .= "(rspcaID, petName, breedID, gender, imagePath, description) ";
	$query .= "VALUES (";
	$query .= "'" . $rspcaID . "',";
	$query .= "'" . $petName . "',";
	$query .= "'" . $breedID . "',";
	$query .= "'" . $gender . "',";
	$query .= "'" . $imagePath . "',";
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