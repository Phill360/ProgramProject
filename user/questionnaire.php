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
        $('.slider').slider()
        
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
    <p>Test</p>
    <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
</body>
</html>