<?php
require('actions/users/securityAction.php');
require('actions/questions/RepayLoanAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/bannedAction.php');
?>

<?php
	if(isset($Loannotfound)){ 
	header('Location: loannotfound-yeslogin.php');
	}
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

.chat-header {
	height: 25px;
	width: auto;
	transition: transform 0.2s;
}

.logout-button:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.chat-header:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.everything-except-header {
	position: absolute;
	width: 100%;
}

.main {
	margin-top: 160px;
	margin-left: 10%;
	width: 80%;
	background-color: #f7f7f7;
}

.loan-recap {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 49%;
	height: 300px;
}

.chat-div {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 49%;
	height: 200px;
	margin-top: 50px;
}


.subtitle {
	font-weight: bold;
	margin-top: 20px;
	margin-bottom: 30px;
	font-size: 1.8rem;
	color: #00c4ff;
}

.text {
	font-size: 1.12rem;
	margin-top: 10px;
	color: #383838;
}

.column-1 {
	margin-left: 20px;
	height: 300px;
	width: 50%;
}

.column-2 {
	margin-left: 50%;
	height: 300px;
	width: 50%;
	margin-top: -237px;
}

.subtext1 {
	font-weight: bold;
	font-size: 1.8rem;
	color: #00c4ff;
}

.subtext2 {
	font-weight: bold;
	font-size: 1.2rem;
	color: #00c4ff;
}


.subtitle-chat {
	font-weight: bold;
	margin-top: 20px;
	margin-bottom: 5px;
	margin-left: 20px;
	font-size: 1.8rem;
	color: #00c4ff;
}

.chat-text {
	margin-left: 20px;
	font-size: 1.05rem;
	margin-bottom: 30px;
	color: #383838;
}

.chat-button {
	margin-left: 20px;
	background-color: #2b80ff;
	border: 0;
	padding: 10px;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 1.02rem;
	color: white;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform .2s;
}

.chat-button:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.05); /* IE 9 */
	-webkit-transform: scale(1.05); /* Safari 3-8 */
	transform: scale(1.05); 
}

.payment {
	margin-top: -554px;
	margin-left: 51%;
	width: 49%;
	height: 552px;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
}


.select-method {
	padding: 20px;
	width: calc(100% - 40px);
}

.payment-method-box {
	margin-right: 1%;
	border: 1px solid #2b80ff;
	padding: 3px;
	border-radius: 0.125rem;
	font-weight: 500;
	font-size: 1.02rem;
}

.payment-box {
	padding: 20px;
	font-size: 1.05rem;
	display: none;
}

#<?= $default; ?> {
	display: block;
}

#<?= $default; ?>-select {
	background-color: #2b80ff;
	color: white;
}

.payment-box-title {
	font-weight: bold;
	font-size: 1.35rem;
	color: #2b80ff;
}

.payment-box-bold {
	font-weight: bold;
	color: #2b80ff;
	font-size: 1.2rem;
}

.input-container {
	width: 50%;
}

