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
require('actions/users/changePassword.php');
require('actions/users/ChangeEmailAction.php');
require('actions/users/bannedAction.php');
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Your profile - Instant Borrow</title>

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

.under-header {
	display: none;
	width: 100%;
	margin-top: 76px;
	border-bottom: 1px solid #d6d6d6;
	position: fixed;
	background-color: #374861;
	z-index: 100;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	text-align: center;
}

.text-under {
	color: white;
	font-weight: 500;
	font-size: 1.45rem;
}

.lend-under {
	display: none;
	padding-top: 15px;
	padding-bottom: 15px;
	width: 100%;
	border-bottom: 1px solid white;
}

.lend-under:hover {
	background-color: #536b8f;
}

.borrow-under {
	display: none;
	padding-top: 20px;
	padding-top: 15px;
	padding-bottom: 15px;
	width: 100%;
	border-bottom: 1px solid white;
}

.borrow-under:hover {
	background-color: #536b8f;
}

.login-under {
	display: none;
	padding-top: 20px;
	padding-top: 15px;
	padding-bottom: 15px;
	width: 100%;
	border-bottom: 1px solid white;
	background-color: #00c4ff;
}

.login-under:hover {
	background-color: #536b8f;
}

.signup-under {
	display: none;
	padding-top: 20px;
	padding-top: 15px;
	padding-bottom: 15px;
	width: 100%;
}

.signup-under:hover {
	background-color: #536b8f;
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

.header-menu {
	display: none;
}

.header-menu-image {
	width: 31px;
	height: 31px;
	margin-top: -3px;
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
	background-color: #f7f7f7;
}

.title {
	font-weight: 500;
	font-size: 3.2rem;
}

.user-title {
	margin-top: -70px;
	margin-bottom: 80px;
}


.profile-picture {
	height: 70px;
	width: 70px;
	margin-bottom: -82px;
	border-radius: 50%;
}

.dashboard {
	height: 300px;
	width: 100%;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
}

.subsection-title-dashboard {
	font-weight: 500;
	margin-left: 80px;
	margin-top: 20px;
	font-size: 2.1rem;
	color: #00c4ff;
}

.main-text {
	font-weight: 500;
	font-size: 1.12rem;
}

.main-subtext {
	font-weight: 500;
	font-size: 1.8rem;
	color: #00c4ff;
}

.returns-2 {
	display: none;
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
	margin-top: -329px;
}

.borrowing-activity {
	display: none;
	height: 300px;
	width: 49%;
	margin-left: 0%;
	margin-top: 50px;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
	border-radius: 0.425rem;
}

.borrowing-container {
	margin-left: 20px;
	width: calc(100% - 20px);
}

.verifications {
	height: 300px;
	width: 32%;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
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

.verification-box3 {
	margin-left: 3px;
	border: 1px solid orange;
	border-radius: 0.125rem;
	padding-left: 2px;
	padding-right: 3px;
	background-color: #fafafa;
	color: orange;
	font-weight: 500;
	font-size: 0.85rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: font-size .2s;
	transition: color .2s;
	transition: border .2s;
	display: <?= $verification_display; ?>;
}

.verification-box3:hover {
	border: 1px solid #ffc700;
	color: #ffc700;
	font-size: 0.9rem;
}

.verification-box3:empty {
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
	width: 45%;
	margin-top: -316px;
}

.column-12-verifications {
	margin-left: 55%;
	height: 300px;
	width: 50%;
	margin-top: -316px;
}

.under-verification-text2 {
	display: none;
}

.under-verification-text1 {
	display: inline;
}

.column-300 {
	display: none;
}


.profile-trust {
	height: 300px;
	width: 32%;
	margin-left: 34%;
	margin-top: -304px;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
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
	border: 1px solid #2b80ff;
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
	transition: border 0.2s;
	transition: color 0.2s;
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
	transition: border 0.2s;
	transition: color 0.2s;
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
	margin-top: 80px;
	margin-bottom: 100px;
}

.settings-title {
	font-weight: 500;
	font-size: 3.2rem;
	color: black;
	margin-bottom: 30px;
}

.settings-subtitle {
	font-weight: 500;
	font-size: 2.1rem;
	color: #00c4ff;
	
}

.settings-subtitle-line2 {
	margin-top: -10px;
}

.settings-text {
	font-size: 1.05rem;
	color: #383838;
}

.setting-date {
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.10rem;
}


.buttons-container-2 {
	display: none;
}

.add-picture {
	margin-top: 0px;
	height: 50px;
	background-color: white;
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	width: 160px;
	transition: background-color 0.5s;
}

.add-picture:hover {
	background-color: #2b80ff;
	color: white;
}

.change-password {
	height: 50px;
	background-color: white;
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	width: 160px;
	margin-left: 4px;
	transition: background-color 0.5s;
}

.change-password:hover {
	background-color: #2b80ff;
	color: white;
}

.update-verifications {
	height: 50px;
	background-color: white;
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	width: 192px;
	margin-left: 4px;
	transition: background-color 0.5s;
}

.update-verifications:hover {
	background-color: #2b80ff;
	color: white;
}

.delete-account {
	height: 50px;
	background-color: white;
	color: red;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid red;
	border-radius: 0.325rem;
	width: 140px;
	margin-left: 4px;
	transition: background-color 0.5s;
}

.delete-account:hover {
	background-color: red;
	color: white;
}


.add-picture-2 {
	margin-top: 0px;
	height: 50px;
	background-color: white;
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	width: 192px;
	transition: background-color 0.5s;
}

.add-picture-2:hover {
	background-color: #2b80ff;
	color: white;
}

.change-password-2 {
	height: 50px;
	background-color: white;
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	width: 192px;
	margin-left: 4px;
	transition: background-color 0.5s;
}

.change-password-2:hover {
	background-color: #2b80ff;
	color: white;
}

.update-verifications-2 {
	height: 50px;
	background-color: white;
	color: #2b80ff;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	width: 192px;
	transition: background-color 0.5s;
	margin-top: 10px;
}

.update-verifications-2:hover {
	background-color: #2b80ff;
	color: white;
}

.delete-account-2 {
	height: 50px;
	background-color: white;
	color: red;
	font-weight: 500;
	font-size: 1.09rem;
	border: 1px solid red;
	border-radius: 0.325rem;
	width: 192px;
	margin-left: 4px;
	transition: background-color 0.5s;
}

.delete-account-2:hover {
	background-color: red;
	color: white;
}

.button-text-2 {
	display: none;
}

.subsection-title {
	font-weight: 500;
	margin-left: 20px;
	margin-top: 20px;
	font-size: 2.01rem;
	color: black;
}

.name-2 {
	display: none;
}

.title-2 {
	display: none;
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

.user-details {
	font-weight: 500;
	color: #2b80ff;
	font-size: 1.08rem;
}

.image-button-visible {
	display: block;
	margin-top: 20px;
	width: 100%;
	height: 50px;
	background-color: #2b80ff;
	color: white;
	font-size: 1.11rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: background-color 0.2s;
}

.image-button-visible:hover {
	background-color: #00c4ff;
}

.image-button-hidden {
	display: none;
}

.popup-editpicture {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: none;
}

.popup-editpicture-visible {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: block;
}

.popup-changepassword {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: none;
}

.popup-changepassword-visible {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: block;
}

.popup-changeemail {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: none;
}

.popup-changeemail-visible {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: block;
}

.popup-deleteaccount {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: none;
}

.popup-deleteaccount-visible {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: block;
}

.edit-profile-picture-div {
	display: none;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
}

.edit-profile-picture-div-visible {
	display: none;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
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
	font-weight: 500;
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

.popup-delete-image {
	margin-top: 30px;
	font-weight: 500;
	font-size: 1.12rem;
}

.delete-image-button {
	margin-top: 10px;
	height: 45px;
	width: 200px;
	background-color: #2b80ff;
	color: white;
	font-size: 1.11rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: background-color 0.2s;
	padding-left: 6px;
	padding-right: 6px;
}

.delete-image-button:hover {
	background-color: #00c4ff;
}

.change-password-div {
	display: none;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
}

.change-password-div-visible {
	display: block;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
}

.change-email-div {
	display: none;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
}

.change-email-div-visible {
	display: block;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
}

.delete-account-div {
	display: none;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
}

.delete-account-div-visible {
	display: block;
	background-color: white;
	width: 340px;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 200px);
	border-radius: 0.425rem;
	text-align: left;
	padding: 30px;
}

.popup-title {
	font-weight: 500;
	font-size: 1.8rem;
	color: black;
}

.popup-input {
	width: calc(100% - 7px);
	height: 35px;
	background-color: #f7f7f7;
	margin-top: 30px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.01rem;
	font-weight: 500;
	color: #383838;
	padding-left: 7px;
}

.popup-input:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.01); /* IE 9 */
	-webkit-transform: scale(1.01); /* Safari 3-8 */
	transform: scale(1.01); 
}

.popup-input:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}


