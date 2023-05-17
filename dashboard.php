<?php
require('actions/users/securityAction.php');
require('actions/questions/showAllRequestsAction.php');
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
	width: 10%;
	text-align: center;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(45% - 35px);
}

.borrow {
	width: 10%;
	text-align: right;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(45% + 35px);
}


.login {
	width: 10%;
	text-align: left;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(90% - 60px);
}

.signup {
	width: 10%;
	text-align: right;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(90% - 20px);
}

.everything-except-header {
	position: absolute;
}

.main {
	margin-top: 160px;
	width: 80%;
	margin-left: 10%;
	background-color: white;
}


.sticky{
	z-index: 5;
	position: fixed;
	margin-top: -20px;
	width: 20%;
	background-color: white;
	text-align: left;
}

.sticky-text {
	width: 75%;
	font-size: 1.11rem;
	color: #383838;
}

.sticky-input {
	width: calc(100% - 7px);
	height: 40px;
	background-color: #f7f7f7;
	margin-top: -10px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.35rem;
	font-weight: bold;
	color: #00c4ff;
	padding-left: 7px;
}

.sticky-input:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.sticky-input:focus {
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
sticky-input[type=number] {
  -moz-appearance: textfield;
}

.sticky-input[type="date"] {
  -webkit-text-fill-color: #00c4ff;
}

input::-webkit-datetime-edit-day-field:focus,
input::-webkit-datetime-edit-month-field:focus,
input::-webkit-datetime-edit-year-field:focus {
    background-color: #e5de00;
    color: white;
	border-radius: 0.325rem;
}

.find-offers {
	margin-top: 35px;
	width: 103%;
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

.find-offers:hover {
	background-color: red;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.clear-filters {
	margin-top: 10px;
	border-radius: 0.125rem;
	border: 1px solid #2b80ff;
	color: #2b80ff;
	background-color: white;
	font-weight: 500;
	font-size: 0.85rem;
	transition: transform 0.2s;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.clear-filters:hover {
	border: 1px solid #00c4ff;
	color: #00c4ff;
}

.main-right {
	width: 75%;
	margin-left: 25%;
}

.title {
	width: 90%;
	margin-left: 80px;
	font-size: 2.52rem;
	color: #00c4ff;
	font-weight: bold;
}

.subtitle {
	width: 90%;
	margin-top: -25px;
	margin-bottom: 80px;
	margin-left: 80px;
	margin-right:60px;
	font-size: 1.1rem;
	color: #383838;
}

.sort-by {
	margin-left: 60px;
	margin-bottom: -39px;
}

.sort-by-text {
	margin-top: -10px;
	text-align: center;
	border: 2px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	margin-left: calc(85% - 150px);
	height: 55px;
	border-radius: 0.325rem
}

.sort-by-input {
	border: none;
	width: 100%;
	font-weight: bold;
	font-size: 0.92rem;
	text-align: left;
	background-color: transparent;
	transition: transform 0.2s;
	
}

.sort-by-input:hover {
	outline: none;
	color: #00c4ff
}

.sort-by-input:active {
	outline: none;
	color: #00c4ff;
	caret-color: transparent;
}

.sort-by-input:focus {
	outline: none;
	color: #00c4ff;
	caret-color: transparent;
}

.sort-by-column-1 {
	margin-top: 2px;
	margin-left: 5px;
	width: calc(50% - 5px);
	height: 30px;
}

.sort-by-column-2 {
	width: calc(50% - 5px);
	height: 30px;
	margin-left: calc(50% - 5px);
	margin-top: -30px;
	
}

.container {
	margin-left: 20px;
	margin-right: 20px;
}

.transaction-details {
	margin-left: 60px;
	margin-bottom: 28px;
	padding: 10px;
	border: 1px solid #bababa;
	background-color: #f7f7f7;
	border-radius: 0.325rem;
	text-align: left;
}

.borrower {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	padding: 4px;
	color: #3d91e0;
	font-weight: 500;
	font-size: 0.95rem;
}

.loan-amount {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 18%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}

.repay-amount {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 36%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}

.interest-rate	{
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 54%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}

.repay-date {
	height: 23px;
	text-align: center;
	width: 17%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 72%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}


.loan-request {
	margin-left: 60px;
	margin-top: -23px;
	text-align: left;
	margin-bottom: 35px;
	padding-top: 15px;
	padding-bottom: 15px;
	padding-left: 10px;
	padding-right: 10px;
	border: 1px solid #bababa;
	background-color: white;
	border-radius: 0.325rem;
	transition: transform .2s;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.loan-request:hover {
	background-color: #fbfbfb;
  -ms-transform: scale(1.0055); /* IE 9 */
  -webkit-transform: scale(1.0055); /* Safari 3-8 */
  transform: scale(1.0055); 
}

.lend-button {
	width: 100px;
	margin-left: 5%;
	background-color: #04db5a;
	border: 0;
	border-radius: 0.325rem;
	height: 31px;
	font-weight: bold;
	font-size: 0.95rem;
	color: white;
}

.lend-button:hover {
	background-color: green;
}

.under-container {
	margin-left: 60px;
	margin-bottom: 100px;
}

.load-more {
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

.borrow-button {
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

.load-more:hover {
	background-color: yellow;
}

.borrow-button:hover {
	background-color: green;
}

.explain {
	margin-left: 80px;
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
		<div class="logo"><a href="dashboard.php" style="text-decoration: none; color: black"><span>Instant Borrow</span></a></div>
		<div class="lend"><a href="dashboard.php" style="text-decoration: none; color: black"><span>Lend</span></a></div>
		<div class="borrow"><a href="borrow-yeslogin.php" style="text-decoration: none; color: black"><span>Borrow</span></a></div>
		<div class="login"><a href="profile.php" style="text-decoration: none; color: black"><span>Your Profile</span></a></div>
		<div class="signup"><a href="actions/users/logoutAction.php" style="text-decoration: none; color: black"><span>Log Out</span></a></div>
	</div>
</div>

<div class="everything-except-header">

<div class="main">
	<div class="sticky" id="sticky">
	<form method="GET">
	<div class="sticky-text">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search" type="number" min="10" max="2000" autocomplete="off">
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search" type="number" min="0" autocomplete="off">
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trust_score_search" type="number" min="0" max="100" autocomplete="off">
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search" id="datefield" autocomplete="off">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear" value="Clear Filters" class="clear-filters">
	</form>
	</div>
	</div>

	<div class="main-right">
		<p class="title">Lend Money. Get Big Returns.</p>
		<p class="subtitle">Buy Bitcoin with over 350 payment methods to choose from, including bank transfers, online wallets, and gift cards.</p>

		<div class="container">
		
			<div class="sort-by">
				<p style="margin-left: calc(85% - 150px); font-size: 1.05rem; font-weight: 500;">Sort By</p>
				<div class="sort-by-text">
					<form method="GET">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest" value="Interest rate" type="submit">
					</div>
					</form>
				</div>
			</div>
		
		<div style="margin-left: 60px;"><p style="font-size: 1.15rem; font-weight: 500;">Latest Offers:</p></div>
			<div class="transaction-details">
						<div class="borrower"><span style="color: #383838;">Borrower</span></div>
						<div class="loan-amount"><span>Loan Amount</span></div>
						<div class="repay-amount"><span >Repayment Amount</span></div>
						<div class="interest-rate"><span>Interest Rate</span></div>
						<div class="repay-date"><span>Repayment Date</span></div>
			</div>
			
			<?php 
            while($question = $getAllQuestions->fetch()){
                ?>
			<div class="loan-request">
				<div class="loan-details">
						<div class="borrower"><a href="user-profile-yeslogin.php?id=<?=$question['id_borrower']; ?>" style="text-decoration: none; color: #3d91e0;"><span><?= $question['username_borrower']; ?></span></a></div>
						<div class="loan-amount"><span><?= $question['loan_amount']; ?>$</span></div>
						<div class="repay-amount"><span><?= $question['repayment_amount']; ?>$</span></div>
						<div class="interest-rate"><span><?= $question['interest']; ?>%</span></div>
						<div class="repay-date"><span><?= $question['repayment_date']; ?></span></div>
				</div>
				<div style="text-align: right; margin-top: -31px; margin-bottom: 0px;">
					<a href="loan-yeslogin.php?id=<?= $question['id']; ?>"><button class="lend-button">LEND</button><a>
				</div>
			</div>
			<?php
				}
			?>
			
			
			
			<div class="under-container">
				<button class="load-more">Load More Offers</button>
				<a href="borrow-yeslogin.php"><button class="borrow-button">Borrow Money</button></a>
			</div>
		
		</div>
		
		
		<div class="explain">
			<p class="explain-title">How to Lend Money on Instant Borrow</p>
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
</div>

<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>

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

</body>

</html>