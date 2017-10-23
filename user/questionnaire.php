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
          <div class="panel-heading">Any children younger than 6 years in the household?</div>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
      </div>
    
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">How active are you?</div>
          <rzslider rz-slider-model="sliderHowActive.value" rz-slider-options="sliderHowActive.options"></rzslider>
          <input id="howActive" type="text" style="display: none;" ng-model="sliderHowActive.value" name="howActive" required>
          <p></p>
        </div>
      </div>
    
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">How often are you home?</div>
          <rzslider rz-slider-model="sliderHowOftenHome.value" rz-slider-options="sliderHowOftenHome.options"></rzslider>
          <input id="oftenHome" type="text" style="display: none;" ng-model="sliderHowOftenHome.value" name="oftenHome" required>
          <p></p><br>
          <p></p>
        </div>
      </div>
      
      <!--<div class="panel panel-default">-->
      <!--  <div class="panel-body">-->
      <!--    <div class="panel-heading">What type of animal do you prefer?</div>-->
      <!--      <div class="row">-->
      <!--        <div class="col-md-6 col-md-offset-3">-->
      <!--          <div class="row">-->
      <!--  	        <div class="col-xs-4">-->
      <!--  		        <img src="media/cat.jpg" class="img-responsive img-radio">-->
      <!--  		        <button type="button" class="btn btn-primary btn-radio">Cat</button>-->
      <!--  	          <input type="checkbox" id="catItem" class="hidden" name="catItem">-->
      <!--  	        </div>-->
      <!--  	        <div class="col-xs-4">-->
      <!--  		        <img src="media/dog.jpg" class="img-responsive img-radio">-->
      <!--  		        <button type="button" class="btn btn-primary btn-radio">Dog</button>-->
      <!--  	          <input type="checkbox" id="dogItem" class="hidden" name="dogItem">-->
      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
      
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">What size pet would you like?</div>
          <rzslider rz-slider-model="sliderPetSize.value" rz-slider-options="sliderPetSize.options"></rzslider>
          <input id="petSize" type="text" style="display: none;" ng-model="sliderPetSize.value" name="petSize" required>
          <p></p><br>
          <p></p>
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
  $scope.sliderHowOftenHome = {
    value: 2,
    options: {
      ceil: 3,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Rarely'},
        {value: 2, legend: 'Inconsistent'},
        {value: 3, legend: 'Almost always'}
      ]
    }
  };
  
  //Slider with ticks and values
  $scope.sliderPetSize = {
    value: 2,
    options: {
      ceil: 3,
      floor: 1,
      showTicksValues: true,
      stepsArray: [
        {value: 1, legend: 'Mouse'},
        {value: 2, legend: 'Possum'},
        {value: 3, legend: 'Horse'}
      ]
    }
  };
  
});

$(function () {
    $('.btn-radio').click(function(e) {
        $('.btn-radio').not(this).removeClass('active')
    		.siblings('input').prop('checked',false)
            .siblings('.img-radio').css('opacity','0.5');
    	$(this).addClass('active')
            .siblings('input').prop('checked',true)
    		.siblings('.img-radio').css('opacity','1');
    });
    
});
</script>

</body>
</html>

