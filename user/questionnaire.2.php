<?php
  
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.14.3/ui-bootstrap-tpls.js"></script>
<script src="https://rawgit.com/rzajac/angularjs-slider/master/dist/rzslider.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/rzslider.css">

<!-- Pet Companions CSS -->
<link rel="stylesheet" type="text/css" href="css/pcstyle.css">
  
</head>

<body>
  
  
  
<div ng-app="rzSliderDemo">
  <div ng-controller="MainCtrl" >
    
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="panel-heading">1. How many adults in your household?</div>
        <rzslider rz-slider-model="slider_ticks_values.value" rz-slider-options="slider_ticks_values.options"></rzslider>
        <p></p>
      </div>
    </div>
    
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="panel-heading">2. Any children younger than 6 years in the household?</div>
        <label class="switch">
          <input type="checkbox">
          <span class="slider round"></span>
        </label>
      </div>
    </div>
    
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="panel-heading">3. How active are you?</div>
        <rzslider rz-slider-model="slider_ticks_values.value" rz-slider-options="slider_ticks_values.options"></rzslider>
        <p></p>
      </div>
    </div>

    <h2>Range slider with ticks and values</h2>
    <rzslider rz-slider-model="range_slider_ticks_values.minValue" rz-slider-high="range_slider_ticks_values.maxValue" rz-slider-options="range_slider_ticks_values.options"></rzslider>
  

    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
      <div class="input-group">
        <input id="value" type="text" style="display: none;" ng-model="slider_ticks_values.value" name="value" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submitQuestionnaireBtn">Submit</button>
    </form>

  </div>
</div>

<div><br></div>

<script>
var app = angular.module('rzSliderDemo', ['rzModule', 'ui.bootstrap']);

app.controller('MainCtrl', function ($scope, $rootScope, $timeout, $modal) 
{
  //Slider with ticks and values
  $scope.slider_ticks_values = {
    value: 2,
    options: {
      ceil: 3,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Small'},
        {value: 2, legend: 'Medium'},
        {value: 3, legend: 'Large'}
      ]
    }
  };


  //Range slider with ticks and values
  $scope.range_slider_ticks_values = {
    minValue: 1,
    maxValue: 8,
    options: {
      ceil: 10,
      floor: 0,
      showTicksValues: true
    }
  };
});

</script>

</body>
</html>
