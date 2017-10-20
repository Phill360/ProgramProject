<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.14.3/ui-bootstrap-tpls.js"></script>
<script src="https://rawgit.com/rzajac/angularjs-slider/master/dist/rzslider.js"></script>

<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/rzslider.css">
  

<style>
/** {*/
/*    margin: 0;*/
/*    padding: 0;*/
/*}*/

/*.wrapper {*/
/*    background: #fff;*/
/*    padding: 40px;*/
/*}*/
/*.article {*/
/*    margin-bottom: 10px;*/
/*}*/
.tab-pane {
    padding-top: 10px;
}
/*.field-title {*/
/*    width: 100px;*/
/*}*/

</style>
</head>

<body>
<div ng-app="rzSliderDemo">
  <div ng-controller="MainCtrl" class="wrapper">
    <article>
      <h2>Slider with ticks and values</h2>
      <rzslider rz-slider-model="slider_ticks_values.value" rz-slider-options="slider_ticks_values.options"></rzslider>
    </article>

    <article>
      <h2>Range slider with ticks and values</h2>
      <rzslider rz-slider-model="range_slider_ticks_values.minValue" rz-slider-high="range_slider_ticks_values.maxValue" rz-slider-options="range_slider_ticks_values.options"></rzslider>
    </article>

    <script type="text/ng-template" id="sliderModal.html">
    <div class = "modal-body"> 
      <div class = "container-fluid"> 
        <div class = "row"> 
          <div class = "col-md-6 col-lg-6"> 
            <label class = "control-label"> Normal slider into modal </label>
            <rzslider rz-slider-model="percentages.normal.low" rz-slider-options="percentages.normal.options"></rzslider> 
          </div>
        </div> 
        <div class = "row"> 
          <div class = " col-md-6 col-lg-6"> 
            <label class = "control-label"> Range slider into modal </label>
            <rzslider rz-slider-model="percentages.range.low" rz-slider-high="percentages.range.high" rz-slider-options="percentages.range.options"></rzslider> 
          </div>
        </div> 
      </div>
    </script>
  </div>
</div>

<script>
var app = angular.module('rzSliderDemo', ['rzModule', 'ui.bootstrap']);

app.controller('MainCtrl', function ($scope, $rootScope, $timeout, $modal) 
{
  //Slider with ticks and values
  $scope.slider_ticks_values = {
    value: 5,
    options: {
      ceil: 10,
      floor: 0,
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

</body>
</html>