<?php
  include_once('./common.php');
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
  <link rel="stylesheet" type="text/css" href="css/pcstyle.css">
  
  <style type="text/css">
  .pet-images {
    width: 80%;
    margin: auto;
    
  }
  
  #main-image {
    width: 60%;
  }
  
  #thumbImg {
    width: 10%;
  }
  
  .pet-description, .pet-details {
    background-color: rgba(125, 125, 125, .2);
    border-radius: 10px;
    padding: 2%;
  }
  
  .pet-description {
    float: left;
    width: 40%;
    margin: 1%;
    display: inline-block;
  }
  
  .pet-details {
    margin: 1% 1% 1% 42%;
  }
  
    
    
  </style>
  
</head>

<body>
<div><?php include 'header.php' ?></div>

<div>
<div class="container">
<body>
  <div class="pets container">
  <?php
    while($row = mysqli_fetch_assoc($result)) {
  ?>
          <div class="slackey"><div class="black"><div class="textxxMedium"> <?php echo $row["petName"]; ?> </div></div></div>
          <!--<img src="media/ahmed-saffu-208365png" alt "pet">-->
          <div class="pet-images">
            <table>
              <tr>
                <td rowspan='3'> <img src='media/baptist-standaert-346832.jpg' id='main-image'/> </td>
                <td>  <img src='media/bianka-csenki-260781.jpg' id='thumbImg'/> </td>
              </tr>
              <tr>
                <td> <img src='media/christopher-ayme-157131.jpg' id='thumbImg'/> </td>
              </tr>
              <tr>
                <td>  <img src='media/david-vazquez-364270.jpg' id='thumbImg'/> </td>
              </tr>
            </table>
          </div>
          <div class='pet-description'>
            <p> Description: <?php echo $row["description"]; ?></p>
          </div>
          <div class='pet-details'>
            <p> RSPCA shelter: </p>
            <p> RSPCA ID: </p>
            <br>
            <p> Age: </p>
            <p> Adoption Fee: </p>
            <p> Desexed: </p>
            <p> Vaccinated: </p>
            <p> Wormed: </p>
            <p> Heartworm Treated: </p>
            
          </div>
  <?php
    }
  ?>
    </div>
</div>
  
</body>

  
</html>