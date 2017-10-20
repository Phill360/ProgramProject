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
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="opensans"><div class="black"><div class="textRegular">1. How many adults in the household?</div></div></div>
          <br>
          
            <input type="text" class="unibox-price-min" placeholder="1" onfocus="uniboxResetHint('Min Price',false,this);" onblur="uniboxResetHint('Min Price',true,this);" value="Min Price" onkeyup="uniboxKeyUp(event,this)" onkeydown="uniboxKeyDown(event,this)"
  />

            <div id="slider"></div>

</div>
<div class="unibox-quick-summary-line">
  <span class="unibox-quick-summary"></span><span>&nbsp;</span> 
</div>
<!--<input type="hidden" value="recip" class="unibox-search-context" name="recip">-->
<!--<input type="hidden" value="1" class="unibox-search-region" name="34">-->
<!--<input type="hidden" value="29619" class="unibox-search-account" name="26743">-->
<!--<input type="hidden" value="http://firsthomeplan.ca/propertylistings" class="unibox-search-result-page" name="/fairrealty/listings/">-->
<!--<input type="hidden" value="AUTO" class="unibox-search-listing-type" name="AUTO">-->
</div>

          <br>
        </div>
    </div>
  </div>
<div class="unibox-search unibox-search-regular">

  
  

  
</body>
<script>
jQuery(document).ready(function() {

  $("#slider").noUiSlider({
    start: [ 1 ],
      step: 1,
      range: {
        'min': [ 1 ],
  	  'max': [ 3 ]
      }
    });

  $("#slider").on('slide', function(event, values) {
    $("input.unibox-price-min").val(values[0]);
  });
});
</script>
</html>