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
  
<div ng-app="questionnaire">
  <div ng-controller="MainCtrl" >
    
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="panel-heading">1. How many adults in your household?</div>
        <rzslider rz-slider-model="sliderNumberAdults.value" rz-slider-options="sliderNumberAdults.options"></rzslider>
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
        <rzslider rz-slider-model="sliderHowActive.value" rz-slider-options="sliderHowActive.options"></rzslider>
        <p></p>
      </div>
    </div>
    
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="panel-heading">4. How often are you home?</div>
        <rzslider rz-slider-model="sliderHowLongLeftAlone.value" rz-slider-options="sliderHowLongLeftAlone.options"></rzslider>
        <p></p>
      </div>
    </div>

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
var app = angular.module('questionnaire', ['rzModule', 'ui.bootstrap']);

app.controller('MainCtrl', function ($scope, $rootScope, $timeout, $modal) 
{
  //Slider with ticks and values
  $scope.sliderNumberAdults = {
    value: 2,
    options: {
      ceil: 3,
      floor: 1,
      showTicksValues: true
    }
  };
  
  //Slider with ticks and values
  $scope.sliderHowActive = {
    value: 2,
    options: {
      ceil: 3,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Lazy'},
        {value: 2, legend: 'Average'},
        {value: 3, legend: 'Active'}
      ]
    }
  };
  
  //Slider with ticks and values
  $scope.sliderHowLongLeftAlone = {
    value: 2,
    options: {
      ceil: 3,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Rarely'},
        {value: 2, legend: 'Inconsistent'},
        {value: 3, legend: 'Often'}
      ]
    }
  };
  
});

</script>

</body>
</html>

