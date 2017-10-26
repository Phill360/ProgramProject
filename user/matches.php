<?php
  require_once('./_php/connect.php');
  
  $result = $mysqli->query("SELECT COUNT(*) AS petCount FROM animals");
  $row = $result->fetch_assoc();
  echo $row['petCount']." pets.";

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
<p>The number of rows is: <?php echo($result);?></p>
</body>
  
</html>