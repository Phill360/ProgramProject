<!DOCTYPE html>
<html>
<head>
    <script scr="js/bootstrap.min.js"></script>
    <script scr="js/bootstrap-slider.js"></script>
    <script scr="js/bootstrap-slider.min.js"></script>
    <script src="js/highlight.min.js"></script>
    <script src="js/jqueryslim.js"></script>
    <script src="js/jqueryslim.min.js"></script>
    <script src="js/modernizr.js"></script>
    
    <!--<link href="css/bootstrap.min.css" rel="stylesheet" />-->
    <link href="css/bootstrap-slider.css" rel="stylesheet" />
    <link href="css/bootstrap-slider.min.css" rel="stylesheet" />
    <link href="css/highlightjs-github-theme.css" rel="stylesheet" />
    <link href="css/pcstyle.css" rel="stylesheet" />
    

    <style>
        #ex18-label-1.slider-selection {
            background: #BABABA;
        }
    </style>
    
</head>

<body>
  <p>Test</p>
  
  <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
  
  <div id="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
  </div>

<script>
       // With JQuery
$('#ex1').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});

// Without JQuery
var slider = new Slider('#ex1', {
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});
    </script>


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