<?php
require('actions/users/securityAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/notificationAction.php');
require('actions/users/addVerificationsAction.php');
require('actions/users/ProfileVerificationsAction.php');
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

.main {
	margin-top: 160px;
	width: 50%;
	margin-left: 25%;
	background-color: white;
	text-align: left;
}


.title {
	color: #2b80ff;
	font-weight: bold;
	font-size: 2.32rem
}

.subtitle {
	margin-top: -25px;
}

.form {
	margin-top: 100px;
}

.account {
	color: #2b80ff;
	margin-left: 5px;
}

.payment-method-box {
	margin-left: 3px;
	border: 1px solid #e03434;
	border-radius: 0.125rem;
	padding-left: 2px;
	padding-right: 3px;
	background-color: #fafafa;
	color: #e03434;
	font-weight: 500;
	font-size: 0.85rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform .2s;
}

.payment-method-box:hover {
	border: 1px solid #ff2424;
	color: #ff2424;
	font-size: 0.9rem;
}

.payment-method-box:empty {
	margin: 0px;
	padding: 0px;
	border: 0;
}

.payment-method-box2 {
	margin-left: 5px;
	border: 1px solid #31b52f;
	border-radius: 0.125rem;
	padding-left: 2px;
	padding-right: 3px;
	background-color: #fafafa;
	color: #31b52f;
	font-weight: 500;
	font-size: 0.85rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform .2s;
}

.payment-method-box2:hover {
	border: 1px solid #33d130;
	color: #33d130;
	font-size: 0.9rem;
}

.payment-method-box2:empty {
	margin: 0px;
	padding: 0px;
	border: 0;
}

.input-text {
	font-weight: 500;
	font-size: 1.35rem;
}

.input {
	width: calc(100% - 7px);
	height: 40px;
	background-color: #f7f7f7;
	margin-top: 0px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1rem;
	font-weight: bold;
	color: #757575;
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

.set-button {
	margin-top: 5px;
	width: 100%;
	height: 50px;
	background-color: #2b80ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.set-button:hover {
	background-color: red;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.delete-form {
	width: 100%;
	text-align: right;
	margin-top: -160px;
	margin-bottom: 235px;
}

.delete-button {
	border-radius: 0.125rem;
	border: 1px solid #2b80ff;
	color: #2b80ff;
	font-size: 0.9rem;
	font-weight: bold;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	padding-top: 3px;
	padding-bottom: 3px;
}

.under-container {
	margin-top: 50px;
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
	width: 100%;
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

	<div class="main">
	<p class="title">Account Verifications</p>
	<p class="subtitle">We collect this information to make our platform more secure and ensure a smooth lending process.</p>
	
	
	<form class="form">
		<p class="input-text">Email Adress <span class="account"><?= $_SESSION['email']; ?></span><span class="payment-method-box2">Verified</span></p>
		<input id="loan" class="input" style="text-align: center;" placeholder="<?= $_SESSION['email']; ?>" readonly>
		<input name="" type="submit" class="set-button" value="Update Email Address">
	</form>
	
	<form method="post" class="form">
		<p class="input-text">Phone Number <span class="account"><?= $row['phone_number']; ?></span><span class="payment-method-box"><?php if(isset($not_verified_phone)){echo ''.$not_verified_phone.'';}?></span><span class="payment-method-box2"><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}?></span></p>
		<input name="phone_set" id="loan" class="input" required autocomplete="off" placeholder="Enter your phone number">
		<input name="phone_submit" type="submit" class="set-button" value="Add Phone Number">
	</form>

	<form method="post" class="form">
		<p class="input-text">Address <span class="payment-method-box"><?php if(isset($not_verified_address)){echo ''.$not_verified_address.'';}?></span><span class="payment-method-box2"><?php if(isset($verified_address)){echo ''.$verified_address.'';}?></span></p>
		
		<span class="adress-text">Street and House number <span class="account"><?= $row2['address']; ?></span></span>
		<input name="address_set" id="loan" class="input" required autocomplete="off" placeholder="Enter Steet Name and House Number">
		
		<span class="adress-text">City and ZIP Code <span class="account"><?= $row2['city']; ?></span></span>
		<input name="city_set" id="loan" class="input" required autocomplete="off" placeholder="Enter City and ZIP Code">
		
		<span class="adress-text">Country <span class="account"><?= $row2['country']; ?></span></span>
		<input name="country_set" id="loan" class="input" required autocomplete="off" placeholder="Enter Country">
		<input name="address_submit" type="submit" class="set-button" value="Add Address">
	</form>

	<form method="post" class="form">
		<p class="input-text">ID Card <span class="account"><?= $row3['identity_card']; ?></span><span class="payment-method-box"><?php if(isset($not_verified_idcard)){echo ''.$not_verified_idcard.'';}?></span><span class="payment-method-box2"><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}?></span></p>
		<input name="idcard_set" id="loan" class="input" required autocomplete="off" placeholder="Enter your ID Card">
		<input name="idcard_submit" type="submit" class="set-button" value="Add ID Card">
	</form>


 	
		
		<div class="under-container">
		<a href="dashboard.php"><button class="load-more">Lend Money</button></a>
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