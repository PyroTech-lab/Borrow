<?php
require('actions/users/securityAction.php');
require('actions/users/showYourProfileAction.php');
require('actions/users/ProfileVerificationsAction.php');
require('actions/users/PaymentMethodsAction.php');
require('actions/users/notificationAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/deleteAccountAction.php');
require('actions/users/yourTrustScoreAction.php');
require('actions/users/yourFeedbackAction.php');
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

.main {
	margin-top: 160px;
	width: 80%;
	margin-left: 10%;
	background-color: #f7f7f7;
}

.dashboard {
	height: 300px;
	width: 100%;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
}

.profile-picture {
	height: 40px;
	width: auto;
	margin-bottom: -65px;
}

.subsection-title-dashboard {
	font-weight: bold;
	margin-left: 50px;
	margin-top: 20px;
	font-size: 1.8rem;
	color: #00c4ff;
}

.main-text {
	font-weight: 500;
	font-size: 1.12rem;
}

.main-subtext {
	font-weight: bold;
	font-size: 1.8rem;
	color: #00c4ff;
}

.column-1 {
	margin-left: 20px;
	height: 300px;
	width: 28%;
}

.column-2 {
	margin-left: 28%;
	height: 300px;
	width: 28%;
	margin-top: -316px;
}

.column-3 {
	margin-left: 56%;
	height: 300px;
	width: 28%;
	margin-top: -316px;
}

.column-4 {
	margin-left: 82%;
	height: 300px;
	margin-top: -316px;
}

