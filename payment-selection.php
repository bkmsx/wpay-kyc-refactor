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
<script src='js/utilities.js'></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/sidemenu.css" rel="stylesheet">
<link href="css/media-queries.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

<!-- Add sidemenu -->
<script>
var btc_price, eth_price, usd_price;
var token_price = 10;
var conversion_rate = 10;
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
    
    $.ajax({
      url: 'https://api.coinmarketcap.com/v2/ticker/512/?convert=BTC',
      type: 'GET',
      success: function(result) {
        json = JSON.parse(JSON.stringify(result));
        btc_price = json.data.quotes.BTC.price;
      }
    });
    $.ajax({
      url: 'https://api.coinmarketcap.com/v2/ticker/512/?convert=ETH',
      type: 'GET',
      success: function(result) {
        json = JSON.parse(JSON.stringify(result));
        eth_price = json.data.quotes.ETH.price;
        usd_price = 2;
      }
    });
    countPayment();
  });
})(jQuery);
function countPayment(){
  $('#wallet_address').prop('disabled', false);
  $('#wallet_address').css('background', 'white');
  $('#wallet_label').show();
  if ($('#xlm').is(':checked')) {
    $('#amount').val($('#token_amount').val() * token_price);
    $('#wallet_label').html('Stellar Wallet (to receive WGP tokens. <a href="https://www.stellar.org/laboratory/#account-creator?network=public" target="_blank" style="color:#ffc3a0">Create your Stellar Wallet</a> if you do not have one)');
    conversion_rate = token_price;
  } else if ($('#btc').is(':checked')) {
    $('#amount').val($('#token_amount').val() * token_price * btc_price);
    $('#conversion_rate').val(token_price * btc_price);
    $('#wallet_label').html('Your Bitcoin wallet (to identify your BTC sending address)');
    conversion_rate = token_price * btc_price;
  } else if ($('#eth').is(':checked')) {
    $('#amount').val($('#token_amount').val() * token_price * eth_price);
    $('#wallet_label').html('Your Ethereum wallet (to identify your ETH sending address)');
    conversion_rate = token_price * eth_price;
  } else {
    $('#amount').val($('#token_amount').val() * usd_price);
    $('#wallet_address').prop('disabled', true);
    $('#wallet_address').css('background', '#D8D8D8');
    $('#wallet_address').val('');
    $('#wallet_label').hide();
    conversion_rate = usd_price;
  }
}

function submitSummary(){
  if ($('#wallet_address').val() == '' && !$('#usd').is(':checked')) {
    if ($('#xlm').is(':checked')) {
      $('#error_message').html('Please provide your Stellar wallet address in order for us to verify that the transaction originates from you.');
    } else if ($('#btc').is(':checked')) {
      $('#error_message').html('Please provide your Bitcoin wallet address in order for us to verify that the transaction originates from you.');
    } else if ($('#eth').is(':checked')) {
      $('#error_message').html('Please provide your Ethereum wallet address in order for us to verify that the transaction originates from you.');
    } 
    $('#error_dialog').modal('show');
    return;
  }
  
  var amount = $('#token_amount').val();
  if( amount < 1) {
    $('#error_message').html('Minimum Purchase Amount Is 100 Tokens');
    $('#error_dialog').modal('show');
  } else {
    var currency = $("input[name=currency]:checked").val();
    setCookie('token_amount', $('#token_amount').val());
    setCookie('currency', currency);
    setCookie('wallet_address', $('#wallet_address').val())
    setCookie('conversion_rate', conversion_rate);
    if (currency == 'XLM') {
      var regexStellar = /^[A-Za-z0-9]{56}$/;
      if (regexStellar.test($('#wallet_address').val())) {
        window.open('payment-xlm.php', '_self');
      } else {
        $('#error_message').html('Stellar wallet address is not correct');
        $('#error_dialog').modal('show');
      } 
    } else if (currency == 'USD') {
      window.open('payment-usd.php', '_self');
    } else if (currency == 'ETH') {
      var regexETH = /^0x[a-fA-F0-9]{40}$/;
      if (regexETH.test($('#wallet_address').val())) {
        window.open('payment-coin.php', '_self');
      } else {
        $('#error_message').html('Ethereum wallet address is not correct');
        $('#error_dialog').modal('show');
      } 
    } else {
      var regexBTC = /^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$/;
      if (regexBTC.test($('#wallet_address').val())) {
        window.open('payment-coin.php', '_self');
      } else {
        $('#error_message').html('Bitcoin wallet address is not correct');
        $('#error_dialog').modal('show');
      } 
    }
  } 
}

</script>

</head>

<body>

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
  <h1>Payment Selection</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <div class="settings-container">
    <div class="clearfix">
      <label>WGP Token Amount</label> <br><br>
      <input id='token_amount' type="number" class="input-style" onkeyup='countPayment()' value="100">
      <br><br><br><br>1 WGP = US$ 2<br>1 WGP = 10 XLM

    </div>
    <div class="clearfix">
      <label id='wallet_label'>Wallet Authorization</label> <br><br>
      <input type="text" class="input-style" id="wallet_address">
      <div style="clear:both;"></div>
    </div>
    <div class="clearfix">
      <label>Payment Method</label> <br>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6 v-pad">
          <input id='xlm' type="radio" name="currency" value="XLM" onclick='countPayment()' checked> &nbsp;&nbsp;XLM
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 v-pad">
          <input id='btc' type="radio" name="currency" value="BTC" onclick='countPayment()'> &nbsp;&nbsp;BTC
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 v-pad">
          <input id='eth' type="radio" name="currency" value="ETH" onclick='countPayment()'> &nbsp;&nbsp;ETH
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 v-pad">
          <input id='usd' type="radio" name="currency" value="USD" onclick='countPayment()'> &nbsp;&nbsp;USD
        </div>
      </div>
    </div>
    <div class="clearfix">
    <label>Payment Amount</label> <br><br>
      <input id='amount' type="text" class="input-style" readonly>
    </div>
    <br><br>
    <div style="text-align:center;"><a href="javascript:submitSummary()" class="btn">Continue</a></div>    
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

</body>
</html>
