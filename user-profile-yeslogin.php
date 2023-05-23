<?php
require('actions/users/showOneUsersProfileAction.php'); 
require('actions/users/showOneUsersVerificationsActions.php');
require('actions/users/securityAction.php');
require('actions/users/notificationAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/userTrustscoreForProfile.php');
require('actions/users/userFeedbackProfileAction.php');
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
	transition: background-color 0.2s;
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
	width: 80%;
	margin-left: 10%;
	background-color: white;
	border-radius: 0.325rem;
	height: 410px;
	text-align: center;
	border: 1px solid black;
}

.main-title {
		margin-top: 40px;
		margin-bottom: 60px;
		color: #383838;
		font-weight: 500;
		font-size: 1.8rem;
		border-bottom: 2px solid #d6d6d6;
		padding-bottom: 30px;
		width:60%;
		margin-left: 20%;
}


.first-line {
	text-align: center;
}


.loan-amount {
	height: 23px;
	text-align: center;
	width: 50%;
	background-color: transparent;
	margin-top: -31px;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
	text-align: center;
}


.repay-amount {
	height: 23px;
	text-align: center;
	width: 50%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 50%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
	text-align: center;
}


.interest-rate	{
	height: 23px;
	text-align: center;
	width: 25%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 37.5%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
	text-align: center;
}


.figures {
	text-align: center;
	font-size: 2.5rem;
	font-weight: bold;
	color: #00c4ff;
	transition: transform 0.2s;
	margin-left: 50%;
	width: 0.0001%;
}


.figures:hover {
	color: green;
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}


.second-line {
	width: 60%;
	margin-left: 20%;
	text-align: center;
	margin-top: 80px;
	padding-top: 25px;
	margin-bottom: 30px;
	border-top: 2px solid #d6d6d6;
}


.repay-date {
	height: 23px;
	text-align: center;
	background-color: transparent;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.97rem;
}