.verifications {
	height: 300px;
	width: 32%;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	border-radius: 0.425rem;
	margin-top: 50px;
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
	transition: font-size .2s;
	transition: color .2s;
	transition: border .2s;
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
	transition: font-size .2s;
	transition: color .2s;
	transition: border .2s;
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

.column-11 {
	margin-left: 20px;
	height: 300px;
	width: 50%;
}

.column-12 {
	margin-left: 55%;
	height: 300px;
	width: 50%;
	margin-top: -316px;
}

.column-111 {
	margin-left: 20px;
	height: 300px;
	width: 33%;
}

.column-112 {
	margin-left: 33%;
	height: 300px;
	width: 33%;
	margin-top: -316px;
}

.column-113 {
	margin-left: 66%;
	height: 200px;
	width: 33%;
	margin-top: -316px;
}

.column-113-2 {
	margin-left: 66%;
	height: 120px;
	width: 33%;
	margin-top: -316px;
}

.profile-trust {
	height: 300px;
	width: 32%;
	margin-left: 34%;
	margin-top: -304px;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	border-radius: 0.425rem;
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

.payment-details {
	height: 300px;
	width: 32%;
	margin-left: 68%;
	margin-top: -304px;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	border-radius: 0.425rem;
}

.payment-method {
	font-size: 1.15rem;
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
	margin-left: 3px;
	border: 1px solid #2b80ff;
	border-radius: 0.125rem;
	padding-left: 2px;
	padding-right: 3px;
	background-color: #fafafa;
	color: #2b80ff;
	font-weight: 500;
	font-size: 0.85rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform .2s;
}

.payment-method-box2:hover {
	border: 1px solid #00c4ff;
	color: #00c4ff;
	font-size: 0.9rem;
}

.payment-method-box2:empty {
	margin: 0px;
	padding: 0px;
	border: 0;
}

.account-settings {
	height: 300px;
	width: 100%;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	border-radius: 0.425rem;
	margin-top: 50px;
}

.subsection-title {
	font-weight: bold;
	margin-left: 20px;
	margin-top: 20px;
	font-size: 1.8rem;
	color: #00c4ff;
}

.checkmark {
	height: 15px;
	width: auto;
	margin-left: 6px;
	margin-bottom: -2px;
	margin-right: 8px;
}

.account-input {
	border: 0px;
	background-color: #fcfcfc;
	text-align: left;
	padding: 0px;
	font-size: 1rem;
	font-family: 'Poppins', sans-serif;
	margin-top: 17px;
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

<div class="main">
	<div class="dashboard">
	
	<div style="margin-left: 20px; margin-top: -20px;">
	<img src="assets/images/profile-picture.png" class="profile-picture">
	<p class="subsection-title-dashboard"><?= $_SESSION['name']; ?></p>
	</div>
	
		<div class="column-1">
		<p class="main-text">Amount Lent<br><span class="main-subtext"><?php echo ''.ROUND($getLentAmountMessage).'';?>$</span><a href="profile-lent-loans.php" style="text-decoration: none;"><span style="color: red;"> <?php echo ''.$AllLentCountMessage.'';?> Loans</span></a></p>
		<p class="main-text">Amount Collected<br><span class="main-subtext"> <?php echo''.ROUND($getRepayedAmountMessage).'';?>$</span></p>
		</div>
		<div class="column-2">
		<p class="main-text">Total Profit<br><span class="main-subtext"><?php echo ''.ROUND($getRepayedAmountMessage-$getLentAmountMessage).'';?>$</span></p>
		<p class="main-text">Return On Investement<br><span class="main-subtext"><?php echo ''.ROUND((($getRepayedAmountMessage/$getLentAmountMessage)-1)*100).'';?>%</span></p>
		</div>
		<div class="column-3">
		<p class="main-text">Amount Borrowed<br><span class="main-subtext"><?php echo ''.ROUND($getBorrowedAmountMessage).'';?>$</span><a href="profile-borrowed-loans.php" style="text-decoration: none;"><span  style="color: red;"> <?php echo ''.$AllCountMessage.'';?> Loans</span></a></p>
		<p class="main-text">Amount Repaid<br><span class="main-subtext"><?php echo ''.ROUND(($getRepayedBorrowedAmountMessage/$getSupposedRepaymentBorrowedAmountMessage)*100).'';?>%</span></p>
		</div>
		<div class="column-4">
		<a href="active-loans.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$activeCountMessage.'';?></span> Active Loans</p></a>
		<a href="loan-requests.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$requestCountMessage.'';?></span> Loan Requests</p></a>
		<a href="unpaid-loans.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$unpaidCountMessage.'';?></span> Unpaid Loans</p></a>
		</div>
	</div>
	
			
	
	<div class="verifications">
	<p class="subsection-title">Verifications</p>
		<div class="column-11">
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">Email<br><img class="checkmark" src="<?php if(isset($checkmark4)){echo ''.$checkmark4.'';}else {echo ''.$cross4.'';}?>"><span class="verification-box2"><?php if(isset($verified_email)){echo ''.$verified_email.'';}?></span><span class="verification-box"><?php if(isset($not_verified_email)){echo ''.$not_verified_email.'';}?></span></p></a>
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">Phone Number<br><img class="checkmark" src="<?php if(isset($checkmark1)){echo ''.$checkmark1.'';}else {echo ''.$cross1.'';}?>"><span class="verification-box2"><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}?></span><span class="verification-box"><?php if(isset($not_verified_phone)){echo ''.$not_verified_phone.'';}?></span></p></a>
		</div>
		<div class="column-12">
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">Address<br><img class="checkmark" src="<?php if(isset($checkmark2)){echo ''.$checkmark2.'';}else {echo ''.$cross2.'';}?>"><span class="verification-box2"><?php if(isset($verified_address)){echo ''.$verified_address.'';}?></span><span class="verification-box"><?php if(isset($not_verified_address)){echo ''.$not_verified_address.'';}?></span></p></a>
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">ID Card<br><img class="checkmark" src="<?php if(isset($checkmark3)){echo ''.$checkmark3.'';}else {echo ''.$cross3.'';}?>"><span class="verification-box2"><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}?></span><span class="verification-box"><?php if(isset($not_verified_idcard)){echo ''.$not_verified_idcard.'';}?></span></p></a>
		</div>
	</div>
	
	<div class="profile-trust">
	<p class="subsection-title">Profile trust</p>
		<div class="column-11">
			<div><span>Positive feedback</br><img class="thumbs-up" src="assets/images/thumbs-up.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$positive_feedback.'';?></span></span></div>
			<div style="margin-top: 15px;"><span>Negative feedback</br><img class="thumbs-down" src="assets/images/thumbs-down.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$negative_feedback.'';?></span></span></div>
		</div>
		<div class="column-12">
			<div style= "margin-top: 15px;"><a href="trustscore.php" style="text-decoration: none; color: black;"><span style="font-weight: 500; font-size: 1.15rem;">Your Trust Score</span></br><span style="font-size: 1.35rem; font-weight: bold; color: #00c4ff;"><?php echo ''.ROUND($trustscore6).'';?>/100</span></a></div>
		</div>
	</div>
	
	<div class="payment-details">
	<p class="subsection-title">Payment Details</p>
		<div class="column-11">
			<p class="payment-method">Paypal <a href="set-payment-method.php" style="text-decoration: none;"><span class="payment-method-box"><?php if(isset($paypal_no)){echo ''.$paypal_no.'';}?></span><span class="payment-method-box2"><?php if(isset($paypal_yes)){echo ''.$paypal_yes.'';}?></span></a></p>
			<p class="payment-method">Cashapp <a href="set-payment-method.php" style="text-decoration: none;"><span class="payment-method-box"><?php if(isset($cashapp_no)){echo ''.$cashapp_no.'';}?></span><span class="payment-method-box2"><?php if(isset($cashapp_yes)){echo ''.$cashapp_yes.'';}?></span></a></p>
			<p class="payment-method">Venmo <a href="set-payment-method.php" style="text-decoration: none;"><span class="payment-method-box"><?php if(isset($venmo_no)){echo ''.$venmo_no.'';}?></span><span class="payment-method-box2"><?php if(isset($venmo_yes)){echo ''.$venmo_yes.'';}?></span></a></p>
		</div>
		<div class="column-12">
		<p class="payment-method">Zelle <a href="set-payment-method.php" style="text-decoration: none;"><span class="payment-method-box"><?php if(isset($zelle_no)){echo ''.$zelle_no.'';}?></span><span class="payment-method-box2"><?php if(isset($zelle_yes)){echo ''.$zelle_yes.'';}?></span></a></p>
		<p class="payment-method">Chime <a href="set-payment-method.php" style="text-decoration: none;"><span class="payment-method-box"><?php if(isset($chime_no)){echo ''.$chime_no.'';}?></span><span class="payment-method-box2"><?php if(isset($chime_yes)){echo ''.$chime_yes.'';}?></span></a></p>
		<p class="payment-method">WISE <a href="set-payment-method.php" style="text-decoration: none;"><span class="payment-method-box"><?php if(isset($wise_no)){echo ''.$wise_no.'';}?></span><span class="payment-method-box2"><?php if(isset($wise_yes)){echo ''.$wise_yes.'';}?></span></a></p>	
		</div>
	</div>
	<div class="account-settings">
	<p class="subsection-title">Account Details & Settings</p>
		<div class="column-111">
			<p>Name: <?= $_SESSION['name']; ?></p>
			<p>Username: <?= $_SESSION['username']; ?></p>
			<p>Email: <?= $_SESSION['email']; ?></p>
			<p>Phone Number: <?= $row['phone_number']; ?></p>
		</div>
		<div class="column-112">
			<p>Address: <?= $row['address']; ?></p>
			<p>City: <?= $row['city']; ?></p>
			<p>Country: <?= $row['country']; ?></p>
			<p>Member Since: <?= date('M jS, Y', strtotime($user_join_date)); ?></p>
		</div>
		<div class="column-113">
			<p class="add-picture">Add Profile Picture</p>
			<p class="change-password">Change Password</p>
			<a href="verifications.php" style="color: black; text-decoration: none;"><p class="update-verifications">Update Verifications</p></a>
			<p class="delete-account" style="color: red; font-weight: 500;">Delete Account</p>
		</div>
	</div>
</div>

<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>


</body>

</html>