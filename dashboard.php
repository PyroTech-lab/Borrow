<?php
require('actions/users/securityAction.php');
require('actions/questions/showAllRequestsAction.php');
require('actions/users/notificationAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/userTrustScore.php');
require('actions/users/bannedAction.php');
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
	background-color: #f8f8f8;
}


.sticky{
	z-index: 5;
	position: fixed;
	margin-top: -20px;
	width: 20%;
	background-color: #f8f8f8;
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
	background-color: white;
	margin-top: -10px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.35rem;
	font-weight: bold;
	color: #00c4ff;
	padding-left: 7px;
	position: relative;
	z-index: 50;
}

.sticky-input:hover {
	outline: 1px solid #00c4ff;
	background-color: white;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.01); /* IE 9 */
	-webkit-transform: scale(1.01); /* Safari 3-8 */
	transform: scale(1.01); 
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

.symbol-right {
	margin-top: -49px;
	font-size:1.35rem;
	font-weight: bold;
	width: 1px;
	margin-left: calc(100% - 1px);
	text-align: left;
	color: #00c4ff;
	position: relative;
	z-index: 100
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
	background-color: #2b80ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.find-offers:hover {
	background-color: #00c4ff;
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
	transition: color 0.2s;
	transition: border 0.2s;
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

.subtitle-bold {
	color: #2b80ff;
	font-weight: 500;
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
	border-radius: 0.325rem;
	background-color: white;
}

.sort-by-input {
	border: none;
	width: 100%;
	font-weight: bold;
	font-size: 0.92rem;
	color: #4d4d4d;
	text-align: left;
	background-color: transparent;
	
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
	color: #383838;
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
	margin-top: -20px;
	text-align: left;
	margin-bottom: 40px;
	padding-top: 15px;
	padding-bottom: 5px;
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

.borrower-2 {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	padding: 4px;
	color: #3d91e0;
	font-weight: 500;
	font-size: 1.02rem;
}

.loan-amount-2 {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 18%;
	padding: 4px;
	color: #383838;
	font-weight: bold;
	font-size: 1.15rem;
}

.repay-amount-2 {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 36%;
	padding: 4px;
	color: #383838;
	font-weight: bold;
	font-size: 1.15rem;
}

.interest-rate-2	{
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 54%;
	padding: 4px;
	color: #383838;
	font-weight: bold;
	font-size: 1.15rem;
}

.repay-date-2 {
	height: 23px;
	text-align: center;
	width: 17%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 72%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.1rem;
}



.trustscore {
	text-align: center;
	width: 18%;
	height: 23px;
	margin-top: 19px;
	margin-left: 0%;
	background-color: transparent;
	padding-top: 5px;
}

.top-border {
	width: 100%;
	height: 23px;
	margin-top: -29px;
	border-top: 1px solid #bababa;
	padding-top: 5px;
	border-radius: 0, 0, 0.325rem, 0.325rem;
}


.feedback {
	text-align: center;
	width: 18%;
	height: 23px;
	margin-top: -29px;
	margin-left: 18.7%;
	background-color: transparent;
	padding-top: 5px;
	font-weight: bold;
}

.feedback-image {
	height: 15px; 
	width: auto;
	margin-bottom: -1px;
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
	margin-left: 60px;
	font-weight: 500;
	font-size: 1.15rem;
	margin-top: -15px;
	margin-bottom: 50px;
	color: red;
}

.under-container {
	margin-left: 60px;
	margin-bottom: 100px;
}

.load-more-visible {
	padding: 9px;
	width: 15%;
	min-width: 140px;
	background-color: #de0404;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
	transition: background-color .2s;
}

.load-more-hidden {
	display: none;
}

.borrow-button-container{
	margin-left: calc(15% + 7px);
	margin-top: -38px;
}

.borrow-button-container-noloadmore{
	margin-left: 0px;
	margin-top: 0px;
}

.borrow-button {
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
	transition: background-color .2s;
}

.load-more-visible:hover {
	background-color: #ff0303;
}

.borrow-button:hover {
	background-color: #edd500;
}

.explain {
	margin-left: 80px;
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
	margin-top: -227px;
}

.inner-box {
	border: 1px solid #00c4ff;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
	background-color: white;
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
	position: absolute;
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


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f8f8f8;">

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
		echo '<div class="notification-receivedloan"><img src="assets/images/success.png" class="notification-image"><span class="notification-text">'.$ReceiveLoanMsg.'</span><form method="POST" style="margin-top: -29px; text-align: right;"><input class="notification_acknowledge-button" type="submit" value="OK" name="notification_receivedloan"></form></div>';
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


<div class="everything-except-header">


<div class="main">
	<div class="sticky" id="sticky">
	<form method="GET">
	<div class="sticky-text">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
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
		<p class="subtitle"><span class="subtitle-bold">Lend and Borrow</span> on Instant Borrow - <span class="subtitle-bold">0% Platform Fees</span>, Unmatched <span class="subtitle-bold">Profits</span>, Incredibly <span class="subtitle-bold">Fast and Easy</span>.</p>

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
		
		<div style="margin-left: 60px;"><p style="font-size: 1.15rem; font-weight: 500;">Latest Loan Requests:</p></div>
			<div class="transaction-details">
						<div class="borrower"><span>Borrower</span></div>
						<div class="loan-amount"><span>Loan Amount</span></div>
						<div class="repay-amount"><span >Repayment Amount</span></div>
						<div class="interest-rate"><span>Interest Rate</span></div>
						<div class="repay-date"><span>Repayment Date</span></div>
			</div>
			
			<?php 
            while($question = $getAllQuestions->fetch()){
				
			if($question['borrower_trustscore'] < 50){
				$trustscore_color = "red";
			}elseif(($question['borrower_trustscore'] >= 50)AND($question['borrower_trustscore'] < 80)){
				$trustscore_color = "#00c4ff";
			}elseif($question['borrower_trustscore'] >= 80){
				$trustscore_color = "#24b300";
			}
                ?>
			<div class="loan-request">
				<div class="loan-details">
						<div style="padding-bottom: 10px;">
						<div class="borrower-2"><a href="user-profile-yeslogin.php?id=<?=$question['id_borrower']; ?>" style="text-decoration: none; color: #3d91e0;"><span><?= $question['username_borrower']; ?></span></a></div>
						<div class="loan-amount-2"><span><?= $question['loan_amount']; ?>$</span></div>
						<div class="repay-amount-2"><span><?= $question['repayment_amount']; ?>$</span></div>
						<div class="interest-rate-2"><span><?= $question['interest']; ?>%</span></div>
						<div class="repay-date-2"><span><?= date('M jS, Y', strtotime($question['repayment_date'])); ?></span></div>
						</div>
						<div style="text-align: right; margin-top: -40px;">
						<a href="loan-yeslogin.php?id=<?= $question['id']; ?>"><button class="lend-button">LEND</button><a>
						</div>
							<div class="trustscore">
							<span>Trustscore: <span style="font-weight: bold; color: <?= $trustscore_color; ?>;"><?= $question['borrower_trustscore']; ?>/100</span></span>
							</div>
							<div class="top-border"></div>
							<div class="feedback">
							<span style="color: green;"><img src="assets/images/positive.png" class="feedback-image"> <?= $question['borrower_positive_feedback']; ?></span>
							<span style="margin-left: 17px; color: red;"><img src="assets/images/negative.png" class="feedback-image"> <?= $question['borrower_negative_feedback']; ?></span>
							</div>
				</div>
			</div>
			<?php
				}
			?>
			
			<?php 
            if(isset($errorMsg)){ 
                echo '<p class="error-message">'.$errorMsg.'</p>'; 
            }
			?>
			
			
			
			<div class="under-container">
			
				<form method="GET">
				<input class="<?= $class1 ?>" id="load_more" name="load_more1" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class2 ?>" id="load_more" name="load_more2" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class3 ?>" id="load_more" name="load_more3" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class4 ?>" id="load_more" name="load_more4" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class5 ?>" id="load_more" name="load_more5" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class6 ?>" id="load_more" name="load_more6" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class7 ?>" id="load_more" name="load_more7" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class8 ?>" id="load_more" name="load_more8" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class9 ?>" id="load_more" name="load_more9" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class10 ?>" id="load_more" name="load_more10" type="submit" value="Load More Offers">
				</form>
				
				<div class="<?= $classButton ?>"><a href="borrow-yeslogin.php"><button class="borrow-button">Borrow Money</button></a></div>
			</div>
		
		</div>
		
		
		<div class="explain">
			<p class="explain-title">How to Lend Money on Instant Borrow</p>
			
			<p style="font-weight: 500; font-size: 1.28rem; margin-top: 50px; color:#2b80ff;">Welcome to the World of Peer-to-Peer Finance.</p> 
			
			<p style="font-weight: normal;">Instant Borrow connects Borrowers and Lenders Together for a Safe, Seamless and Hastle-Free Experience.</p>
			<p>Keep total Control over your Funds, Transact Directly with other Users and Forget about Lengthy Approval Processes and High Fees.</p>

			<p style="font-weight: 500; font-size: 1.28rem; color:#2b80ff;">Lending on Instant Borrow is Quick, Easy, and a Great way to Make Money.</p>
			
			<p style="font-weight: bold; font-size: 1.55rem; color: #00c4ff; margin-top: 60px; margin-bottom: 60px;">THIS IS HOW TO DO IT:</p>
			
			<div class="step1"><p class="steps-title">1-BROWSE</p><div class="inner-box"><p class="steps-subtitle">Find in the Loan Requests Section:</p><p><span class="explain-bold">Loan Amounts</span></br><span class="explain-bold">Repayment Amounts</span> and <span class="explain-bold">Dates</span></br><span class="explain-bold">Interest</span> Rates</br><span class="explain-bold">Trustscores</span> and <span class="explain-bold">Feedback</span> Given to Borrowers</p></div></div>
			<div class="step2"><p class="steps-title">2-SELECT A LOAN</p><div class="inner-box"><p class="steps-subtitle">Get on the Loan Recap Page:</p><p>A <span class="explain-bold">Recap</span> of the Loan</br><span class="explain-bold">Information</span> About the Borrower</br>His Borrowing <span class="explain-bold">History</span></br><span class="explain-bold">Notes</span> Regarding the Loan</p></div></div>
			<div class="step3"><p class="steps-title">3-LEND</p><div class="inner-box"><p class="steps-subtitle">On the Payment Page:</p><p>Choose your <span class="explain-bold">Payment Method</span></br><span class="explain-bold">Send Funds</span> to the Borrower</br><span class="explain-bold">Confirm</span> the Transaction was Made</p></div></div>
			<div class="step4"><p class="steps-title">4-PROFIT</p><div class="inner-box"><p class="steps-subtitle">On the Repayment Date:</p><p>Borrower Sends <span class="explain-bold">Repayment</span></br><span class="explain-bold">Confirm</span> Funds Have Been Received</br><span class="explain-bold">Evaluate</span> the Borrower</p></div></div>
			
			<p style="margin-top: 60px;">All payments are Confirmed by Instant Borrow and are Protected with Advanced security Measures. The Marketplace is strictly Monitored and all Users are Verified to ensure a safe Trading Environment.</p>
			
			<p>Personnal Information is Fully Protected by Instant Borrow and is only Given to the Lender if the Borrower fails to Repay his Loan.</p>

			<p>If you have any Questions, please Contact Us or get in Touch with the Support Team at the Bottom of the Page. We'll always be there for you!</p>

			<p style="font-weight: 500; font-size: 1.28rem; color: #2b80ff;">Lending on Instant Borrow is Safe and Easy, but don’t take our word for it—read reviews from countless Instant Borrow users around the world.</p>
		</div>
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
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0.
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
var mm = today.getMonth()+5; //January is 0. In reality max 4 months.
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
