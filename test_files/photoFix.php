
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
	
	searchResult();
	

function saveimage($rspcaIDNew, $imageNameNew, $imageDataNew) {
  // Connect AWS MYSQL Server
  require_once('../_php/connect.php');
  

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


  
function searchResult()
{
	// Connect AWS MYSQL Server
	require_once('../_php/connect.php');
  
	// UserID from session
//	$userID =  $_SESSION['userID'];
	$userID =  33;
  
	 // Get pet data for comparsion
	$query = "SELECT * ";
	$query .= "FROM userSearch ";
	$query .= "WHERE userID=".$userID;
	// $query .= "WHERE userID=33";
	
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
	
	while($row = mysqli_fetch_assoc($result)) {
      echo "<p>" . $row["adultsHome"] 
      . " " . $row["childrenHome"] 
      . " " . $row["howActive"]
      . " " . $row["howOftenHome"]
      . " " . $row["petGender"]
      . " " . $row["petSelection"]
      . " " . $row["petSize"]
      . " " . $row["petTemperament"]
      . "</p>";
		}
	// Please implement
	mysqli_close($connection);
}


 
  
  
?>



	</body>
</html>