
<!-- Connect AWS MYSQL Server -->
<?php include_once('_php/connect.php');?>


<?php
if(is_post_request()) {
    
    $petName = $_POST['petName'] ?? '';
    $age = $_POST['age'] ?? '';
    $desexed = $_POST['desexed'] ?? '';
    $vaccinated = $_POST['vaccinated'] ?? '';
    
    echo "Petname is: " . $petName;
}
?>

<?php
	// 2. Perform Query
	$query = "SELECT * ";
	$query .= "FROM user ";
	$result = mysqli_query($connection, $query);
	// Test for query error
	if(!$result) {
		die("Database query failed.");
	}
?>


<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
