
<html>
	
	<body>
		
		<form method="post" enctype="multipart/form-data">
		<br/>
		<input type="text" name="rspcaID" />
		<input type="file" name="image" />
		<br/><br/>
		<input type="submit" name="sumit" value="upload">
		</form>
	
<?php
		
			
	if(isset($_POST['sumit']))
	{
		if(getimagesize($_FILES['image']['tmp_name'])== FALSE)
	
		{
			echo "please select image.";
		}
		else
		{
			$id = $_POST['rspcaID'];
			$imageData = addslashes($_FILES['image']['tmp_name']);
			$imageName = addslashes($_FILES['image']['name']);
			$imageData = file_get_contents($imageData);
			$imageData = base64_encode($imageData);
			saveimage($id, $imageName, $imageData);
		}	
	}
	
	

function saveimage($rspcaIDNew, $imageNameNew, $imageDataNew) {
  // Connect AWS MYSQL Server
  require_once('../_php/connect.php');
  
 // // Does Pet already Exist
	// $query = "SELECT rspcaID  ";
	// $query .= "FROM animals ";
	// $query .= "WHERE rspcaID=";
	// $query .= "'" . $rspcaIDNew . "'";
	// $result = mysqli_query($connection, $query);
	// if(mysqli_num_rows($result) > 0){
	//   return;
	// }
	
	//$row
	
	// 2. Perform Query
	$query = "UPDATE animals SET imageName=\"". $imageNameNew ."\", imageData=\"". $imageDataNew ."\" WHERE rspcaID=".$rspcaIDNew;
	echo $query;
	$result = mysqli_query($connection, $query);
	
	// Test for query error
	if($result) {
	  $new_id = mysqli_insert_id($connection);

	} else {
		echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	mysqli_close($connection);
}





?>



	</body>
</html>


