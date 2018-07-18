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

function signUp() {
  $('.loading').show();
  $.ajax({
    url: './services/signup_service.php',
    type: 'POST',
    data: $('#signup_form').serialize(),
    success: function(result) {
      $('.loading').hide();
      json = JSON.parse(result);
      if (json.code == 200) {
        setCookie('email', json.user.email);
        setCookie('first_name', json.user.first_name);
        window.open('step.php', '_self');
      } else {
        $('#error_dialog').modal('show');
        $('#error_message').html(json.message);
      }
    }
  })
}
</script>

</head>

<body>
<div class='loading' hidden></div>
<!------------ Navigation start ------------>
<div id="header">
  <div class="blue-line"></div>
  <div class="container"> <span class="logo"><a href="#home">
    <a href="index.html"><div id="logo"></div></a>
    </a></span>
    <ul id="tokenmenu">
      <li><a href="sign-in.php" class="btn">Sign In</a></li>
      <li><a href="sign-up.php" class="btn">Sign Up</a></li>            
    </ul>
    <nav> 
      <a href="" id="menuToggle" title="show menu"> <span class="navClosed"></span> </a>
      <a href="sign-up.php">Sign Up</a>
      <a href="sign-in.php">Sign In</a>
    </nav>
  </div>
</div>
<!------------ Navigation end ------------>

<!------------ Sign in start ------------>
<section class="signpage">
  <div class="container">
    <div class="signpage-container">
      <h1>Sign Up</h1>
      <div class="h-line h-line-small" style="display:inline-block;"></div>
      <form id='signup_form'>
        <div class="clearfix">
          <input type='text' name='email' class="input-style" placeholder="Email Address" required />
        </div>
        <div class="clearfix">
          <input type='password' name='password' class="input-style" placeholder="Password" required />
        </div>
        <div class="clearfix">
          <input type='password' name='confirm_pass' class="input-style" placeholder="Confirm Password" required />
        </div>
      </form>
      <div class="clearfix">
        <a href="javascript:signUp()" class="btn register-btn">Register</a>
      </div>
      Already have an account? <a href="sign-in.php" style="color:#87b44c;">Sign in</a>
    </div>    
  </div>
</section>
<!------------ Sign in end ------------>

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

<?php include './htmls/error_dialog.html' ?>
</body>
</html>
