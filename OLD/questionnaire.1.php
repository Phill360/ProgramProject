<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.14.3/ui-bootstrap-tpls.js"></script>
<script src="https://rawgit.com/rzajac/angularjs-slider/master/dist/rzslider.js"></script>

<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/rzslider.css">
  

<style>
* {
    margin: 0;
    padding: 0;
}
body {
    font-family:'Open Sans', sans-serif;
    color: #1f2636;
    font-size: 14px;
    padding-bottom: 40px;
}
header {
    background: #0db9f0;
    color: #fff;
    margin: -40px;
    margin-bottom: 40px;
    text-align: center;
    padding: 40px 0;
}
h1 {
    font-weight: 300;
}
h2 {
    margin-bottom:10px;
}
.wrapper {
    background: #fff;
    padding: 40px;
}
article {
    margin-bottom: 10px;
}
.tab-pane {
    padding-top: 10px;
}
.field-title {
    width: 100px;
}
.vertical-sliders {
    margin: 0;
}
.vertical-sliders > div {
    height: 250px;
}
</style>
</head>

<body>
<div ng-app="rzSliderDemo">
    <div ng-controller="MainCtrl" class="wrapper">
        <header>
             <h1>AngularJS Touch Slider</h1>

        </header>
        <article>
             <h2>Simple slider</h2>
Model:
            <input type="number" ng-model="minSlider.value" />
            <br/>
            <rzslider rz-slider-model="minSlider.value"></rzslider>
        </article>
        <article>
             <h2>Range slider</h2>
Min Value:
            <input type="number" ng-model="minRangeSlider.minValue" />
            <br/>Max Value:
            <input type="number" ng-model="minRangeSlider.maxValue" />
            <br/>
            <rzslider rz-slider-model="minRangeSlider.minValue" rz-slider-high="minRangeSlider.maxValue" rz-slider-options="minRangeSlider.options"></rzslider>
        </article>
        <article>
             <h2>Slider with visible selection bar</h2>

            <rzslider rz-slider-model="slider_visible_bar.value" rz-slider-options="slider_visible_bar.options"></rzslider>
        </article>
        
      <article>
        <h2>Slider with dynamic selection bar colors</h2>
        <rzslider
          rz-slider-model="color_slider_bar.value"
          rz-slider-options="color_slider_bar.options"
        ></rzslider>
      </article>
  
        <article>
             <h2>Slider with custom floor/ceil/step</h2>

            <rzslider rz-slider-model="slider_floor_ceil.value" rz-slider-options="slider_floor_ceil.options"></rzslider>
        </article>
        <article>
             <h2>Slider with callbacks on start, change and end</h2>

            <p>Value linked on start: {{ otherData.start }}</p>
            <p>Value linked on change: {{ otherData.change }}</p>
            <p>Value linked on end: {{ otherData.end }}</p>
            <rzslider rz-slider-model="slider_callbacks.value" rz-slider-options="slider_callbacks.options"></rzslider>
        </article>
        <article>
             <h2>Slider with custom display function</h2>

            <rzslider rz-slider-model="slider_translate.minValue" rz-slider-high="slider_translate.maxValue" rz-slider-options="slider_translate.options"></rzslider>
        </article>
        <article>
             <h2>Slider with Alphabet</h2>

            <rzslider rz-slider-model="slider_alphabet.value" rz-slider-options="slider_alphabet.options"></rzslider>
        </article>
        <article>
             <h2>Slider with ticks</h2>

            <rzslider rz-slider-model="slider_ticks.value" rz-slider-options="slider_ticks.options"></rzslider>
        </article>
        <article>
             <h2>Slider with ticks and values</h2>

            <rzslider rz-slider-model="slider_ticks_values.value" rz-slider-options="slider_ticks_values.options"></rzslider>
        </article>
        <article>
             <h2>Slider with ticks and values and tooltip</h2>

            <rzslider rz-slider-model="slider_ticks_values_tooltip.value" rz-slider-options="slider_ticks_values_tooltip.options"></rzslider>
        </article>
        <article>
             <h2>Range slider with ticks and values</h2>

            <rzslider rz-slider-model="range_slider_ticks_values.minValue" rz-slider-high="range_slider_ticks_values.maxValue" rz-slider-options="range_slider_ticks_values.options"></rzslider>
        </article>
        <article>
             <h2>Slider with draggable range</h2>

            <rzslider rz-slider-model="slider_draggable_range.minValue" rz-slider-high="slider_draggable_range.maxValue" rz-slider-options="slider_draggable_range.options"></rzslider>
        </article>
        <article>
          <h2>Slider with draggable range only</h2>
          <rzslider
            rz-slider-model="slider_draggable_range_only.minValue"
            rz-slider-high="slider_draggable_range_only.maxValue"
            rz-slider-options="slider_draggable_range_only.options"
          ></rzslider>
        </article>
        <article>
    <h2>Vertical sliders</h2>
    <div class="row vertical-sliders" style="margin: 20px;">
      <div class="col-md-2">
        <rzslider rz-slider-model="verticalSlider1.value" rz-slider-options="verticalSlider1.options"></rzslider>
      </div>
      <div class="col-md-2">
        <rzslider rz-slider-model="verticalSlider2.minValue" rz-slider-high="verticalSlider2.maxValue"
                  rz-slider-options="verticalSlider2.options"></rzslider>
      </div>
      <div class="col-md-2">
        <rzslider rz-slider-model="verticalSlider3.value" rz-slider-options="verticalSlider3.options"></rzslider>
      </div>
      <div class="col-md-2">
        <rzslider rz-slider-model="verticalSlider4.minValue" rz-slider-high="verticalSlider4.maxValue"
                  rz-slider-options="verticalSlider4.options"></rzslider>
      </div>
      <div class="col-md-2">
        <rzslider rz-slider-model="verticalSlider5.value" rz-slider-options="verticalSlider5.options"></rzslider>
      </div>
      <div class="col-md-2">
        <rzslider rz-slider-model="verticalSlider6.value" rz-slider-options="verticalSlider6.options"></rzslider>
      </div>
    </div>
  </article>
        <article>
             <h2>Disabled slider</h2>

            <label>Disabled
                <input type="checkbox" ng-model="disabled_slider.options.disabled">
            </label>
            <rzslider rz-slider-model="disabled_slider.value" rz-slider-options="disabled_slider.options"></rzslider>
        </article>
        <article>
             <h2>Read-only slider</h2>

            <label>Read-only
                <input type="checkbox" ng-model="read_only_slider.options.readOnly">
            </label>
            <rzslider rz-slider-model="read_only_slider.value" rz-slider-options="read_only_slider.options"></rzslider>
        </article>
        <article>
             <h2>Toggle slider example</h2>

            <button ng-click="toggle()">{{ visible ? 'Hide' : 'Show' }}</button>
            <br/>
            <div ng-show="visible">
                <rzslider rz-slider-model="slider_toggle.value" rz-slider-options="slider_toggle.options"></rzslider>
            </div>
        </article>
        <article>
             <h2>Sliders inside a modal</h2>
