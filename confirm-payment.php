<?php
require('actions/users/securityAction.php');
require('actions/questions/RepaymentConfirmAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/bannedAction.php');
?>

<?php
	if(isset($Loannotfound)){ 
	header('Location: loan-not-found.php');
	}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Confirm Repayment - Instant Borrow</title>

<!-- icons generated with https://favicomatic.com/ -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/images/pageicons/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/pageicons/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/pageicons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/pageicons/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/images/pageicons/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/images/pageicons/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/images/pageicons/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/images/pageicons/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="assets/images/pageicons/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="assets/images/pageicons/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="assets/images/pageicons/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="assets/images/pageicons/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="assets/images/pageicons/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="assets/images/pageicons/mstile-310x310.png" />

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

.logo-image {
	height: 62px;
	width: auto;
	margin-top: -20px;
}

.logo-image-footer {
	height: 75px;
	width: auto;
	margin-top: 10px;
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
	margin-left: calc(100% - 162px);
}

.login-text {
	font-weight: 500;
	color: white;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 10px;
	padding-right: 10px;
	transition: outline 0.2s;
	transition: background-color 0.2s;
	outline: 1px solid #e0c22d;
	background-color: #e0c22d;
	border-radius: 0.125rem;
}

.login-text:hover {
	outline: 1px solid #f2a100;
	background-color: #f2a100;
}

.signup {
	margin-top: -22px;
	margin-left: calc(100% - 22px);
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
	border: 1px solid #2b80ff;
	width: 100%;
	height: 350px;
}




.subtitle {
	font-weight: bold;
	margin-top: 20px;
	margin-left: 20px;
	margin-bottom: 20px;
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
	width: 33.3%;
}

.column-2 {
	margin-left: 33.3%;
	height: 300px;
	width: 33.3%;
	margin-top: -300px;
}

