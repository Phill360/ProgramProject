
<html>
	
	<body>
		
	<form method="post" enctype="multipart/form-data">
	<br/>
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
					$imagePath = addslashes($_FILES['image']['name']);
					$imageData = file_get_contents($imageData);
					$imageData = base64_encode($imageData);
					saveimage(999, 999, 5, $age, 'male', $imagePath, 'test', $imageData);
				}	

		  }
		  displayimage(999);
		  function saveimage($rspcaID, $petName, $breedID, $age, $gender, $imagePath, $description, $imageData)
		  {
			    // Connect AWS MYSQL Server
                require_once('./_php/connect.php');
				// $qry="insert into images (name, image) value ('$name', '$image')";
				
					// 2. Perform Query
            	$query = "INSERT INTO animals ";
            	$query .= "(rspcaID, petName, breedID, gender, imagePath, age, description, imageData) ";
            	$query .= "VALUES (";
            	$query .= "'" . $rspcaID . "',";
            	$query .= "'" . $petName . "',";
            	$query .= "'" . $breedID . "',";
            	$query .= "'" . $gender . "',";
            	$query .= "'" . $imagePath . "',";
            	$query .= "'" . $age . "',";
            	$query .= "'" . $description . "',";
            	$query .= "'" . $imageData . "'";
            	$query .= ")";
            	$result = mysqli_query($connection, $query);
				
				
				
				// $result=mysql_query($qry,$con);
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

		  //*********** Show
		  function displayimage($rspcaID)
		  {
		        // Connect AWS MYSQL Server
                require_once('./_php/connect.php');
			
			echo "$rspcaID";
			
				$qry = "select * from animals where rspcaID='".$rspcaID."'";
				$result=mysqli_query($connection,$qry);
				while ($row = mysqli_fetch_array($result)) 
				{
					echo '<img height="300" width="300" src="data:image;base64, '.$row['imageData']. ' ">';
				}
				mysqli_close($connection);
		  }
	?>

	</body>
</html>







