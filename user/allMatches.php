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
    
  $page = $_GET["page"];
  if($page == "" || $page == "1")
  {
    $page1 = 0;
  }
  else 
  {
    $page1 = ($page*12)-12;
  }
  
  $result = getLimitedNumberOfAnimalsFromDatabase($page1); // Error 7 if cannot connect to database
  
  // Fetch pets from the 'animals' table
  while($row = mysqli_fetch_assoc($result)) {
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
                <?php displayimage($row["rspcaID"]); ?>
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
      
  $result2 = getAnimalsFromDatabase();
	
	// Count number of animals in database
	$size = 0;
	while ($row = mysqli_fetch_assoc($result2))
	{
	  $size += 1;
	}
	
	$a = ceil($size/12); // Number of pages
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
