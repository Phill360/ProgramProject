
<!-- Connect AWS MYSQL Server -->
<?php include_once('_php/connect.php');?>


<?php
//login or Logout
if (count($_POST) > 0) {
	{
		// If something has been posted to Login
		if (isset($_POST['petName'])) {
		//	$comp = login($_POST['petName']);
		}
	}
}




function login($filename, $email, $password) {
	$lines = file($filename);
	$headings = array();
	$user = array();
}
?>

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
		<title>Pet</title>
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
		<p>Bash Script Worked! - Updated again</p>
		<a href="index2.php">Site page</a>
		
		
		
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
			
				<td><?php echo $_POST['petName'] ; ?>	</td>
		
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
