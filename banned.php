<?php
require('actions/questions/BannedUserRepayLoanAction.php');
require('actions/questions/updateDatabases.php');
?>

<?php
if(!isset($_SESSION['banned'])AND(!isset($_SESSION['auth']))){
    header('Location: index.php');
}
?>

<?php
if(!isset($_SESSION['banned'])AND(isset($_SESSION['auth']))){
    header('Location: dashboard.php');
}
?>

<?php
	if((isset($Loannotfound))AND(isset($_SESSION['banned']))){ 
	header('Location: loannotfound-banned.php');
	}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Account Suspended - Instant Borrow</title>

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

.everything-except-header {
	position: absolute;
	width: 100%;
}

.popup-phone-number {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: none;
}

.phone-number-div {
	background-color:  white;
	color: black;
	height: 340px; 
	width: 360px;
	text-align: center;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.325rem;
	padding: 20px;
}

.subtitle-popup {
	margin-top: 10px;
	font-weight: 500;
	font-size: 2.32rem;
	color: #00c4ff;
}

.popup-phone-text {
	font-weight: 500;
	font-size:1.1rem;
}

.popup-text {
	font-weight: 500;
	font-size: 0.98rem;
}

.close-button {
	margin-top: 40px;
	height: 50px;
	width: 300px;
	background-color: #2b80ff;
	color: white;
	font-weight: 500;
	font-size: 1.35rem;
	border-radius: 0.325rem;
	border: 0px;
	outline: 0px;
	transition: background-color 0.2s;
}

.close-button:hover {
	background-color: #00c4ff;
}

.popup-confirmed {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
}

.confirmed-div {
	background-color: white;
	color: black;
	height: 320px; 
	width: 384px;
	text-align: center;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.325rem;
	padding-top: 7px;
	padding-bottom: 20px;
	padding-left: 8px;
	padding-right: 8px;
}

.subtitle-confirmed {
	margin-top: 10px;
	font-weight: 500;
	font-size: 2.07rem;
	color: black;
}

.confirmed-image {
	margin-top: 30px;
	width: 35%;
	height: auto;
}

.confirmed-button {
	margin-top: 30px;
	height: 50px;
	width: 300px;
	background-color: #2b80ff;
	color: white;
	font-weight: 500;
	font-size: 1.35rem;
	border-radius: 0.325rem;
	border: 0px;
	outline: 0px;
	transition: background-color 0.2s;
}

.confirmed-button:hover {
	background-color: #00c4ff;
}

.main {
	margin-top: 80px;
	margin-left: 10%;
	width: 80%;
	background-color: #f7f7f7;
}


.banned {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 100%;
	height: 245px;
}

.loan-recap {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 49%;
	height: 300px;
	margin-top: 50px;
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
	font-weight: 500;
	margin-top: 20px;
	margin-bottom: 30px;
	margin-left: 20px;
	font-size: 2.1rem;
	color: black;
}

.subtitle-payment {
	font-weight: 500;
	margin-top: 20px;
	margin-bottom: 30px;
	font-size: 2.1rem;
	color: black;
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
	margin-top: -310px;
}

.column-1-banned {
	margin-left: 20px;
	height: 300px;
	width: 50%;
}

.column-2-banned {
	margin-left: 50%;
	height: 300px;
	width: 50%;
	margin-top: -310px;
}

.subtext1 {
	font-weight: 500;
	font-size: 1.8rem;
	color: #00c4ff;
}

.subtext2 {
	font-weight: 500;
	font-size: 1.2rem;
	color: #00c4ff;
}


.subtitle-chat {
	font-weight: 500;
	margin-top: 20px;
	margin-bottom: 5px;
	margin-left: 20px;
	font-size: 2.1rem;
	color: black;
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
	padding-top: 10px;
	padding-bottom: 10px;
	width: 200px;
	border-radius: 0.325rem;
	font-weight: 500;
	font-size: 1.25rem;
	color: white;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: background-color 0.2s;
}

.chat-button:hover {
	background-color: #00c4ff; 
}

.date-type2 {
	display: none;
}

.payment {
	margin-top: -554px;
	height: 544px;
	margin-left: 51%;
	width: 49%;
	padding-bottom: 8px;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	margin-bottom: 100px;
}


