<?php
if(!isset($_COOKIE['email'])) {
  header('Location: sign-in.php');
  exit;
}
if (!isset($_COOKIE['status'])) {
  header('Location: step.php');
  exit;
}
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

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/sidemenu.css" rel="stylesheet">
<link href="css/media-queries.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

<script src='js/utilities.js'></script>
<script src='js/moment.js'></script>
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
      url: 'services/user-infor.php',
      type: 'GET',
      success: function(result) {
        json = JSON.parse(result);
        if (json.user.passport_location) {
          $('#upload_form').hide();
        };
        setCookie('status', json.user.status);
        if (json.user.status != 'CLEARED') {
          $('#kyc_notice_error').show();
          $('#kyc_notice_ok').hide();
          $('#btn_purchase').click(function(){return false});
          setCookie('status', json.user.status);
          setCookie('first_name', json.user.first_name);
        }
        for (let history of json.histories) {
          row = $('<tr>');
          row.append($('<td>').html(moment.utc(history['date']).local().format('DD/MM/YYYY HH:mm:ss')));
          row.append($('<td>').html(history['currency']));
          row.append($('<td>').html(history['amount']));
          row.append($('<td>').html(history['token_amount']));
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
    url:  'services/upload-passport.php',
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

function changeFile(event) {
  var tmppath = URL.createObjectURL(event.target.files[0]);
  $('#image').attr('src', tmppath);
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
    
    </div>
    <br>
    <br>
    <div class="wallet-address">
      
      <div style="clear:both;"></div>
      <label id='kyc_notice_error' style='color:red' hidden>You haven't passed KYC yet</label>
      <lable id='kyc_notice_ok' >You have passed our preliminary KYC. You may proceed to purchase W Green Pay tokens.</label>
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
            <input type="file" name='file' onchange='changeFile(event)'/>
            <img id='image' src="img/icon-id.png" alt=""><br><br><span id='file_name'>Upload Your Passport</span>
          </label>
          
        </div>
        <br><br>
        <p>You may only upload jpg, jpeg, png, and pdf file. File size must be less than or equal to 4 MB</p>
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
      <th>WGP Tokens</th>
      <th>Status</th>
    </tr>
  </table>
  </div>
</div>
</section>
<?php include 'htmls/footer.html'?>
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
