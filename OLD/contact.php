<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>About & Contact</title>
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
  
  <style>
     	.bg-2 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  	}
  	 .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
    .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
    
  </style>
  
</head>
<body>

<div class="container">
<!-- First Container -->
<div class="container-fluid bg-2 text-center">
  <h2 class="margin">About Us</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
</div>

<!-- Second Container (Grid) -->

<div class="container-fluid bg-grey">
  <h2 class="text-center">Contact Us</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
 </div>
  </div>
</div>
</div>

</body>
</html>
