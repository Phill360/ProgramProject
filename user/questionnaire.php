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

    <script type='text/javascript'>
        $(document).ready(function () {
            $('ex18-label-1').slider({
                formatter: function (value) {
                    return 'Current value: ' + value;
                }
            });
        });
    </script>
</head>

<body>
    <p>Test</p>
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
</body>
</html>