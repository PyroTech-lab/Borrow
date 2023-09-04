<?php
require('actions/questions/updateDatabases.php');
?>

<?php
session_start();
if(isset($_SESSION['auth'])){
    header('Location: borrow-yeslogin.php');
}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="index" />
	
<title>Instant Borrow - Borrow Money Quickly and Easily</title>

<!-- icons generated with https://favicomatic.com/ -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/images/pageicons/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/pageicons/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/pageicons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/pageicons/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/images/pageicons/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/images/pageicons/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/images/pageicons/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/images/pageicons/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="assets/images/pageicons/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="assets/images/pageicons/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="assets/images/pageicons/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="assets/images/pageicons/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="assets/images/pageicons/mstile-310x310.png" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

<style>

.header {
	width: 100%;
	height: 75px;
	border-bottom: 1px solid #d6d6d6;
	position: fixed;
	background-color: white;
	z-index: 10;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.header-text {
	margin-left: 10%;
	width: 80%;
}

.logo {
	height: 23px;
	margin-top: 26px;
}

.logo-image {
	height: 62px;
	width: auto;
	margin-top: -20px;
}

.logo-image-footer {
	height: 75px;
	width: auto;
	margin-top: 10px;
}

.lend {
	width: 75px;
	text-align: center;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(47% - 44px);
}

.lend-text {
	font-weight: 500;
	border-radius: 0.125rem;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 10px;
	padding-right: 10px;
	outline: 1px solid #4d4d4d;
	color: #4d4d4d;
	transition: background-color 0.2s;
}

.lend-text:hover {
	background-color: #4d4d4d;
	color: white;
}

.borrow {
	width: 75px;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(47% + 44px);
}

.borrow-text {
	background-color: #00c4ff;
	color: white;
	font-weight: 500;
	border-radius: 0.125rem;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 10px;
	padding-right: 10px;
	outline: 1px solid #00c4ff;
	transition: background-color 0.2s;
}

.borrow-text:hover {
	background-color: #2b80ff;
	outline: 1px solid #2b80ff;
}


.login {
	width: 75px;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(100% - 175px);
}

.login-text {
	font-weight: 500;
	color: #4d4d4d;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 10px;
	padding-right: 10px;
	transition: outline 0.2s;
	transition: background-color 0.2s;
}

.login-text:hover {
	outline: 1px solid #4d4d4d;
	background-color: #fcfcfc;
	border-radius: 0.125rem;
}

.signup {
	width: 85px;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(100% - 85px);
}

.signup-text {
	background-color: #e0c22d;
	color: white;
	font-weight: 500;
	border-radius: 0.125rem;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 10px;
	padding-right: 10px;
	outline: 1px solid #e0c22d;
	transition: background-color 0.2s;
}

.signup-text:hover {
	background-color: #f7d631;
	outline: 1px solid #f7d631;
}

.everything-except-header {
	position: absolute;
	width: 100%;
}

.title {
	width: 100%;
	font-size: 2.52rem;
	color: #00c4ff;
	font-weight: bold;
}

.subtitle {
	width: 100%;
	margin-top: -25px;
	margin-bottom: 80px;
	margin-right:60px;
	font-size: 1.2rem;
	color: #383838;
}

.subtitle-bold {
	color: #2b80ff;
	font-weight: 500;
}

.main {
	margin-top: 160px;
	width: 50%;
	margin-left: 25%;
	background-color: white;
	text-align: left;
}

.form-text {
	font-weight: 500;
	font-size: 1.1rem;
}


.input {
	width: calc(100% - 7px);
	height: 40px;
	background-color: #f7f7f7;
	margin-top: -10px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.6rem;
	font-weight: bold;
	color: #00c4ff;
	padding-left: 7px;
}

.input:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.input:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.input-notes {
	width: calc(100% - 7px);
	height: 130px;
	margin-top: -10px;
	background-color: #f7f7f7;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.11rem;
	font-weight: 500;
	color: #00c4ff;
	padding-left: 7px;
	resize: vertical;
	padding-top: 5px;
}

.input-notes:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.input-notes:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.input[type="date"] {
  -webkit-text-fill-color: #00c4ff;
}

input::-webkit-datetime-edit-day-field:focus,
input::-webkit-datetime-edit-month-field:focus,
input::-webkit-datetime-edit-year-field:focus {
    background-color: #e5de00;
    color: white;
	border-radius: 0.325rem;
}

.borrow-button {
	margin-top: 35px;
	width: 100%;
	height: 50px;
	background-color: #00c4ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
	transition: background-color 0.2s;
}

.borrow-button:hover {
	background-color: #2b80ff;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.under-container {
	margin-top: 40px;
}

.how-to {
	padding: 9px;
	width: 15%;
	min-width: 140px;
	background-color: #de0404;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
}

.lend-button {
	padding: 9px;
	width: 15%;
	min-width: 140px;
	right: 0;
	background-color: #f2a100;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
}

.how-to:hover {
	background-color: #ff0303;
}

.lend-button:hover {
	background-color: #edd500;
}

.explain {
	margin-top: 50px;
	text-align: left;
	color: #2e2e2e;
}

.explain-title {
	font-size: 2.1rem;
	font-weight: bold;
	color: #00c4ff;
}

.step1 {
	width: 49%;
}

.step2 {
	width: 49%;
	margin-left: 51%;
	margin-top: -252px;
}

.step3 {
	width: 49%;
}

.step4 {
	width: 49%;
	margin-left: 51%;
	margin-top: -202px;
}

.inner-box {
	border: 1px solid #00c4ff;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
}

.steps-title {
	font-weight: bold;
	font-size: 1.72rem;
	color: #00c4ff;
	margin-bottom: 3px;
}

.steps-subtitle {
	font-weight: 500;
	font-size: 1.1rem;
}

.explain-bold {
	font-weight: 500;
	color: #2b80ff;
}

.footer {
	z-index: 10;
	width: 100%;
	margin-top: 80px;
	background-color: white;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top: 1px solid #d6d6d6;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}


.footer-content {
	margin-top: 20px;
	margin-left: 10%;
	width: 80%;
}

.footer-1 {
	height: 150px;
	width: 25%;
}

.footer-2 {
	height: 150px;
	width: 25%;
	margin-left: 25%;
	margin-top: -150px;
}

.footer-3 {
	height: 150px;
	width: 25%;
	margin-left: 50%;
	margin-top: -150px;
}

.footer-4 {
	height: 150px;
	width: 25%;
	margin-left: 75%;
	margin-top: -150px;
}

.footer-subsection-title {
	font-weight: 500;
	font-size: 1.07rem;
	margin-bottom: 20px;
}

.footer-subsection-text {
	font-size: 0.95rem;
	margin-bottom: 8px;
	color: #2b2b2b;
}

.footer-link {
	text-decoration: none;
	color: #2b2b2b;
}

.footer-bottom {
	text-align: center;
	margin-bottom: 15px;
}

.social-widgets {
	margin-top: 15px;
	margin-bottom: 15px;
}

.widget {
	height: 34px;
	width: 34px;
	margin: 8px;
	transition: transform 0.2s;
}

.widget:hover {
  -ms-transform: scale(1.1); /* IE 9 */
  -webkit-transform: scale(1.1); /* Safari 3-8 */
  transform: scale(1.1); 
}

.footer-bottom-text {
	font-size: 0.86rem;
	color: #2b2b2b;
}
</style>

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif;">

<div class="header">
	<div class="header-text">
		<div class="logo"><a href="about.php" style="text-decoration: none; color: black"><img src="assets/images/logo.png" class="logo-image"></a></div>
		<div class="lend"><a href="index.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow-nologin.php" style="text-decoration: none; color: black"><span class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="login.php" style="text-decoration: none; color: black"><span class="login-text">Login</span></a></div>
		<div class="signup"><a href="signup.php" style="text-decoration: none; color: black"><span class="signup-text">Sign Up</span></a></div>
	</div>
</div>

<div class="everything-except-header">

<div class="main">
	<p class="title">Borrow Money</p>
	<p class="subtitle"><span class="subtitle-bold">Take out a Loan</span> on Instant Borrow - <span class="subtitle-bold">0% Platform Fees</span>, No <span class="subtitle-bold">Paperwork</span>, Incredibly <span class="subtitle-bold">Fast and Easy</span>.</p>
		
		<form onsubmit="return validateMyForm();" method="post">
		<p class="form-text">Loan Amount (USD)</p>
		<input name="loan_amount" id="loan" class="input" type="number" min="10" max="2000" required autocomplete="off">
		<p class="form-text">Repayment Amount (USD)</p>
		<input name="repayment_amount" id="repayment" class="input" type="number" min="11" max="4000" required autocomplete="off">
		<div id="text-box" style="color: red;"></div>
		<p class="form-text">Repayment Date</p>
		<input name="repayment_date" id="datefield" class="input" type="date" required min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<p class="form-text">Notes</p>
		<textarea name="notes" class="input-notes" autocomplete="off"></textarea>
		<input name="submit" type="submit" class="borrow-button" value="Borrow Money" formaction="signup-borrow.php">
		</form>
		
		
	
	
		
		<div class="under-container">
			<a href="#explain"><button class="how-to">How to Borrow?</button></a>
			<a href="index.php"><button class="lend-button">Lend Money</button></a>
		</div>

		<div class="explain">
			<a href="borrower-info" style="text-decoration: none;"><p class="explain-title">How to Borrow Money on Instant Borrow</p></a>
			
			<p style="font-weight: 500; font-size: 1.28rem; margin-top: 50px; color:#2b80ff;">Welcome to the World of Peer-to-Peer Finance.</p> 
			
			<p style="font-weight: normal;">Instant Borrow connects Borrowers directly with Lenders and eliminates the need for Banks or other Financial Institutions.</br>Keep total Control over your Funds, Transact Directly with other Users and Forget about lengthy Approval Processes and High Fees.</p>

			<p style="font-weight: 500; font-size: 1.28rem; color:#2b80ff;">The Easiest Way to Get a Loan Right Now, No Matter Your Credit Score.</p>
			
			<p style="font-weight: bold; font-size: 1.55rem; color: #00c4ff; margin-top: 60px; margin-bottom: 60px;">THIS IS HOW TO DO IT:</p>
			
			<div class="step1"><p class="steps-title">1-CREATE AN ACCOUNT</p><div class="inner-box"><p class="steps-subtitle ">Sign Up and Verify your Account</p><p>What you Need to <span class="explain-bold">Get Started</span>:</br>-Valid <span class="explain-bold">Email Address</span></br>-<span class="explain-bold">Phone Number</span></br>-Form of <span class="explain-bold">Identification</span></p></div></div>
			<div class="step2"><p class="steps-title">2-REQUEST A LOAN</p><div class="inner-box"><p class="steps-subtitle">Create a Loan request:</p><p>The <span class="explain-bold">Amount</span> you Want to <span class="explain-bold">Borrow</span></br>The <span class="explain-bold">Amount</span> you Will <span class="explain-bold">Repay</span></br>The  <span class="explain-bold">Repayment Date</span></br><span class="explain-bold">Notes</span> About the Loan</p></div></div>
			<div class="step3"><p class="steps-title">3-RECEIVE MONEY</p><div class="inner-box"><p class="steps-subtitle">When your Loan is Granted:</p><p>Lender Sends <span class="explain-bold">Payment</span></br><span class="explain-bold">Confirm</span> Funds Have Been Received</p></div></div>
			<div class="step4"><p class="steps-title">4-REPAY</p><div class="inner-box"><p class="steps-subtitle">On (Or Before) the Repayment Date:</p><p><span class="explain-bold">Send Funds</span> to the Borrower</br><span class="explain-bold">Confirm</span> the Transaction was Made</p></div></div>
			
			<p style="margin-top: 60px;">All payments are Confirmed by Instant Borrow and are Protected with Advanced security Measures. The Marketplace is closely Monitored and all Users are Verified to ensure a safe Trading Environment.</p>
			
			
			<p>Personnal Information is Fully Protected by Instant Borrow and is only Given to the Lender if the Borrower fails to Repay his Loan.</p>

			<p>If you have any Questions, please <a href="contact.php" target="blank" style="color: #3d91e0; text-decoration: none;">Contact Us</a> or Read our User Guides at the Bottom of the Page. We'll always be there for you!</p>

			<p style="font-weight: 500; font-size: 1.28rem; color: #2b80ff;">Borrowing Money on Instant Borrow is Safe, Easy and Fast - Experience the Next Revolution in the world of Finance and get all the Funds you Need in Record Time</p>
		</div>
</div>

<div class="footer">
	<div class="footer-content">
		<div class="footer-1">
			<div><img src="assets/images/logo.png" class="logo-image-footer"></div>
		</div>
		<div class="footer-2">
			<div class="footer-subsection-title"><span>Company</span></div>
			<div class="footer-subsection-text"><a href="about-loggedin.php" class="footer-link" target="blank"><span>About Instant Borrow</span></a></div>
			<div class="footer-subsection-text"><a href="contact.php" class="footer-link" target="blank"><span>Contact Us</span></a></div>
		</div>
		<div class="footer-3">
			<div class="footer-subsection-title"><span>Resources</span></div>
			<div class="footer-subsection-text"><a href="lender-info.php" class="footer-link" target="blank"><span>Lender's Guide</span></a></div>
			<div class="footer-subsection-text"><a href="borrower-info.php" class="footer-link" target="blank"><span>Borrower's Guide</span></a></div>
		</div>
		<div class="footer-4">
			<div class="footer-subsection-title"><span>Legal</span></div>
			<div class="footer-subsection-text"><a href="terms-conditions.php" class="footer-link" target="blank"><span>Terms & Conditions</span></a></div>
			<div class="footer-subsection-text"><a href="privacy-policy.php" class="footer-link" target="blank"><span>Privacy Policy</span></a></div>
		</div>
		<div class="footer-bottom">
			<div class="social-widgets">
			<a href="https://facebook.com" class="footer-link" target="blank"><img class="widget" src="assets/images/facebook-widget.png"></a>
			<a href="https://twitter.com" class="footer-link" target="blank"><img class="widget" src="assets/images/twitter-widget.png"></a>
			<a href="https://instagram.com" class="footer-link" target="blank"><img class="widget" src="assets/images/instagram-widget.png"></a>
			<a href="https://reddit.com" class="footer-link" target="blank"><img class="widget" src="assets/images/reddit-widget.png"></a>
			<a href="https://linkedin.com" class="footer-link" target="blank"><img class="widget" src="assets/images/linkedin-widget.png"></a>
			<a href="https://discord.com" class="footer-link" target="blank"><img class="widget" src="assets/images/discord-widget.png"></a>
			</div>
			<div class="footer-bottom-text"><span>Copyright © 2023 - <?= date("Y"); ?> Instant Borrow. All rights reserved.</span></div>
		</div>
	</div>
</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>


<script>

function validateMyForm()
{
    var mrp = parseFloat($('#loan').val());
    var id = parseFloat($('#repayment').val());

    if (mrp >= id) {
    document.getElementById('text-box').innerHTML = "Repayment Amount must be larger than Loan Amount!";
    return false;
  }

  return true;
}

</script>


</body>

</html>
