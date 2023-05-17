<?php
require('actions/users/securityAction.php');
require('actions/users/showYourProfileAction.php');
require('actions/users/ProfileVerificationsAction.php');
require('actions/users/PaymentMethodsAction.php'); 
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
	width: 39%;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	border-radius: 0.425rem;
	margin-top: 50px;
}

.column-11 {
	margin-left: 20px;
	height: 300px;
	width: 50%;
}

.column-12 {
	margin-left: 50%;
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

.update-button {
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

.update-button:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.05); /* IE 9 */
	-webkit-transform: scale(1.05); /* Safari 3-8 */
	transform: scale(1.05); 
}

.payment-details {
	height: 300px;
	width: 59%;
	margin-left: 41%;
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
		<div class="lend"><a href="dashboard.php" style="text-decoration: none; color: black"><span>Lend</span></a></div>
		<div class="borrow"><a href="borrow-yeslogin.php" style="text-decoration: none; color: black"><span>Borrow</span></a></div>
		<div class="login"><a href="profile.php" style="text-decoration: none; color: black"><span>Your Profile</span></a></div>
		<div class="signup"><a href="actions/users/logoutAction.php" style="text-decoration: none; color: black"><span>Log Out</span></a></div>
	</div>
</div>

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
			<p>Email<br><img class="checkmark" src="assets/images/checkmark.png"><span>Verified</span></p>
			<p>Phone Number<br><img class="checkmark" src="<?php if(isset($checkmark1)){echo ''.$checkmark1.'';}else {echo ''.$cross1.'';}?>"><span><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}else {echo ''.$not_verified_phone.'';}?></span></p>
		</div>
		<div class="column-12">
			<p>Address<br><img class="checkmark" src="<?php if(isset($checkmark2)){echo ''.$checkmark2.'';}else {echo ''.$cross2.'';}?>"><span><?php if(isset($verified_address)){echo ''.$verified_address.'';}else {echo ''.$not_verified_address.'';}?></span></p>
			<p>ID<br><img class="checkmark" src="<?php if(isset($checkmark3)){echo ''.$checkmark3.'';}else {echo ''.$cross3.'';}?>"><span><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}else {echo ''.$not_verified_idcard.'';}?></span></p>
		</div>
	</div>
	
	<div class="payment-details">
	<p class="subsection-title">Payment Details</p>
		<div class="column-111">
			<p class="payment-method">Paypal <span class="payment-method-box"><?php if(isset($paypal_no)){echo ''.$paypal_no.'';}?></span><span class="payment-method-box2"><?php if(isset($paypal_yes)){echo ''.$paypal_yes.'';}?></span></p>
			<p class="payment-method">Cashapp <span class="payment-method-box"><?php if(isset($cashapp_no)){echo ''.$cashapp_no.'';}?></span><span class="payment-method-box2"><?php if(isset($cashapp_yes)){echo ''.$cashapp_yes.'';}?></span></p>
		</div>
		<div class="column-112">
		<p class="payment-method">Venmo <span class="payment-method-box"><?php if(isset($venmo_no)){echo ''.$venmo_no.'';}?></span><span class="payment-method-box2"><?php if(isset($venmo_yes)){echo ''.$venmo_yes.'';}?></span></p>
		<p class="payment-method">Zelle <span class="payment-method-box"><?php if(isset($zelle_no)){echo ''.$zelle_no.'';}?></span><span class="payment-method-box2"><?php if(isset($zelle_yes)){echo ''.$zelle_yes.'';}?></span></p>
		</div>
		<div class="column-113-2">
			<p class="payment-method">Chime <span class="payment-method-box"><?php if(isset($chime_no)){echo ''.$chime_no.'';}?></span><span class="payment-method-box2"><?php if(isset($chime_yes)){echo ''.$chime_yes.'';}?></span></p>
			<p class="payment-method">WISE <span class="payment-method-box"><?php if(isset($wise_no)){echo ''.$wise_no.'';}?></span><span class="payment-method-box2"><?php if(isset($wise_yes)){echo ''.$wise_yes.'';}?></span></p>
		</div>
		<div style="width: 100%; text-align: left;">
		<a href="set-payment-method.php"><button class="update-button">Update your Payment Details</button></a>
		</div>
	</div>
	<div class="account-settings">
	<p class="subsection-title">Account Details & Settings</p>
		<div class="column-111">
			<p>Name: <?= $_SESSION['name']; ?></p>
			<p>Username: <?= $_SESSION['username']; ?></p>
			<p>Email: <?= $_SESSION['email']; ?></p>
			<p>Phone Number: </p>
		</div>
		<div class="column-112">
			<p>Address: </p>
			<p>City: </p>
			<p>Country: </p>
			<p>Member Since: 19/04/2022</p>
		</div>
		<div class="column-113">
			<p>Add Profile Picture</p>
			<p>Change Password</p>
			<p>Delete Account</p>
			<p>Email Preferences</p>
			<p></p>
		</div>
	</div>
</div>

<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>

</body>

</html>