.input {
	width: 200px;
	height: 30px;
	margin-top: 10px;
	border-radius: 0.125rem;
	border: 1px solid #2b80ff;
	padding-left: 7px;
	font-size: 0.92rem;
	font-weight: 500;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.input:focus {
	outline: 0px;
}

.button-container {
	margin-left: 50%;
	margin-top: -70px;
}

.submit-button {
	width: 200px;
	margin-top: 10px;
	height: 34px;
	border-radius: 0.125rem;
	border: 1px solid #2b80ff;
	background-color: #2b80ff;
	color: white;
	padding-left: 7px;
	font-size: 1.02rem;
	font-weight: bold;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.submit-button:hover {
	background-color: #00c4ff;
	border: 1px solid #00c4ff;
	-ms-transform: scale(1.05); /* IE 9 */
	-webkit-transform: scale(1.05); /* Safari 3-8 */
	transform: scale(1.05); 
}

.warning {
	font-size: 0.95rem;
	color: red;
	font-weight: 500;
	margin-top: 20px;
}

.error {
	margin-top: 35px;
	color: white;
	background-color: #00c4ff;
	text-align: center;
	border-radius: 0.325rem;
	font-weight: bold;
}

.success {
	margin-top: 20px;
	color: white;
	background-color: #12d400;
	border: 1px solid #12d400;
	text-align: center;
	border-radius: 0.325rem;
	font-weight: bold;
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


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f7f7f7;">

<div class="header">
	<div class="header-text">
		<div class="logo"><a href="dashboard.php" style="text-decoration: none; color: black"><span>Instant Borrow</span></a></div>
		<div class="lend"><a href="dashboard.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow-yeslogin.php" style="text-decoration: none; color: black"><span  class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="profile.php" style="text-decoration: none; color: black"><span class="login-text">Your Profile</span></a></div>
		<div class="signup"><a href="actions/users/chat.php" style="text-decoration: none; color: black"><img src="assets/images/chat.png" class="chat-header"></a><div style="margin-top: -32px; margin-left: 45px;"><a href="actions/users/logoutAction.php" style="text-decoration: none; color: black;"><img src="assets/images/logout.png" class="logout-button"></a></div></div>
	</div>
</div>

<div class="everything-except-header">

<div class="main">
	
	<div class="loan-recap">
		<div class="column-1">
		<div class="subtitle"><span>Repayment Recap</span></div>
		<div class="text">You Repay</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		<div class="text">You Borrowed</br><span class="subtext1"><?= $loan_amount; ?>$</span></div>
		</div>
		<div class="column-2">
		<div class="text">Repayment Deadline</br><span class="subtext2" style="color: red;"><?= date('M jS, Y', strtotime($repayment_date)); ?></span></div>
		<div class="text"  style="margin-top: 24px;">Lender</br><a href="user-profile-yeslogin.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><span class="subtext2"><?= $username_lender; ?></span></a></div>
		</div>
	</div>
	
	<div class="chat-div">
		<div class="subtitle-chat"><span>Chat with <a href="user-profile-yeslogin.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><span style="color: #560296;"><?= $username_lender; ?></span></a></span></div>
		<div class="chat-text"><span>Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<a href="" target="blank"><button class="chat-button">Chat with <span><?= $username_lender; ?></span></button></a>
	</div>
	
	<div class="payment">
		
				<div class="select-method">
					<p class="subtitle">Select Payment Method</p>
					<span class="payment-method-box" id="paypal-select" onclick="ShowPaypal()" style="display: <?= $paypal_notset; ?>;">Paypal</span><span class="payment-method-box" id="cashapp-select" onclick="ShowCashapp()" style="display: <?= $cashapp_notset; ?>;">Cashapp</span><span class="payment-method-box" id="venmo-select" onclick="ShowVenmo()" style="display: <?= $venmo_notset; ?>;">Venmo</span><span class="payment-method-box" id="zelle-select" onclick="ShowZelle()" style="display: <?= $zelle_notset; ?>;">Zelle</span><span class="payment-method-box" id="chime-select" onclick="ShowChime()" style="display: <?= $chime_notset; ?>;">Chime</span>
				</div>
				
				<div class="payment-box" id="paypal">
					<span class="payment-box-title">Paypal</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Paypal Address: <span style="color: #3d91e0;"><?= $paypal; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Paypal Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Paypal Transaction ID" name="paypal_id" required autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_paypal">
					</div>
					<div class="warning"><span>Lender will Confirm Repayment. Any Atempt at Fraud will Result in a Ban.</span></div>
					</form>
				
	
				<?php
				if(isset($error_message_paypal)){ 
				echo $error_message_paypal;
				}
				?>
				</div>
				
				<div class="payment-box" id="cashapp">
					<span class="payment-box-title">Cashapp</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Cashapp Address: <span style="color: #3d91e0;"><?= $cashapp; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Cashapp Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Cashapp Transaction ID" required name="cashapp_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_cashapp">
					</div>
					<div class="warning"><span>Lender will Confirm Repayment. Any Atempt at Fraud will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_cashapp)){ 
				echo $error_message_cashapp;
				}
				?>
				</div>
				
				<div class="payment-box" id="venmo">
					<span class="payment-box-title">Venmo</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Venmo Address: <span style="color: #3d91e0;"><?= $venmo; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Venmo Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Venmo Transaction ID" required name="venmo_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_venmo">
					</div>
					<div class="warning"><span>Lender will Confirm Repayment. Any Atempt at Fraud will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_venmo)){ 
				echo $error_message_venmo;
				}
				?>
				</div>
				
				<div class="payment-box" id="zelle">
					<span class="payment-box-title">Zelle</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Zelle Address: <span style="color: #3d91e0;"><?= $zelle; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Zelle Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Zelle Transaction ID" required name="zelle_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_zelle"> 
					</div>
					<div class="warning"><span>Lender will Confirm Repayment. Any Atempt at Fraud will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_zelle)){ 
				echo $error_message_zelle;
				}
				?>
				</div>
				
				<div class="payment-box" id="chime">
					<span class="payment-box-title">Chime</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Chime Address: <span style="color: #3d91e0;"><?= $chime; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Chime Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Chime Transaction ID" required name="chime_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_chime">
					</div>
					<div class="warning"><span>Lender will Confirm Repayment. Any Atempt at Fraud will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_chime)){ 
				echo $error_message_chime;
				}
				?>
				</div>
			
				
				<?php
				if(isset($success_message)){ 
				echo $success_message;
				}
				?>
	</div>
	
</div>

<div class="footer">
	<div class="footer-content">
		<div class="footer-1">
			<div><span>Instant Borrow</span></div>
		</div>
		<div class="footer-2">
			<div class="footer-subsection-title"><span>Company</span></div>
			<div class="footer-subsection-text"><a href="about.php" class="footer-link" target="blank"><span>About Instant Borrow</span></a></div>
			<div class="footer-subsection-text"><a href="contact.php" class="footer-link" target="blank"><span>Contact Us</span></a></div>
		</div>
		<div class="footer-3">
			<div class="footer-subsection-title"><span>Resources</span></div>
			<div class="footer-subsection-text"><a href="faq.php" class="footer-link" target="blank"><span>FAQ's</span></a></div>
			<div class="footer-subsection-text"><a href="support.php" class="footer-link" target="blank"><span>Support Center</span></a></div>
		</div>
		<div class="footer-4">
			<div class="footer-subsection-title"><span>Legal</span></div>
			<div class="footer-subsection-text"><a href="terms-conditions.php" class="footer-link" target="blank"><span>Terms & Conditions</span></a></div>
			<div class="footer-subsection-text"><a href="privcy-policy.php" class="footer-link" target="blank"><span>Privacy Policy</span></a></div>
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


<script>
function ShowPaypal() {
  document.getElementById("paypal").style.display = "block";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "none";
  
  document.getElementById("paypal-select").style.backgroundColor = "#2b80ff";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "white";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowCashapp() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "block";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "none";
  
   document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "#2b80ff";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "white";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowVenmo() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "block";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "none";
  
  document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "#2b80ff";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "white";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowZelle() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "block";
  document.getElementById("chime").style.display = "none";
  
  document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "#2b80ff";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "white";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowChime() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "block";
  
  document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "#2b80ff";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "white";
}
</script>

</body>

</html>