.select-method {
	padding: 20px;
	width: calc(100% - 40px);
}

.select-method-title {
	width: calc(100% - 40px);
	padding-top: 20px;
	padding-left: 20px;
	padding-right: 20px;
	padding-bottom: 0px;
	margin-bottom: -20px;
	margin-top: -18px;
}

.payment-method-box {
	margin-right: 1%;
	border: 1px solid #2b80ff;
	padding: 3px;
	border-radius: 0.125rem;
	font-weight: 500;
	font-size: 1.02rem;
}

.payment-box {
	padding: 20px;
	font-size: 1.05rem;
	display: none;
}

#<?= $default; ?> {
	display: block;
}

#<?= $default; ?>-select {
	background-color: #2b80ff;
	color: white;
}

.payment-address {
	color: #3d91e0;
	margin-top: -15px;
	overflow: scroll;
}


.payment-box-title {
	font-weight: 500;
	font-size: 1.35rem;
	color: #2b80ff;
}

.payment-box-bold {
	font-weight: 500;
	color: #2b80ff;
	font-size: 1.3rem;
}

.input-container {
	width: 50%;
}

.input {
	width: 200px;
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

.button-container {
	margin-left: 50%;
	margin-top: -70px;
}

.submit-button {
	width: 200px;
	margin-top: 10px;
	height: 34px;
	border-radius: 0.125rem;
	border: 1px solid #2b80ff;
	background-color: #2b80ff;
	color: white;
	padding-left: 7px;
	font-size: 1.15rem;
	font-weight: 500;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.submit-button:hover {
	background-color: #00c4ff;
	border: 1px solid #00c4ff;
	-ms-transform: scale(1.05); /* IE 9 */
	-webkit-transform: scale(1.05); /* Safari 3-8 */
	transform: scale(1.05); 
}

.error {
	margin-top: 20px;
	color: white;
	background-color: #00c4ff;
	text-align: center;
	border-radius: 0.325rem;
	font-weight: 500;
}

.success {
	margin-top: 20px;
	color: white;
	background-color: #12d400;
	border: 1px solid #12d400;
	text-align: center;
	border-radius: 0.325rem;
	font-weight: 500;
}


</style>

<style>

@media screen and (max-width: 1896px) {
	
	.chat-button {
		margin-top: -30px;
	}
	
}

@media screen and (max-width: 1750px) {
	
	.main	{
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 1600px) {
	
	.main	{
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1400px) {
	
	.main	{
		width: 96%;
		margin-left: 2%;
	}
	
}


@media screen and (max-width: 1255px) {
	
	.loan-recap {
		width: 44%;
	}

	.chat-div {
		width: calc(44% - 5px);
	}
	
	.payment {
		margin-left: 46%;
		width: 54%;
	}
	
	.column-1-banned {
		width: 42%;
	}
	
	.column-2-banned {
		width: 45%;
	}
	
	.banned {
		height: 290px;
	}
	
}

@media screen and (max-width: 1150px) {
	
	.main {
		width: 80%;
		margin-left: 10%;
	}
	
	.loan-recap {
		width: 100%;
		height: 265px;
		margin-top: 30px;
	}

	.chat-div {
		margin-top: 30px;
		width: calc(100% - 5px);
	}
	
	.payment {
		margin-top: 30px;
		margin-left: 0%;
		width: 100%;
	}
	
	.chat-button {
		margin-top: 0px;
	}
	
	.column-1-banned {
		height: 257px;
	}
	
	.column-2-banned {
		margin-top: -28.px;
	}
	
}

@media screen and (max-width: 1059px) {
	
	.chat-button {
		margin-top: -30px;
	}
	
}

@media screen and (max-width: 950px) {
	
	.main {
		width: 85%;
		margin-left: 7.5%;
	}
	
}


@media screen and (max-width: 950px) {
	
	.main {
		width: 90%;
		margin-left: 5%;
	}
	
	.chat-button {
		margin-top: 0px;
	}
	
}

@media screen and (max-width: 926px) {
	
	.chat-button {
		margin-top: -30px;
	}
	
}

@media screen and (max-width: 850px) {
	
	.main {
		width: 96%;
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 810px) {
	
	.column-1-banned {
		width: calc(100% - 40px);
		height: 410px;
	}
	
	.column-2-banned {
		width: calc(100% - 40px);
		margin-left: 20px;
	}
	
	.banned {
		height: 380px;
	}
	
}

@media screen and (max-width: 772px) {
	
	.chat-div {
		height: 220px;
	}
	
}

@media screen and (max-width: 705px) {
	
	.main {
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 665px) {
	
	.main {
		width: calc(96% - 2px);
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 625px) {
	
	.payment {
		height: 652px;
	}
	
	.button-container {
		width: 100%;
		margin-left: 0px;
		margin-top: 30px;
	}
	
	.warning {
		margin-top: 13px;
	}
	
	.main {
		margin-top: 50px;
	}
	
}

@media screen and (max-width: 563px) {
	
	.banned {
		height: 400px;
	}
	
}

@media screen and (max-width: 551px) {
	
	.subtext1 {
		font-weight: 500;
		font-size: 1.8rem;
		color: #00c4ff;
	}

	.subtext2 {
		font-weight: 500;
		font-size: 1.2rem;
		color: #00c4ff;
	}

	.subtext2-username {
		font-weight: 500;
		font-size: 1.2rem;
		color: #00c4ff;
		margin-top: 0px;
	}
	
}


@media screen and (max-width: 500px) {

	.phone-number-div {
		width: calc(90% - 40px);
		text-align: center;
		margin-left: calc(5%);
		margin-top: calc(50vh - 220px);
		border-radius: 0.325rem;
		padding: 20px;
	}
	
}

@media screen and (max-width: 465px) {
	
	.subtitle {
		font-size: 1.9rem;
	}
	
	.subtitle-chat {
		font-size: 1.9rem;
	}
	
	.confirmed-div {
		height: 320px; 
		width: calc(90% - 16px);
		margin-left: 5%;
	}
	
	.confirmed-image {
		width: 135px;
	}
	
	.subtitle-confirmed {
		font-size: 1.9rem;
	}
	
}


@media screen and (max-width: 462px) {

	.payment {
		height: 678px;
	}
	
}



@media screen and (max-width: 450px) {

	.subtext2-username {
		overflow: scroll;
		margin-right: 10px;
	}

}

@media screen and (max-width: 428px) {
	
	.chat-div {
		height: 235px;
	}
	
}

@media screen and (max-width: 425px) {
	
	.subtitle {
		font-size: 1.7rem;
	}
	
	.subtitle-chat {
		font-size: 1.7rem;
	}
	
	
	.subtitle-confirmed {
		font-size: 1.7rem;
	}

	
}

@media screen and (max-width: 410px) {
	
	.main {
		margin-top: 35px;
	}
	
	.subtitle {
		font-size: 1.6rem;
	}
	
	.subtitle-chat {
		font-size: 1.6rem;
	}
	
	.subtitle-popup {
		margin-top: 5px;
		font-size: 1.9rem;
	}
	
}

@media screen and (max-width: 400px) {
	
	.select-method {
		overflow: scroll;
		width: 80%;
		padding-left: 0px;
		border-left: 20px solid white;
	}

	
	.column-2 {
		margin-left: 60%;
		width: 40%;
	}
	
	.chat-button {
		width: calc(100% - 40px);
	}
	
	.date-type1 {
		display: none;
	}

	.date-type2 {
		display: block;
	}
	
	.repayment-word {
		display: none;
	}

}

@media screen and (max-width: 385px) {
	
	.subtitle {
		font-size: 1.6rem;
	}
	
	.subtitle-chat {
		font-size: 1.6rem;
	}
	
	.close-button {
		margin-top: 40px;
		height: 50px;
		width: 90%;
	}
	
	.text {
		font-size: 1.05rem;
	}
	
	.confirmed-button {
		width: 90%;
	}	
	
	.subtitle-confirmed {
		font-size: 1.6rem;
	}
	
}

@media screen and (max-width: 370px) {
	
	.subtitle {
		font-size: 1.5rem;
	}
	
	.subtitle-chat {
		font-size: 1.5rem;
	}
	
}

@media screen and (max-width: 365px) {
	
	.chat-div {
		height: 220px;
	}
	
	.loan-recap {
		width: calc(100% - 2px);
		padding-right: 2px;
	}
	
}

@media screen and (max-width: 362px) {

	
	.subtitle-confirmed {
		font-size: 1.5rem;
	}
}

@media screen and (max-width: 355px) {

	.recap-text {
		display: none;
	}
	
	.column-2 {
		margin-left: 60%;
		width: 40%;
	}
	
	.select-text {
		display: none;
	}
	
	.submit-text {
		font-size: 1.02rem;
	}
	
	.payment {
		height: 685px;
	}

}

@media screen and (max-width: 345px) {

	.phone-number-div {
		width: calc(90% - 20px);
		margin-left: calc(5%);
		margin-top: calc(50vh - 210px);
		padding: 10px;
	}
	
	.subtitle-popup {
		font-size: 1.8rem;
	}
	
	.chat-text {
		font-size: 1.01rem;
	}
	
	.subtitle-confirmed {
		font-size: 1.45rem;
	}
	
}


@media screen and (max-width: 330px) {

	.subtitle-confirmed {
		font-size: 1.4rem;
	}

}

</style>

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f7f7f7;">

<div class="everything-except-header">

<div class="popup-phone-number" id="popup-phone-number">
	<div class="phone-number-div" id="phone-number-div">
		<div class="subtitle-popup"><span>Contact Lender</span></div>
		<p class="popup-text">Phone Number:</p>
		<p class="popup-phone-text"><?= mb_strimwidth($phone_number_display, 0, 26, "..."); ?></p>
		<div class="popup-text"><span style="color: red;">Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="close-button" onclick="ClosePopup()">Close</button>
	</div>	
</div>

<?php
if(isset($success_message)){ echo $success_message;}
?>

<div class="main">
	
	<div class="banned">
	<p class="subtitle">Account Suspended</p>
	<div class="column-1-banned">
	<p class="text">Reason:</br><span class="subtext1" style="color: red;"><?= $reason_public; ?></span></p>
	<p class="text"><span style="color: #2b80ff; font-weight: 500;"><?= mb_strimwidth($username_lender, 0, 13, "..."); ?></span> Now Has Access to All your Personal Information.</p>
	</div>
	<div class="column-2-banned" style="margin-top: -267px;">
	<p class="text"><span style="color: red; font-weight: 500;">You Must still Repay</span> and Communicate with the Lender.</p>
	<p class="text" style="font-weight: 500;">You Will not be Able to Create another Instant Borrow Account.</p>
	</div>
	</div>
	
	<div class="loan-recap">
		<div class="subtitle"><span>Repayment Recap</span></div>
		<div class="column-1">
		<div class="text">You Repay</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		<div class="text">You Borrowed</br><span class="subtext1"><?= $loan_amount; ?>$</span></div>
		</div>
		<div class="column-2">
		<div class="text"><span class="repayment-word">Repayment </span>Deadline</br><span class="subtext2" style="color: red;"><span class="date-type1"><?= date('M jS, Y', strtotime($repayment_date)); ?></span><span class="date-type2"><?= date('j M y', strtotime($repayment_date)); ?></span></span></div>
		<div class="text"  style="margin-top: 24px;">Lender</br><span class="subtext2"><?= mb_strimwidth($username_lender, 0, 13, "..."); ?></span></div>
		</div>
	</div>
	
	<div class="chat-div">
		<div class="subtitle-chat"><span>Contact <span style="color: #00c4ff;"><?= mb_strimwidth($username_lender, 0, 9, "..."); ?></span></span></div>
		<div class="chat-text"><span style="color: red;">Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="chat-button" onclick="OpenPopup()">Contact</button>
	</div>
	
	<div class="payment">
				<div class="select-method-title">
				<p class="subtitle-payment"><span class="select-text">Select </span>Payment Method</p>
				</div>
				<div class="select-method">
					<span class="payment-method-box" id="paypal-select" onclick="ShowPaypal()" style="display: <?= $paypal_notset; ?>;">Paypal</span><span class="payment-method-box" id="cashapp-select" onclick="ShowCashapp()" style="display: <?= $cashapp_notset; ?>;">Cashapp</span><span class="payment-method-box" id="venmo-select" onclick="ShowVenmo()" style="display: <?= $venmo_notset; ?>;">Venmo</span><span class="payment-method-box" id="zelle-select" onclick="ShowZelle()" style="display: <?= $zelle_notset; ?>;">Zelle</span><span class="payment-method-box" id="chime-select" onclick="ShowChime()" style="display: <?= $chime_notset; ?>;">Chime</span>
				</div>
				
				<div class="payment-box" id="paypal">
					<span class="payment-box-title">Paypal</span>
					<p>Lender's Paypal Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= mb_strimwidth($paypal, 0, 80, "..."); ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Paypal Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Paypal Transaction ID" name="paypal_id" required autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Payment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Payment Sent" name="payment_paypal">
					</div>
					</form>
				</div>
				
				<div class="payment-box" id="cashapp">
					<span class="payment-box-title">Cashapp</span>
					<p>Lender's Cashapp Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= mb_strimwidth($cashapp, 0, 80, "..."); ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Cashapp Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Cashapp Transaction ID" required name="cashapp_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Payment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Payment Sent" name="payment_cashapp">
					</div>
					</form>
				</div>
				
				<div class="payment-box" id="venmo">
					<span class="payment-box-title">Venmo</span>
					<p>Lender's Venmo Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= mb_strimwidth($venmo, 0, 80, "..."); ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Venmo Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Venmo Transaction ID" required name="venmo_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Payment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Payment Sent" name="payment_venmo">
					</div>
					</form>
				</div>
				
				<div class="payment-box" id="zelle">
					<span class="payment-box-title">Zelle</span>
					<p>Lender's Zelle Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= mb_strimwidth($zelle, 0, 80, "..."); ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Zelle Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Zelle Transaction ID" required name="zelle_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Payment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Payment Sent" name="payment_zelle"> 
					</div>
					</form>
				</div>
				
				<div class="payment-box" id="chime">
					<span class="payment-box-title">Chime</span>
					<p>Lender's Chime Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= mb_strimwidth($chime, 0, 80, "..."); ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div style="input-container">
					<span>Chime Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Chime Transaction ID" required name="chime_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Payment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Payment Sent" name="payment_chime">
					</div>
					</form>
				</div>
	</div>
	


</div>


</div>


<script>
function ShowPaypal() {
  document.getElementById("paypal").style.display = "block";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "none";
  
  document.getElementById("paypal-select").style.backgroundColor = "#2b80ff";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "white";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowCashapp() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "block";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "none";
  
   document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "#2b80ff";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "white";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowVenmo() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "block";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "none";
  
  document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "#2b80ff";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "white";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowZelle() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "block";
  document.getElementById("chime").style.display = "none";
  
  document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "#2b80ff";
  document.getElementById("chime-select").style.backgroundColor = "white";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "white";
  document.getElementById("chime-select").style.color = "black";
}
</script>

<script>
function ShowChime() {
  document.getElementById("paypal").style.display = "none";
  document.getElementById("cashapp").style.display = "none";
  document.getElementById("venmo").style.display = "none";
  document.getElementById("zelle").style.display = "none";
  document.getElementById("chime").style.display = "block";
  
  document.getElementById("paypal-select").style.backgroundColor = "white";
  document.getElementById("cashapp-select").style.backgroundColor = "white";
  document.getElementById("venmo-select").style.backgroundColor = "white";
  document.getElementById("zelle-select").style.backgroundColor = "white";
  document.getElementById("chime-select").style.backgroundColor = "#2b80ff";
  
  document.getElementById("paypal-select").style.color = "black";
  document.getElementById("cashapp-select").style.color = "black";
  document.getElementById("venmo-select").style.color = "black";
  document.getElementById("zelle-select").style.color = "black";
  document.getElementById("chime-select").style.color = "white";
}

</script>

<script>
function ClosePopup() {
  document.getElementById("phone-number-div").style.display = "none";
  document.getElementById("popup-phone-number").style.display = "none";
}
</script>

<script>
function OpenPopup() {
  document.getElementById("phone-number-div").style.display = "block";
  document.getElementById("popup-phone-number").style.display = "block";
}
</script>

</body>

</html>
