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


  <script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
    output.innerHTML = this.value;
    }
  </script>
</body>
</html>