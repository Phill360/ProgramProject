<?php
?>

<!DOCTYPE html>
<html>
<head>
    <link href="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.js"></script>
    
    <link href="/nouislider/documentation/assets/base.css" rel="stylesheet">
	<link href="/nouislider/documentation/assets/prism.css" rel="stylesheet">
	

	<link href="/noUiSlider/distribute/nouislider.css?v=1000" rel="stylesheet">
	<script src="/noUiSlider/distribute/nouislider.js?v=1000"></script>
    
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
          
          <div id="slider-format"></div>
          <div id="input-format"></div>
          <br>
        </div>
    </div>
  </div>
</body>

<script>

src="wNumb.js"
  
var sliderFormat = document.getElementById('slider-format');

noUiSlider.create(sliderFormat, {
	start: [ 20 ],
	step: 10,
	range: {
		'min': [ 20 ],
		'max': [ 80 ]
	},
	format: {
	  to: function ( value ) {
		return value + ',-';
	  },
	  from: function ( value ) {
		return value.replace(',-', '');
	  }
	}
});

var inputFormat = document.getElementById('input-format');

sliderFormat.noUiSlider.on('update', function( values, handle ) {
	inputFormat.value = values[handle];
});

inputFormat.addEventListener('change', function(){
	sliderFormat.noUiSlider.set(this.value);
});
  
//   var stepSlider = document.getElementById('slider-step-numberAdults');

//   noUiSlider.create(stepSlider, {
//       start: [ 1 ],
//       step: 1,
//       range: {
//         'min': [ 1 ],
//   	  'max': [ 3 ]
//       }
//     });
    
//   var stepSliderValueElement = document.getElementById('slider-step-value');

//       stepSlider.noUiSlider.on('update', function( values, handle ) {
//   	  stepSliderValueElement.innerHTML = values[handle];
//       });

</script>



</html>