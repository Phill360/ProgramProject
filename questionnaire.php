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
    <div class="slackey"><div class="black"><div class="textxxMedium">Welcome admin user</div></div></div>
    <div id="slider-step"></div>
  </div>
</body>

<script>
    var stepSlider = document.getElementById('slider-step');

noUiSlider.create(stepSlider, {
	start: [ 4000 ],
	step: 1000,
	range: {
		'min': [  2000 ],
		'max': [ 10000 ]
	}
    });
    
    var stepSliderValueElement = document.getElementById('slider-step-value');

    stepSlider.noUiSlider.on('update', function( values, handle ) {
	stepSliderValueElement.innerHTML = values[handle];
    });
</script>


<script>
    var range = document.getElementById('range');

    noUiSlider.create(range, {
        start: [ 20, 80 ], // Handle start position
        step: 10, // Slider moves in increments of '10'
        margin: 20, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        direction: 'rtl', // Put '0' at the bottom of the slider
        orientation: 'vertical', // Orient the slider vertically
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 100
        },
        pips: { // Show a scale with the slider
            mode: 'steps',
            density: 2
        }
    });

    var valueInput = document.getElementById('value-input'),
            valueSpan = document.getElementById('value-span');

    // When the slider value changes, update the input and span
    range.noUiSlider.on('update', function( values, handle ) {
        if ( handle ) {
            valueInput.value = values[handle];
        } else {
            valueSpan.innerHTML = values[handle];
        }
    });

    // When the input changes, set the slider value
    valueInput.addEventListener('change', function(){
        range.noUiSlider.set([null, this.value]);
    });
</script>
</html>