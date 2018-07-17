<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>WPay Token Sale</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap & Jquery -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="sidemenu.css" rel="stylesheet">
<link href="media-queries.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

<!-- Add sidemenu -->
<script>
(function($){
	// Menu Functions
	$(document).ready(function(){
  	$('#menuToggle').click(function(e){
    	var $parent = $(this).parent('nav');
      $parent.toggleClass("open");
      var navState = $parent.hasClass('open') ? "hide" : "show";
      $(this).attr("title", navState + " navigation");
			// Set the timeout to the animation length in the CSS.
			setTimeout(function(){
				console.log("timeout set");
				$('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
			}, 200);
    	e.preventDefault();
  	});
  });
})(jQuery);

</script>

</head>

<body>

<!------------ Navigation start ------------>
<div id="header">
  <div class="blue-line"></div>
  <div class="container"> <span class="logo"><a href="#home">
    <a href="index.html"><div id="logo"></div></a>
    </a></span>
    <ul id="tokenmenu">
      <li><span style="color:#000;">Hi, John!</span></li>
      <li><a href="sign-in.html" class="btn">Logout</a></li>            
    </ul>
    <nav> 
      <a href="" id="menuToggle" title="show menu"> <span class="navClosed"></span> </a>
      <a href="dashboard.html">Hi, John</a>
      <a href="sign-in.html">Logout</a>
    </nav>
  </div>
</div>
<!------------ Navigation end ------------>

<div class="step-bg1">
 <div class="container" style="text-align:center;">
  <h1>Terms & Conditions</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <p>The <b>EMINENT (“EMN”)</b> tokens are not securities as defined under <b>Singapore’s Securities and Futures Act (Cap. 289) (“SFA”)</b>. Accordingly, the SFA does not apply to the issuance of the EMN tokens. For the avoidance of doubt, the offering of EMN tokens need not be accompanied by any prospectus or profile statement and no prospectus or profile statement needs to be lodged with the <b>Monetary Authority of Singapore (“MAS”)</b>.</p>
  <br>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur urna metus, imperdiet nec enim vitae, elementum suscipit lorem. Ut suscipit nec ante in consectetur. Donec pulvinar mattis dui, ac molestie metus luctus id. Phasellus bibendum facilisis risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id tempor dolor. Etiam consectetur tellus eros, sed bibendum augue malesuada at. Aliquam erat volutpat. Nunc in purus nec ipsum semper luctus in non turpis. Proin urna nibh, placerat at consectetur rhoncus, scelerisque eget felis. Phasellus sed neque venenatis, pharetra enim id, lacinia sapien. Nulla lobortis elit orci, eget elementum sapien sodales non. Duis ultricies a leo sed efficitur. Pellentesque tempor, nisl eu congue placerat, augue felis suscipit metus, vel aliquet metus nisl et nulla. Fusce nisi ipsum, viverra porta magna eu, mattis semper ante.</p>
  <br>
  <p>In vitae cursus sapien. Nulla viverra sem eget tempus ullamcorper. Praesent eleifend sagittis erat quis aliquet. Quisque molestie dolor vitae libero rutrum aliquet. Phasellus ultrices arcu et est fermentum, sit amet faucibus lorem condimentum. Proin non rutrum risus. Aenean consequat gravida risus, et gravida leo accumsan eu. Sed vulputate magna non ornare tempor. In tempor tempor est, vitae bibendum eros venenatis et. Phasellus lorem orci, mollis eget tortor in, mattis auctor urna. Sed dictum euismod nunc at fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
  <br><br>
  <h2 style="color:#87b44c; text-transform:none;">Regulatory Risks</h2>
  <br><br>
  <p>Sed vulputate magna non ornare tempor. In tempor tempor est, vitae bibendum eros venenatis et. Phasellus lorem orci, mollis eget tortor in, mattis auctor urna. Sed dictum euismod nunc at fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam rutrum sollicitudin mi, eget dictum dui fringilla in. Nullam lacinia metus sed neque ultrices maximus vitae vitae odio. Praesent feugiat purus sed tortor vulputate, id tincidunt sem dapibus. Nulla efficitur porttitor bibendum. Quisque eget massa nisl. Aliquam finibus arcu in ipsum rutrum, maximus consectetur enim finibus. Nam tincidunt arcu eget sapien consequat posuere. Praesent efficitur diam eu augue dapibus, vitae ultricies tellus porttitor.</p>
  <br><br>
  <h2 style="color:#87b44c; text-transform:none;">Heading Here</h2>
  <br><br>
  <p>Sed vulputate magna non ornare tempor. In tempor tempor est, vitae bibendum eros venenatis et. Phasellus lorem orci, mollis eget tortor in, mattis auctor urna. Sed dictum euismod nunc at fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam rutrum sollicitudin mi, eget dictum dui fringilla in. Nullam lacinia metus sed neque ultrices maximus vitae vitae odio. Praesent feugiat purus sed tortor vulputate, id tincidunt sem dapibus. Nulla efficitur porttitor bibendum. Quisque eget massa nisl. Aliquam finibus arcu in ipsum rutrum, maximus consectetur enim finibus. Nam tincidunt arcu eget sapien consequat posuere. Praesent efficitur diam eu augue dapibus, vitae ultricies tellus porttitor.</p>
</div>
</section>

<div class="footer">
    <div class="container">
      <div class="footer-logo">
        <div class="token-hooxi hooxi">
        <a href="http://www.gcrfund.org/en/"><img src="img/logo-hooxi.jpg" alt=""></a>
        </div>
        <div class="token-w wfoundation">
        <a href="http://www.gcrfund.org/en/"><img src="img/logo-wfoundation.jpg" alt=""></a>
        </div>
        <div style="clear:both;"></div>
      </div>   
      <div class="footer-social">
        <ul class="social">
          <li><a href="https://www.facebook.com/wgreenpay/" target="_blank"><div class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
          <li><a href="https://twitter.com/WGreenPay" target="_blank"><div class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
          <li><a href="https://t.me/wgreenpay" target="_blank"><div class="social-icon"><i class="fa fa-telegram" aria-hidden="true"></i></div></a></li>
          <li><a href="https://medium.com/@wgreenpay" target="_blank"><div class="social-icon"><i class="fa fa-medium" aria-hidden="true"></i></div></a></li>
        </ul>
        <span class="small-font" style="color:#333;">@ 2018 W GLOBAL INVESTMENT PTE. LTD. All rights reserved.</span>
        <br><br>
        <span class="small-font"><a href="terms.html" style="color:#87b44c;">Terms & Conditions</a></span>
      </div>
      <div style="clear:both;"></div>
    </div>
</div>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
  alert("Copied the text: " + copyText.value);
}
</script>

<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
 

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>
