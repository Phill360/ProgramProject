<?php
  require_once('./_php/connect.php');
  
  // 2. Perform Query
	$query = "SELECT * "; //
	$query .= "FROM animals ";
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

<body>

  <?php
    // While loop fetches pets from the 'animals' table
    while($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="col-xs-6 col-sm-4">
        <!--<div class="panel panel-default">-->
        <!--  <div class="panel-heading">-->
        <!--    <div class="opensans"><?php echo $row["petName"]; ?></div>-->
        <!--  </div>-->
        <!--  <div class="panel-body">-->
            <div class="thumbnail">
              <div class="caption">
                <div class="right">
                  <a class="btn btn-default btn-lg" href="#">
                  <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
                  <br><br>
                  <div class="holder">
                    <img src="<?php echo $row["imagePath"]; ?>" alt "pet">
                  </div>
                  </button>
                </div>
                <p><?php echo $row["description"]; ?></p>
                <?php echo "<a href='view.php?PetId={$row['rspcaID']}'> More </a>"; ?>
              </div>
            </div>
        <!--  </div>-->
        <!--</div>-->
      </div>
  <?php
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
