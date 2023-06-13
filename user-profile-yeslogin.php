<?php
require('actions/users/showOneUsersProfileAction.php'); 
require('actions/users/showOneUsersVerificationsActions.php');
require('actions/users/securityAction.php');
require('actions/users/notificationAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/userTrustscoreForProfile.php');
require('actions/users/userFeedbackProfileAction.php');
require('actions/users/bannedAction.php');
?>

<?php
	if(isset($usernotfound)){ 
	header('Location: usernotfound-yeslogin.php');
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

.notification-unpaidborrower {
	background-color: orange;
	color: white;
	position: fixed; 
	margin-top: 80px;
	height: 38px;
	width: 100%;
	z-index: 10;
	text-align: center;
}

.notification-bannedborrower {
	background-color: red;
	color: white;
	position: fixed; 
	margin-top: 80px;
	height: 38px;
	width: 100%;
	z-index: 10;
	text-align: center;
}


.notification-text {
	font-weight: 500;
	font-size: 1.04rem;
}

.notification-image {
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
	border: 1px solid #2b80ff;
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
	height: 70px;
	width: 70px;
	border-radius: 50%;
}

.country-icon {
	height: 25px;
	width: auto;
	margin-left: 10px;
	margin-bottom: -6px;
	margin-top: 5px;
}

.country-icon:hover + .location-hidden {
	display: inline;
	margin-left: 10px;
	border: 1px solid #e03434;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	padding: 3px;
	border-radius: 0.325rem;
}

.location-hidden {
	display: none;
}

.location-text {
	font-weight: 500;
}

.chat-button {
	margin-left: 20px;
	margin-top: 20px;
	margin-bottom: 20px;
	border-radius: 0.325rem;
	color: white;
	background-color: #2b80ff;
	width: 130px;
	height: 35px;
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
	border: 1px solid #2b80ff;
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

	<?php
		if(isset($UnpaidMsg)){ 
		echo '<div class="notification-unpaid"><img src="assets/images/warning-sign-red.png" class="notification-image"><a href="unpaid-loans.php" style="text-decoration: none; color: white;"><span class="notification-text">'.$UnpaidMsg.'</span></a></div>';
		}
	?>
	
	<?php
		if(isset($RepaymentDateSoonMsg)){ 
		echo '<div class="notification-duesoon"><img src="assets/images/warning-sign-orange.png" class="notification-image"><a href="active-loans.php" style="text-decoration: none; color: white;"><span class="notification-text">'.$RepaymentDateSoonMsg.'</span></a></div>';
		}
	?>
	
	<?php
		if(isset($ReceiveRepaymentMsg)){ 
		echo '<div class="notification-receivedrepayment"><img src="assets/images/success.png" class="notification-image"><span class="notification-text">'.$ReceiveRepaymentMsg.'</span><div style="text-align: right; margin-top: -29px;"><a href="received-repayment.php?id='.$IdforFeedback.'"><button class="notification_acknowledge-button">OK</button></a></div></div>';
		}
	?>
	
	<?php
		if(isset($ReceiveLoanMsg)){ 
		echo '<div class="notification-receivedloan"><img src="assets/images/success.png" class="notification-image"><span class="notification-text">'.$ReceiveLoanMsg.'</span><div style="text-align: right; margin-top: -29px;"><a href="received-loan.php?id='.$receivedLoanId.'"><button class="notification_acknowledge-button">OK</button></a></div></div>';
		}
	?>
	
	<?php
	if(isset($UnpaidBorrowerLoanMsg)){ 
	echo '<div class="notification-unpaidborrower"><img src="assets/images/warning-sign-orange.png" class="notification-image"><a href="unpaid-borrower.php?id='.$id_loan_unpaid.'" style="text-decoration: none; color: white;"><span class="notification-text">'.$UnpaidBorrowerLoanMsg.'</span><a></div>';
	}
	?>
	
	<?php
	if(isset($BannedBorrowerLoanMsg)){ 
	echo '<div class="notification-bannedborrower"><img src="assets/images/warning-sign-red.png" class="notification-image"><a href="banned-borrower.php?id='.$id_loan.'" style="text-decoration: none; color: white;"><span class="notification-text">'.$BannedBorrowerLoanMsg.'</span><a></div>';
	}
	?>
	
	<?php
	if(isset($LentVerifcationLoanMsg)){ 
	echo '<div class="notification-bannedborrower"><img src="assets/images/warning-sign-red.png" class="notification-image"><a href="confirm-payment.php?id='.$LentVerifcationLoanId.'" style="text-decoration: none; color: white;"><span class="notification-text">'.$LentVerifcationLoanMsg.'</span><a></div>';
	}
	?>
	
	<?php
	if(isset($RepaymentProofGivenMsg)){ 
	echo '<div class="notification-unpaidborrower"><img src="assets/images/warning-sign-orange.png" class="notification-image"><a href="evaluate-repayment-proof.php?id='.$id_loanRepaidProofGiven.'" style="text-decoration: none; color: white;"><span class="notification-text">'.$RepaymentProofGivenMsg.'</span><a></div>';
	}
	?>
	
	<?php
	if(isset($PaidAfterBanMsg)){ 
	echo '<div class="notification-receivedloan"><img src="assets/images/success.png" class="notification-image"><span class="notification-text">'.$PaidAfterBanMsg.'</span><form method="POST" style="margin-top: -29px; text-align: right;"><input class="notification_acknowledge-button" type="submit" value="OK" name="notification_receivedpaidafertban"></form></div>';
	}
	?>
	
	<?php
		if(isset($ReceiveLoanMsg)){ 
		echo '<div class="notification-receivedloan"><img src="assets/images/success.png" class="notification-image"><span class="notification-text">'.$ReceiveLoanMsg.'</span><form method="POST" style="margin-top: -29px; text-align: right;"><input class="notification_acknowledge-button" type="submit" value="OK" name="notification_receivedloan"></form></div>';
		}
	?>

<div class="everything-except-header">


<div class="borrower-details" style="margin-top: 160px;">
	<p class="subsection-title">User Information</p>
		<div class="borrower-presentation">
		<img class="profile-picture" src="assets/images/profile-images/<?= $profile_picture; ?>">
		<div style="margin-top: -70px; margin-left: 80px;"><span style="color: #00c4ff; font-weight: bold; font-size: 1.45rem;"><?= $user_username; ?></span><img class="country-icon" src="assets/images/country-icons/<?=$country?>.png"><span class="location-hidden">Location: <span class="location-text"><?=$country?></span></span></br><span>Member since <?= date('F Y', strtotime($user_join_date)); ?></span></div>
		</div>
		
		<button class="chat-button">Chat</button>
		
		<div class="column-1">
		<span>Positive feedback</br><img class="thumbs-up" src="assets/images/positive.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$positive_feedback.'';?></span></span>
		<div class="line" style="margin-top: 25px;"><span>Email</span></br><img class="checkmark" src="<?php if(isset($checkmark4)){echo ''.$checkmark4.'';}else {echo ''.$cross4.'';}?>"><span class="verification-box2"><?php if(isset($verified_email)){echo ''.$verified_email.'';}?></span><span class="verification-box"><?php if(isset($not_verified_email)){echo ''.$not_verified_email.'';}?></span></div>
		<div class="line"><p>Address</br><img class="checkmark" src="<?php if(isset($checkmark2)){echo ''.$checkmark2.'';}else {echo ''.$cross2.'';}?>"><span class="verification-box2"><?php if(isset($verified_address)){echo ''.$verified_address.'';}?></span><span class="verification-box"><?php if(isset($not_verified_address)){echo ''.$not_verified_address.'';}?></span></p></div>
		</div>
		
		<div class="column-2">
		<span>Negative feedback</br><img class="thumbs-down" src="assets/images/negative.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$negative_feedback.'';?></span></span>
		<div class="line"><p style="margin-top: 25px;">ID Card</br><img class="checkmark" src="<?php if(isset($checkmark3)){echo ''.$checkmark3.'';}else {echo ''.$cross3.'';}?>"><span class="verification-box2"><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}?></span><span class="verification-box"><?php if(isset($not_verified_idcard)){echo ''.$not_verified_idcard.'';}?></span></p></div>
		<div class="line"><p>Phone Number</br><img class="checkmark" src="<?php if(isset($checkmark1)){echo ''.$checkmark1.'';}else {echo ''.$cross1.'';}?>"><span class="verification-box2"><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}?></span><span class="verification-box"><?php if(isset($not_verified_phone)){echo ''.$not_verified_phone.'';}?></span></p></div>
		</div>
