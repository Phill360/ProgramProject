<!DOCTYPE html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<title>noUiSlider - Handles and Slider Values | Refreshless.com</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	<link href="/nouislider/documentation/assets/base.css" rel="stylesheet">
	<link href="/nouislider/documentation/assets/prism.css" rel="stylesheet">
	<script src="/nouislider/documentation/assets/wNumb.js"></script>

	<link href="/noUiSlider/distribute/nouislider.css?v=1000" rel="stylesheet">
	<script src="/noUiSlider/distribute/nouislider.js?v=1000"></script>
	
</head>

<body class="language-javascript">

	
	<div class="bar-group">
	<a class="bar-link project" href="/nouislider/">noUiSlider</a>
	<a class="bar-link" href="/nouislider/slider-values/">Slider range and handles</a>
	<a class="bar-link" href="/nouislider/slider-read-write/">Reading &amp; Setting values</a>
	<a class="bar-link" href="/nouislider/slider-options/">Options</a>
	<a class="bar-link" href="/nouislider/behaviour-option/">Tapping, dragging &amp; fixed ranges</a>
	<a class="bar-link" href="/nouislider/examples/">Examples</a>
	<a class="bar-link" href="/nouislider/events-callbacks/">Events</a>
	<a class="bar-link" href="/nouislider/pips/">Scale/Pips</a>
	<a class="bar-link" href="/nouislider/more/">More...</a>
	<a class="bar-link download" href="/nouislider/download/">Download noUiSlider</a>
</div>

	<div class="content">
		
<h1>Slider values</h1>


<a href="#section-handles" id="section-handles" class="section-link">&sect;</a><h2>Handles</h2>

<section>

	<div class="view">

		<p>The number of handles can be set using the <code>start</code> option. This option accepts an array of initial handle positions. Set one value for one handle, two values for two handles.</p>

		<div class="example">
			<div id="slider-handles"></div>
			
<script>
var handlesSlider = document.getElementById('slider-handles');

noUiSlider.create(handlesSlider, {
	start: [ 4000, 8000 ],
	range: {
		'min': [  2000 ],
		'max': [ 10000 ]
	}
});
</script>		</div>
	</div>

	<div class="side">
		
<pre><code>var handlesSlider = document.getElementById('slider-handles');

noUiSlider.create(handlesSlider, {
	start: [ 4000, 8000 ],
	range: {
		'min': [  2000 ],
		'max': [ 10000 ]
	}
});
</code></pre>	</div>
</section>

<a href="#section-handles-multiple" id="section-handles-multiple" class="section-link">&sect;</a><h2>More than two handles</h2>

<section>

	<div class="view">

		<p>The number of handles in the <code>start</code> option is not limited to two. You can use the <a href="/nouislider/slider-options/#section-Connect">connect option</a> between every handle.</p>

		<div class="example">
			<div id="slider-handles4"></div>
			
<script>
var handlesSlider4 = document.getElementById('slider-handles4');

noUiSlider.create(handlesSlider4, {
	start: [ 4000, 8000, 12000, 16000 ],
	connect: [false, true, true, false, true],
	range: {
		'min': [  2000 ],
		'max': [ 20000 ]
	}
});
</script>		</div>
	</div>

	<div class="side">
		
<pre><code>var handlesSlider4 = document.getElementById('slider-handles4');

noUiSlider.create(handlesSlider4, {
	start: [ 4000, 8000, 12000, 16000 ],
	connect: [false, true, true, false, true],
	range: {
		'min': [  2000 ],
		'max': [ 20000 ]
	}
});
</code></pre>	</div>
</section>


<a href="#section-range" id="section-range" class="section-link">&sect;</a><h2>Range</h2>

<section>

	<div class="view">
		<p>All values on the slider are part of a range. The range has a minimum and maximum value. The minimum value <a href="https://github.com/leongersen/noUiSlider/issues/676">cannot be equal to the maximum value</a>.</p>

		<div class="example">
			<div id="slider-range"></div>
			<span class="example-val" id="slider-range-value"></span>
			
<script>
var rangeSlider = document.getElementById('slider-range');

noUiSlider.create(rangeSlider, {
	start: [ 4000 ],
	range: {
		'min': [  2000 ],
		'max': [ 10000 ]
	}
});
</script>			
<script>
var rangeSliderValueElement = document.getElementById('slider-range-value');

rangeSlider.noUiSlider.on('update', function( values, handle ) {
	rangeSliderValueElement.innerHTML = values[handle];
});
</script>		</div>
	</div>

	<div class="side">
		
<pre><code>var rangeSlider = document.getElementById('slider-range');

noUiSlider.create(rangeSlider, {
	start: [ 4000 ],
	range: {
		'min': [  2000 ],
		'max': [ 10000 ]
	}
});
</code></pre>
		<div class="viewer-header">Display the slider value</div>

		<div class="viewer-content">
			
