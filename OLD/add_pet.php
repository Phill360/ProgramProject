<?php

require_once('./functions.php');


// Connect AWS MYSQL Server
require_once('_php/connect.php');





 if(is_post_request()) {
    
    // $species = $_POST['species'];
    $rspcaID = $_POST['rspcaID'];
    $petName = $_POST['petName'];
    $gender = $_POST['gender'];
    $desexed = $_POST['desexed'];
    $vaccinated = $_POST['vaccinated'];
    $wormed = $_POST['wormed'];
    $heartworm = $_POST['heartworm'];
    $imagePath = $_POST['file'];
    // $species = $_POST[''];

  
		echo  $rspcaID . "<br />";
    	echo  $petname . "<br />";
		echo  $gender . "<br />";
		echo  $desexed . "<br />";
		echo  $vaccinated . "<br />";
		echo  $wormed . "<br />";
		echo  $heartworm . "<br />";
		echo  $imagePath . "<br />";
		



    
	// 2. Perform Query
	$query = "INSERT INTO animals ";
	$query .= "(rspcaID, petName, gender, desexed, vaccinated, wormed, heartworm, imagePath) ";
	$query .= "VALUES (";
	$query .= "'" . $rspcaID . "',";
	$query .= "'" . $petName . "',";
	$query .= "'" . $gender . "',";
	$query .= "'" . $desexed . "',";
	$query .= "'" . $vaccinated . "',";
	$query .= "'" . $wormed . "',";
	$query .= "'" . $heartworm . "',";
	$query .= "'" . $imagePath . "'";
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