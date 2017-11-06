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
    $query .= "FROM animals as a ";
    $query .= "JOIN breed as b ON a.breedId = b.breedID ";
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
  
</head>

<body>
  <div><?php include 'header.php' ?></div>

  <div>
    <div>
  
      <div class="container">
        <div class="pets-container">
          <?php
            while($row = mysqli_fetch_assoc($result)) { ?>
          <div class="slackey"><div class="black"><div class="textxxMedium"> <?php echo $row["petName"]; ?> </div></div></div>
          
          <div class='pet-description'><p><?php echo $row["description"]; ?></p></div>
          
          <div class='pet-row'>
            <div class="pet-holder">
              <?php displayimage($row["rspcaID"]); ?>
            </div>
            
            <div>
              <table>
                <tr>
                  <th>RSPCA Shelter:</th>
                  <td></td>
                </tr>
                <tr>
                  <th>RSPCA ID:</th>
                  <td><?php echo "$petID" ?></td>
                </tr>
                <tr></tr>
                <tr>
                  <th>Age:</th>
                  <td><?php echo $row["age"]; ?></td>
                </tr>
                <tr>
                  <th>Adoption Fee:</th>
                  <td>$<?php echo $row["fee"]; ?></td>
                </tr>
                <tr>
                  <th>Desexed:</th>
                  <td>Yes</td>
                </tr>
                <tr>
                  <th>Vaccinated:</th>
                  <td>Yes</td>
                </tr>
                <tr>
                  <th>Wormed:</th>
                  <td>Yes</td>
                </tr>
                <tr>
                  <th>Heartworm Treated:</th>
                  <td>Yes</td>
                </tr>
              </table>
            </div>
            <div></div> <!-- PUT HEART THING HERE -->
          </div>
          
          <div class='clearfix'></div> <!-- clear divs floating left!! -->
\
          <div class='pet-row'>
            <div class='social-media' id='facebook'><p> FACEBOOK </p></div>
            <div class='social-media' id='twitter'><p> TWITTER </p></div>
            <div class='social-media' id='email'><p> EMAIL </p></div>
          </div>
          
        </div>
           <?php
  }
  ?>
    </div>
    
    <br><br> <!-- add whitespace to bottom of page -->
    
</div>
</div>
  
</body>
</html>