<!DOCTYPE html PUBLIC>
<html lang="en">
  <title>Paw Companions Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Slackey">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
  <link rel="stylesheet" type="text/css" href="pcstyle.css">
</head>

<body>
<div class="container">

  <div class="jumbotron">
    <div class="slackey">Paw Companions</div>
    <h2 class="opensans">Administration</h2>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><h3 class="opensans">Create new admin user</h3></div>
        <div class="panel-body">
          <form>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <br>
            <div class="checkbox">
              <label><input type="checkbox" name="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading"><h3 class="opensans">Reset your password</h3></div>
        <div class="panel-body">
          <form>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="New password">
            </div>
            <br>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>  
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><h3 class="opensans">Add a pet</h3></div>
        <div class="panel-body">
          <form action="/action_page.php">
            
            <div class="form-group">
              <label for="age">Species:</label>
              <select class="form-control" id="species">
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>

            <div class="input-group">
              <span class="input-group-addon">Text</span>
                <input id="petID" type="text" class="form-control" name="petID" placeholder="Enter pet ID">
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon">Text</span>
                <input id="petName" type="text" class="form-control" name="petName" placeholder="Enter pet name">
            </div>
            <br>

            <div class="form-group">
              <label for="age">Gender:</label>
              <select class="form-control" id="age">
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="comment">Description:</label>
                <textarea class="form-control" rows="5" id="petDescription"></textarea>
            </div>           

            <div class="form-group">
              <label for="age">Age:</label>
              <select class="form-control" id="age">
                <option>Less than 1 year</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15 years or older</option>
                <option>Age unknown</option>
              </select>
            </div> 

            <div class="input-group">
              <span class="input-group-addon">Text</span>
                <input id="petFee" type="text" class="form-control" name="petFee" placeholder="Enter fee to adopt">
            </div>
            <br>

            <div class="checkbox">
              <label><input type="checkbox" value="">Desexed</label>
            </div>           
            <div class="checkbox">
              <label><input type="checkbox" value="">Vaccinated</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="">Wormed</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="">Heartworm treated</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="">Microchipped</label>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>