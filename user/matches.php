<?php
  require_once('./_php/connect.php');
  
  $query = "SELECT COUNT(*) "; //
	$query .= "FROM animals ";
	$result = mysqli_query($connection, $query);
	// Test for query error
	if(!$result) {
		die("Database query failed.");
	}
  $row = $result->fetch_assoc();
  $number = $row['petCount'];

$result->close();
	// Test for query error
	if(!$result) {
		die("Database query failed.");
	}
?>

<DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<p>The number of rows is: <?php echo($number);?></p>
</body>
  
</html>