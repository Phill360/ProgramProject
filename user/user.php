<?php
  include_once('./common.php');

  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  $email = $_SESSION['email'];
  
  /* Getting user's userID */
  
  // Perform quey
  $query = "SELECT * "; 
	$query .= "FROM user ";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result)
	{
		die("Get user ID database query failed.");
	}
	
	// Iterate through results to get the user ID 
	while ($row = mysqli_fetch_assoc($result))
	{
	  // Match email to a row
	  if ($row["email"] == $email)
	  {
	    $userID = $row["userID"];
    }
	}
	
	/* With the userID we now check if this user has visited the site previously. */
  
  // Perform new search
  $query = "SELECT * "; 
	$query .= "FROM userSearch ";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result)
	{
		$userTool = 'questionnaire.php'; // The userSearch table is empty
	}
	else
	{
	  // Iterate through results
	  while ($row = mysqli_fetch_assoc($result))
	  {
	    // Match user ID to a row
	    if ($row["userID"] == $userID)
	    {
	      $_POST['submit'] = 'matchesBtn';
      }
      else
      {
        $_POST['submit'] = 'questionnaireBtn';
      }
	  }  
	}
	
	

  if(isset($_POST['questionnaireBtn']))
  {
    $userTool = 'questionnaire';
  }

  if(isset($_POST['matchesBtn']))
  {
    $userTool = 'matches';
  }

  if(isset($_POST['favouritesBtn']))
  {
    $userTool = 'favourites';
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div class="container">
  <div class="slackey"><div class="black"><div class="textxxMedium">Welcome</div></div></div>
    <div>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="userToolSelectionForm">
        <button type="submit" class="btn" name="questionnaireBtn">Questionnaire</button>
        <button type="submit" class="btn" name="matchesBtn">Matches</button>
        <button type="submit" class="btn" name="favouritesBtn">Favourites</button>
      </form>
    </div>

  <?php 
    if ($userTool == 'questionnaire')
    {?>
      <div><?php include 'questionnaire.php' ?></div>
    <?php }
    else if ($userTool == 'matches')
    {?>
      <div><?php include 'matches.php' ?></div>
  <?php } 
    else if ($userTool == 'favourites')
    {?>
      <div><?php include 'favourites.php' ?></div>
  <?php } 
    else
    {?>
      <div><?php include 'matches.php' ?></div>
  <?php } ?>
</div>

</body>
</html>