.lend-button {
	width: 300px;
	height: 50px;
	margin-top: 10px;
	background-color: #00c4ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.125rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}


.lend-button:hover {
	background-color: red;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}


.borrower-details {
	margin-top: 50px;
	width: 39%;
	margin-left: 10%;
	border: 1px solid #00c4ff;
	border-radius: 0.325rem;
	height: 500px;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.borrower-presentation {
	margin-left: 20px;
	margin-top: 30px;
}

.profile-picture {
	height: 40px;
	width: auto;
}

.country-icon {
	height: 11px;
	width: auto;
	margin-left: 7px;
}

.chat-button {
	margin-left: 20px;
	margin-top: 20px;
	margin-bottom: 20px;
	border-radius: 0.325rem;
	color: white;
	background-color: #2b80ff;
	width: 100px;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 0;
	font-weight: bold;
	font-size: 1.1rem;
	padding-top: 5px;
	padding-bottom: 5px;
	transition: transform 0.2s;
}

.chat-button:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.column-1 {
	margin-left: 20px;
	margin-top: 30px;
	width: 50%;
	height: 200px;
}

.column-2 {
	width: 50%;
	margin-left: 50%;
	margin-top: -200px;
	height: 200px;
}

.line {
	margin-top: 15px;
}

.checkmark {
	height: 15px;
	width: auto;
	margin-left: 6px;
	margin-bottom: -2px;
	margin-right: 8px;
}

.verification-box {
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
	transition: border 0.2s;
	transition: color 0.2s;
}

.verification-box:hover {
	border: 1px solid #ff2424;
	color: #ff2424;
	font-size: 0.9rem;
}

.verification-box:empty {
	margin: 0px;
	padding: 0px;
	border: 0;
}

.verification-box2 {
	margin-left: 3px;
	border: 1px solid #00ab30;
	border-radius: 0.125rem;
	padding-left: 2px;
	padding-right: 3px;
	background-color: #fafafa;
	color: #00ab30;
	font-weight: 500;
	font-size: 0.85rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: border 0.2s;
	transition: color 0.2s;
}

.verification-box2:hover {
	border: 1px solid #00de3f;
	color: #00de3f;
	font-size: 0.9rem;
}

.verification-box2:empty {
	margin: 0px;
	padding: 0px;
	border: 0;
}

.thumbs-up {
	height: 30px;
	width: auto;
	margin-top: 5px;
	margin-bottom: -6px;
	margin-right: 8px;
	transition: transform 0.2s;
}

.thumbs-down {
	height: 30px;
	width: auto;
	margin-top: 5px;
	margin-bottom: -6px;
	margin-right: 8px;
	transition: transform 0.2s;
}

.thumbs-up:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.thumbs-down:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.loan-history {
	margin-top: -502px;
	width: 39%;
	margin-left: 51%;
	border: 1px solid #00c4ff;
	border-radius: 0.325rem;
	height: 430px;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.subtext {
	font-weight: bold;
	font-size: 1.8rem;
	color: #00c4ff;
}


.subsection-title {
	font-weight: 500;
	margin-left: 20px;
	font-size: 1.5rem;
}

.recent-loans-title {
	margin-left: 10%;
	font-weight: bold;
	font-size: 1.6rem;
	margin-top: 100px;
	color: #00c4ff
}

.transaction-details {
	margin-left: 10%;
	width: 80%;
	padding-bottom: 15px;
	margin-top: -15px;
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
	text-align: cewidth: 16.6%;width: 17%;
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


.error-message {
	font-weight: 500;
	font-size: 1.05rem;
	margin-bottom: 30px;
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
		echo '<div class="notification-receivedrepayment"><img src="assets/images/success.png" class="notification-image-receivedrepayment"><span class="notification-text-receivedrepayment">'.$ReceiveRepaymentMsg.'</span><div style="text-align: right; margin-top: -29px;"><a href="loan-feedback.php?id='.$IdforFeedback.'"><button class="notification_acknowledge-button">OK</button></a></div></div>';
		}
	?>
	
	<?php
		if(isset($ReceiveLoanMsg)){ 
		echo '<div class="notification-receivedloan"><img src="assets/images/success.png" class="notification-image-receivedloan"><span class="notification-text-receivedloan">'.$ReceiveLoanMsg.'</span><form class="notification_acknowledge" method="post"><input type="submit" value="OK" name="notification_receivedloan" class="notification_acknowledge-button"></form></div>';
		}
	?>

<div class="everything-except-header">


<div class="borrower-details" style="margin-top: 160px;">
	<p class="subsection-title">User Information</p>
		<div class="borrower-presentation">
		<a href=""><img class="profile-picture" src="assets/images/profile-picture.png"></a>
		<div style="margin-top: -49px; margin-left: 50px;"><span style="color: #00c4ff;"><?= $user_username; ?></span><img class="country-icon" src="assets/images/country-icon.jpg"></br><span>Member since <?= date('M Y', strtotime($user_join_date)); ?></span></div>
		</div>
		
		<button class="chat-button">Chat</button>
		
		<div class="column-1">
		<span>Positive feedback</br><img class="thumbs-up" src="assets/images/thumbs-up.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$positive_feedback.'';?></span></span>
		<div class="line" style="margin-top: 25px;"><span>Email</span></br><img class="checkmark" src="<?php if(isset($checkmark4)){echo ''.$checkmark4.'';}else {echo ''.$cross4.'';}?>"><span class="verification-box2"><?php if(isset($verified_email)){echo ''.$verified_email.'';}?></span><span class="verification-box"><?php if(isset($not_verified_email)){echo ''.$not_verified_email.'';}?></span></div>
		<div class="line"><p>Address</br><img class="checkmark" src="<?php if(isset($checkmark2)){echo ''.$checkmark2.'';}else {echo ''.$cross2.'';}?>"><span class="verification-box2"><?php if(isset($verified_address)){echo ''.$verified_address.'';}?></span><span class="verification-box"><?php if(isset($not_verified_address)){echo ''.$not_verified_address.'';}?></span></p></div>
		</div>
		
		<div class="column-2">
		<span>Negative feedback</br><img class="thumbs-down" src="assets/images/thumbs-down.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$negative_feedback.'';?></span></span>
		<div class="line"><p style="margin-top: 25px;">ID Card</br><img class="checkmark" src="<?php if(isset($checkmark3)){echo ''.$checkmark3.'';}else {echo ''.$cross3.'';}?>"><span class="verification-box2"><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}?></span><span class="verification-box"><?php if(isset($not_verified_idcard)){echo ''.$not_verified_idcard.'';}?></span></p></div>
		<div class="line"><p>Phone Number</br><img class="checkmark" src="<?php if(isset($checkmark1)){echo ''.$checkmark1.'';}else {echo ''.$cross1.'';}?>"><span class="verification-box2"><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}?></span><span class="verification-box"><?php if(isset($not_verified_phone)){echo ''.$not_verified_phone.'';}?></span></p></div>
		</div>
</div>

<div class="loan-history">
	<p class="subsection-title">Loan History</p>
	<div class="column-1">
	<span style="font-weight: 500; font-size: 1.15rem;">Amount Borrowed</span></br><span style="font-size: 1.8rem; font-weight: bold; color: #00c4ff;"><?php echo ''.ROUND($getBorrowedAmountMessage).'';?>$</span>
	<div class="line" style="margin-top: 25px;"><span><span class="subtext"><?php echo ''.$AllCountMessage.'';?></span> Loans Taken</span></div>
	<div class="line"><span class="subtext"><?php echo ''.$PaidOntimeCountMessage.'';?></span> Loans Repaid on Time</span></div>
	<div class="line" style="margin-top: 25px;"><span style="font-weight: 500; font-size: 1.15rem;">Trust Score</span></br><span style="font-size: 1.35rem; font-weight: bold; color: #00c4ff;"><?php echo ''.ROUND($trustscore6).'';?>/100</span></div>
	</div>
	
	<div class="column-2">
	<span style="font-weight: 500; font-size: 1.15rem;">Amount Repaid</span></br><span style="font-size: 1.8rem; font-weight: bold; color: #00c4ff;"><?php echo ''.ROUND(($getRepayedBorrowedAmountMessage/$getSupposedRepaymentBorrowedAmountMessage)*100).'';?>%</span>
	<div class="line" style="margin-top: 25px;"><span><span class="subtext"><?php echo ''.$PaidLateCountMessage.'';?></span> Loans Repaid Late</span></div>
	<div class="line"><span><span class="subtext"><?php echo ''.$unpaidCountMessage.'';?></span> Unpaid Loans</span></div>
	</div>
</div>

<p class="recent-loans-title">Recent Loans</p>

<div class="transaction-details">
			<div class="loan-amount"><span>Loan Amount</span></div>
			<div class="repay-amount"><span >Repayment Amount</span></div>
			<div class="interest-rate"><span>Repayment Date</span></div>
			<div class="repay-date"><span>Status</span></div>
			<div class="feedback"><span>Feedback</span></div>
			<div class="payment-method"><span>Lender</span></div>
</div>

<div style="margin-left: 10%;">
	<?php
	
	 if(isset($errorMsg)){ 
		echo '<p class="error-message">'.$errorMsg.'</p>'; 
	 }?>
</div>	
	<?php
	while($question = $getHisQuestions->fetch()){
		?>
		

<div class="loan-request">
	<div class="loan-details">	
			<div class="loan-amount"><span><?= $question['loan_amount']; ?>$</span></div>
			<div class="repay-amount"><span><?= $question['repayment_amount']; ?>$</span></div>
			<div class="interest-rate"><span><?= date('M jS, Y', strtotime($question['repayment_date'])); ?></span></div>
			<div class="repay-date"><span><?= $status_public; ?></span></div>
			<div class="feedback"><span><?= $question['feedback_given']; ?></span></div>
			<div class="payment-method"><a style="text-decoration: none; color: #3d91e0;" href="user-profile-yeslogin.php?id=<?= $question['id_lender']; ?>"><span><?= $question['username_lender']; ?></span></a></div>
	</div>
</div>
<?php
	}
?>
			


             



<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>

</body>

</html>