<?php
require('actions/users/securityAction.php');
require('actions/questions/LoanGrantAction.php');
require('actions/questions/showArticleContentAction.php'); 
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
	margin-left: 10%;
	width: 80%;
}

.loan-recap {
	border: 1px solid black;
	border-radius: 0.325rem;
	width: 50%;
}

.payment-method {
	border: 1px solid black;
	border-radius: 0.325rem;
	width: 50%;
}

.title {
	color: #2b80ff;
	font-weight: bold;
	font-size: 2.35rem;
}

.subtitle {
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.55rem;
	margin-top: 30px;
	margin-bottom: 30px;
}

.text {
	font-size: 1.11rem;
}

.chat-button {
	margin-top: 10px;
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

	<p class="title">Confirm your Loan</p>
	
	<div class="subtitle"><span>1) Loan Details</span></div>
	<div class="loan-recap">
		<div class="text">Loan Amount: <span><?= $loan_amount; ?>$</span></div>
		<div class="text">Repayment Amount: <span><?= $repayment_amount; ?>$</span></div>
		<div class="text">Repayment Date: <span><?= $repayment_date; ?></span></div>
		<div class="text">Borrower: <a href="user-profile-yeslogin.php?id=<?= $id_borrower; ?>" style="text-decoration: none;"><span><?= $username_borrower; ?></span></a></div>
		<button class="chat-button">Chat</button>
	</div>
	
	<div class="subtitle"><span>2) Select Payment Method</span></div>
	<div class="payment-method">
		<div class="text"><span>Paypal</span></div>
		<div class="text"><span>Cashapp</span></div>
		<div class="text"><span>Venmo</span></div>
		<div class="text"><span>Zelle</span></div>
		<div class="text"><span>Chime</span></div>
		<div class="text"><span>WISE</span></div>
	</div>
	
	<div class="subtitle"><span>3) Send 100$ to :</span></div>
	<div class="payment-confirm">
		<div class="text"><span>adress.money@paypal.com</span></div>
		<div class="subtitle"><span>4)Confirm Money is Sent</span></div>
		<div class="text"><span>Borrower will confirm if funds were received</span></div>
	</div>

	<form method="post">
	<input type="submit" value="lend  money" name="confirm_lend">
	</form>

</div>

<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>

</body>

</html>