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
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/sidemenu.css" rel="stylesheet">
<link href="css/media-queries.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

<script src='./js/utilities.js'></script>
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
    var conversion_rate = getCookie('conversion_rate');
    $('#amount').html(token_amount * conversion_rate + ' ' + getCookie('currency'));
    $('#token_amount').html(token_amount + ' WGP');

    //init form data
    $('#token_amount_form').val(token_amount);
    $('#currency').val(getCookie('currency'));
    $('#email').val(getCookie('email'));
    $('#wallet_address').val(getCookie('wallet_address'));
    $('#conversion_rate').val(getCookie('conversion_rate'));
    if (getCookie('currency') == 'ETH') {
      $('#myInput').val('0x67fd4721d490A5E609cF8e09FCE0a217b91F1546');
      $('#qr_wallet').attr('src', 'img/eth_wallet.png');
    } else if (getCookie('currency') == 'XLM') {
      $('#myInput').val('GC7RAORWLH7CNBGORSHB6DQ36HVIFJXAN7GVQAVBXHRMDNT3USCD5MU2');
      $('#qr_wallet').attr('src', 'img/xlm_wallet.png');
    }
  });
})(jQuery);

function purchase() {
  $('.loading').show();
  $.ajax({
    url: 'services/purchase.php',
    type: 'POST',
    data: $('#data_form').serialize(),
    success: function(result) {
      $('.loading').hide();
      json = JSON.parse(result);
      if (json.code == 200) {
        setCookie('method', 'manual');
        window.open('thank-you.php', '_self');
      } else {
        $('#error_dialog').modal('show');
        $('#error_message').html(json.message);
      }
    }
  });
}

</script>

</head>

<body>

<div class='loading' hidden></div>

<form id='data_form'>
  <input id='currency' type='hidden' name='currency'>
  <input id='email' type='hidden' name='email'>
  <input id='wallet_address' type='hidden' name='wallet_address'>
  <input id='token_amount_form' type='hidden' name='token_amount'>
  <input id='conversion_rate' type='hidden' name='conversion_rate'>
  <input type='hidden' name='status' value='Pending'>
</form>
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
  <h1>Transaction Summary</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <div class="settings-container" style="text-align:center;">
    <h3 style="font-weight:700; text-transform:none;">Please send:<br> <span id='amount' style="color:#87b44c;">18.1111 ETH</span></h3>
    <br><br><br>
    <div class="wallet-address">
      <h4>Destination Wallet Address:</h4>
      <br>
      <img id='qr_wallet' src="img/btc_wallet.png" alt="">
      <br><br><br>
      <input type="text" class="input-style" value="3H6F5wLq5x4FHyCp6GPnk14EkTnNqVBbDw" id="myInput" readonly>
      <button onclick="myFunction()" class="btn-copy"><i class="fa fa-copy" aria-hidden="true"></i></button>
      <div style="clear:both;"></div>         
    </div>
    <br><br><br>
    <h3 style="font-weight:700; text-transform:none;">Upon confirmation, you will receive:<br><span id='token_amount' style="color:#87b44c;">4,000 eminent tokens</span></h3>
    <br>
    <p>You will receive a confirmation email once the transaction is validated (this may take up to a few hours).
We may email you with an additional request for KYC documents. If we do not receive your documentation, your funds will be returned to your wallet.</p>
    <br><br><br>
    <a href="javascript:purchase()" class="btn">Purchase</a> 
  </div>
</div>
</section>

<?php include 'htmls/footer.html'?>
<?php include 'htmls/error_dialog.html'?>

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
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

</body>
</html>
