
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
	
	// displayimage(2);
	

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
      echo "<p>" . "Adults Home: " . $row["adultsHome"] 
      . " " . "Children Home: " . $row["childrenHome"] 
      . " " . "How Active: " . $row["howActive"]
      . " " . "How often Home: " . $row["howOftenHome"]
      . " " . "Gender: " . $row["petGender"]
      . " " . "pet Selection: " . $row["petSelection"]
      . " " . "Size: " . $row["petSize"]
      . " " . "Temp: " . $row["petTemperament"]
      . "</p>";
      
      $adultsHome = $row["adultsHome"];
      $childrenHome = $row["childrenHome"];
      $howActive = $row["howActive"];
      $howOftenHome = $row["howOftenHome"];
      $petGender = $row["petGender"];
      $petSelection = $row["petSelection"];
      $petSize = $row["petSize"];
      $petTemperament = $row["petTemperament"];
      
	}
		
	echo "The amount of adults at home = " . $adultsHome . "<br>";
		
	if($adultsHome == 1 && $petSize > 3){
		$petSize = 3;
	}	

	if($childrenHome == 1){
		if($petSize > 3){
			$petSize = 3;
		}
		if($petTemperament > 2){
			$petTemperament = 2;
		}
	}
		
		echo "<p>" . $adultsHome 
      . " " . $childrenHome
      . " " . $howActive
      . " " . $howOftenHome
      . " " . $petGender
      . " " . $petSelection
      . " " . $petSize
      . " " . $petTemperament
      . "</p>";
		
		
		
		
	// Get pet data for comparsion
	$query = "SELECT animals.rspcaID, animals.petName, animals.gender, animals.age, breed.active, breed.type, breed.size, breed.temperament ";
	$query .= "FROM breed ";
	$query .= "INNER JOIN animals ";
	$query .= "ON animals.breedID=breed.breedID ";
	$query .= "WHERE breed.size=".$petSize;
	// $query .= "WHERE breed.size=\"medium\"";
	
		echo $query;
		
		
	$result = mysqli_query($connection, $query);
	
		while($row = mysqli_fetch_assoc($result)) {
  
      echo "<p>" . $row["petName"] . " " . $row["rspcaID"] . "</p>";
		}
		
		
		
		
		
		
		
		
		
	// Please implement
	mysqli_close($connection);
}


 function displayimage($rspcaID)
  {
		// Connect AWS MYSQL Server
    $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
    $port=3306;
    $socket="";
    $user="proProg";
    $DBpassword="pawprogramming";
    $dbname="pawCompanion";
    $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());

		$query = "select * from animals where rspcaID='".$rspcaID."'";
		$result=mysqli_query($connection,$query);
		
		// Test for query error
	  if(!$result)
	  {
		  echo('Could not get image');
	  }
		
		while ($row = mysqli_fetch_array($result)) 
		{
			echo '<img src="data:image;base64, '.$row['imageData']. ' ">';
		}
		mysqli_close($connection);
	}
	
  
  
?>



	</body>
</html>