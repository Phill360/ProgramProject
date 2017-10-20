<!DOCTYPE html>
<html>
<head>
    <script>
        $("#ex18a").slider({
	min: 0,
	max: 10,
	value: 5,
	labelledby: 'ex18-label-1'
});
$("#ex18b").slider({
	min: 0,
	max: 10,
	value: [3, 6],
	labelledby: ['ex18-label-2a', 'ex18-label-2b']
});
    </script>
    
</head>

<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="opensans"><div class="black"><div class="textRegular">1. How many adults in the household?</div></div></div>
          <br>
             <span id="ex18-label-1" class="hidden">Example slider label</span>
             <input id="ex19" type="text"
              data-provide="slider"
              data-slider-ticks="[1, 2, 3]"
              data-slider-ticks-labels='["short", "medium", "long"]'
              data-slider-min="1"
              data-slider-max="3"
              data-slider-step="1"
              data-slider-value="3"
              data-slider-tooltip="hide" />
          <br>
        </div>
    </div>
  </div>
</body>
</html>