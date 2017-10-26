<?php 

header("content-type:image/jpeg");

  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  $name=$_GET['name'];
  
  $select_image="SELECT * FROM animals WHERE rspcaID='$name'";
  
  $var=mysql_query($select_image);
  
  if($row=mysql_fetch_array($var))
  {
      $image_name=$row["imagePath"];
      $image_content=$row["imageData"];
  }
  
  echo $image;
  ?>