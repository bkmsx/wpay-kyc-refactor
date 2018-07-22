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
<script src='js/bootstrap-datepicker.js'></script>
<link href="css/bootstrap-datepicker.css" rel="stylesheet">

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
    
    $.ajax({
      url: './services/citizenships.php',
      type: 'POST',
      success: function(result) {
        json = JSON.parse(result);
        for (let nation of json.nations) {
          $('#citizenship').append($('<option>', {
            value: nation,
            text: nation
          }));
        }
        for (let country of json.countries) {
          $('#country').append($('<option>', {
            value: country,
            text: country
          }));
        }
      }
    })
    var firstName = getCookie('first_name');
    $('#greeting').html(firstName);
    $('#nav_greeting').html(firstName);
  });

})(jQuery);

</script>
<style>
.datepicker {
color: black ;
}
</style>
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
<!-- Circles which indicates the steps of the form: -->
 <div class="container">
  <div class="step-container">
    <div class="step"></div>
    <div class="step-line"></div>
    <div class="step"></div>
    <div class="step-line"></div>
    <div class="step"></div>
    <div style="clear:both;"></div>
  </div>
  <br><br>
  <div class="step-title">
    <div class="terms"><h3>Terms & Conditions</h3></div>
    <div class="basic-info"><h3>Basic Information</h3></div>
    <div class="identity"><h3>Completion</h3></div>
    <div style="clear:both;"></div>
  </div>
 </div>
</div>

<section class="step-bg2">
<div class="container">
<form id="regForm">
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <div style="text-align:center;">
      <h1>Terms & Conditions</h1><div class="h-line" style="display:inline-block;"></div>
    </div>
    <br>
    <div class="clearfix">
      <table>
        <tr valign="top">
          <td class="radio-btn"><input id='check1' type="checkbox" value="value1" oninput="this.className = ''"></td>
          <td >I have read the Token Sale <a href="terms.php" target="_blank" style="color:#87b44c;">Terms & Conditions</a>, Privacy Policy and W Green Pay White Paper, and accept all terms, conditions, obligations, affirmations, representations and warranties outlined in these documents and agree to adhere to them and be legally bound by them.
          </td>
        </tr>
      </table>
    </div>
    <div class="clearfix">
      <table>
        <tr valign="top">
          <td class="radio-btn"><input id='check2' type="checkbox" value="value2" oninput="this.className = ''"></td>
          <td >I confirm that I am not a citizen of the United States of America or the People's Republic of China, permanent resident, or granted indefinite leave to remain in the United States or any jurisdiction in which the purchase of W Green Pay tokens (WGP) is explicitly prohibited or outlawed.</td>
        </tr>
      </table>
    </div>
    <br>
    <br>
    <div style="overflow:auto;">
    <div style="text-align:center;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  </div>
  <div class="tab">
    <div style="text-align:center;">
      <h1>Basic Information</h1><div class="h-line" style="display:inline-block;"></div>
    </div>
    <br>
    <div class="row">
    <div class="col-md-6 v-pad">
      First Name <br><br>
      <input type="text" class="input-style" placeholder="John" oninput="this.className = ''" name="first_name">
    </div>
    <div class="col-md-6 v-pad">
      Last Name <br><br>
      <input type="text" class="input-style" placeholder="Doe" oninput="this.className = ''" name="last_name">
    </div>
    <div class="col-md-6 v-pad">
      Citizenship <br><br>
      <select id='citizenship'class="input-style" name="citizenship" oninput="this.className = ''">
      </select>
    </div>
    <div class="col-md-6 v-pad">
      Date of Birth <br><br>
      <input name="date_of_birth" type='text' id="datepicker" class="input-style calendar" placeholder="DD/MM/YYYY" value=""  />
      <input name="wallet_address" type='hidden' value=''/>
    </div>
    <div class="col-md-6 v-pad">
      Country of Residence <br><br>
      <select id='country' class="input-style" name="country" oninput="this.className = ''">
      </select>
    </div>
    </div>
    <br>
    <br>
    <div style="overflow:auto;">
    <div style="text-align:center;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  </div>
  <div class="tab">
    <div style="text-align:center;">
      <h1>Thank You</h1><div class="h-line" style="display:inline-block;"></div>
    <br>
    <br>
    <div class="bigcheck">
      <i class="fa fa-check" aria-hidden="true"></i>
    </div>
    <br>
    <br>
    <h3>We are currently processing your application.</h3> 
    <p>Please note, we may request that you submit additional identity verification in the future.</p>
    <br>
    <br>
    <br>
    <br>
    <a href="index.php" class="btn">Go To Dashboard</a>
    </div>
  </div>
  
</form>

</div>
</section>
<?php include 'htmls/footer.html'?>
<?php include './htmls/error_dialog.html'?>
<script>
  $(document).ready(function() {
    $( "#datepicker" ).datepicker({
      format: 'dd/mm/yyyy'
    });
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
  if(!$('#check1').is(':checked') || !$('#check2').is(':checked')) {
    $('#error_dialog').modal('show');
    $('#error_message').html('Please agree with the terms and conditions before proceeding. If you do not agree, you may not participate in this token sale.');
    return false;
  }
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;

  if (currentTab == 1 && n > 0) {
    submitInformation(x[currentTab]);
    return false;
  }
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function submitInformation(tab) {
  $('.loading').show();
  $.ajax({
    url: 'services/register.php',
    type: 'POST',
    data: $('#regForm').serialize(),
    success: function(result) {
      $('.loading').hide();
      var index = result.indexOf('{');
      json = JSON.parse(result.substring(index));
      if (json.code == 200) {
        tab.style.display = 'none';
        currentTab++;
        showTab(currentTab);
        setCookie('status', json.user.status);
        setCookie('first_name', json.user.first_name);
      } else {
        $('#error_dialog').modal('show');
        $('#error_message').html(json.message);
      }   
    }
  });
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
