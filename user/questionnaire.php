<!DOCTYPE html>
<html>
<head>
    <script scr="bootstrap-slider.js"></script>
    
    <link href="bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap-slider.css" rel="stylesheet" />
<style>
        #ex1Slider .slider-selection {
            background: #BABABA;
        }
    </style>
    <script src="Scripts/jquery-1.9.1.js"></script>
    <script src="Scripts/bootstrap-slider.js"></script>

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
    <div class="well">
        <input id="ex1" data-slider-id='ex1Slider' type="text"
            data-slider-min="-5" data-slider-max="20"
            data-slider-step="1" data-slider-value="14" />
    </div>
</body>
</html>