.popup-button {
	margin-top: 35px;
	width: 100%;
	height: 50px;
	background-color: #00c4ff;
	color: white;
	font-size: 1.11rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: background-color 0.2s;
}

.popup-button:hover {
	background-color: #2b80ff;
}

.input-title {
	margin-bottom: -28px;
	margin-top: 45px;
	font-size: 1.2rem;
}

.cancel-button {
	margin-top: 50px;
	width: 150px;
	height: 40px;
	background-color: red;
	color: white;
	font-size: 1.11rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: background-color 0.2s;
}

.cancel-button:hover {
	background-color: #ba000c;
}

.label-container {
	width: calc(100% - 7px);
	margin-top: -26px;
	margin-bottom: 30px;
	text-align: right;
}

.label-image {
	height: 11px;
	width: auto;
	position: absolute;
	margin-left: -20px;
}

.error-message {
	font-weight: 500;
	color: red;
	margin-top: 10px;
	margin-bottom: -20px;
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

.logo-image-footer {
	height: 75px;
	width: auto;
	margin-top: 10px;
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

.footer-legal-bottom {
	font-size: 0.7rem;
	margin-bottom: 10px;
	display: none;
}

.link-legal {
	text-decoration: none;
	color: #00c4ff;
}

.footer-bottom-text {
	font-size: 0.86rem;
	color: #2b2b2b;
}

</style>



<style>

@media screen and (max-width: 1700px) {
	
	.main {
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 1550px) {
	
	.main {
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1350px) {
	
	.main {
		width: 93%;
		margin-left: 3.5%;
	}
	
}

@media screen and (max-width: 1280px) {
	
	.main {
		width: 95%;
		margin-left: 2.5%;
	}
	
}

@media screen and (max-width: 1235px) {
	
	.main {
		width: 96%;
		margin-left: 2%;
	}
}

@media screen and (max-width: 1215px) {
	  
	.main {
		width: 80%;
		margin-left: 10%;
	}
	
	
	.column-1 {
		
	}
	
	.column-2 {
		margin-left: 37%;
		width: 210px;
	}
	
	.column-3 {
		margin-left: 75%;
		width: 25%;
	}
	  
	.column-4 {
		display: none;
	}
	
	.borrowing-activity {
		display: block;
	}
	
	
	.verifications {
		margin-left: 51%;
		width: 49%;
		margin-top: -302px;
	}
	
	.profile-trust {
		margin-top: 50px;
		margin-left: 0%;
		width: 49%;
		height: 260px;
	}
	
	.payment-details {
		margin-left: 51%;
		width: 49%;
		height: 260px;
		margin-top: -262px;
	}
	
	.column-12-verifications {
		width: 45%;
	}
	
	.account-settings {
		margin-top: 60px;
	}
	
}



@media screen and (max-width: 1095px) {
	
	
	.title-part2 {
		display: none;
	}
	
}

@media screen and (max-width: 975px) {
	
	.main {
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 915px) {
	
	.main {
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 850px) {
	
	.main {
		width: calc(96% - 2px);
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 815px) {
	
	.column-12-verifications {
		margin-left: 50%;
		width: 51%;
	}
	
	.main {
		margin-top: 135px;
	}
	
	.user-title {
		margin-bottom: 50px;
	}
	
	
}

@media screen and (max-width: 780px) {
	
	.your-word {
		display: none;
	}
	
	.column-12 {
		margin-left: 60%;
		width: 40%;
	}
	
	.title {
		font-size: 2.7rem;
		margin-bottom: 40px;
	}
	
	.subsection-title-dashboard {
		font-size: 1.8rem;
	}
	
	.subsection-title {
		font-size: 1.8rem;
	}
	
	.settings-title {
		font-size: 2.7rem;
	}
	
	.settings-subtitle {
		font-size: 1.8rem;
	}
	
	.setting-date {
		font-size: 1.05rem;
	}
	
}

@media screen and (max-width: 735px) {
	

	.borrowing-activity {
		width: 46%;
	}
	
	.verifications {
		width: 52%;
		margin-left: 48%;
	}
	
	.profile-trust {
		width: 46%;
	}
	
	.payment-details {
		width: 52%;
		margin-left: 48%;
	}
	
}

@media screen and (max-width: 725px) {
	
	.add-picture {
		width: 159px;
	}


	.change-password {
		width: 157px;
		margin-left: 3px;
	}


	.update-verifications {
		width: 192px;
		margin-left: 3px;
	}


	.delete-account {
		width: 132px;
		margin-left: 3px;
	}

}

@media screen and (max-width: 714px) {
	
	
	.main {
		width: 80%;
		margin-left: 10%;
		margin-top: 128px;
	}
	
	.dashboard {
		height: 275px;
	}

	
	.borrowing-activity {
		width: 100%;
		margin-top: 30px;
		height: 275px;
	}
	
	.verifications {
		width: 100%;
		margin-left: 0%;
		margin-top: 30px;
		height: 245px;
	}
	
	.profile-trust {
		width: 100%;
		margin-top: 30px;
	}
	
	.payment-details {
		width: 100%;
		margin-left: 0%;
		margin-top: 30px;
		height: 235px;
	}
	
	.column-3 {
		display: none;
	}
	
	.column-1 {
		width: 50%;
	}
	
	.column-2 {
		margin-left: 50%;
		width: 50%;
	}
	
	.column-300 {
		display: block;
		margin-left: 20px;
		width: 50%;
	}
	
	.borrowing-container {
		width: 50%;
		margin-left: 50%;
		margin-top: -185px;
	}
	
	.title-1 {
		display: none;
	}
	
	.title-2 {
		display: inline;
	}
	
	.account-settings {
		margin-top: 30px;
	}
	
	.buttons-container-2 {
		display: block;
	}
	
	.buttons-container-1 {
		display: none;
	}
	
}

@media screen and (max-width: 680px) {
	
	.main {
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 640px) {
	
	.main {
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 610px) {
	
	.main {
		width: calc(96% - 2px);
		margin-left: 2%;
		margin-top: 120px;
	}

	.column-1 {
		width: 55%;
	}
	
	.column-2 {
		margin-left: 55%;
		width: 45%;
	}
	
	.column-300 {
		display: block;
		margin-left: 20px;
		width: 55%;
	}
	
	.borrowing-container {
		width: 45%;
		margin-left: 55%;
	}

}

@media screen and (max-width: 510px) {
	
	.column-1 {
		width: 60%;
	}
	
	.column-2 {
		margin-left: 60%;
		width: 40%;
	}
	
	.column-300 {
		display: block;
		margin-left: 20px;
		width:60%;
	}
	
	.borrowing-container {
		width: 40%;
		margin-left: 60%;
	}
	
	.returns-1 {
		display: none;
	}
	
	.returns-2 {
		display: inline;
	}
	
	.title {
		font-size: 2.5rem;
		margin-bottom: 40px;
	}
	
	.subsection-title-dashboard {
		font-size: 1.7rem;
	}
	
	.subsection-title {
		font-size: 1.7rem;
	}
	
	.settings-title {
		font-size: 2.5rem;
	}
	
	.settings-subtitle {
		font-size: 1.7rem;
	}
	
	.setting-date {
		font-size: 1.05rem;
	}
	
	.edit-profile-picture-div {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 220px);
	}

	.edit-profile-picture-div-visible {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 220px);
	}
	
	.change-password-div {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 240px);
	}

	.change-password-div-visible {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 240px);
	}

	.change-email-div {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 230px);
	}

	.change-email-div-visible {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 230px);
	}

	.delete-account-div {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 220px);
	}

	.delete-account-div-visible {
		width: calc(90% - 60px);
		margin-left: 5%;
		margin-top: calc(50vh - 220px);
	}
	
	.name-2 {
		display: inline;
	}
	
	.name-1 {
		display: none;
	}

}


@media screen and (max-width: 450px) {

	.main {
		margin-top: 110px;
	}

	.title {
		font-size: 2.3rem;
		margin-bottom: 40px;
	}

	
	.subsection-title-dashboard {
		font-size: 1.7rem;
	}
	
	.subsection-title {
		font-size: 1.7rem;
	}
	
	.settings-title {
		font-size: 2.3rem;
	}
	
	.settings-subtitle {
		font-size: 1.7rem;
	}
	
	.setting-date {
		font-size: 1.05rem;
	}
	
	.account-settings {
		margin-bottom: 70px;
	}
	
	.input-title {
		margin-top: 35px;
	}
	
}

@media screen and (max-width: 420px) {
	
	.column-1 {
		margin-left: 10px;
	}
	
	.column-2 {
		margin-left: 57%;
		width: 43%;
	}
	
	.column-300 {
		margin-left: 10px;
	}
	
	.borrowing-container {
		width: 43%;
		margin-left: 57%;
	}
	
	.title-2 {
		margin-left: -10px;
	}
	
	.add-picture-2 {
		width: calc(49% - 2px);
	}


	.change-password-2 {
		font-weight: 500;
		font-size: 1.09rem;
		width: calc(48.9% - 2px);
		margin-left: 2%;
	}


	.update-verifications-2 {
		font-weight: 500;
		font-size: 1.09rem;
		width: calc(49% - 2px);
	}

	.delete-account-2 {
		font-weight: 500;
		font-size: 1.09rem;
		width: 160px;
		margin-left: 2%;
		width: calc(48.9% - 2px);
	}
	
	.edit-profile-picture-div {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}

	.edit-profile-picture-div-visible {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}
	
	.change-password-div {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}

	.change-password-div-visible {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}

	.change-email-div {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}

	.change-email-div-visible {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}

	.delete-account-div {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}

	.delete-account-div-visible {
		width: calc(90% - 30px);
		margin-left: 5%;
		padding: 15px;
	}

	
}

@media screen and (max-width: 410px) {

	.title {
		font-size: 2.1rem;
		margin-bottom: 40px;
	}
	
	.subsection-title-dashboard {
		font-size: 1.6rem;
	}
	
	.subsection-title {
		font-size: 1.6rem;
	}
	
	.settings-title {
		font-size: 2.1rem;
	}
	
	.settings-subtitle {
		font-size: 1.6rem;
	}
	
}

@media screen and (max-width: 385px) {
	
	.main-text {
		font-size: 1.05rem;
	}
	
	.borrowing-container {
		width: 45%;
		margin-left: 55%;
		margin-top: -182px;
	}
	
	
}

@media screen and (max-width: 374px) {

	.title {
		font-size: 1.9rem;
		margin-bottom: 40px;
	}
	
	.subsection-title-dashboard {
		font-size: 1.5rem;
	}
	
	.subsection-title {
		font-size: 1.6rem;
	}
	
	.settings-title {
		font-size: 1.9rem;
	}
	
	.settings-subtitle {
		font-size: 1.6rem;
	}

}

@media screen and (max-width: 359px) {
	
	.under-verification-text2 {
		display: inline;
	}

	.under-verification-text1 {
		display: none;
	}
	
	.main {
		margin-top: 105px;
	}
	
}

@media screen and (max-width: 349px) {
	
	.last-word {
		display: none;
	}
	
	.borrowing-container {
		width: 35%;
		margin-left: 65%;
	}
	
	.column-2 {
		margin-left: 65%;
		width: 35%;
	}
	
	
	.button-text-2 {
		display: block;
	}

	.button-text-1 {
		display: none;
	}
	
	.popup-title {
		font-size: 1.6rem;
	}
	
	.popup-delete-image {
		font-size: 1.05rem;
	}
	
}

@media screen and (max-width: 340px) {

	.title {
		font-size: 1.8rem;
		margin-bottom: 40px;
	}
	
	.subsection-title-dashboard {
		font-size: 1.4rem;
	}
	
	.subsection-title {
		font-size: 1.6rem;
	}
	
	.settings-title {
		font-size: 1.8rem;
	}
	
	.settings-subtitle {
		font-size: 1.6rem;
	}
	
	.payment-method {
		font-size: 1.04rem;
	}

}

@media screen and (max-width: 335px) {
	
	.main {
		margin-top: 95px;
	}
	
}

@media screen and (max-width: 325px) {

	.title {
		font-size: 1.75rem;
		margin-bottom: 40px;
	}
	
	.subsection-title-dashboard {
		font-size: 1.4rem;
	}
	
	.subsection-title {
		font-size: 1.6rem;
	}
	
	.settings-title {
		font-size: 1.8rem;
	}
	
	.settings-subtitle {
		font-size: 1.6rem;
	}
	
}

</style>



<style>

@media screen and (max-width: 1700px) {
	
	.header-text {
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 1550px) {
	
	.header-text {
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1350px) {
	
	.header-text {
		width: 93%;
		margin-left: 3.5%;
	}
	
}

@media screen and (max-width: 1280px) {
	
	.header-text {
		width: 95%;
		margin-left: 2.5%;
	}
	
}

@media screen and (max-width: 1235px) {
	
	.header-text {
		width: 96%;
		margin-left: 2%;
	}
}

@media screen and (max-width: 1215px) {
	  
	.header-text {
		width: 80%;
		margin-left: 10%;
	}
	
}



@media screen and (max-width: 975px) {
	
	.header-text {
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 915px) {
	
	.header-text {
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 850px) {
	
	.header-text {
		width: calc(96% - 2px);
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 703px) {

	.lend {
		display: none;
	}
	
	.borrow {
		display: none;
	}
	
	.login {
		margin-left: calc(100% - 200px);
	}
	
	.login-text {
		background-color: #00c4ff;
		outline: 1px solid #00c4ff;
		color: white;
		border-radius: 0.125rem;
	}
	
	.login-text:hover {
		outline: 1px solid #2b80ff;
		background-color: #2b80ff;
	}
	
	.signup {
		margin-left: calc(100% - 70px);
	}
	
	.header-menu {
		display: block;
		width: 31px;
		height: 31px;
		margin-top: -29px;
		margin-left: calc(100% - 36px);
	}
	
	.lend-under {
		display: block;
	}

	.borrow-under {
		display: block;
		border-bottom: 0px;
		background-color: #00c4ff;
	}
	
	.borrow-under:hover {
		background-color: #00a2d4;
	}

	.login-under {
		display: none;
	}

	.signup-under {
		display: none;
	}
	
}

@media screen and (max-width: 460px) {
	
	
	.login {
		display: none;
	}
	
	.signup-text {
		background-color: #00c4ff;
		outline: #00c4ff;
		border-radius: 0.275rem;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	
	.signup-text:hover {
		background-color: #2b80ff;
		outline: #2b80ff;
	}
	
	.borrow-under {
		display: block;
		border-bottom: 1px solid white;
		background-color: #374861;
	}


	.login-under {
		display: block;
		border-bottom: 0px;
	}
	
	.borrow-under:hover {
		background-color: #536b8f;
	}
	
	.login-under:hover {
		background-color: #00a2d4;
	}

	.text-under {
		font-size: 1.3rem;
	}
}

@media screen and (max-width: 405px) {
	
	.logo-image {
		height: 55px;
		margin-top: -17px;
	}
}

@media screen and (max-width: 350px) {

	.logo-image {
		height: 50px;
		margin-top: -14px;
	}
}

@media screen and (max-width: 335px) {
	
	.header {
		height: 65px;
	}
	
	.logo-image {
		margin-top: -18px;
	}
	
	.signup {
		margin-top: -26px;
	}
	
	.header-menu {
		margin-top: -29px;
	}
	
	.under-header {
		margin-top: 66px;
	}

	.signup-under {
		display: block;
	}
	
}
	
</style>



<style>
@media screen and (max-width: 1650px) {	
	
	.footer-content {
		margin-left: 5%;
		width: 90%;
	}

}

@media screen and (max-width: 1360px) {

	.footer-content {
		margin-left: 2%;
		width: 96%;
	}
}

@media screen and (max-width: 1270px) {
	
	.footer-content {
		margin-left: 10%;
		width: 80%;
	}

	.footer-2 {
		width: 159px;
		margin-left: 30%;
	}

	.footer-3 {
		width: 128px;
		margin-left: 57%;
	}

	.footer-4 {
		width: 149px;
		margin-left: calc(100% - 149px);
	}
}

@media screen and (max-width: 1220px) {

	.footer-content {
		margin-left: 7%;
		width: 86%;
	}
}

@media screen and (max-width: 1150px) {

	.footer-content {
		margin-left: 5%;
		width: 90%;
	}
}

@media screen and (max-width: 1000px) {

	.footer-content {
		margin-left: 2%;
		width: 96%;
	}
}

@media screen and (max-width: 935px) {

	.logo-image-footer	{
		height: 70px;
		width: auto;
		margin-top: 10px;
	}
		

}

@media screen and (max-width: 845px) {

	.logo-image-footer	{
		height: 60px;
		width: auto;
		margin-top: 0px;
	}
	
	.footer-2 {
		width: 159px;
		margin-left: 27%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(63% - 64px);
	}

	.footer-4 {
		width: 149px;
		margin-left: calc(100% - 149px);
	}
}

@media screen and (max-width: 805px) {
	
	.logo-image-footer	{
		display: none;
	}
	
	.footer-2 {
		width: 159px;
		margin-left: 0%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(50% - 64px);
	}

	.footer-4 {
		width: 149px;
		margin-left: calc(100% - 149px);
	}

}

@media screen and (max-width: 550px) {

	.logo-image-footer	{
		display: none;
	}
	
	.footer-2 {
		width: 103px;
		margin-left: 0%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(47% - 64px);
	}

	.footer-4 {
		width: 149px;
		margin-left: calc(100% - 149px);
	}
}

@media screen and (max-width: 505px) {

	.footer-2 {
		width: 103px;
		margin-left: 0%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(50% - 64px);
	}

	.footer-4 {
		width: 103px;
		margin-left: calc(100% - 103px);
	}

}

@media screen and (max-width: 405px) {

	.footer-2 {
		width: 159px;
		margin-left: 7%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(93% - 128px);
	}

	.footer-4 {
		display: none;
	}
	
	.footer-legal-bottom {
		display: block;
	}
	
	.social-widgets {
		margin-bottom: 0px;
	}
}

@media screen and (max-width: 390px) {
	
	.footer-2 {
		width: 159px;
		margin-left: 5%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(95% - 128px);
	}
	
}

@media screen and (max-width: 370) {

	.footer-2 {
		width: 159px;
		margin-left: 2%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(98% - 128px);
	}
}


@media screen and (max-width: 335px) {
	
	.footer-2 {
		width: 103px;
		margin-left: 6%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(94% - 128px);
	}
}
</style>



</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f7f7f7;">

<div class="header">
	<div class="header-text">
		<div class="logo"><a href="borrower-guide.php" style="text-decoration: none; color: black"><img src="assets/images/logo.png" class="logo-image"></a></div>
		<div class="lend"><a href="dashboard.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow-money.php" style="text-decoration: none; color: black"><span  class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="profile.php" style="text-decoration: none; color: black"><span class="login-text">Your Profile</span></a></div>
		<div class="signup"><div><a href="actions/users/logoutAction.php" style="text-decoration: none; color: black;"><img src="assets/images/logout.png" class="logout-button"></a></div></div>
		<div class="header-menu"><img id="menu-header" class="header-menu-image" src="assets/images/header-menu.jpg"></div>
	</div>
</div>
<div class="under-header" id="under-header">
		<a href="dashboard.php" style="text-decoration: none; color: black"><div class="lend-under"><span class="text-under">Lend</span></div></a>
		<a href="borrow.php" style="text-decoration: none; color: black"><div class="borrow-under"><span class="text-under">Borrow</span></div></a>
		<a href="profile.php" style="text-decoration: none; color: black"><div class="login-under"><span class="text-under">Your Profile</span></div></a>
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



					<div class="popup-editpicture<?= $visible_onload_editpicture; ?>" id="popup-editpicture">
					
						<div class="edit-profile-picture-div<?= $visible_onload_editpicture; ?>" id="edit-profile-picture-div">
							<form method="POST" action="upload.php" enctype="multipart/form-data">
								<span class="popup-title"><?= $addOrEdit; ?> Profile Picture</span>
								<div class="popup-input"><label for="file-upload"><span class="label-text">Select Image</span><input type="file" id="file-upload" name="uploadedFile" class="upload-input" required></label></div>
								<div><input class="<?= $Profile_image_add; ?>" type="submit" name="AddimageButton" value="Upload Image" /></div>
								<div><input class="<?= $Profile_image_edit; ?>" type="submit" name="EditimageButton" value="Upload Image" /></div>
							 </form>
							 <div class="popup-delete-image">
							<?php 
							if(isset($removeProfilePicture)){ 
								echo '<form method="post"><span>'.$removeProfilePicture.'</span></br><input class="delete-image-button" type="submit" value="Delete Profile Picture" name="delete_picture"></form>'; 
							}
							?>
							</div>
							<button class="cancel-button" onclick="CloseProfilePicturePopup()">Cancel</button>
						</div>
					
					</div>
					<div class="popup-changepassword<?= $visible_onload_changepassword; ?>" id="popup-changepassword">
						
						<div class="change-password-div<?= $visible_onload_changepassword; ?>" id="change-password-div">
							<form method="post">
							<span class="popup-title">Change Password</span>
							<div>
							<div class="input-title">Current Password</div>
							<input id="popup_input" class="popup-input" name="current_password" type="password" required>
							<div class="label-container"><label for="showPassword" class="label"><img src="assets/images/show-password.jpg" class="label-image"><input id="showPassword" type="checkbox" onclick="ShowPasswordFunction()" style="display: none;"></label></div>
							</div>
							<div>
							<div class="input-title">New Password</div>
							<input id="popup_input2" class="popup-input" name="new_password" type="password" required>
							<div class="label-container"><label for="showPassword2" class="label"><img src="assets/images/show-password.jpg" class="label-image"><input id="showPassword2" type="checkbox" onclick="ShowPasswordFunction2()" style="display: none;"></label></div>
							</div>
							<div><input class="popup-button" name="change_password" type="submit" value="Change Password"></div>
							</form>
							<div class="error-message">
							<?php 
							if(isset($password_errorMsg)){ 
							echo $password_errorMsg; 
							}
							?>
							</div>
							<button class="cancel-button" onclick="CloseChangePasswordPopup()">Cancel</button>
						</div>
						
					</div>
					<div class="popup-changeemail<?= $visible_onload_changeemail; ?>" id="popup-changeemail">
						
						<div class="change-email-div<?= $visible_onload_changeemail; ?>" id="change-email-div">
							<form method="post">
							<span class="popup-title">Change Email</span>
							<div>
							<div class="input-title">Password</div>
							<input id="popup_input3" class="popup-input" name="emailchange_password" type="password" required>
							<div class="label-container"><label for="showPassword3" class="label"><img src="assets/images/show-password.jpg" class="label-image"><input id="showPassword3" type="checkbox" onclick="ShowPasswordFunction3()" style="display: none;"></label></div>
							</div>
							<div class="input-title">New Email Address</div>
							<div><input class="popup-input" name="new_email" type="email" autocomplete="off" required></div>
							<div><input class="popup-button" name="change_email" type="submit" value="Change Email"></div>
							</form>
							<div class="error-message">
							<?php 
							if(isset($email_error_message)){ 
							echo $email_error_message; 
							}
							?>
							</div>
							<button class="cancel-button" onclick="CloseChangeEmailPopup()">Cancel</button>
						</div>
						
					</div>
					<div class="popup-deleteaccount<?= $visible_onload_deleteaccount; ?>" id="popup-deleteaccount">
						
						<div class="delete-account-div<?= $visible_onload_deleteaccount; ?>" id="delete-account-div">
							<form method="post">
							<span class="popup-title">Delete Account</span>
							<div>
							<div class="input-title">Password</div>
							<input id="popup_input4" class="popup-input" name="deleteaccount_password" type="password" required>
							<div class="label-container"><label for="showPassword4" class="label"><img src="assets/images/show-password.jpg" class="label-image"><input id="showPassword4" type="checkbox" onclick="ShowPasswordFunction4()" style="display: none;"></label></div>
							</div>
							<p style="color: red; font-weight: 500; font-size: 0.93rem; margin-top: 25px; margin-bottom: -5px;">This Action cannot be Undone. All your Account Data will be Lost.</p>
							<div><input class="popup-button" name="delete_account" type="submit" value="Delete Account"></div>
							</form>
							<div class="error-message">
							<?php 
							if(isset($errorMsg)){ 
							echo '<p class="error-message">'.$errorMsg.'</p>'; 
							}
							?>
							</div>
							<button class="cancel-button" onclick="CloseDeleteAccountPopup()">Cancel</button>
						</div>
						
					</div>



<div class="main">

	<h1 class="title">Instant Borrow Profile</h1>

	<div class="user-title">
		<img onclick="ProfilePicturePopup()" src="assets/images/profile-images/<?= $profile_picture; ?>" class="profile-picture">
		<p class="subsection-title-dashboard"><span class="name-1"><?= mb_strimwidth($_SESSION['name'], 0, 30, "..."); ?></span><span class="name-2"><?= mb_strimwidth($_SESSION['name'], 0, 23, "..."); ?></span></p>
	</div>

	<div class="dashboard">
	
		<p class="subsection-title"><span class="title-1">Your Activity</span><span class="title-2">Lending Activity</span></p>
	
		<div class="column-1">
		<p class="main-text">Amount Lent<br><span class="main-subtext"><?php echo ''.ROUND($getLentAmountMessage).'';?>$</span><a href="profile-lent-loans.php" style="text-decoration: none;"><span style="color: red;"> <?php echo ''.$AllLentCountMessage.'';?> <?php echo ''.$singular2.'';?></span></a></p>
		<p class="main-text">Amount Collected<br><span class="main-subtext"> <?php echo''.ROUND($getRepayedAmountMessage).'';?>$</span></p>
		</div>
		<div class="column-2">
		<p class="main-text">Total Profit<br><span class="main-subtext"><?php echo ''.ROUND($getRepayedAmountMessage-$getLentAmountMessage).'';?>$</span></p>
		<p class="main-text"><span class="returns-1">Return On Investement</span><span class="returns-2"><span class="last-word">Average </span>Return</span><br><span class="main-subtext"><?php echo ''.ROUND((($getRepayedAmountMessage/$getLentAmountMessage)-1)*100).'';?>%</span></p>
		</div>
		<div class="column-3">
		<p class="main-text">Amount Borrowed<br><span class="main-subtext"><?php echo ''.ROUND($getBorrowedAmountMessage).'';?>$</span><a href="profile-borrowed-loans.php" style="text-decoration: none;"><span  style="color: red;"> <?php echo ''.$AllCountMessage.'';?> <?php echo ''.$singular1.'';?></span></a></p>
		<p class="main-text">Amount Repaid<br><span class="main-subtext"><?php echo ''.ROUND(($getRepayedBorrowedAmountMessage/$getSupposedRepaymentBorrowedAmountMessage)*100).'';?>%</span></p>
		</div>
		<div class="column-4">
		<a href="active-loans.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$activeCountMessage.'';?></span> Active <?php echo ''.$singular3.'';?></p></a>
		<a href="loan-requests.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$requestCountMessage.'';?></span> Loan <?php echo ''.$singular4.'';?></p></a>
		<a href="unpaid-loans.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$unpaidCountMessage.'';?></span> Unpaid <?php echo ''.$singular5.'';?></p></a>
		</div>
	</div>
	
	<div class="borrowing-activity">
	
		<p class="subsection-title"><span class="title-1">Ongoing Loans</span><span class="title-2">Borrowing Activity</span></p>
		
		<div class="column-300">
		<p class="main-text">Amount Borrowed<br><span class="main-subtext"><?php echo ''.ROUND($getBorrowedAmountMessage).'';?>$</span><a href="profile-borrowed-loans.php" style="text-decoration: none;"><span  style="color: red;"> <?php echo ''.$AllCountMessage.'';?> <?php echo ''.$singular1.'';?></span></a></p>
		<p class="main-text">Amount Repaid<br><span class="main-subtext"><?php echo ''.ROUND(($getRepayedBorrowedAmountMessage/$getSupposedRepaymentBorrowedAmountMessage)*100).'';?>%</span></p>
		</div>
	
		<div class="borrowing-container">
		<a href="active-loans.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$activeCountMessage.'';?></span> Active<span class="last-word"> <?php echo ''.$singular3.'';?></span></p></a>
		<a href="loan-requests.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$requestCountMessage.'';?></span><span class="last-word"> Loan</span> <?php echo ''.$singular4.'';?></p></a>
		<a href="unpaid-loans.php" style="text-decoration: none; color: black;"><p class="main-text"><span class="main-subtext"><?php echo ''.$unpaidCountMessage.'';?></span> Unpaid <span class="last-word"><?php echo ''.$singular5.'';?></span></p></a>
		</div>
		
	</div>		
	
	<div class="verifications">
	
		<p class="subsection-title">Verifications</p>
	
		<div class="column-11">
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">Email<br><img class="checkmark" src="<?php if(isset($checkmark4)){echo ''.$checkmark4.'';}else {echo ''.$cross4.'';}?>"><span class="verification-box2"><?php if(isset($verified_email)){echo ''.$verified_email.'';}?></span><span class="verification-box"><?php if(isset($not_verified_email)){echo ''.$not_verified_email.'';}?></span></p></a>
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">Phone Number<br><img class="checkmark" src="<?php if(isset($checkmark1)){echo ''.$checkmark1.'';}else {echo ''.$cross1.'';}?>"><span class="verification-box2"><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}?></span><span class="verification-box"><?php if(isset($not_verified_phone)){echo ''.$not_verified_phone.'';}?></span></p></a>
		</div>
		<div class="column-12-verifications">
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">Address<br><img class="checkmark" src="<?php if(isset($checkmark2)){echo ''.$checkmark2.'';}else {echo ''.$cross2.'';}?>"><span class="verification-box2"><?php if(isset($verified_address)){echo ''.$verified_address.'';}?></span><span class="verification-box"><?php if(isset($not_verified_address)){echo ''.$not_verified_address.'';}?></span></p></a>
			<a href="verifications.php" style="text-decoration: none;"><p style="color: black;">ID & Picture<br><img class="checkmark" src="<?php if(isset($checkmark3)){echo ''.$checkmark3.'';}elseif(isset($cross31)){echo ''.$cross31.'';}else {echo ''.$cross3.'';}?>"><span class="verification-box2"><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}?></span><span class="verification-box"><?php if(isset($not_verified_idcard)){echo ''.$not_verified_idcard.'';}?></span><span class="verification-box3"><span class="under-verification-text1"><?php if(isset($underverification_idcard)){echo ''.$underverification_idcard.'';}?></span><span class="under-verification-text2"><?php if(isset($underverification_idcard2)){echo ''.$underverification_idcard2.'';}?></span></span></p></a>
		</div>
	</div>
	
	<div class="profile-trust">
	
		<p class="subsection-title">Profile trust</p>
	
		<div class="column-11">
			<div><span>Positive feedback</br><img class="thumbs-up" src="assets/images/positive.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$positive_feedback.'';?></span></span></div>
			<div style="margin-top: 15px;"><span>Negative feedback</br><img class="thumbs-down" src="assets/images/negative.png"><span style="font-weight: bold; font-size: 1.35rem;"><?php echo ''.$negative_feedback.'';?></span></span></div>
		</div>
		<div class="column-12">
			<div style= "margin-top: 15px;"><span style="font-weight: 500; font-size: 1.15rem;"><span class="your-word">Your </span>Trust Score</span></br><span style="font-size: 1.45rem; font-weight: 500; color: <?= $trustscore_color; ?>;"><?php echo ''.ROUND($trustscore6).'';?>/100</span></div>
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
		</div>
	</div>
	<div class="account-settings">
		<p class="settings-title">Account Settings</span></p>
			
			<p><span class="settings-subtitle"><span class="name-1"><?= mb_strimwidth($_SESSION['username'], 0, 18, "..."); ?></span><span class="name-2"><?= mb_strimwidth($_SESSION['username'], 0, 15, "..."); ?></span></span></p>
			<p class="settings-subtitle-line2"><span class="settings-text">Member Since </span><span class="setting-date"><?= date('M jS, Y', strtotime($user_join_date)); ?></span></p>
			
			<div class="buttons-container-1">
			<button class="add-picture" onclick="ProfilePicturePopup()"><?= $addOrEdit; ?> Profile Picture</button>
			<button class="change-password" onclick="ChangePasswordPopup()">Change Password</button>
			<button class="update-verifications" onclick="ChangeEmailPopup()">Change Email Address</button>
			<button class="delete-account" onclick="DeleteAccountPopup()">Delete Account</button>
			</div>
			
			<div class="buttons-container-2">
			<button class="add-picture-2" onclick="ProfilePicturePopup()"><span class="button-text-1"><?= $addOrEdit; ?> Profile Picture</span><span class="button-text-2"><?= $addOrEdit; ?> Profile</br>Picture</span></button>
			<button class="change-password-2" onclick="ChangePasswordPopup()"><span class="button-text-1">Change Password</span><span class="button-text-2">Change</br>Password</span></button>
			</br>
			<button class="update-verifications-2" onclick="ChangeEmailPopup()">Change Email</button>
			<button class="delete-account-2" onclick="DeleteAccountPopup()">Delete Account</button>
			</div>
			
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
			<div class="footer-legal-bottom"><a class="link-legal" href="privacy.php">Privacy Policy</a> - <a class="link-legal" href="terms.php">Terms and Conditions</a></div>
			<div class="footer-bottom-text"><span>Copyright © 2023 - <?= date("Y"); ?> Instant Borrow. All rights reserved.</span></div>
		</div>
	</div>
</div>

</div>

<script>
	var button = document.getElementById('menu-header'); 
	
	function closeNav() {
		document.getElementById("under-header").style.display = "none";
	}

	button.onclick = function() {
		var div = document.getElementById('under-header');
		if (div.style.display !== 'none') {
			div.style.display = 'none';
		}
		else {
			div.style.display = 'block';
			
			document.onclick = function (e) {
			if (e.target.id !== 'under-header' && e.target.id !== 'menu-header') {
				if (e.target.offsetParent && e.target.offsetParent.id !== 'under-header')
					closeNav()
				}
			}
		}
	};
</script>

<script>
function ProfilePicturePopup() {
  document.getElementById("edit-profile-picture-div").style.display = "block";
   document.getElementById("popup-editpicture").style.display = "block";
}
</script>

<script>
function ChangePasswordPopup() {
  document.getElementById("change-password-div").style.display = "block";
  document.getElementById("popup-changepassword").style.display = "block";
}
</script>

<script>
function ChangeEmailPopup() {
  document.getElementById("change-email-div").style.display = "block";
  document.getElementById("popup-changeemail").style.display = "block";
}
</script>

<script>
function DeleteAccountPopup() {
  document.getElementById("delete-account-div").style.display = "block";
  document.getElementById("popup-deleteaccount").style.display = "block";
}
</script>

<script>
function CloseProfilePicturePopup() {
  document.getElementById("edit-profile-picture-div").style.display = "none";
  document.getElementById("popup-editpicture").style.display = "none";
}
</script>

<script>
function CloseChangePasswordPopup() {
  document.getElementById("change-password-div").style.display = "none";
  document.getElementById("popup-changepassword").style.display = "none";
}
</script>

<script>
function CloseChangeEmailPopup() {
  document.getElementById("change-email-div").style.display = "none";
  document.getElementById("popup-changeemail").style.display = "none";
}
</script>

<script>
function CloseDeleteAccountPopup() {
  document.getElementById("delete-account-div").style.display = "none";
  document.getElementById("popup-deleteaccount").style.display = "none";
}
</script>


<script>
function ShowPasswordFunction() {
  var x = document.getElementById("popup_input");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function ShowPasswordFunction2() {
  var x = document.getElementById("popup_input2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function ShowPasswordFunction3() {
  var x = document.getElementById("popup_input3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function ShowPasswordFunction4() {
  var x = document.getElementById("popup_input4");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>

</html>
