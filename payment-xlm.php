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
<script src='./js/utilities.js'></script>
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
    var firstName = getCookie('first_name');
    $('#greeting').html(firstName);
    $('#nav_greeting').html(firstName);
    var token_amount = getCookie('token_amount');
    $('#token_amount').html(token_amount + ' WGPs ');
    $('#wallet_address').val(getCookie('wallet_address'));
    $('#amount').html(token_amount * getCookie('conversion_rate') + ' XLMs ');
    $('#coins').val(token_amount);
  });
})(jQuery);

function submitTransaction(){
  if ($('#secret_key').val() == '') {
    $('#error_dialog').modal('show');
    $('#error_message').html('Please input secret key');
  } else {
    $('.loading').show();
    $.ajax({
      url: 'http://concordia.ventures:8005/api/register',
      type: 'POST',
      data: $('#data_form').serialize(),
      success: function(result) {
        $('.loading').hide();
        json = JSON.parse(JSON.stringify(result));
        if (json.code == 200) {
          window.open('thank-you.php', '_self');
        } else {
          $('#error_dialog').modal('show');
          $('#error_message').html(json.message);
        } 
      }
    })
  }
}
</script>

</head>

<body>
<div class='loading' hidden></div>
<!------------ Navigation start ------------>
<div id="header">
  <div class="blue-line"></div>
  <div class="container"> <span class="logo"><a href="#home">
    <a href="index.php"><div id="logo"></div></a>
    </a></span>
    <ul id="tokenmenu">
      <li><span id='greeting' style="color:#000;">Hi, John!</span></li>
      <li><a href="javascript:logOut()" class="btn">Logout</a></li>            
    </ul>
    <nav> 
      <a href="" id="menuToggle" title="show menu"> <span class="navClosed"></span> </a>
      <a id='nav_greeting' href="index.php">Hi, John</a>
      <a href="javascript:logOut()">Logout</a>
    </nav>
  </div>
</div>
<!------------ Navigation end ------------>

<div class="step-bg1">
 <div class="container" style="text-align:center;">
  <h1>XLM Payment</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <div class="settings-container" style="text-align:center;">
    <h3 style="font-weight:700; text-transform:none;">You send <span id='amount' style="color:#87b44c;">40,000 XLMs </span>and<br>
you will get <span id='token_amount' style="color:#87b44c;">4,000 WGPs </span>in your Stellar Wallet.</h3>
      <br>
    <p>Please input your secret key to send XLMs</p>
    <br><br><br>
    <div class="wallet-address">
      Stellar Wallet Public Key:<br><br>
      <input id='wallet_address' type="text" class="input-style" value="03249mcnh238hf89wqjd092iij20fh793g7c3c2" id="myInput" readonly>
      <button onclick="myFunction()" class="btn-copy"><i class="fa fa-copy" aria-hidden="true"></i></button>
      <div style="clear:both;"></div>   
      <br><br>
      <form id='data_form'>
        Secret Key:<br><br>
        <input id='secret_key' type="text" name='secret_key' class="input-style private-key" placeholder="">
        <input id='coins' type='hidden' name='coins'>
        <br><br><br><br><br>
      </form>
      <a href="javascript:submitTransaction()" class="btn">Continue</a> 
      
    </div>
    <br><br><br>
    <p>If you would like tochange the destination wallet, please send an email to <a href="mailto:admin@wpay.sg" style="color:#87b44c;">admin@wpay.sg</a></p>
  </div>
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

<?php include './htmls/error_dialog.html'?>

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
 

</body>
</html>
