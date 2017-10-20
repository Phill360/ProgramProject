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

    <style>
        #ex18-label-1.slider-selection {
            background: #BABABA;
        }
    </style>

    <script>
        // Instantiate a slider
var mySlider = $("input.slider").bootstrapSlider();
 
// Call a method on the slider
var value = mySlider.bootstrapSlider('getValue');
 
// For non-getter methods, you can chain together commands
    mySlider
        .bootstrapSlider('setValue', 5)
        .bootstrapSlider('setValue', 7);
    </script>
    
</head>

<body>
    <p>Test</p>
    <input
    type="text"
    name="somename"
    data-provide="slider"
    data-slider-ticks="[1, 2, 3]"
    data-slider-ticks-labels='["short", "medium", "long"]'
    data-slider-min="1"
    data-slider-max="3"
    data-slider-step="1"
    data-slider-value="3"
    data-slider-tooltip="hide"
>
</body>
</html>