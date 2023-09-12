<?php
require('actions/users/securityAction.php');
require('actions/questions/RepaymentReceivedAction.php');
require('actions/questions/FeedbackAction.php');
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
	
<title><?= $repayment_amount; ?>$ Repayment Received from <?= $username_borrower; ?> - Instant Borrow</title>

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
	border: 1px solid #00c4ff;
	width: 100%;
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
	height: 450px;
	margin-top: 50px;
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


.thumbs-up {
	height: 40px;
	width: auto;
	margin-bottom: -10px;
	margin-right: 10px;
	margin-left: 7px;
}

.thumbs-down {
	height: 40px;
	width: auto;
	margin-bottom: -18px;
	margin-right: 10px;
	margin-left: 7px;
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
	width: clac(49% - 20px);
	margin-left: 51%;
	height: 200px;
	margin-top: -432px;
	margin-bottom: 322px;
	padding: 20px;
}

.subtitle-chat {
	font-weight: bold;
	margin-bottom: 5px;
	font-size: 1.8rem;
	color: #00c4ff;
}

.chat-text {
	font-size: 1.05rem;
	margin-bottom: 30px;
	color: #383838;
}

.chat-button {
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
		<div class="subtitle"><span>Repayment Received!</span></div>
		<div class="column-1">
		<div class="text">Amount Received</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		<div class="text">Instant Borrow Fee</br><span class="subtext1">0$</span></div>
		</div>
		<div class="column-2">
		<div class="text">Profit margin</br><span class="subtext1"><?= ROUND((($repayment_amount/$loan_amount)-1)*100); ?>%</span></div>
		<div class="text">Borrower</br><a href="profile-user.php?id=<?= $id_borrower; ?>" target="blank" style="text-decoration: none;"><span class="subtext2"><?= $username_borrower; ?></span></a></div>
		</div>
		<div class="column-3">
		<div class="text">Payment Method</br><span class="subtext2"><?= $payment_method_repayment; ?></span></div>
		<div class="text">Status</br><span class="subtext2"><?= $status_public; ?></span></div>
		</div>
	</div>
	
	<div class="disclaimer">
	<span>Amount Received on your Account may be Slightly Lower due to <?= $payment_method_repayment; ?>'s Fees.</span>
	</div>
	
	<div class="confirmation-div">
		<div  class="subtitle-feedback"><span>Confirm Reception of Payment</span></div>
		<div  class="text-feedback"><span>Check on your <?= $payment_method_repayment; ?> Account if you Have Received the Funds.</span></br><span>Be Patient, It may Take a Few Minutes.</span></div>
		
		<form method="post" style="margin-left: 20px; margin-top: 35px;">
		<div class="wrapper">
		<input type="radio" name="repayment" value="received" class="input" id="received" required >
		<label class="label" for="received"><img class="checkmark" src="assets/images/checkmark.png">Funds Received</label>
		</div>
		<div class="wrapper">
		<input type="radio" name="repayment" value="not_received" class="input" id="not_received" required>
		<label class="label" for="not_received"><img class="cross" src="assets/images/cross.png">Funds not Received</label>
		</div>
		<p style="color: red; font-weight: 500;">If Funds are Reported not as Received, the Lender will be Asked for Further Proof of Payment.</br>Any Attempt at Fraud will Result in a Ban.</p>
		<input type="submit" value="OK" name="notification_receivedrepayment" class="submit">
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
	
		<div class="feedback-div">
		<div  class="subtitle-feedback"><span>Feedback</span></div>
		<div  class="text-feedback"><span>Give your Opinion on the Borrower to Help Out other Lenders in the Future.</span></div>
		
		<form method="post" style="margin-left: 20px;">
		<p class="form-title">Your Oppinion of the Borrower:</p>
		<div class="wrapper">
		<input type="radio" name="feedback" value="positive" class="input" id="positive" required >
		<label class="label" for="positive"><img class="thumbs-up" src="assets/images/positive.png">Positive</label>
		</div>
		<div class="wrapper">
		<input type="radio" name="feedback" value="negative" class="input" id="negative" required>
		<label class="label" for="negative"><img class="thumbs-down" src="assets/images/negative.png">Negative</label>
		</div>
		<input type="submit" value="Submit" class="submit" name="notification_repaid">
		</form>
		
		 <?php 
            if(isset($errormessage)){ 
                echo ''.$errormessage.''; 
            }elseif(isset($successmessage)){ 
                echo ''.$successmessage.''; 
            }
        ?>
		
		</div>
		
		<div class="chat-div">
			<div class="subtitle-chat"><span>Contact <a href="profile-user.php?id=<?= $id_borrower; ?>" style="text-decoration: none;" target="blank"><span style="color: #560296;"><?= $username_borrower; ?></span></a></span></div>
			<div class="chat-text"><span>Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
			<button class="chat-button">Contact <span><?= $username_borrower; ?></span></button><span class="phone-hidden">Phone Number: <span class="phone-text"><?=$phone_number_display?></span></span>
		</div>

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
