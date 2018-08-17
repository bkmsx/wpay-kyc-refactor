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
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/sidemenu.css" rel="stylesheet">
<link href="css/media-queries.css" rel="stylesheet">
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

    //init form data
    $('#token_amount_form').val(token_amount);
    $('#currency').val(getCookie('currency'));
    $('#email').val(getCookie('email'));
    $('#wallet_address').val(getCookie('wallet_address'));
    $('#conversion_rate').val(getCookie('conversion_rate'));

    $('#checkbox').change(function() {
      if(this.checked) {
        $('#secret_key').prop('disabled', true);
        $('#secret_key').css('background', '#D8D8D8');
      } else {
        $('#secret_key').prop('disabled', false);
        $('#secret_key').css('background', 'white');
      }
    })
  });
})(jQuery);

function submitTransaction(){
  if ($('#secret_key').val() == '') {
    $('#error_dialog').modal('show');
    $('#error_message').html('Please input secret key');
  } else {
    $('.loading').show();
    $.ajax({
      url: 'https://kyc.wpay.sg:8080/api/register',
      type: 'POST',
      data: $('#data_form').serialize(),
      success: function(result) {
        json = JSON.parse(JSON.stringify(result));
        if (json.code == 200) {
          saveTransaction();
          setCookie('method', 'auto');
        } else {
          $('.loading').hide();
          $('#error_dialog').modal('show');
          $('#error_message').html(json.message);
        } 
      },
      error: function(err) {
        $('.loading').hide();
        $('#error_dialog').modal('show');
        $('#error_message').html('Secret key is not correct');
      }
    })
  }
}

function saveTransaction() {
  $.ajax({
    url: 'services/purchase.php',
    type: 'POST',
    data: $('#form2').serialize(),
    success: function(result) {
      $('.loading').hide();
      json = JSON.parse(result);
      if (json.code == 200) {
        window.open('thank-you.php', '_self');
      } else {
        $('#error_dialog').modal('show');
        $('#error_message').html(json.message);
      }
    }
  });
}

function showContinue() {
  $('#btn_continue').show();
  $('#ask_form').hide();
}
function showSecretInput() {
  $('#data_form').show();
  $('#ask_form').hide();
}
function showAskForm() {
  $('#data_form').hide();
  $('#ask_form').show();
}

function continueNextPage() {
  window.open('payment-coin.php', '_self');
}
</script>

</head>

<body>
<div class='loading' hidden></div>

<form id='form2'>
  <input id='currency' type='hidden' name='currency'>
  <input id='email' type='hidden' name='email'>
  <input id='wallet_address' type='hidden' name='wallet_address'>
  <input id='token_amount_form' type='hidden' name='token_amount'>
  <input id='conversion_rate' type='hidden' name='conversion_rate'>
  <input type='hidden' name='status' value='Confirmed'>
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
  <h1>XLM Payment</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <div class="settings-container" style="text-align:center;">
    <h3 style="font-weight:700; text-transform:none;">Please send <span id='amount' style="color:#87b44c;">40,000 XLMs </span>in order to receive<br>
<span id='token_amount' style="color:#87b44c;">4,000 WGPs </span>in your Stellar Wallet.</h3>
      <br>
    
    <br><br><br>
    <div class="wallet-address">
      <!-- Stellar Wallet Public Key:<br><br>
      <input id='wallet_address' type="text" class="input-style" value="03249mcnh238hf89wqjd092iij20fh793g7c3c2" id="myInput" readonly>
      <button onclick="myFunction()" class="btn-copy"><i class="fa fa-copy" aria-hidden="true"></i></button> -->
      <div style="clear:both;"></div>   
      <br><br>
      <form id='data_form' hidden>
        Secret Key:<br><br>
        <input id='secret_key' type="text" name='secret_key' class="input-style private-key"><br><br><br><br>
        
        <input id='coins' type='hidden' name='coins'>
        <br><br>
        <a href="javascript:showAskForm()" class="btn">Back</a>
        <a href="javascript:submitTransaction()" class="btn" style='margin-left: 20px'>Purchase</a>
      </form>
      <a id='btn_continue' href="javascript:continueNextPage()" class="btn" style='display:none'>Continue</a>
      <div id='ask_form'>
        <label>Do you want to get WGP tokens immediately?</label><br><br>If yes, you will be required to enter your Stellar Private Key<br>
        <div style='margin-left:120px'>
          <p style="text-align:left;margin-left:6%;">We need your secret key in order for us to :</p>
          <ul style='list-style:none;text-align:left;line-height:150%'><li>1) Establish trust line with the official WGP Issuer Account</li>
          <li>2) Send XLMs from your account to us</li><li>3) Send WGP tokens to your Stellar wallet</li>
          </ul>
        </div><br>
        <a href="javascript:showSecretInput()" class="btn">Yes</a> 
        <a href="javascript:continueNextPage()" class="btn" style='margin-left: 20px'>No</a> 
      </div>
    </div>
    <br><br><br>
    <p>If you would like to change the destination wallet, please send an email to <a href="mailto:admin@wpay.sg" style="color:#87b44c;">admin@wpay.sg</a></p>
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
