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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/rzslider.css">

<!-- Pet Companions CSS -->
<link rel="stylesheet" type="text/css" href="css/pcstyle.css">
  
</head>

<body>
  
<div ng-app="questionnaire">
  <div ng-controller="MainCtrl" >
    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
      
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">How many adults in your household?</div>
          <rzslider rz-slider-model="sliderNumberAdults.value" rz-slider-options="sliderNumberAdults.options"></rzslider>
          <input id="adultsHome" type="text" style="display: none;" ng-model="sliderNumberAdults.value" name="adultsHome" required>
        </div>
      </div>
    
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
            <div class="funkyradio-primary">
              <input type="checkbox" name="checkbox" id="checkbox2" checked/>
              <label for="checkbox2">I/We have children under 6 years of age.</label>
            </div>
          </div>
        </div>
      </div>
    
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">How active are you?</div>
          <rzslider rz-slider-model="sliderHowActive.value" rz-slider-options="sliderHowActive.options"></rzslider>
          <input id="howActive" type="text" style="display: none;" ng-model="sliderHowActive.value" name="howActive" required>
          <p></p><br>
          <p></p>
        </div>
      </div>
    
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">How often are you home?</div>
          <rzslider rz-slider-model="sliderHowOftenHome.value" rz-slider-options="sliderHowOftenHome.options"></rzslider>
          <input id="howOftenHome" type="text" style="display: none;" ng-model="sliderHowOftenHome.value" name="howOftenHome" required>
          <p></p><br>
          <p></p>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">What type of animal do you prefer?</div>
          <div class="button-center">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-md btn-primary active">
                <input type="radio" name="petSelection" id="petSelection" value=1 autocomplete="off" checked> Cat
              </label>
              <label class="btn btn-md btn-primary">
                <input type="radio" name="petSelection" id="petSelection" value=2 autocomplete="off"> Dog
              </label>
              <label class="btn btn-md btn-primary">
                <input type="radio" name="petSelection" id="petSelection" value=3 autocomplete="off"> Don't care
              </label>
            </div>  
          </div>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">What size pet would you like?</div>
          <rzslider rz-slider-model="sliderPetSize.value" rz-slider-options="sliderPetSize.options"></rzslider>
          <input id="petSize" type="text" style="display: none;" ng-model="sliderPetSize.value" name="petSize" required>
          <p></p><br>
          <p></p><br>
          <p></p>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">Choose the temperament you are looking for in a pet:</div>
          <rzslider rz-slider-model="sliderPetTemperament.value" rz-slider-options="sliderPetTemperament.options"></rzslider>
          <input id="petTemperament" type="text" style="display: none;" ng-model="sliderPetTemperament.value" name="petTemperament" required>
          <p></p><br>
          <p></p><br>
          <p></p>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">Gender preference?</div>
          <div class="button-center">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-md btn-primary active">
                <input type="radio" name="petGender" id="petGender" value=1 autocomplete="off" checked> Female
              </label>
              <label class="btn btn-md btn-primary">
                <input type="radio" name="petGender" id="petGender" value=2 autocomplete="off"> Male
              </label>
              <label class="btn btn-md btn-primary">
                <input type="radio" name="petGender" id="petGender" value=3 autocomplete="off"> Don't care
              </label>
            </div>
          </div>
        </div>
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
    value: 3,
    options: {
      ceil: 5,
      floor: 1,
      showTicksValues: true
    }
  };
  
  //Slider with ticks and values
  $scope.sliderHowActive = {
    value: 3,
    options: {
      ceil: 5,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Lazy'},
        {value: 2, legend: ''},
        {value: 3, legend: 'Average'},
        {value: 4, legend: ''},
        {value: 5, legend: 'Very Active'}
      ]
    }
  };
  
  //Slider with ticks and values
  $scope.sliderHowOftenHome = {
    value: 3,
    options: {
      ceil: 5,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Rarely'},
        {value: 2, legend: ''},
        {value: 3, legend: 'Inconsistent'},
        {value: 4, legend: ''},
        {value: 5, legend: 'Almost always'}
      ]
    }
  };
  
  //Slider with ticks and values
  $scope.sliderPetSize = {
    value: 3,
    options: {
      ceil: 5,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Mouse (extra small)'},
        {value: 2, legend: ''},
        {value: 3, legend: 'Possum (medium)'},
        {value: 4, legend: ''},
        {value: 5, legend: 'Horse (giant)'}
      ]
    }
  };
  
  //Slider with ticks and values
  $scope.sliderPetTemperament = {
    value: 2,
    options: {
      ceil: 3,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Princess (loves attention)'},
        {value: 2, legend: 'Zen (relaxed)'},
        {value: 3, legend: 'Usain Bolt (active)'}
      ]
    }
  };
  
});

$(function() {
    $('#search').on('keyup', function() {
        var pattern = $(this).val();
        $('.searchable-container .items').hide();
        $('.searchable-container .items').filter(function() {
            return $(this).text().match(new RegExp(pattern, 'i'));
        }).show();
    });
});
</script>

</body>
</html>