Normal slider value: {{percentages.normal.low}}%</br>Range slider values: {{percentages.range.low}}% and {{percentages.range.high}}%</br>
            <button type="button" ng-click="openModal()" class="btn btn-default btn-lg">Open Modal!</button>
        </article>
        <article>
             <h2>Sliders inside tabs</h2>

            <p>Price 1: {{tabSliders.slider1.value}}</p>
            <p>Price 2: {{tabSliders.slider2.value}}</p>
            <tabset>
                <tab heading="Slider 1" select="refreshSlider()">
                    <rzslider rz-slider-model="tabSliders.slider1.value"></rzslider>
                </tab>
                <tab heading="Slider 2" select="refreshSlider()">
                    <rzslider rz-slider-model="tabSliders.slider2.value"></rzslider>
                </tab>
            </tabset>
        </article>
        <article>
             <h2>Slider with all options demo</h2>

            <div class="row all-options">
                <div class="col-md-4">
                    <label class="field-title">Min Value:</label>
                    <input type="number" ng-model="slider_all_options.minValue" />
                    <br/>
                    <label class="field-title">
                        <input type="checkbox" ng-click="toggleHighValue()">Max Value:</label>
                    <input type="number" ng-model="slider_all_options.maxValue" ng-disabled="slider_all_options.maxValue == null" />
                    <br/>
                    <label class="field-title">Floor:</label>
                    <input type="number" ng-model="slider_all_options.options.floor" />
                    <br/>
                    <label class="field-title">Ceil:</label>
                    <input type="number" ng-model="slider_all_options.options.ceil" />
                    <br/>
                </div>
                <div class="col-md-4">
                    <label class="field-title">Step:</label>
                    <input type="number" ng-model="slider_all_options.options.step" />
                    <br/>
                    <label class="field-title">Precision:</label>
                    <input type="number" ng-model="slider_all_options.options.precision" />
                    <br/>
                    <label>Hide limits
                        <input type="checkbox" ng-model="slider_all_options.options.hideLimitLabels">
                    </label>
                    <br/>
                    <label>Draggable range
                        <input type="checkbox" ng-model="slider_all_options.options.draggableRange">
                    </label>
                </div>
                <div class="col-md-4">
                    <label>Show ticks
                        <input type="checkbox" ng-model="slider_all_options.options.showTicks">
                    </label>
                    <br/>
                    <label>Show ticks values
                        <input type="checkbox" ng-model="slider_all_options.options.showTicksValues">
                    </label>
                    <br/>
                    <label>Disabled
                        <input type="checkbox" ng-model="slider_all_options.options.disabled">
                    </label>
                    <br/>
                    <label>Read-Only
                        <input type="checkbox" ng-model="slider_all_options.options.readOnly">
                    </label>
                </div>
            </div>
            <rzslider rz-slider-model="slider_all_options.minValue" rz-slider-high="slider_all_options.maxValue" rz-slider-options="slider_all_options.options"></rzslider>
        </article>
        <script type="text/ng-template" id="sliderModal.html">
            <div class = "modal-body"> <div class = "container-fluid"> <div class = "row"> <div class = "col-md-12 col-lg-12"> <label class = "control-label"> Normal slider into modal </label>
        <rzslider
          rz-slider-model="percentages.normal.low"
          rz-slider-options="percentages.normal.options">
        </rzslider> </div>
    </div> <div class = "row"> <div class = " col-md-12 col-lg-12"> <label class = "control-label"> Range slider into modal </label>
        <rzslider
          rz-slider-model="percentages.range.low"
          rz-slider-high="percentages.range.high"
          rz-slider-options="percentages.range.options">
        </rzslider> </div>
    </div> <div class = "row"> <div class = "col-lg-12"> <button type = "button"
            ng-click="ok()"
            class="btn btn-primary"> Save </button>
        <button type="button" ng-click="cancel()" class="btn btn-default">Cancel</button> </div>
    </div> </div>
