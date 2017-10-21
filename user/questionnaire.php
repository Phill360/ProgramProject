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
  
</head>

<body>
<div ng-app="rzSliderDemo">
  <div ng-controller="MainCtrl" >

    <h2>Slider with ticks and values</h2>
    <rzslider rz-slider-model="slider_ticks_values.value" rz-slider-options="slider_ticks_values.options"></rzslider>

    
    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
      <div class="input-group">
        <!--<input id="value" type="text" class="form-control" name="value" required>-->
        <input id="value" type="text" ng-model="slider_ticks_values.value" name="value" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submitQuestionnaireBtn">Submit</button>
    </form>
    
    <h2>Range slider with ticks and values</h2>
    <rzslider rz-slider-model="range_slider_ticks_values.minValue" rz-slider-high="range_slider_ticks_values.maxValue" rz-slider-options="range_slider_ticks_values.options"></rzslider>

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
      showTicksValues: true
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
<script language='javascript'>
  function submitValues()
  {
    value = "test";
    jQuery.ajax({
      type: "POST",
      url: "$_SERVER['PHP_SELF']",
      data: value,
      success: function(msg) {
        alert("Data saved: " + msg);
      }
    });
  }
</script>

</body>
</html>