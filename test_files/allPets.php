<!-- Heroku Website address 
    https://stark-citadel-72039.herokuapp.com/

    **** Commands for updating git and pushing to Heroku ****
    Add all files to git
        git add .
    
    Commit files to GitHub
        git commit -am " COMMENT ON CHANGES THAT WERE MADE "

    Push all files to GitHub
        git push

    Push all files to Heroku to update site 
        git push heroku master
-->git 

<!-- Connect AWS MYSQL Server -->
<?php include_once('../_php/connect.php');?>


<?php
	// 2. Perform Query
	$query = "SELECT * ";
	$query .= "FROM animals ";
	$result = mysqli_query($connection, $query);
	// Test for query error
	if(!$result) {
		die("Database query failed.");
	}
?>



<!DOCTYPE html PUBLIC>
<html lang="en">
	<head>
		<title>AWS Test___</title>
	</head>


	<style>

	table {
		width: 100%;
	}

	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	</style>


	<body>
		<h1>All Pets stored in Database</h1>
		
		<p><a href="index2.php">Site page</a></p>
		<p><a href="./test_files/allPets.php">All Pets</a></p>
		<p><a href="./admin_user.php">Add Pets</a></p>
	
		<h2>Pets Table<h2>
		<table >
			<tr>
				<th>rspacaID</th>
				<th>petName</th>
				<th>breedID</th>
				<th>gender</th>
				<th>desexed</th>
				<th>vaccinated</th>
				<th>wormed</th>
				<th>heartworm</th>
				<th>imagepath</th>
			</tr>
			<?php
				// 3. returned data
				while($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row["rspcaID"] ; ?> </td>
				<td><?php echo $row["petName"] ; ?>	</td>
				<td><?php echo $row["breedID"] ; ?>	</td>
					<td><?php echo $row["gender"] ; ?> </td>
				<td><?php echo $row["desexed"] ; ?>	</td>
				<td><?php echo $row["vaccinated"] ; ?>	</td>
					<td><?php echo $row["wormed"] ; ?> </td>
				<td><?php echo $row["heartworm"] ; ?>	</td>
				<td><?php echo $row["imagePath"] ; ?>	</td>
			</tr>
			<?php
				}
			?>
			
		</table>
	</body>
</html>


<?php
	// 5. Close database connection
	mysqli_close($connection);
?>