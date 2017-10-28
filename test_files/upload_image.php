
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
		    $imageData = addslashes($_FILES['image']['tmp_name']);
		    $imageName = addslashes($_FILES['image']['name']);
			$imageData = file_get_contents($imageData);
			$imageData = base64_encode($imageData);
			saveimage('testing', 'testing', 5, $age, 'male', $imageName, 'test', $imageData);
		}	
	}

		  function saveimage($rspcaID, $petName, $breedID, $age, $gender, $imageName, $description, $imageData)
		  {
			    // Connect AWS MYSQL Server
                require_once('../_php/connect.php');
			
					// 2. Perform Query
            	$query = "INSERT INTO animals ";
            	$query .= "(rspcaID, petName, breedID, gender, imagePath, age, description, imageData) ";
            	$query .= "VALUES (";
            	$query .= "'" . $rspcaID . "',";
            	$query .= "'" . $petName . "',";
            	$query .= "'" . $breedID . "',";
            	$query .= "'" . $gender . "',";
            	$query .= "'" . $imageName . "',";
            	$query .= "'" . $age . "',";
            	$query .= "'" . $description . "',";
            	$query .= "'" . $imageData . "'";
            	$query .= ")";
            	$result = mysqli_query($connection, $query);
				
				
				

				if($result)
					{
					   echo "<br/> image uploaded";
			    	}
			    	else
			    	{
					   echo "<br/> image not uploaded";
				    }
				mysqli_close($connection);
		  }

		 
	
	
	
	
	?>
	
	
	
	

	</body>
</html>







