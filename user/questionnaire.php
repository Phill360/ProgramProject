<!DOCTYPE html>
<html>
<head>
  <link href="css/pcstyle.css" rel="stylesheet" />
  
  <link href="css/rzslider.css" rel="stylesheet" />
  <link href="css/rzslider.min.css" rel="stylesheet" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  
  <script src="rzslider.js"></script>
  <script src="rzslider.min.js"></script>
</head>

<body>
  
 
  <div ng-app="">
      <p>Input something in the input box:</p>
<p>Name : <input type="text" ng-model="name" placeholder="Enter name here"></p>
<h1>Hello {{name}}</h1>
      
  <rzslider rz-slider-model="slider.value" rz-slider-options="slider.options"></rzslider>
  </div>



  
  
  <script>
      $scope.slider = {
  value: 5,
  options: {
    showTicksValues: true,
    stepsArray: [
      {value: 1, legend: 'Very poor'},
      {value: 2},
      {value: 3, legend: 'Fair'},
      {value: 4},
      {value: 5, legend: 'Average'},
      {value: 6},
      {value: 7, legend: 'Good'},
      {value: 8},
      {value: 9, legend: 'Excellent'}
    ]
  }
};
  </script>
</body>
</html>