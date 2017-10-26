<?php
  require_once('./_php/connect.php');
    
  $query = "SELECT * ";
	$query .= "FROM animals ";
  $result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
	  die("6. Database query failed.");
	}
	  
	$size = 0;
	  
	while ($row = mysqli_fetch_assoc($result))
	{
	  $size += 1;
	}

  mysqli_close($connection);
?>

<DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<p>The number of rows is: <?php echo($size);?></p>
</body>
  
</html>