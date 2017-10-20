<!DOCTYPE html>
<html>
<head>
        <link href="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="https://raw.githubusercontent.com/leongersen/libLink/master/jquery.liblink.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>


<style>
    #slider {
  margin: 20px;
  width: 70%;
}
</style>


<script type="text/javascript" src="http://idx.myrealpage.com/js/weblets/omnibox_wp.js"></script>
</head>
<body>
<div class="unibox-search unibox-search-regular">

  <div class="unibox-label">
    Enter city, area, postal code or MLS(r) number:
  </div>
  <div class="unibox-text-field">
    <input type="text" onkeydown="uniboxKeyDown(event,this)" onkeyup="uniboxKeyUp(event,this)" placeholder="Enter city, area, postal code or MLS(r) number" class="unibox-field">
    <button onclick="return uniboxSubmitted(this)" name="unibox-run" class="unibox-submit">Search</button>
  </div>
  <div class="unibox-controls">
    <select onchange="runUniboxHits(this)" name="unibox-bedrooms" class="unibox-bedrooms">
      <option value="">--- Bedrooms ---</option>
      <option value="1">Min. 1 bedroom</option>
      <option value="2">Min. 2 bedrooms</option>
      <option value="3">Min. 3 bedrooms</option>
      <option value="4">Min. 4 bedrooms</option>
      <option value="5">Min. 5 bedrooms</option>
    </select>
    <select onchange="runUniboxHits(this)" name="unibox-bathrooms" class="unibox-bathrooms">
      <option value="">--- Bathrooms ---</option>
      <option value="2.0">Min. 2 bathrooms</option>
      <option value="3.0">Min. 3 bathrooms</option>
      <option value="4.0">Min. 4 bathrooms</option>
      <option value="5.0">Min. 5 bathrooms</option>
    </select>
  </div>

  <input type="text" class="unibox-price-min" placeholder="Min Price" onfocus="uniboxResetHint('Min Price',false,this);" onblur="uniboxResetHint('Min Price',true,this);" value="Min Price" onkeyup="uniboxKeyUp(event,this)" onkeydown="uniboxKeyDown(event,this)"
  />
  <input type="text" class="unibox-price-max" placeholder="Max Price" onfocus="uniboxResetHint('Max Price',false,this);" onblur="uniboxResetHint('Max Price',true,this);" value="Max Price" onkeyup="uniboxKeyUp(event,this)" onkeydown="uniboxKeyDown(event,this)"
  />

  <div id="slider"></div>

</div>
<div class="unibox-quick-summary-line">
  <span class="unibox-quick-summary"></span><span>&nbsp;</span> 
</div>
<input type="hidden" value="recip" class="unibox-search-context" name="recip">
<input type="hidden" value="1" class="unibox-search-region" name="34">
<input type="hidden" value="29619" class="unibox-search-account" name="26743">
<input type="hidden" value="http://firsthomeplan.ca/propertylistings" class="unibox-search-result-page" name="/fairrealty/listings/">
<input type="hidden" value="AUTO" class="unibox-search-listing-type" name="AUTO">
</div>
</body>
<script>
jQuery(document).ready(function() {

  $("#slider").noUiSlider({
    start: [0, 1000000],
    step: 10000,
    connect: true,
    range: {
      'min': 0,
      'max': 1000000
    }
  });

  $("#slider").on('slide', function(event, values) {
    $("input.unibox-price-min").val(values[0]);
    $("input.unibox-price-max").val(values[1]);
  });
});
</script>
</html>