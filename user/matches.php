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
  
  // The $beginRecord variable stores the record number of the first pet displayed on each page, i.e. record 0, record 12, record 24, etc. 
  
  if($page == "" || $page == "1") // If this is the first time or if the user has navigated back to the first page.
  {
    $beginRecord = 0; // The first page will begin with record 0.
  }
  else 
  {
    $beginRecord = ($page*12)-12; // The second page will begin with record 12, third page will begin with record 24, etc.
  }
  
  // $result = getLimitedNumberOfAnimalsFromDatabase($page1); // The function returns 12 records.
  
  $result = searchResult(); // Presently this function returns all records from animals table. Need to limit this to 12.
  
  // searchResult() needs to return: rspcaID, petName, and description. 
  
  while($row = mysqli_fetch_assoc($result)) // Now iterate through result to display records across and down the screen according to the Bootstrap grid.
  {
  ?>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="opensans"><?php echo("RSPCA ID: ".$row["rspcaID"]); ?></div>
          </div>
          <div class="panel-body" style="min-height: 450; max-height: 450;">
            <div id=<?php echo($row["rspcaID"]); ?> class="right">
              <button class="btn btn-default btn-lg"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></button>
            </div>
            <div class="center">
              <br>
              <div class="holder">
                <?php displayImage($row["rspcaID"]); ?>
              </div>
              <p></p><br>
              <div class="slackey"><div class="textxxMedium"><?php echo $row["petName"]; ?></div></div>
              <div class="opensans"><?php echo $row["description"]; ?></div> 
              <?php echo "<a href='view.php?PetId={$row['rspcaID']}'> More </a>"; ?>
            </div>
          </div>
        </div>
    </div>
  <?php
  }
      
  $size = getNumberOfAnimals(); // Get the number of animals in the database.
	
	$a = ceil($size/12); // The number of animals ($size) divided by 12 will tell us how many pages there will be.
  ?>
  
</div>
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
function favourite() 
{
  var parent = this.parentElement;

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '_php/fav.php', true);
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
  buttons.item(i).addEventListener("click", favourite);
}
</script>
</html>
