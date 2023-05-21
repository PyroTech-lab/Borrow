<?php
require('actions/users/showYourLoanRequestsAction.php'); 
require('actions/questions/updateDatabases.php');
require('actions/users/notificationAction.php');
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
	text-align: right;
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
	width: 120px;
	text-align: left;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(100% - 207px);
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
	margin-top: -22px;
	margin-left: calc(100% - 67px);
}

.logout-button {
	height: 20px;
	width: auto;
	transition: transform 0.2s;
}

.chat-button {
	height: 25px;
	width: auto;
	transition: transform 0.2s;
}

.logout-button:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.chat-button:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.notification-unpaid {
	background-color: red;
	color: white;
	position: fixed; 
	margin-top: 80px;
	height: 38px;
	width: 100%;
	z-index: 10;
	text-align: center;
}

.notification-text-unpaid {
	font-weight: 500;
	font-size: 1.04rem;
}

.notification-image-unpaid {
	height: 28px;
	width: auto;
	margin-top: 5px;
	margin-bottom: -7px;
}


.notification-duesoon {
	background-color: orange;
	color: white;
	position: fixed; 
	margin-top: 80px;
	height: 38px;
	width: 100%;
	z-index: 10;
	text-align: center;
}

.notification-text-duesoon {
	font-weight: 500;
	font-size: 1.04rem;
}

.notification-image-duesoon {
	height: 28px;
	width: auto;
	margin-top: 5px;
	margin-bottom: -7px;
}



.notification-receivedrepayment {
	background-color: #1bbf02;
	color: white;
	position: fixed; 
	margin-top: 80px;
	height: 38px;
	width: 100%;
	z-index: 10;
	text-align: center;
}

.notification-text-receivedrepayment {
	font-weight: 500;
	font-size: 1.04rem;
}

.notification-image-receivedrepayment {
	height: 28px;
	width: auto;
	margin-top: 5px;
	margin-bottom: -7px;
}


.notification-receivedloan {
	background-color: #1bbf02;
	color: white;
	position: fixed; 
	margin-top: 80px;
	height: 38px;
	width: 100%;
	z-index: 10;
	text-align: center;
}

.notification-text-receivedloan {
	font-weight: 500;
	font-size: 1.04rem;
}

.notification-image-receivedloan {
	height: 28px;
	width: auto;
	margin-top: 5px;
	margin-bottom: -7px;
}

.notification_acknowledge {
	margin-top: -29px;
	background-color: transparent;
	text-align: right;
}

.notification_acknowledge-button {
	background-color: white;
	color: #1bbf02;
	border-radius: 0.325rem;
	height: 30px;
	padding-left: 6px;
	padding-right: 6px;
	border: 0px;
	font-weight: bold;
	font-size: 0.9rem;
	margin-right: calc(10% + 15px);
	transition: transform 0.5s;
}

.notification_acknowledge-button:hover {
	background-color: #1bbf02;
	color: white;
}

.everything-except-header {
	position: absolute;
	width: 100%;
}


.title {
	margin-left: 10%;
	color: #00c4ff;
	font-weight: bold;
	font-size: 2.32rem
}

.transaction-details {
	margin-left: 10%;
	width: 80%;
	padding-bottom: 15px;
	margin-top: 50px;
	margin-bottom: 28px;
	border: 1px solid #bababa;
	background-color: #f7f7f7;
	border-radius: 0.325rem;
	text-align: left;
}


