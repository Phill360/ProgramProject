<?php
  /* Collect data from sliders  */
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);
  @$a1 = $request->a1;
  @$a2 = $request->a2;
  echo($a1);
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

    <h2>Range slider with ticks and values</h2>
    <rzslider rz-slider-model="range_slider_ticks_values.minValue" rz-slider-high="range_slider_ticks_values.maxValue" rz-slider-options="range_slider_ticks_values.options"></rzslider>
    
    <br>
    <button ng-click="sendValues()">Submit</button><br><span id="message"></span>
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
  
  $scope.sendValues = function () {
    document.getElementById("message").textContent = "";

    document.write("reaching");
    document.write($scope.slider_ticks_values.value);

    var request = $http({
      method: "post",
      url: "$_SERVER['PHP_SELF']",
      data: {
        a1: $scope.slider_ticks_values.value,
        a2: $scope.range_slider_ticks_values.maxValue
      },
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    });
    
    request.success(function(data) {
      document.getElementById("message").textContent = "You have successfully sent values "+data;  
    });
  };  
});
</script>

</body>
</html>