<pre><code>var rangeSliderValueElement = document.getElementById('slider-range-value');

rangeSlider.noUiSlider.on('update', function( values, handle ) {
	rangeSliderValueElement.innerHTML = values[handle];
});
</code></pre>		</div>
	</div>
</section>


<a href="#section-step" id="section-step" class="section-link">&sect;</a><h3>Stepping and snapping to values</h3>

<section>

	<div class="view">
		<p>The amount the slider changes on movement can be set using the <code>step</code> option.</p>
		<div class="example">
			<div id="slider-step"></div>
			<span class="example-val" id="slider-step-value"></span>
			
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
</script>			
<script>
var stepSliderValueElement = document.getElementById('slider-step-value');

stepSlider.noUiSlider.on('update', function( values, handle ) {
	stepSliderValueElement.innerHTML = values[handle];
});
</script>		</div>
	</div>

	<div class="side">
		
<pre><code>var stepSlider = document.getElementById('slider-step');

noUiSlider.create(stepSlider, {
	start: [ 4000 ],
	step: 1000,
	range: {
		'min': [  2000 ],
		'max': [ 10000 ]
	}
});
</code></pre>
		<div class="viewer-header">Display the slider value</div>

		<div class="viewer-content">
			
<pre><code>var stepSliderValueElement = document.getElementById('slider-step-value');

stepSlider.noUiSlider.on('update', function( values, handle ) {
	stepSliderValueElement.innerHTML = values[handle];
});
</code></pre>		</div>
	</div>
</section>


<a href="#section-non-linear" id="section-non-linear" class="section-link">&sect;</a><h2>Non-linear sliders</h2>

<section>

	<div class="view">

		<p>noUiSlider offers some powerful mechanisms that allow a slider to behave in a non-linear fashion. You can create sliders with ever-increasing increments by specifying the value for the slider at certain intervals. Note how the handle in the example below starts at 30% of the slider width, even though <code>4000</code> is not 30% of the span between <code>2000</code> and <code>10000</code>.</p>

		<div class="example">
			<div id="slider-non-linear"></div>
			<span class="example-val" id="slider-non-linear-value"></span>
			
<script>
var nonLinearSlider = document.getElementById('slider-non-linear');

noUiSlider.create(nonLinearSlider, {
	start: [ 4000 ],
	range: {
		'min': [  2000 ],
		'30%': [  4000 ],
		'70%': [  8000 ],
		'max': [ 10000 ]
	}
});
</script>			
<script>
var nonLinearSliderValueElement = document.getElementById('slider-non-linear-value');

// Show the value for the *last* moved handle.
nonLinearSlider.noUiSlider.on('update', function( values, handle ) {
	nonLinearSliderValueElement.innerHTML = values[handle];
});
</script>		</div>
	</div>

	<div class="side">
		
<pre><code>var nonLinearSlider = document.getElementById('slider-non-linear');

noUiSlider.create(nonLinearSlider, {
	start: [ 4000 ],
	range: {
		'min': [  2000 ],
		'30%': [  4000 ],
		'70%': [  8000 ],
		'max': [ 10000 ]
	}
});
</code></pre>
		<div class="viewer-header">Display the slider value</div>

		<div class="viewer-content">
			
<pre><code>var nonLinearSliderValueElement = document.getElementById('slider-non-linear-value');

// Show the value for the *last* moved handle.
nonLinearSlider.noUiSlider.on('update', function( values, handle ) {
	nonLinearSliderValueElement.innerHTML = values[handle];
});
</code></pre>		</div>
	</div>
</section>


<a href="#section-non-linear-step" id="section-non-linear-step" class="section-link">&sect;</a><h3>Stepping in non-linear sliders</h3>

<section>

	<div class="view">
		<p>For every subrange in a non-linear slider, stepping can be set. Note how in the example below the slider doesn't step until it reaches <code>500</code>. From there on, it changes in increments of <code>500</code>, until it reaches <code>4000</code>, where increments now span <code>1000</code>.</p>

		<div class="example">
			<div id="slider-non-linear-step"></div>
			<span class="example-val" id="slider-non-linear-step-value"></span>
			
<script>
var nonLinearStepSlider = document.getElementById('slider-non-linear-step');

noUiSlider.create(nonLinearStepSlider, {
	start: [ 500, 4000 ],
	range: {
		'min': [     0 ],
		'10%': [   500,  500 ],
		'50%': [  4000, 1000 ],
		'max': [ 10000 ]
	}
});
</script>			
<script>
var nonLinearStepSliderValueElement = document.getElementById('slider-non-linear-step-value');

nonLinearStepSlider.noUiSlider.on('update', function( values, handle ) {
	nonLinearStepSliderValueElement.innerHTML = values[handle];
});
</script>		</div>
	</div>

	<div class="side">
		
