<?php
  require_once('./_php/connect.php');
  
  // 2. Perform Query
	$query = "SELECT * ";
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

<!-- Page Content -->
    <div class="container">

<body>
  <div class="pets container">
  <?php
    while($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <img src="media/ahmed-saffu-208365.jpg" alt "pet">
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <h3><?php echo $row["petName"]; ?></h3>
            <p><?php echo $row["description"]; ?></p>
            <a class="btn btn-success" href="#">More</a>
          </div>
        </div>
      </div>
  <?php
    }
  ?>
  </div>

  <div class="pets container">
  <h3>Your Companions</h3>
    <div class="row">
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <img src="media/ahmed-saffu-208365.jpg" alt "pet">
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <H3>Suzie</H3>
            <p>Some text about this awesome kitty</p>
            <a class="btn btn-success" href="#">More</a>
          </div>
        </div>
      </div>    
    
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <img src="media/ahmed-saffu-208365.jpg" alt "pet">
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <H3>Suzie</H3>
            <p>Some text about this awesome kitty</p>
            <a class="btn btn-success" href="#">More</a>
          </div>
        </div>
      </div>  
      
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <img src="media/ahmed-saffu-208365.jpg" alt "pet">
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <H3>Suzie</H3>
            <p>Some text about this awesome kitty</p>
            <a class="btn btn-success" href="#">More</a>
          </div>
        </div>
      </div>
      
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <img src="media/ahmed-saffu-208365.jpg" alt "pet">
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <H3>Suzie</H3>
            <p>Some text about this awesome kitty</p>
            <a class="btn btn-success" href="#">More</a>
          </div>
        </div>
      </div>
      
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <img src="media/ahmed-saffu-208365.jpg" alt "pet">
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <H3>Suzie</H3>
            <p>Some text about this awesome kitty</p>
            <a class="btn btn-success" href="#">More</a>
          </div>
        </div>
      </div>
      
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <img src="media/ahmed-saffu-208365.jpg" alt "pet">
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <H3>Suzie</H3>
            <p>Some text about this awesome kitty</p>
            <a class="btn btn-success" href="#">More</a>
          </div>
        </div>
      </div>

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
