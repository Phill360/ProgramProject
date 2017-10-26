<?php 

header("content-type:image/jpeg");

  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  $name=$_GET['name'];
  
  // Does Pet alread Exist
	$query = "SELECT rspcaID  ";
	$query .= "FROM animals ";
	$query .= "WHERE rspcaID=";
	$query .= "'" . $name . "'";
	$result = mysqli_query($connection, $query);
  

  
  if($row = mysql_fetch_array($result))
  {
      $image_name=$row["imagePath"];
      $image_content=$row["imageData"];
  } else {
      echo "image not found";
  }
  
  echo $image;
  ?>