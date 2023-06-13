<?php
require('actions/users/securityAction.php');
require('actions/questions/RepaymentProofReceivedAction.php');
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
	margin-left: 20%;
	width: 60%;
	background-color: #f7f7f7;
}

.loan-recap {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 54%;
	height: 300px;
}

.disclaimer {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 100%;
	margin-top: 10px;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
	font-weight: 500;
	color: #2b80ff;
}

.confirmation-div {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 100%;
	height: 400px;
	margin-top: 10px;
}


.subtitle {
	font-weight: bold;
	margin-top: 20px;
	margin-left: 20px;
	margin-bottom: 40px;
	font-size: 1.8rem;
	color: #00c4ff;
}

.text {
	font-size: 1.12rem;
	margin-top: 10px;
	color: #383838;
}


.subtext1 {
	font-weight: bold;
	font-size: 1.8rem;
	color: #00c4ff;
}

.subtext2 {
	font-weight: bold;
	font-size: 1.2rem;
	color: #2b80ff;
}


.subtitle-feedback {
	font-weight: bold;
	margin-top: 20px;
	margin-bottom: 5px;
	margin-left: 20px;
	font-size: 1.8rem;
	color: #00c4ff;
}


.wrapper {
	width: 300px;
	padding-top: 1px;
	padding-bottom: 1px;
	transition: transform 0.2s;
	margin-bottom: 35px;

}

.wrapper:hover {
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.text-feedback {
	margin-left: 20px;
	margin-top: 20px;
}

.label {
	font-weight: 500;
}



.checkmark {
	height: 20px;
	width: auto;
	margin-bottom: -5px;
	margin-right: 5px;
}

.cross {
	height: 20px;
	width: auto;
	margin-bottom: -5px;
	margin-right: 5px;
}



.submit {
	margin-top: 15px;
	width: 150px;
	height: 40px;
	background-color: #00c4ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.submit:hover {
	background-color: red;
	-ms-transform: scale(1.03); /* IE 9 */
	-webkit-transform: scale(1.03); /* Safari 3-8 */
	transform: scale(1.03); 
}

.error-message {
	border-radius: 0.425rem;
	background-color: red;
	border: 1px solid red;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	width: 100%;
	margin-top: 42px;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
	font-weight: 500;
	color: white;
	sdiplay: block;
}

.error-message-feedback {
	border-radius: 0.425rem;
	background-color: red;
	border: 1px solid red;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	width: 100%;
	margin-top: 50px;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
	font-weight: 500;
	color: white;
	sdiplay: block;
}

.success-message-feedback {
	border-radius: 0.425rem;
	background-color: #12d400;
	border: 1px solid #12d400;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	width: 100%;
	margin-top: 50px;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
	font-weight: 500;
	color: white;
	sdiplay: block;
}

.payment-received {
	border-radius: 0.425rem;
	background-color: #12d400;
	border: 1px solid #12d400;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	width: 100%;
	margin-top: 42px;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
	font-weight: 500;
	color: white;
}

.payment-notreceived {
	border-radius: 0.425rem;
	background-color: red;
	border: 1px solid red;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	width: 100%;
	margin-top: 42px;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
	font-weight: 500;
	color: white;
}


.feedback-div {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 49%;
	height: 430px;
	margin-top: 50px;
}

.chat-div {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 44%;
	height: 300px;
	margin-left: 56%;
	margin-top: -302px;
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
	transition: transform 0.2s;
}

.chat-button:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.05); /* IE 9 */
	-webkit-transform: scale(1.05); /* Safari 3-8 */
	transform: scale(1.05); 
}
.footer {
	z-index: 10;
	width: 100%;
	margin-top: 150px;
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
		<div class="subtitle"><span>Repayment Proof Received</span></div>
		<div style="margin-left: 20px;">
		<div class="text"><a href="user-profile-yeslogin.php?id=<?= $id_borrower; ?>" target="blank" style="text-decoration: none;"><span class="subtext2"><?= $username_borrower; ?></span></a> Submitted Proof of his <span class="subtext2"><?= $repayment_amount; ?>$</span> Repayment.</span></div>
		<div class="text">Payment Date</br><span class="subtext2"><?= date('M jS, Y', strtotime($repaid_date)); ?></span></div>
		<div class="text">Payment Method</br><span class="subtext2"><?= $payment_method_repayment; ?></span></div>
		</div>
	</div>
	<div class="chat-div">
		<div class="subtitle-chat"><span>Chat with <a href="user-profile-yeslogin.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><span style="color: #560296;"><?= $username_lender; ?></span></a></span></div>
		<div class="chat-text"><span>Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<a href="" target="blank"><button class="chat-button">Chat with <span><?= $username_borrower; ?></span></button></a>
	</div>
	
	<div class="disclaimer">
	<span>Amount Received on your Account may be Slightly Lower due to <?= $payment_method_repayment; ?>'s Fees.</span>
	</div>
	
	<div class="confirmation-div">
		<div  class="subtitle-feedback"><span>Confirm Reception of Payment</span></div>
		<div  class="text-feedback"><span>Check your <?= $payment_method_repayment; ?> Account to see if you Have Received the Funds.</span></div>
		
		<form method="post" style="margin-left: 20px; margin-top: 35px;">
		<div class="wrapper">
		<input type="radio" name="repayment" value="received" class="input" id="received" required >
		<label class="label" for="received"><img class="checkmark" src="assets/images/checkmark.png">Funds Received</label>
		</div>
		<div class="wrapper">
		<input type="radio" name="repayment" value="not_received" class="input" id="not_received" required>
		<label class="label" for="not_received"><img class="cross" src="assets/images/cross.png">Funds not Received</label>
		</div>
		<p style="color: red; font-weight: 500;">If Funds are Once Again Reported as Not Received, the Borrower will be Banned for Fraud.</p>
		<input type="submit" value="OK" name="repayment_receivedconfirmation" class="submit">
		</form>
		
		
		
		<?php 
		if(isset($confirmed_message)){ 
                echo ''.$confirmed_message.''; 
            }
        ?>
		<?php 
		if(isset($notreceived_message)){ 
                echo ''.$notreceived_message.''; 
            }
        ?>
		<?php 
		if(isset($error_message_received)){ 
                echo ''.$error_message_received.''; 
            }
        ?>
		<?php 
		if(isset($error_message_not_received)){ 
                echo ''.$error_message_not_received.''; 
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

</body>

</html>