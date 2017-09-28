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
<?php include_once('_php/connect.php');?>


<?php
	// 2. Perform Query
	$query = "SELECT * ";
	$query .= "FROM user ";
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
		<h1> Paw Companion Test </h1>
		
		
		<p>Phill</p>
		<p>Git Test</p>
		<p>Mark - Yay, this worked! </p>
		<p>Bash Script Worked</p>
		
		
		
		<h2>User Table<h2>
		<table >
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Postcode</th>
			</tr>
			<?php
				// 3. returned data
				while($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row["first_name"] . " ";
				echo $row["last_name"]; ?>	</td>
				<td><?php echo $row["email"] ; ?>	</td>
				<td><?php echo $row["postcode"] ; ?>	</td>
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