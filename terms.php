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
  <h1>TOKEN SALE TERMS & CONDITIONS</h1>
    <div class="h-line" style="display:inline-block;"></div>
 </div>
</div>

<section class="settings-bg">
<div class="container">
  <p><span >The W Green Pay (&ldquo;WGP&rdquo;) tokens are not securities as defined under Singapore&rsquo;s Securities and Futures Act (Cap. 289) (&ldquo;SFA&rdquo;). Accordingly, the SFA does not apply to the issuance of the WGP tokens. For the avoidance of doubt, the offering of WGP tokens need not be accompanied by any prospectus or profile statement and no prospectus or profile statement needs to be lodged with the Monetary Authority of Singapore (&ldquo;MAS&rdquo;).</span></p>
  <br>
  <p><span>WGP White Paper does not constitute an offer of, or an invitation to purchase, the WGP tokens in any jurisdiction in which such offer or sale would be unlawful. No regulatory authority in Singapore, including the MAS, has reviewed or approved or disapproved of the WGP tokens or the White Paper. WGP White Paper and any part hereof may not be distributed or otherwise disseminated in any jurisdiction where offering tokens in the manner set out by WGP White Paper is regulated or prohibited.</span></p>
  <br/>
  <p><span>The information in WGP White Paper is current only as of the date on the cover hereof. For any time after the cover date of this White Paper, the information, including information concerning W Green Pay business operations and financial condition may have changed. Neither the delivery of WGP White Paper nor any sale made in the related token offering shall, under any circumstances, constitute a representation that no such changes have occurred. W GLOBAL INVESTMENT PTE. LTD. (&ldquo;WGI&rdquo;) the entity that created W Green Pay and the issuer of the WGP token, does not make or purport to make, and hereby disclaims, any representation, warranty, undertaking, or other assurance in any form whatsoever to any person, including any representations, warranties, undertakings, or other assurances in relation to the truth, accuracy, or completeness of any part of the information in WGP White Paper.</span></p>
  <br/>
  <p><span>Whether taken as a whole or read in part, WGP White Paper is not, and should not be regarded as, any form of legal, financial, tax, or other professional advice. You should seek independent professional advice before making your own decision as to whether or not to receive any WGP tokens. You are responsible for any and all evaluations, assessments, and decisions you make in relation to investing in the WGP tokens. You may request for additional information from WGI in relation to this offer of the WGP tokens. WGI may, but is not obliged to, disclose such information depending on whether (i) it is legal to do so and (ii) the requested information is reasonably necessary to verify the information contained in WGP White Paper.</span></p>
  <br/>
  <p><span>WGI is not responsible for compelling any person to accept WGP tokens and disclaims, to the fullest extent permitted by law, all liability for any adverse consequences arising out of or in relation to such rejections of the WGP tokens.</span></p>
  <br/>
  <p><span>Upon receiving any WGP tokens, you will be deemed to have reviewed WGP White Paper (and any information requested and obtained from WGI) in full and to have agreed to the terms of this offering of the WGP tokens, including to the fact that this offering does not fall within the scope of any securities laws in Singapore and is not regulated by the MAS. You further acknowledge and agree that the WGP tokens are not securities and are not meant to generate any form of investment return.</span></p>
  <br/>
  <p><span>The WGP tokens and related services provided by WGI (if any) are provided on an &ldquo;as is&rdquo; and &ldquo;as available&rdquo; basis. WGI does not grant any warranties or make any representation, express or implied or otherwise, as to the accessibility, quality, suitability, accuracy, adequacy, or completeness of the WGP tokens or any related services provided by W Green Pay, and expressly disclaims any liability for errors, delays, or omissions in, or for any action taken in reliance on, the WGP tokens and related services provided by W Green Pay. No warranty, including the warranties of non-infringement of third party rights, title, merchantability, satisfactory quality, or fitness for a particular purpose, is given in conjunction with the WGP tokens and any related services provided by W Green Pay.</span></p>
  <br/><br/>
  <h2 style="color:#87b44c; text-transform:none;">Regulatory Risks</h2>
  <br><br>
  <p><span>The regulation of tokens such as the WGP tokens is still in a very nascent stage of development in Singapore. A high degree of uncertainty as to how tokens and token-related activities are to be treated exists. The applicable legal and regulatory framework may change subsequent to the date of issuance of WGP White Paper. Such change may be very rapid and it is not possible to anticipate with any degree of certainty the nature of such regulatory evolution. WGI does not, in any way, represent that the regulatory status of the WGP tokens will remain unaffected by any regulatory changes that arise at any point in time before, during, and after this offering.</span></p>
  <br><br>
  <h2 style="color:#87b44c; text-transform:none;">No regulatory supervision</h2>
  <br><br>
  <p><span>None of WGI or its affiliates is currently regulated or subject to the supervision of any regulatory body in Singapore. In particular, WGI and its affiliates are not registered with MAS in Singapore as any type of regulated financial institution or financial advisor and are not subject to the standards imposed upon such persons under the Securities and Futures Act, Financial Advisors Act, and other related regulatory instruments. Such persons are required to comply with a variety of requirements and standards concerning disclosures, reporting, compliance, and conduct of their operations for purposes or maximising investor protections. Since WGI is not subject to such requirements or standards, it will make decisions on those issues at its own discretion. While WGI will have regard to best practices on these issues, holders of WGP tokens may not necessarily enjoy the same extent and degree of investor protections as would be the case should they invest with regulated entities instead.</span></p>
  <br><br>
  <h2 style="color:#87b44c; text-transform:none;">No fiduciary duties owed</h2>
  <br><br>
  <p><span>As WGI is not a regulated financial institution, it does not owe investors in WGP tokens any fiduciary duties. This means that WGI has no legal obligation to always act in good faith in the best interests of holders of WGP tokens. While WGI will have regard to the interests of holders of WGP tokens, it is also permitted to consider the interests of other key stakeholders and to prefer these interests over the interests of WGP token holders. This may mean that WGI is permitted to make decisions that conflict with the interests of WGP token holders. Not owing any fiduciary duties to holders of WGP tokens also means that holders of WGP tokens may have limited rights of recourse against WGI and its affiliates in the event of disputes.</span></p>
  <br><br>
  <h2 style="color:#87b44c; text-transform:none;">Tax risks</h2>
  <br><br>
  <p><span>The tax characterization of WGP tokens is unclear. Accordingly, the tax treatment to which they will be subject is uncertain. All persons who wish to receive WGP tokens should seek independent tax advice prior to deciding whether to receive any WGP tokens. WGI does not make any representation as to whether any tax consequences may arise from purchasing or holding WGP tokens.</span></p>
  <br><br>
  <h2 style="color:#87b44c; text-transform:none;">Risks from third parties</h2>
  <br><br>
  <p><span>The tokenized nature of WGP tokens means that they are a blockchain-based asset. The security, transferability, storage, and accessibility of blockchain assets depends on factors outside of WGI&rsquo;s control, such as the security, stability, and suitability of the underlying blockchain (in this case, the Stellar blockchain), mining attacks, and who has access to the smart contract where the WGP tokens are stored. WGI is unable to assure that it can prevent such external factors from having any direct or indirect adverse impact on any of the WGP tokens. Persons intending to receive the WGP tokens should note that adverse events caused by such external factors may results in the loss of some or all of the WGP tokens. Such loss may be irreversible. WGI is not responsible for taking steps to retrieve WGP tokens lost in this manner.</span></p>
  <br><br>
  <h2 style="color:#87b44c; text-transform:none;">Risks in receiving the WGP tokens</h2>
  <br><br>
  <p><span>WGI cannot and does not guarantee or otherwise assure that there are no risks in relation to the issuance of the WGP tokens. The WGP tokens may, depending on the manner in which the relevant issuance is effected, involve third parties or external platforms (e.g., wallets). The involvement of such parties or platforms may introduce risks that would not otherwise be present, such as misconduct or fraud by the third party, or your failure to receive the WGP tokens upon duly making payment because of a third-party wallet&rsquo;s incompatibility with the WGP tokens. WGI is not responsible for any risks arising due to the involvement of third parties, including the risk of not receiving (or subsequently losing) any or all WGP tokens issued to you.</span></p>
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
