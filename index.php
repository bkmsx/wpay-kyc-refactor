<?php
if(!isset($_COOKIE['email'])) {
  header('Location: sign-in.php');
}
if (!isset($_COOKIE['status'])) {
  header('Location: step.php');
}
echo BASE_URL;
?>
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
    
    $.ajax({
      url: './services/user-infor.php',
      type: 'GET',
      success: function(result) {
        json = JSON.parse(result);
        if (json.user.passport_location) {
          $('#upload_form').hide();
        };
        setCookie('status', json.user.status);
        if (json.user.status != 'CLEARED') {
          $('#kyc_notice').show();
          $('#btn_purchase').click(function(){return false});
          setCookie('status', json.user.status);
          setCookie('first_name', json.user.first_name);
        }
        for (let history of json.histories) {
          row = $('<tr>');
          row.append($('<td>').html(history['date']));
          row.append($('<td>').html(history['currency']));
          row.append($('<td>').html(history['amount']));
          row.append($('<td>').html(history['token_amount']));
          row.append($('<td>').html(history['token_bonus']));
          row.append($('<td>').html(history['token_number']));
          row.append($('<td>').html(history['conversion_rate']));
          row.append($('<td>').html(history['status']));
          $('#history_table').append(row);
        }
      }
    });
  });
})(jQuery);

function uploadPassport(){
  var form = $('#upload_form')[0];
  var formData = new FormData(form);
  $('.loading').show();
  $.ajax({
    url:  './services/upload-passport.php',
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (result) {
      $('.loading').hide();
      json = JSON.parse(result);
      if (json.code == 200) {
        $('#upload_form').hide();
        $('#error_dialog').modal('show');
        $('#error_title').html('Success');
        $('#error_title').css('color', 'green');
        $('#error_message').html(json.message);
      } else {
        $('#error_dialog').modal('show');
        $('#error_title').html('Error');
        $('#error_title').css('color', 'red');
        $('#error_message').html(json.message);
      }
    }
  });
}
</script>

</head>

<body>
<div class="loading" hidden>Loading&#8230;</div>
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
  <h1>Dashboard</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <div class="settings-container">
    <div class="dashboard-table" style="overflow-x:auto;">
    <table>
            <tr valign="center">
              <th>Price in USD</th>
              <th>No. of tokens not including bonus tokens</th>
            </tr>
            <tr>
              <td>USD 100</td>
              <td>400</td>
            </tr>
            <tr>
              <td>USD 500</td>
              <td>2,000</td>
            </tr>
            <tr>
              <td>USD 1,000</td>
              <td>4,000</td>
            </tr>
            <tr>
              <td>USD 5,000</td>
              <td>20,000</td>
            </tr>
            <tr>
              <td>USD 10,000</td>
              <td>40,000</td>
            </tr>
            <tr>
              <td>USD 50,000</td>
              <td>200,000</td>
            </tr>
            <tr>
              <td>USD 100,000</td>
              <td>400,000</td>
            </tr>          
          </table>
    </div>
    <br>
    <br>
    <div class="wallet-address">
      
      <div style="clear:both;"></div>
      <label id='kyc_notice' style='color:red' hidden>You haven't passed KYC yet</label>
      <br><br/>
      <a id='btn_purchase' href="payment-selection.php" class="btn">Purchase</a>          
    </div>
    <br><br>
    <div style="text-align:center;">
      <form id='upload_form'>
        <div class="dashboard-line"></div>
        <h2 style="text-transform:none;">Identity <span style="color:#87b44c;">Image</span></h2>
        <br>
        <br>
        <div id="hide">
          
          <label class="btn upload-btn">
            <input type="file" name='file'/>
            <img src="img/icon-id.png" alt=""><br><br>Upload Your Passport
          </label>
          
        </div>
        <br><br>
        <p>You can only upload jpg, jpeg, png, and pdf file and size is less than or equal to 4mb</p>
        <br><br><br><br>
        <a href="javascript:uploadPassport()" class="btn">Submit</a>
      </form>
    </div>
  </div>
  <div class="dashboard-line"></div>
  <div style="text-align:center;">
    <h2 style="text-transform:none;">Transaction <span style="color:#87b44c;">History</span></h2>
  </div>
  <br><br><br><br>
  <div class="dashboard-table" style="overflow-x:auto;">
  <table id='history_table'>
    <tr valign="center">
      <th>Date</th>
      <th>Currency</th>
      <th>Amount</th>
      <th>WGP Amount</th>
      <th>WGP Bonus</th>
      <th>Total WGP</th>
      <th>Conversion Rate</th>
      <th>Status</th>
    </tr>
  </table>
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
  
 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

</body>
</html>
