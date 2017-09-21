<?php
$host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
$port=3306;
$socket="";
$user="proProg";
$password="pawprogramming";
$dbname="pawCompanion";
$connection = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
?>


<?php
	// 2. Perform Query
	$query = "SELECT * ";
	$query .= "FROM user ";
	$result = mysqli_query($connection, $query);
	// Test for query error
	if(!$result) {
		die("Databse query failed.");
	}
?>



<!DOCTYPE html PUBLIC>
<html lang="en">
	<head>
		<title>AWS Test</title>
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