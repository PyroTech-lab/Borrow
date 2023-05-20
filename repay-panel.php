<?php
require('actions/users/securityAction.php');
require('actions/questions/RepayLoanAction.php');
require('actions/questions/updateDatabases.php');
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
	margin-top: 30px;
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

.payment-form {
	margin-top: 20px;
	width: 60%;
	margin-left: 5%;
}

.success-message {
	margin-left: 20px;
	color: green;
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
	
	<div class="loan-recap">
		<div class="column-1">
		<div class="subtitle"><span>Repayment Recap</span></div>
		<div class="text">You Repay</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		<div class="text">You Lent</br><span class="subtext1"><?= $loan_amount; ?>$</span></div>
		</div>
		<div class="column-2">
		<div class="text">Repayment Deadline</br><span class="subtext2" style="color: red;"><?= date('M jS, Y', strtotime($repayment_date)); ?></span></div>
		<div class="text"  style="margin-top: 24px;">Lender</br><a href="user-profile-yeslogin.php?id=<?= $id_lender; ?>" style="text-decoration: none;"><span class="subtext2"><?= $username_lender; ?></span></a></div>
		</div>
	</div>
	
	<div class="chat-div">
		<div class="subtitle-chat"><span>Chat with <a href="user-profile-yeslogin.php?id=<?= $id_lender; ?>" style="text-decoration: none;"><span style="color: #560296;"><?= $username_lender; ?></span></a></span></div>
		<div><span class="chat-text">In case you have doubts, requests, want more information or anything else...</span></div>
		<button class="chat-button">Chat with <span><?= $username_lender; ?></button>
	</div>
	
	<div class="payment">
		<form class="payment-form" method="post">
			<input type="submit" value="Repay Loan" class="btn" name="confirm_repay">
		</form>
		
				        <?php 
            if(isset($successMsg)){ 
                echo '<p class="success-message">'.$successMsg.'</p>'; 
            }
        ?>
		
	</div>
	


</div>

<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>

</body>

</html>
