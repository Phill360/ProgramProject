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
-->

<!-- Connect AWS MYSQL Server -->
<?php include_once('../_php/connect.php');?>






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

<!--test 1 -->
	<body>
		<h1>All Favourites stored in Database</h1>
		
		<p><a href="../index2.php">Site page</a></p>
		<p><a href="./test_files/allFavourites.php">All Pets</a></p>

	
		<h2>Favourites Table<h2>
		<table >
			<tr>
				<th>ID</th>
				<th>userID</th>
				<th>animalID</th>
			</tr>
			<?php
			// 2. Perform Query
			$query = "SELECT * ";
			$query .= "FROM favourites ";
			$result = mysqli_query($connection, $query);
			// Test for query error
			if(!$result) {
				die("Database query failed.");
			}
				// 3. returned data
				while($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row["ID"] ; ?> </td>
				<td><?php echo $row["userID"] ; ?>	</td>
				<td><?php echo $row["animalID"] ; ?>	</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>