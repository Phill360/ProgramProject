<?php
  require_once('./_php/connect.php');
  
    if (!isset($_GET['PetId'])) {
        die("You must specify a Pet ID");
    }
    else {
      // first store GET values in variables
      $petID = $_GET['PetId'];
    }
    
    // 2. Perform Query
    $query = "SELECT * ";
    $query .= "FROM animals ";
    $query .= "WHERE rspcaID = $petID";
    $result = mysqli_query($connection, $query);
    // Test for query error
    if(!$result) {
    	die("Database query failed.");
    }
?>

<!--<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- Page Content -->
<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Google services -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="979917733927-ucaoh1mmkqkmpp8oqfnonj45fjdcd7n4.apps.googleusercontent.com">
  
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="upload-image.js"></script>

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Slackey" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  
  <!-- Pet Companions CSS -->
  <link rel="stylesheet" type="text/css" href="pcstyle.css">
  
</head>

<body>
<div><?php include 'header.php' ?></div>

<div>
<div class="container">
<body>
  <div class="pets container">
  <div class="slackey"><div class="black"><div class="textxxMedium"> View Pet </div></div></div>
  <?php
    while($row = mysqli_fetch_assoc($result)) {
  ?>
          <!--<img src="media/ahmed-saffu-208365.jpg" alt "pet">-->
          <div>
            <hp> Name: <?php echo $row["petName"]; ?></hp>
            <p> Gender: <?php echo $row["gender"]; ?></p>
            <p> Age: <?php echo $row["age"]; ?></p>
            <p> Description: <?php echo $row["description"]; ?></p>
          </div>
  <?php
    }
  ?>
    </div>
</div>
  
</body>

  
</html>