<pre><code>var nonLinearStepSlider = document.getElementById('slider-non-linear-step');

noUiSlider.create(nonLinearStepSlider, {
	start: [ 500, 4000 ],
	range: {
		'min': [     0 ],
		'10%': [   500,  500 ],
		'50%': [  4000, 1000 ],
		'max': [ 10000 ]
	}
});
</code></pre>
		<div class="viewer-header">Display the slider value</div>

		<div class="viewer-content">
			
<pre><code>var nonLinearStepSliderValueElement = document.getElementById('slider-non-linear-step-value');

nonLinearStepSlider.noUiSlider.on('update', function( values, handle ) {
	nonLinearStepSliderValueElement.innerHTML = values[handle];
});
</code></pre>		</div>
	</div>
</section>


<a href="#section-snap" id="section-snap" class="section-link">&sect;</a><h3>Snapping between steps</h3>

<section>

	<div class="view">
		<p>When a non-linear slider has been configured, the <code>snap</code> option can be set to <code>true</code> to force the slider to jump between the specified values.</p>

		<div class="example">
			<div id="slider-snap"></div>
			<span class="example-val" id="slider-snap-value-lower"></span>
			<span class="example-val" id="slider-snap-value-upper"></span>
			
<script>
var snapSlider = document.getElementById('slider-snap');

noUiSlider.create(snapSlider, {
	start: [ 0, 500 ],
	snap: true,
	connect: true,
	range: {
		'min': 0,
		'10%': 50,
		'20%': 100,
		'30%': 150,
		'40%': 500,
		'50%': 800,
		'max': 1000
	}
});
</script>			
<script>
var snapValues = [
	document.getElementById('slider-snap-value-lower'),
	document.getElementById('slider-snap-value-upper')
];

snapSlider.noUiSlider.on('update', function( values, handle ) {
	snapValues[handle].innerHTML = values[handle];
});
</script>		</div>
	</div>

	<div class="side">
		
<pre><code>var snapSlider = document.getElementById('slider-snap');

noUiSlider.create(snapSlider, {
	start: [ 0, 500 ],
	snap: true,
	connect: true,
	range: {
		'min': 0,
		'10%': 50,
		'20%': 100,
		'30%': 150,
		'40%': 500,
		'50%': 800,
		'max': 1000
	}
});
</code></pre>		<div class="viewer-header">Display the slider value</div>

		<div class="viewer-content">
			
<pre><code>var snapValues = [
	document.getElementById('slider-snap-value-lower'),
	document.getElementById('slider-snap-value-upper')
];

snapSlider.noUiSlider.on('update', function( values, handle ) {
	snapValues[handle].innerHTML = values[handle];
});
</code></pre>		</div>
	</div>
</section>


<a href="#section-steps" id="section-steps" class="section-link">&sect;</a><h3>Getting the next slider steps</h3>

<section>

	<div class="view">

		<p>Using the <code>steps</code> API, the sliders previous and next steps can be retrieved.</p>

		<p>The <a href="/nouislider/examples/#section-keypress">examples section</a> demonstrates how this API can be used.</p>
	</div>

	<div class="side">
		
<pre><code>// Example slider:
noUiSlider.create(slider, {
	start: [20, 80],
	range: {
		'min': [0],
		'10%': [10, 10],
		'50%': [80, 50],
		'80%': 150,
		'max': 200
	}
});

// Both handles step 10 up and down
.set([30, 50])
.steps() => [[10,10],[10,10]]

// Second handle now steps up 50
.set([30, 80])
.steps() => [[10,10],[10,50]]

// Second handle now steps down 50, steps up 20 to
// reach 150 at 80% of the slider
.set([30, 130])
.steps() => [[10,10],[50,20]]

// Second handle steps down 20 to go back to 130.
// the is no step value to go up
.set([30, 150])
.steps() => [[10,10],[20,false]]

// Second handle has no downward step,
// is at the end of the slider
.set([30, 200])
.steps() => [[10,10],[false,null]]
</code></pre>	</div>
</section>
	</div>

	<script>

		var headers = document.getElementsByClassName('viewer-header');

		for ( var i = 0; i < headers.length; i++ ) {
			headers[i].addEventListener('click', function(){
				this.classList.toggle('open');
			});
		}

	</script>

	<script src="/nouislider/documentation/assets/prism.js"></script>

		<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-1399522-2', 'auto');
		ga('send', 'pageview');

		function trackLink( href, category, action ){

			ga('send', 'event', category, action);

			setTimeout(function(){
				document.location = href;
			}, 100);

			return false;
		}

		var hits = document.querySelectorAll('[data-category]');

		for ( var i = 0; i < hits.length; i++ ) {
			hits[i].addEventListener('click', function(){
				return trackLink(this.getAttribute('href'), this.getAttribute('data-category'), this.getAttribute('data-action'));
			});
		}

	</script>


</body>
