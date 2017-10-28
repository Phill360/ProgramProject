<?php
  //include_once('./common.php');
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
    
  //$result = fetchAnimalsFromDatabase($page1);
  $query = "SELECT * FROM animals LIMIT $page1,12"; 
	  $result = mysqli_query($connection, $query);
	  
	  // Test for query error
	  if(!$result) 
	  {
		  die("7. Database query failed.");
	  }
  
  
  
  
	
  // Fetch pets from the 'animals' table
  while($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans"><?php echo("RSPCA ID: ".$row["rspcaID"]); ?></div>
        </div>
        <div class="panel-body" style="min-height: 500; max-height: 500;">
          <div class="right">
            <a class="btn btn-default btn-lg" href="#"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
          </div>
          <div class="center">
            <br>
            <div class="holder">
              <?php displayimage('mark4'); ?>

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
      
  $result2 = numberAnimalsInDatabase();
	
	$size = 0;
	while ($row = mysqli_fetch_assoc($result2))
	{
	  $size += 1;
	}
	
	echo $size;
	
	$a = ceil($size/12); // Number of pages
    
    for ($b=1; $b<=$a; $b++)
    {
      ?><a href="index.php?page=<?php echo $b; ?>"><?php echo $b." "; ?></a><?php
    }    
  ?>
  
</div>
    <!-- /.container -->
    <div class="center">
    <nav>
      <ol class="pagination">
        <li><a href="#" aria-label="Previous">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#" aria-label="Next">&raquo;</a></li>
      </ol>
    </nav>
    </div>
</body>
  
</html>
