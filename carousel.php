<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://images.unsplash.com/photo-1501423186691-a865e4b25d01?dpr=1&auto=compress,format&fit=crop&w=1052&h=&q=80&cs=tinysrgb&crop=" alt="Image of woman holding a dog from behind" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://images.unsplash.com/photo-1496284427489-f59461d8a8e6?dpr=1&auto=compress,format&fit=crop&w=1050&h=&q=80&cs=tinysrgb&crop=" alt="Image of cat" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="https://images.unsplash.com/photo-1488569098285-adeecb95641f?dpr=1&auto=compress,format&fit=crop&w=1052&h=&q=80&cs=tinysrgb&crop=" alt="Image of dog" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container">
    <div class="col-sm-12">
      <!-- Create new admin user box -->
      <div class="panel panel-default">
        <div class="panel-body">
          <a href="admin_user.php">Admin</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