</div>

<div class="loan-history">
	<p class="subsection-title">Loan History</p>
	<div class="column-1">
	<span style="font-weight: 500; font-size: 1.15rem;">Amount Borrowed</span></br><span style="font-size: 1.8rem; font-weight: bold; color: #00c4ff;"><?php echo ''.ROUND($getBorrowedAmountMessage).'';?>$</span>
	<div class="line" style="margin-top: 25px;"><span><span class="subtext"><?php echo ''.$AllCountMessage.'';?></span> <?php echo ''.$singular1.'';?> Taken</span></div>
	<div class="line"><span class="subtext"><?php echo ''.$PaidOntimeCountMessage.'';?></span> <?php echo ''.$singular2.'';?> Repaid on Time</span></div>
	<div class="line" style="margin-top: 25px;"><span style="font-weight: 500; font-size: 1.15rem;">Trust Score</span></br><span style="font-size: 1.35rem; font-weight: bold; color: #00c4ff;"><?php echo ''.ROUND($trustscore6).'';?>/100</span></div>
	</div>
	
	<div class="column-2">
	<span style="font-weight: 500; font-size: 1.15rem;">Amount Repaid</span></br><span style="font-size: 1.8rem; font-weight: bold; color: #00c4ff;"><?php echo ''.ROUND(($getRepayedBorrowedAmountMessage/$getSupposedRepaymentBorrowedAmountMessage)*100).'';?>%</span>
	<div class="line" style="margin-top: 25px;"><span><span class="subtext"><?php echo ''.$PaidLateCountMessage.'';?></span> <?php echo ''.$singular3.'';?> Repaid Late</span></div>
	<div class="line"><span><span class="subtext"><?php echo ''.$unpaidCountMessage.'';?></span> Unpaid <?php echo ''.$singular4.'';?></span></div>
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
				
			if(($question['repayment_received'] == "no_notseen")OR($question['repayment_received'] == "no")OR($question['repayment_received'] == "no_correct_id")OR($question['repayment_received'] == "no_correct_id_notconfirmed")){
				$status_color = "#9e3dff";
				$status_public = "Under Verification";
				
				}else{
				
					if(($question['status'] == "paid_ontime")OR($question['status'] == "paid_ontime_notseen")){
						$status_color = "#03cf00";
						$status_public = "Paid On Time";
					}elseif(($question['status'] == "paid_late")OR($question['status'] == "paid_late_notseen")){
						$status_color = "Orange";
						$status_public = "Paid Late";
					}elseif(($question['status'] == "unpaid")OR($question['status'] == "unpaid_notseen")OR($question['status'] == "unpaid_banned")OR($question['status'] == "unpaid_banned_archived")){
						$status_color = "Red";
						$status_public = "Unpaid";
					}elseif(($question['status'] == "active")OR($question['status'] == "active_notseen")){
						$status_color = "#2b80ff";
						$status_public = "Active";
					}elseif(($question['status'] == "paid_afterban_notseen")OR($question['status'] == "paid_afterban")){
						$status_color = "orange";
						$status_public = "Paid After ban";
					}
				}
                ?>
		

<div class="loan-request">
	<div class="loan-details">	
			<div class="loan-amount"><span><?= $question['loan_amount']; ?>$</span></div>
			<div class="repay-amount"><span><?= $question['repayment_amount']; ?>$</span></div>
			<div class="interest-rate"><span><?= date('M jS, Y', strtotime($question['repayment_date'])); ?></span></div>
			<div class="repay-date"><span style="color: <?=$status_color; ?>;"><?= $status_public;?></span></div>
			<div class="feedback"><span><?= $question['feedback_given']; ?></span></div>
			<div class="payment-method"><a style="text-decoration: none; color: #3d91e0;" href="user-profile-yeslogin.php?id=<?= $question['id_lender']; ?>"><span><?= $question['username_lender']; ?></span></a></div>
	</div>
</div>
<?php
	}
?>
			


             



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