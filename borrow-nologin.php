<?php
require('actions/questions/updateDatabases.php');
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Instant Borrow</title>

<!-- icons generatoed with https://favicomatic.com/ -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/images/icons/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/images/icons/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/images/icons/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/images/icons/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/images/icons/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

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

.main {
	margin-top: 160px;
	width: 50%;
	margin-left: 25%;
	background-color: white;
	text-align: left;
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
}

.borrow-button:hover {
	background-color: red;
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
	background-color: red;
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
	background-color: red;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
}

.how-to:hover {
	background-color: yellow;
}

.lend-button:hover {
	background-color: green;
}

.explain {
	margin-top: 80px;
	text-align: left;
}

.explain-title {
	font-size: 1.8rem;
	font-weight: bold;
	color: #00c4ff;
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

.footer-text {
	margin-left: 10%;
}
</style>

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif;">

<div class="header">
	<div class="header-text">
		<div class="logo"><a href="index.php" style="text-decoration: none; color: black"><span>Instant Borrow</span></a></div>
		<div class="lend"><a href="index.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow-nologin.php" style="text-decoration: none; color: black"><span class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="login.php" style="text-decoration: none; color: black"><span class="login-text">Login</span></a></div>
		<div class="signup"><a href="signup.php" style="text-decoration: none; color: black"><span class="signup-text">Sign Up</span></a></div>
	</div>
</div>

<div class="everything-except-header">

<div class="main">
	<p style="font-weight: bold; font-size: 2.52rem; color: #00c4ff;">Borrow Money</p>
	<p style="font-size: 1.1rem; color: #383838; margin-top: -37px; margin-bottom: 50px;">Buy Bitcoin with over 350 payment methods to choose from, including bank transfers and gift cards.</p>
		<form onsubmit="return validateMyForm();" method="post">
		<p>Loan Amount (USD)</p>
		<input name="loan_amount" id="loan" class="input" type="number" min="10" max="2000" required autocomplete="off">
		<p>Repayment Amount (USD)</p>
		<input name="repayment_amount" id="repayment" class="input" type="number" min="11" max="4000" required autocomplete="off">
		<div id="text-box" style="color: red;"></div>
		<p>Repayment Date</p>
		<input name="repayment_date" id="datefield" class="input" type="date" required>
		</br>
		<p>Notes</p>
		<textarea name="notes" class="input-notes" autocomplete="off"></textarea>
		<input name="submit" type="submit" class="borrow-button" value="Borrow Money" formaction="signup-borrow.php">
		</form>
		
		
	
	
		
		<div class="under-container">
			<a href="#explain"><button class="how-to">How to Borrow?</button></a>
			<a href="index.php"><button class="lend-button">Lend Money</button></a>
		</div>

			<div class="explain" id="explain">
			<p class="explain-title">How to Borrow Money on Instant Borrow</p>
			<p>Buy Bitcoin (BTC) at the lowest possible price no matter where you are. Paxful works on the principle of peer-to-peer finance that enables you to buy BTC with as little as 10 USD. You can buy directly from people just like you—without banks or corporations.</p>

			<p>The best part? No fees when you purchase Bitcoin on Paxful. That means you get more crypto for your money. Thanks to nearly 400 payment methods available on the platform, you can turn your cash into Bitcoin with online wallets or bank transfers. You can also trade other cryptocurrencies like Ethereum for Bitcoin, or even sell gift cards to get fractions of BTC in return.</p>

			<p>Paxful is protected with vault-level security and regulated in the United States as a Money Services Business. The marketplace is strictly monitored by our army of analysts and users are verified to ensure a safe trading environment. With all these safety measures in place, you can rest easy knowing that your information and crypto are safe with us.</p>

			<p>Here’s how you can start buying Bitcoin on Paxful:</p>

			<p>1) Sign up for a Paxful account - Create and verify your account to get your free Bitcoin wallet with 2FA security. Setting your account up is easy and can be done in minutes. All you need is a valid email address, phone number, and ID to get started.
			</br></br>2) Find a vendor – Click Buy from the main menu and select Buy Bitcoin. Set the amount you want to spend, your preferred currency, and your payment method of choice in the sidebar widget to find local and international sellers that match your requirements.
			We recommend filtering for all the User Types (Ambassador, Associate, etc.) to show the most trustworthy vendors who have undergone an additional layer of security checks from Paxful.
			</br></br>3) Read the requirements – Click on the Buy button to view the vendor’s terms. Depending on the payment method, sellers may also ask you to provide a screenshot of the funds from your online wallet, a photo of the bank deposit slip, or a copy of the receipt of the gift card you purchased. Some vendors may also ask you to send a selfie holding a valid ID for additional security purposes.
			</br></br>4) Start the trade – If you can comply with the seller’s terms, set the amount of Bitcoin you want to buy in the widget then click Buy now to start the trade. This will open a live chat with the seller where you will receive further instructions on how to complete the trade. The live chat records all messages and will protect you if you encounter any problems, so please don’t communicate outside of Paxful.
			</br></br>5) Send payment and receive your BTC – Once all requirements have been fulfilled and the vendor gives the go signal, transfer the payment and click Paid immediately. At this point, the vendor’s BTC is locked in escrow to prevent your trade partner from accepting your payment and not releasing the crypto. As soon as the seller confirms your payment, the Bitcoin will be released from escrow and transferred to your Paxful Wallet.
			All that’s left is to give the seller a review of your experience and that’s it! For more information, you can also watch our detailed video walkthrough on how to buy Bitcoin on Paxful.</p>

			<p>If you have any questions, please click on the chat icon at the bottom right corner of the page to get in touch with our support team. We’re here for you 24/7—even on holidays!</p>

			<p>Buying Bitcoin on Paxful is safe and easy, but don’t take our word for it—read reviews from countless Paxful users around the world.</p>
			</div>
</div>

<div class="footer">
	<p class="footer-text">Instant Borrow</p>
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
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("min", today);
</script>

<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+5; //January is 0! In reality max 4 months.
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);

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