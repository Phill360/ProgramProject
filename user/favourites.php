<?php
  include_once('./common.php');
?>

<DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="row">
  
  <?php
    
  // The $page variable stores the page number, i.e. which page the user is viewing, e.g. first, second, third page, etc. 
  $page = $_GET["page"]; // Get the page number from post. Page number is posted when the user clicks on pagination links bottom of page.
  
  if($page == "" || $page == "1") // If this is the first time or if the user has navigated back to the first page.
  {
    // The $offset variable stores the record number of the first pet displayed on each page, i.e. record 0, record 6, record 12, etc.
    $offset = 0; // The first page will begin with record 0.
  }
  else 
  {
    $offset = ($page*6)-6; // The second page will begin with record 6, third page will begin with record 12, etc.
  }
  
  // Get favourites from database
  $favourites = getFavourites(); // getFavourites returns the whole favourites table
  
  // Get animals from database
  $animals = getAnimals($offset); // Error 7 if cannot connect to database
  
  // Fetch pets from the 'animals' table
  while($row = mysqli_fetch_assoc($favourites)) 
  {
    // Find favourites belonging to current user
	  if ($row["userID"] == $_SESSION['userID']) // Iterate through table to find rows belonging to the user
	  {
	    $rspcaID = $row["animalID"]; // When found set animalID to the rspcaID 
	    $petName = getAnimalName($rspcaID);
	    $description = getAnimalDescription($rspcaID); ?>
	    
	    <!-- Now fetch animal from the animals table -->
	    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans"><?php echo("RSPCA ID: ".$rspcaID); ?></div>
        </div>
        <div class="panel-body" style="min-height: 450; max-height: 450;">
          <div class="right">
            <a class="btn btn-default btn-lg" href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>
          </div>
          <div class="center">
            <br>
            <div class="holder">
              <?php displayimage($rspcaID); ?>
            </div>
            <p></p><br>
            <div class="slackey"><div class="textxxMedium"><?php echo($petName); ?></div></div>
            <div class="opensans"><?php echo($description); ?></div>
            <?php echo "<a href='view.php?PetId={$rspcaID}'> More </a>"; ?>
          </div>
        </div>
      </div>
    </div> <?php 
	  } 
  }
  
  // Get number of favourites for user    

	while ($row = mysqli_fetch_assoc($favourites))
	{
	  $size += 1;
	}
	
	$a = ceil($size/6); // Number of pages
  ?>
  
</div>
    <!-- /.container -->
    <div class="center">
    <nav>
      <ol class="pagination">
        <?php if ($page > 1) 
        {?>
          <li><a href="index.php?page=<?php echo $page-1; ?>" aria-label="Next">&laquo;</a></li><?php
        }
        else
        {?>
          <li><a href="index.php?page=<?php echo $page; ?>" aria-label="Next">&laquo;</a></li><?php
        }?>
        <?php
        for ($b=1; $b<=$a; $b++)
        {
          ?><li><a href="index.php?page=<?php echo $b; ?>"><?php echo $b." "; ?></a></li><?php
        }?>
        <?php if ($page == "") 
        {?>
          <li><a href="index.php?page=<?php echo 2; ?>" aria-label="Next">&raquo;</a></li><?php
        }
        else if ($page < $a) 
        {?>
          <li><a href="index.php?page=<?php echo $page+1; ?>" aria-label="Next">&raquo;</a></li><?php
        }
        else
        {?>
          <li><a href="index.php?page=<?php echo $page; ?>" aria-label="Next">&raquo;</a></li><?php
        }?>
      </ol>
    </nav>
    </div>
</body>
<script>
// This function sends favourited animals in favourites table.
function unfavourite() 
{
  var parent = this.parentElement;

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '_php/unfav.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function () 
  {
    if(xhr.readyState == 4 && xhr.status == 200) 
    {
      var result = xhr.responseText;
      console.log('Result: ' + result);
    }
  };
  xhr.send("id=" + parent.id);
}
  
var buttons = document.getElementsByClassName("btn btn-default btn-lg");
for(i=0; i<buttons.length; i++)
{
  buttons.item(i).addEventListener("click", unfavourite);
}
</script>  
</html>
