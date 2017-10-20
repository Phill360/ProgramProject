<!DOCTYPE html>
<html>
<head>
    <script scr="bootstrap-slider.js"></script>
    <script src="bootstrap-slider.min.js"></script>

    <link rel="stylesheet" type="text/css" href="bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-slider.min.css">
    
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
    
</head>

<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="opensans"><div class="black"><div class="textRegular">1. How many adults in the household?</div></div></div>
          <br>
             <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
          <br>
        </div>
    </div>
  </div>
</body>
</html>