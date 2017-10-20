<!DOCTYPE html>
<html>
<head>
    <script scr="js/bootstrap-slider.js"></script>
    <script scr="js/bootstrap-slider.min.js"></script>
    <script scr="js/bootstrap.min.js"></script>
    <script src="js/jqueryslim.min.js"></script>
    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-slider.css" rel="stylesheet" />
    <link href="css/bootstrap-slider.min.css" rel="stylesheet" />

    <style>
        #ex1Slider .slider-selection {
            background: #BABABA;
        }
    </style>

    <script type='text/javascript'>
        $(document).ready(function () {
            $('#ex1').slider({
                formatter: function (value) {
                    return 'Current value: ' + value;
                }
            });
        });
    </script>
</head>

<body>
    <p>Test</p>
    <div class="container">
        <input id="ex1" data-slider-id='ex1Slider' data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14" />
        <script type="text/javascript">
            // With JQuery
            $('#ex1').slider({
                formatter: function (value) {
                    return 'Current value: ' + value;
                }
            });

        </script>
        <style type="text/css">
            #ex1Slider .slider-selection {
                background: #BABABA;
            }
        </style>
    </div>
</body>
</html>