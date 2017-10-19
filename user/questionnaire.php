<?php
?>

<!DOCTYPE html>
<html>
<head>
    <link href="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.js"></script>
    <style>
        #showcase {
            margin: 0 20px;
            text-align: center;
        }
        #range {
            height: 300px;
            margin: 0 auto 30px;
        }
        #value-span,
        #value-input {
            width: 50%;
            float: left;
            display: block;
            text-align: center;
            margin: 0;
        }
    </style>
</head>
<body>
  <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="opensans"><div class="black"><div class="textRegular">1. How many adults in the household?</div></div></div>
          <br>
          <div id="slider-step-numberAdults"></div>
          <br>
        </div>
    </div>
  </div>
</body>

<script>
    var range_all_sliders = {
	'1': [ 1 ],
	'2': [ 2 ],
	'3': [ 3 ]
};
    
    var stepSlider = document.getElementById('slider-step-numberAdults');

noUiSlider.create(stepSlider, {
	start: [ 1 ],
	step: 1,
	range: {
		'min': [ 1 ],
		'max': [ 3 ]
	}
    });
    
    var stepSliderValueElement = document.getElementById('slider-step-value');

stepSlider.noUiSlider.on('update', function( values, handle ) {
	stepSliderValueElement.innerHTML = values[handle];
});

</script>



</html>