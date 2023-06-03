<?php
require('actions/questions/showArticleContentAction.php');
require('actions/users/showOneUsersVerificationsActionsLending.php');
require('actions/questions/updateDatabases.php');
require('actions/users/userTrustScore.php');
require('actions/users/userFeedbackLoanAction.php');
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
	width: 75px;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(100% - 175px);
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
	width: 85px;
	height: 23px;
	margin-top: -23px;
	margin-left: calc(100% - 85px);
}

.signup-text {
	background-color: #e0c22d;
	color: white;
	font-weight: 500;
	border-radius: 0.125rem;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 10px;
	padding-right: 10px;
	outline: 1px solid #e0c22d;
	transition: background-color 0.2s;
}

.signup-text:hover {
	background-color: #f7d631;
	outline: 1px solid #f7d631;
}

.everything-except-header {
	position: absolute;
	width: 100%;
}

.main {
	margin-top: 160px;
	width: 80%;
	margin-left: 10%;
	background-color: #fcfcfc;
	border-radius: 0.425rem;
	height: 410px;
	text-align: center;
	border: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
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
	transition: background-color 0.2s;
}


.lend-button:hover {
	background-color: #2b80ff;
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
	background-color: #fcfcfc;
	height: 502px;
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
	transition: transform .2s;
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
	height: 455px;
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


.borrower-notes {
	margin-top: 100px;
	width: 80%;
	margin-left: 10%;
	background-color: #fcfcfc;
	border: 1px solid #00c4ff;
	border-radius: 0.325rem;
	padding-bottom: 20px;
	text-align: left;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
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
		<div class="logo"><a href="index.php" style="text-decoration: none; color: black"><span>Instant Borrow</span></a></div>
		<div class="lend"><a href="index.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow-nologin.php" style="text-decoration: none; color: black"><span class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="login.php" style="text-decoration: none; color: black"><span class="login-text">Login</span></a></div>
		<div class="signup"><a href="signup.php" style="text-decoration: none; color: black"><span class="signup-text">Sign Up</span></a></div>
	</div>
</div>

<div class="everything-except-header">

			<?php 
            if(isset($errorMsg)){ echo $errorMsg; }
            ?>

<div class="main">

	<h2 class="main-title">Lend Money to <a href="user-profile-nologin.php?id=<?= $id_borrower; ?>" style="text-decoration: none;"><span style="color: #00c4ff; font-weight: bold;"><?= $username_borrower; ?></span></a></h2>
	<div class="first-line">
		<div class="loan-amount"><span>Loan Amount</span><div class="figures"><span style="margin-left: -56px;"><?= $loan_amount; ?>$</span></div></div>
		<div class="interest-rate"><span>Interest Rate</span><div class="figures"><span style="margin-left: -40px;"><?= round((($repayment_amount/$loan_amount)-1)*100); ?>%</span></div></div>
		<div class="repay-amount"><span >Repayment Amount</span><div class="figures"><span style="margin-left: -85px;"><?= $repayment_amount; ?>$</span></div></div>
	</div>
	<div class="second-line">
		<div class="repay-date"><span>Repayment Date: </span><span style="color: #00c4ff; font-weight: bold;"><?= date('M jS, Y', strtotime($repayment_date)); ?></span></div>
		<a href="signup.php"><button class="lend-button">Sign Up to Lend Money</button></a>
	</div>
	
</div>

<div class="borrower-details">
	<p class="subsection-title">Borrower Information</p>
		<div class="borrower-presentation">
		<a href=""><img class="profile-picture" src="assets/images/profile-picture.png"></a>
		<div style="margin-top: -49px; margin-left: 50px;"><a href="user-profile-nologin.php?id=<?= $id_borrower; ?>" style="text-decoration: none;"><span style="color: #00c4ff;"><?= $username_borrower; ?></span></a><img class="country-icon" src="assets/images/country-icon.jpg"></br><span>Member since <?= date('M Y', strtotime($user_join_date)); ?></span></div>
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

<div class="borrower-notes">
<p class="subsection-title">Notes from the Borrower</p>
	<div style="margin-left: 20px;">
	<?= $notes; ?>
	</div>
</div>
      



<div class="footer">
	<p class="footer-text">Instant Borrow</p>
</div>

</div>

</body>

</html>