</div>
        </script>
    </div>
</div>

<script>
    var app = angular.module('rzSliderDemo', ['rzModule', 'ui.bootstrap']);

app.controller('MainCtrl', function ($scope, $rootScope, $timeout, $modal) {
    //Minimal slider config
    $scope.minSlider = {
        value: 10
    };

    //Slider with selection bar
    $scope.slider_visible_bar = {
        value: 10,
        options: {
            showSelectionBar: true
        }
    };

    //Range slider config
    $scope.minRangeSlider = {
        minValue: 10,
        maxValue: 90,
        options: {
            floor: 0,
            ceil: 100,
            step: 1
        }
    };
    
    //Slider with selection bar
    $scope.color_slider_bar = {
      value: 12,
      options: {
        showSelectionBar: true,
        getSelectionBarColor: function(value) {
          if (value <= 3)
            return 'red';
          if (value <= 6)
            return 'orange';
          if (value <= 9)
            return 'yellow';
          return '#2AE02A';
        }
      }
    };

    //Slider config with floor, ceil and step
    $scope.slider_floor_ceil = {
        value: 12,
        options: {
            floor: 10,
            ceil: 100,
            step: 5
        }
    };

    //Slider config with callbacks
    $scope.slider_callbacks = {
        value: 100,
        options: {
            onStart: function () {
                $scope.otherData.start = $scope.slider_callbacks.value * 10;
            },
            onChange: function () {
                $scope.otherData.change = $scope.slider_callbacks.value * 10;
            },
            onEnd: function () {
                $scope.otherData.end = $scope.slider_callbacks.value * 10;
            }
        }
    };
    $scope.otherData = {
        start: 0,
        change: 0,
        end: 0
    };

    //Slider config with custom display function
    $scope.slider_translate = {
        minValue: 100,
        maxValue: 400,
        options: {
            ceil: 500,
            floor: 0,
            translate: function (value) {
                return '$' + value;
            }
        }
    };

    //Slider config with steps array of letters
    $scope.slider_alphabet = {
        value: 0,
        options: {
            stepsArray: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('')
        }
    };

    //Slider with ticks
    $scope.slider_ticks = {
        value: 5,
        options: {
            ceil: 10,
            floor: 0,
            showTicks: true
        }
    };

    //Slider with ticks and values
    $scope.slider_ticks_values = {
        value: 5,
        options: {
            ceil: 10,
            floor: 0,
            showTicksValues: true
        }
    };

    //Slider with ticks and values and tooltip
    $scope.slider_ticks_values_tooltip = {
        value: 5,
        options: {
            ceil: 10,
            floor: 0,
            showTicksValues: true,
            ticksValuesTooltip: function (v) {
                return 'Tooltip for ' + v;
            }
        }
    };

    //Range slider with ticks and values
    $scope.range_slider_ticks_values = {
        minValue: 1,
        maxValue: 8,
        options: {
            ceil: 10,
            floor: 0,
            showTicksValues: true
        }
    };

    //Slider with draggable range
    $scope.slider_draggable_range = {
        minValue: 1,
        maxValue: 8,
        options: {
            ceil: 10,
            floor: 0,
            draggableRange: true
        }
    };
    
    //Slider with draggable range only
    $scope.slider_draggable_range_only = {
      minValue: 4,
      maxValue: 6,
      options: {
        ceil: 10,
        floor: 0,
        draggableRangeOnly: true
      }
    };

    //Vertical sliders
    $scope.verticalSlider1 = {
        value: 0,
        options: {
            floor: 0,
            ceil: 10,
            vertical: true
        }
    };
    $scope.verticalSlider2 = {
        minValue: 20,
        maxValue: 80,
        options: {
            floor: 0,
            ceil: 100,
            vertical: true
        }
    };
    $scope.verticalSlider3 = {
        value: 5,
        options: {
            floor: 0,
            ceil: 10,
            vertical: true,
            showTicks: true
        }
    };
    $scope.verticalSlider4 = {
        minValue: 1,
        maxValue: 5,
        options: {
            floor: 0,
            ceil: 6,
            vertical: true,
            showTicksValues: true
        }
    };
    $scope.verticalSlider5 = {
        value: 50,
        options: {
            floor: 0,
            ceil: 100,
            vertical: true,
            showSelectionBar: true
        }
    };
    $scope.verticalSlider6 = {
        value: 6,
        options: {
            floor: 0,
            ceil: 6,
            vertical: true,
            showSelectionBar: true,
            showTicksValues: true,
            ticksValuesTooltip: function (v) {
                return 'Tooltip for ' + v;
            }
        }
    };

    //Read-only slider
    $scope.read_only_slider = {
        value: 50,
        options: {
            ceil: 100,
            floor: 0,
            readOnly: true
        }
    };

    //Disabled slider
    $scope.disabled_slider = {
        value: 50,
        options: {
            ceil: 100,
            floor: 0,
            disabled: true
        }
    };

    // Slider inside ng-show
    $scope.visible = false;
    $scope.slider_toggle = {
        value: 5,
        options: {
            ceil: 10,
            floor: 0
        }
    };
    $scope.toggle = function () {
        $scope.visible = !$scope.visible;
        $timeout(function () {
            $scope.$broadcast('rzSliderForceRender');
        });
    };

    //Slider inside modal
    $scope.percentages = {
        normal: {
            low: 15
        },
        range: {
            low: 10,
            high: 50
        }
    };
    $scope.openModal = function () {
        var modalInstance = $modal.open({
            templateUrl: 'sliderModal.html',
            controller: function ($scope, $modalInstance, values) {
                $scope.percentages = JSON.parse(JSON.stringify(values)); //Copy of the object in order to keep original values in $scope.percentages in parent controller.


                var formatToPercentage = function (value) {
                    return value + '%';
                };

                $scope.percentages.normal.options = {
                    floor: 0,
                    ceil: 100,
                    translate: formatToPercentage,
                    showSelectionBar: true
                };
                $scope.percentages.range.options = {
                    floor: 0,
                    ceil: 100,
                    translate: formatToPercentage
                };
                $scope.ok = function () {
                    $modalInstance.close($scope.percentages);
                };
                $scope.cancel = function () {
                    $modalInstance.dismiss();
                };
            },
            resolve: {
                values: function () {
                    return $scope.percentages;
                }
            }
        });
        modalInstance.result.then(function (percentages) {
            $scope.percentages = percentages;
        });
        modalInstance.rendered.then(function () {
            $rootScope.$broadcast('rzSliderForceRender'); //Force refresh sliders on render. Otherwise bullets are aligned at left side.
        });
    };


    //Slider inside tabs
    $scope.tabSliders = {
        slider1: {
            value: 100
        },
        slider2: {
            value: 200
        }
    };
    $scope.refreshSlider = function () {
        $timeout(function () {
            $scope.$broadcast('rzSliderForceRender');
        });
    };


    //Slider with draggable range
    $scope.slider_all_options = {
        minValue: 2,
        options: {
            floor: 0,
            ceil: 10,
            step: 1,
            precision: 0,
            draggableRange: false,
            showSelectionBar: false,
            hideLimitLabels: false,
            readOnly: false,
            disabled: false,
            showTicks: false,
            showTicksValues: false
        }
    };
    $scope.toggleHighValue = function () {
        if ($scope.slider_all_options.maxValue != null) {
            $scope.slider_all_options.maxValue = undefined;
        } else {
            $scope.slider_all_options.maxValue = 8;
        }
    }
});
</script>

</body>
</html>