.loan-amount {
	height: 23px;
	margin-top: 15px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.repay-amount {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 16.6%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.interest-rate	{
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 33.2%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.repay-date {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 49.8%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.feedback {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 66%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.payment-method {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 82.6%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}


.loan-request {
	margin-left: 10%;
	width: 80%;
	margin-top: -23px;
	text-align: left;
	margin-bottom: 35px;
	padding-bottom: 15px;
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

.delete-button {
	width: 140px;
	background-color: #ff2121;
	border: 0;
	border-radius: 0.325rem;
	height: 40px;
	font-weight: bold;
	font-size: 1.02rem;
	color: white;
}

.delete-button:hover {
	background-color: #d90000;
}


.error-message {
	font-weight: 500;
	font-size: 1.05rem;
	margin-bottom: 30px;
}

.under-container {
	margin-left: 10%;
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
	margin-left: 10%;
	wisth: 80%;
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
		<div class="lend"><a href="dashboard.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow-yeslogin.php" style="text-decoration: none; color: black"><span  class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="profile.php" style="text-decoration: none; color: black"><span class="login-text">Your Profile</span></a></div>
		<div class="signup"><a href="actions/users/chat.php" style="text-decoration: none; color: black"><img src="assets/images/chat.png" class="chat-button"></a><div style="margin-top: -32px; margin-left: 45px;"><a href="actions/users/logoutAction.php" style="text-decoration: none; color: black;"><img src="assets/images/logout.png" class="logout-button"></a></div></div>
	</div>
</div>

	<?php
		if(isset($UnpaidMsg)){ 
		echo '<div class="notification-unpaid"><img src="assets/images/warning-sign-red.png" class="notification-image-unpaid"><a href="unpaid-loans.php" style="text-decoration: none; color: white;"><span class="notification-text-unpaid">'.$UnpaidMsg.'</span></a></div>';
		}
	?>
	
	<?php
		if(isset($RepaymentDateSoonMsg)){ 
		echo '<div class="notification-duesoon"><img src="assets/images/warning-sign-orange.png" class="notification-image-duesoon"><a href="active-loans.php" style="text-decoration: none; color: white;"><span class="notification-text-duesoon">'.$RepaymentDateSoonMsg.'</span></a></div>';
		}
	?>
	
	<?php
		if(isset($ReceiveRepaymentMsg)){ 
		echo '<div class="notification-receivedrepayment"><img src="assets/images/success.png" class="notification-image-receivedrepayment"><span class="notification-text-receivedrepayment">'.$ReceiveRepaymentMsg.'</span><form class="notification_acknowledge" method="post"><input type="submit" value="OK" name="notification_repaid" class="notification_acknowledge-button"></form></div>';
		}
	?>
	
	<?php
		if(isset($ReceiveLoanMsg)){ 
		echo '<div class="notification-receivedloan"><img src="assets/images/success.png" class="notification-image-receivedloan"><span class="notification-text-receivedloan">'.$ReceiveLoanMsg.'</span><form class="notification_acknowledge" method="post"><input type="submit" value="OK" name="notification_receivedloan" class="notification_acknowledge-button"></form></div>';
		}
	?>


<div class="everything-except-header">

	<div style="margin-top: 160px;">
	<p class="title">Your Loans Requests</p>

 	<div class="transaction-details">
	<div class="loan-amount"><span>Loan Amount</span></div>
	<div class="repay-amount"><span >Repayment Amount</span></div>
	<div class="interest-rate"><span>Repayment Date</span></div>
	<div class="repay-date"><span>Request Date</span></div>
	<div class="feedback"><span>Expiry Date</span></div>
	</div>
			
	<div style="margin-left: 10%;">
		<?php
		
		 if(isset($errorMsg)){ 
			echo '<p class="error-message">'.$errorMsg.'</p>'; 
		 }?>
	</div>	
		        <?php 

            while($question = $getAllMyQuestions->fetch()){
                ?>
			

	<div class="loan-request">
		<div class="loan-details">	
				<div class="loan-amount"><span><?= $question['loan_amount']; ?>$</span></div>
				<div class="repay-amount"><span><?= $question['repayment_amount']; ?>$</span></div>
				<div class="interest-rate"><span><?=  date('M jS, Y', strtotime($question['repayment_date'])); ?></span></div>
				<div class="repay-date"><span><?= date('M jS, Y H:i', strtotime($question['request_date'])); ?></span></div>
				<div class="feedback"><span><?= date('M jS, Y H:i', strtotime($question['request_date']. ' + 2 days')); ?></span></div>
				<div class="payment-method">
				<form method="post" style="margin-top: -8px;"><input name="delete_request" class="delete-button" value="Delete Request" type="submit"></form>
				</div>
		</div>
	</div>
                <?php
            }

        ?>
		
		<div class="under-container">
		<a href="active-loans.php"><button class="load-more">Active Loans</button></a>
		<a href="borrow-yeslogin.php"><button class="borrow-button">Borrow Money</button></a>
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


<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>

</body>

</html>