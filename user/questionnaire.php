<!DOCTYPE html>
<html>
<head>
    <script>
     // With JQuery
$('#ex1').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});
    </script>
    
    <style>
        #ex1Slider .slider-selection {
	background: #BABABA;
}
    </style>
    
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