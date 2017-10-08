
<!-- Connect AWS MYSQL Server -->
<?php include_once('_php/connect.php');?>


<?php
if(is_post_request()) {
    
    $petName = $_POST['petName'] ?? '';
    $age = $_POST['age'] ?? '';
    $desexed = $_POST['desexed'] ?? '';
    $vaccinated = $_POST['vaccinated'] ?? '';
    
	// 2. Perform Query
	$query = "INSERT INTO test ";
	$query .= "(petName, agem desexed, vaccinated) ";
	$query .= "VALUES (";
	$query .= "'" . $petName . "',";
	$query .= "'" . $age . "',";
	$query .= "'" . $desexed . "',";
	$query .= "'" . $vaccinated . "',";
	$query .= ")";
	$result = mysqli_query($connection, $query);
	// Test for query error
	if($result) {
	    $new_id = mysqli_insert_id($connection)
	} else {
		echo mysqli_error($connection);
			mysqli_close($connection);
			exit;
?>


<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
