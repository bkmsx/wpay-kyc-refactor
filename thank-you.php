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

    if (getCookie('method') == 'auto') {
      $('#manual').hide();
      $('#auto').show();
      $('#token_amount').html(getCookie('token_amount') + ' WGP');
    }
  });
})(jQuery);

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
  <h1>Thank You For Your Purchase</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <div class="settings-container" style="text-align:center;">
    <h3 id='manual' style="font-weight:700; text-transform:none;">Your transaction will be verified within <span style="color:#87b44c;">48 hours</span></h3>
    <h3 id='auto' style="font-weight:700; text-transform:none;" hidden>We have successfully issued <span id='token_amount' style="color:#87b44c;">100 WGP</span> tokens to your Stellar wallet.</h3>
    <br><br><br>
  
    <br><br><br>
    <a href="index.php" class="btn">Dashboard</a>
  </div>
</div>
</section>

<?php include 'htmls/footer.html'?>

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