.column-3 {
	margin-left: 66.6%;
	height: 300px;
	width: 66.6%;
	margin-top: -300px;
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



.steps {
	margin-left: 20px;
	font-weight: bold;
	font-size: 1.45rem;
}

.input {
	width: 290px;
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

.submit {
	margin-top: 30px;
	width: 300px;
	height: 40px;
	background-color: #2b80ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: background-color 0.2s;
}

.submit:hover {
	background-color: #00c4ff;
}

.confirm-repayment-1 {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
	width: 49%;
	margin-top: 50px;
	font-weight: 500;
	color: #2b80ff;
	height: 300px;
	display: <?= $display1 ?>;
}

.confirm-repayment-2 {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
	width: 49%;
	margin-top: 50px;
	font-weight: 500;
	color: #2b80ff;
	height: 300px;
	display: <?= $display2 ?>;
}

.input-container {
	width: 290px;
	height: 35px;
	background-color: #f7f7f7;
	margin-top: 14px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.01rem;
	font-weight: bold;
	color: #383838;
	padding-left: 7px;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.label-text {
	position: absolute;
	z-index: 20;
	width: 106px;
	background-color: #00c4ff;
	color: white;
	margin-left: -8px;
	margin-top: -1px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-left: 8px;
	font-weight: bold;
	font-size: 0.92rem;
	transition: background-color 0.2s;
}

.label-text:hover {
	background-color: #00c4ff;
}

.upload-input {
	margin-top: 8px;
	margin-left: 18px;
	font-weight: 500;
}

.error-message {
	margin-top: -90px;
	width: 49%;
	color: white;
	background-color: red;
	border: 1px solid red;
	text-align: center;
	border-radius: 0.325rem;
	font-weight: 500;
}

.success-message {
	margin-top: 10px;
	color: white;
	background-color: #12d400;
	border: 1px solid #12d400;
	text-align: center;
	border-radius: 0.325rem;
	font-weight: 500;
}


.chat-div {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
	height: 220px;
	width: <?= $width; ?>;
	margin-left: <?= $margin_left; ?>;
	margin-top: <?= $margin_top; ?>;
	margin-bottom: 180px;
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

.chat-button:hover + .phone-hidden {
	display: inline;
	margin-left: 10px;
	border: 1px solid #2b80ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	padding: 5px;
	border-radius: 0.325rem;
}

.phone-hidden {
	display: none;
}

.phone-text {
	font-weight: 500;
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
		<div class="logo"><a href="about-us.php" style="text-decoration: none; color: black"><img src="assets/images/logo.png" class="logo-image"></a></div>
		<div class="lend"><a href="dashboard.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow-money.php" style="text-decoration: none; color: black"><span  class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="profile.php" style="text-decoration: none; color: black"><span class="login-text">Your Profile</span></a></div>
		<div class="signup"><div><a href="actions/users/logoutAction.php" style="text-decoration: none; color: black;"><img src="assets/images/logout.png" class="logout-button"></a></div></div>
	</div>
</div>

<div class="everything-except-header">

<div class="main">
	

		
	
	<div class="loan-recap">
		<div class="subtitle"><span>Repayment Not Received</span></div>
		<div style="margin-left: 20px; margin-bottom: 40px; font-weight: 500;"><span style="color: #2b80ff;"><?= $username_lender; ?></span> Reported not Receiving the Following Repayment from You:</div>
		<div class="column-1">
		<div class="text">Repayment Amount</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		<div class="text">Repayment Date</br><span class="subtext1" style="color: red;"><?= date('M jS, Y', strtotime($repaid_date)); ?></span></div>
		</div>
		<div class="column-2">
		<div class="text">Lender</br><a href="profile-user.php?id=<?= $id_lender; ?>" target="blank" style="text-decoration: none;"><span class="subtext2"><?= $username_lender; ?></span></a></div>
		<div class="text">Payment Method</br><span class="subtext2"><?= $payment_method_repayment; ?></span></div>
		</div>
	</div>
	
	<div class="confirm-repayment-1">
	<div class="subtitle"><span>Confirm Repayment</span></div>
	<div class="steps">Step 1:</div>
	
	<form method="post" style="margin-left: 20px;">
		<div>
		<p style="margin-bottom: 5px; color: black;">Re-Enter <?= $payment_method_repayment; ?> Transaction ID</p>
		<input type="input" name="repayment_id_confirmation" placeholder="Enter Paypal Transaction ID" class="input" required autocomplete="off">
		</div>
		<div>
		<input type="submit" value="Submit" name="repayment_confirmation" class="submit">
		</div>
	</form>
	</div>
	
	<div class="confirm-repayment-2">
	<div class="subtitle"><span>Confirm Repayment</span></div>
	<div class="steps">Step 2:</div>
	
	<form method="post" style="margin-left: 20px;" enctype="multipart/form-data">
		<div>
		<p style="margin-bottom: 5px; color: black;">Upload Proof of Payment from <?= $payment_method_repayment; ?></p>
		<div class="input-container"><label for="file-upload"><span class="label-text">Select File</span><input type="file" id="file-upload" name="repayment_receipt_confirmation" class="upload-input" required></label></div>
		</div>
		<div>
		<input type="submit" value="Upload Proof" name="repayment_upload" class="submit">
		</div>
	</form>
	</div>
	
		<?php 
		if(isset($CorrectIdMessage)){ 
                echo ''.$CorrectIdMessage.''; 
            }
        ?>
	
	
	<div class="chat-div">
		<div class="subtitle-chat"><span>Contact <a href="profile-user.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><span style="color: #560296;"><?= $username_lender; ?></span></a></span></div>
		<div class="chat-text"><span>Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="chat-button">Contact <span><?= $username_lender; ?></span></button><span class="phone-hidden">Phone Number: <span class="phone-text"><?=$phone_number_display?></span></span>
	</div>
	

		<?php 
		if(isset($IncorrectIdMessage)){ 
                echo ''.$IncorrectIdMessage.''; 
            }
        ?>
		
		<?php 
		if(isset($file_error_message)){ 
                echo ''.$file_error_message.''; 
            }
        ?>
		
		

</div>

<div class="footer">
	<div class="footer-content">
		<div class="footer-1">
			<div><img src="assets/images/logo.png" class="logo-image-footer"></div>
		</div>
		<div class="footer-2">
			<div class="footer-subsection-title"><span>Company</span></div>
			<div class="footer-subsection-text"><a href="about-us.php" class="footer-link" target="blank"><span>About Instant Borrow</span></a></div>
			<div class="footer-subsection-text"><a href="contact-us.php" class="footer-link" target="blank"><span>Contact Us</span></a></div>
		</div>
		<div class="footer-3">
			<div class="footer-subsection-title"><span>Resources</span></div>
			<div class="footer-subsection-text"><a href="lender-guide.php" class="footer-link" target="blank"><span>Lender's Guide</span></a></div>
			<div class="footer-subsection-text"><a href="borrower-guide.php" class="footer-link" target="blank"><span>Borrower's Guide</span></a></div>
		</div>
		<div class="footer-4">
			<div class="footer-subsection-title"><span>Legal</span></div>
			<div class="footer-subsection-text"><a href="terms.php" class="footer-link" target="blank"><span>Terms & Conditions</span></a></div>
			<div class="footer-subsection-text"><a href="privacy.php" class="footer-link" target="blank"><span>Privacy Policy</span></a></div>
		</div>
		<div class="footer-bottom">
			<div class="social-widgets">
			<a href="https://facebook.com" class="footer-link" target="blank"><img class="widget" src="assets/images/facebook-widget.png"></a>
			<a href="https://twitter.com" class="footer-link" target="blank"><img class="widget" src="assets/images/twitter-widget.png"></a>
			<a href="https://instagram.com" class="footer-link" target="blank"><img class="widget" src="assets/images/instagram-widget.png"></a>
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
