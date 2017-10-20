<!DOCTYPE html>
<html>
<head>
  <link href="css/pcstyle.css" rel="stylesheet" />
</head>

<body>
  <p>Test</p>
  
  <div id="slidecontainer">
    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
  </div>
  
  <rzslider rz-slider-model="slider.value"
          rz-slider-options="slider.options"></rzslider>



  <script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
    output.innerHTML = this.value;
    }
  </script>
  
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