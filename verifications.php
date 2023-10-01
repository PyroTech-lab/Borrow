<?php
require('actions/users/securityAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/notificationAction.php');
require('actions/users/addVerificationsAction.php');
require('actions/users/ProfileVerificationsAction.php');
require('actions/users/bannedAction.php');
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" /> 
	
<title>Verifications - Instant Borrow</title>

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
	width: 50%;
	margin-left: 25%;
	background-color: white;
	text-align: left;
}


.title {
	color: #2b80ff;
	font-weight: 500;
	font-size: 2.52rem
}

.subtitle {
	margin-top: -25px;
}

.form-prediv {
	background-color: red;
}

.form {
	margin-top: 150px;
}

.account {
	color: #2b80ff;
	font-weight: 500;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
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
	margin-left: 5px;
	border: 1px solid #31b52f;
	border-radius: 0.125rem;
	padding-left: 2px;
	padding-right: 3px;
	background-color: #fafafa;
	color: #31b52f;
	font-weight: 500;
	font-size: 0.85rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: border 0.2s;
	transition: color 0.2s;
}

.payment-method-box2:hover {
	border: 1px solid #33d130;
	color: #33d130;
	font-size: 0.9rem;
}

.payment-method-box2:empty {
	margin: 0px;
	padding: 0px;
	border: 0;
}

.payment-method-box3 {
	margin-left: 5px;
	border: 1px solid orange;
	border-radius: 0.125rem;
	padding-left: 2px;
	padding-right: 3px;
	background-color: #fafafa;
	color: orange;
	font-weight: 500;
	font-size: 0.85rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: border 0.2s;
	transition: color 0.2s;
}

.payment-method-box3:hover {
	border: 1px solid #ffc700;
	color: #ffc700;
	font-size: 0.9rem;
}

.payment-method-box3:empty {
	margin: 0px;
	padding: 0px;
	border: 0;
}

.input-text {
	font-weight: 500;
	font-size: 1.35rem;
}

.input {
	width: calc(100% - 10px);
	height: 40px;
	background-color: #f7f7f7;
	margin-top: 0px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.08rem;
	font-weight: 500;
	color: #575757;
	padding-left: 7px;
}

.input:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.005); /* IE 9 */
	-webkit-transform: scale(1.005); /* Safari 3-8 */
	transform: scale(1.005); 
}

.input:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}


.input-address {
	width: calc(100% - 10px);
	height: 40px;
	background-color: #f7f7f7;
	margin-top: 5px;
	margin-bottom: 25px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.08rem;
	font-weight: 500;
	color: #575757;
	padding-left: 7px;
}

.input-address:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.005); /* IE 9 */
	-webkit-transform: scale(1.005); /* Safari 3-8 */
	transform: scale(1.005); 
}

.input-address:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}


.input-text {
	font-weight: 500;
	font-size: 1.35rem;
}

.address-text {
	font-size: 1.03rem;
}


.input-select {
	width: calc(100% - 10px);
	height: 44px;
	background-color: #f7f7f7;
	margin-top: 0px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.08rem;
	font-weight: 500;
	color: #575757;
	padding-left: 7px;
}

.input-select:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.input-select:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}


.set-button {
	margin-top: 5px;
	width: 100%;
	height: 50px;
	background-color: #2b80ff;
	color: white;
	font-size: 1.21rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.set-button:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.005); /* IE 9 */
	-webkit-transform: scale(1.005); /* Safari 3-8 */
	transform: scale(1.005); 
}

.set-button-verified {
	margin-top: 5px;
	width: 100%;
	height: 50px;
	background-color: #00b81f;
	color: white;
	font-size: 1.21rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.set-button2 {
	margin-top: 5px;
	width: 100%;
	height: 50px;
	background-color: #00b81f;
	color: white;
	font-size: 1.21rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.set-button3 {
	margin-top: 5px;
	width: 100%;
	height: 50px;
	background-color: orange;
	color: white;
	font-size: 1.21rem;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}



.delete-form {
	width: 100%;
	text-align: right;
	margin-top: -160px;
	margin-bottom: 235px;
}

.delete-button {
	border-radius: 0.125rem;
	border: 1px solid #2b80ff;
	color: #2b80ff;
	font-size: 0.9rem;
	font-weight: 500;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	padding-top: 3px;
	padding-bottom: 3px;
}


.input-container {
	width: calc(100% - 10px);
	height: 35px;
	background-color: #f7f7f7;
	margin-top: 14px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.01rem;
	font-weight: 500;
	color: #383838;
	padding-left: 7px;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.label-text1 {
	position: absolute;
	z-index: 9;
	width: 200px;
	background-color: #2b80ff;
	color: white;
	margin-left: -8px;
	margin-top: -1px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-left: 8px;
	font-weight: 500;
	font-size: 0.92rem;
	text-align: center;
}

.label-text1:hover {
	background-color: #2b80ff;
}

.label-text2 {
	position: absolute;
	z-index: 9;
	width: 200px;
	background-color: #00c4ff;
	color: white;
	margin-left: -8px;
	margin-top: -1px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-left: 8px;
	font-weight: 500;
	font-size: 0.92rem;
	text-align: center;
}

.label-text2:hover {
	background-color: #00c4ff;
}

.sticky-input[type="date"] {
  -webkit-text-fill-color: #00c4ff;
}

input::-webkit-datetime-edit-day-field:focus,
input::-webkit-datetime-edit-month-field:focus,
input::-webkit-datetime-edit-year-field:focus {
    background-color: #e5de00;
    color: white;
	border-radius: 0.325rem;
}

.upload-input {
	margin-top: 8px;
	margin-left: 112px;
	font-weight: 500;
}


.explain {
	width: 100%;
	text-align: left;
	color: #383838;
	margin-top: 100px;
}

.explain-title {
	font-size: 2.1rem;
	font-weight: 500;
	color: #00c4ff;
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

@media screen and (max-width: 1850px) {

	.main {
		margin-left: calc(50% - 462.5px);
		width: 925px;
	}
}

@media screen and (max-width: 1080px) {

	.main {
		margin-left: 7.5%;
		width: 85%;
	}
}

@media screen and (max-width: 990px) {

	.main {
		margin-left: 5%;
		width: 90%;
	}
}

@media screen and (max-width: 870px) {

	.main {
		margin-left: 2%;
		width: 95%;
	}
}

@media screen and (max-width: 570px) {

	.input {
		font-size: 1.04rem;
	}
	
	.input-address {
		font-size: 1.04rem;
	}
	
	.input-select {
		font-size: 1.04rem;
	}

	
}

@media screen and (max-width: 550px) {

	.main {
		margin-top: 140px;
	}
	
}

@media screen and (max-width: 485px) {

	.input {
		font-size: 0.99rem;
	}
	
	.input-address {
		font-size: 0.99rem;
	}
	
	.input-select {
		font-size:0.99rem;
	}

	
}

@media screen and (max-width: 480px) {

	.main {
		margin-top: 120px;
	}
	
	.title {
		font-size: 2.2rem;
	}
	
	.form {
		margin-top: 100px;
	}
}

@media screen and (max-width: 410px) {
	
	.title {
		font-size: 2.02rem;
	}
	
	.main {
		margin-top: 110px;
	}
	
	.account {
		font-size: 1.03rem;
	}
}

@media screen and (max-width: 385px) {

	.input {
		font-size: 0.96rem;
	}
	
	.input-address {
		font-size: 0.96rem;
	}
	
	.input-select {
		font-size: 0.96rem;
	}
	
	
}

@media screen and (max-width: 380px) {
	
	.title {
		font-size: 1.9rem;
	}
}

@media screen and (max-width: 359px) {
	
	.title {
		font-size: 1.7rem;
	}
	
	.main {
		margin-top: 105px;
	}
	
	.form {
		margin-top: 80px;
	}
}

@media screen and (max-width: 335px) {

	.main {
		margin-top: 95px;
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

@media screen and (max-width: 370px) {

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

<style>

@media screen and (max-width: 1450px) {

	.header-text {
		margin-left: 7.5%;
		width: 85%;
	}
}

@media screen and (max-width: 1200px) {

	.header-text {
		margin-left: 5%;
		width: 90%;
	}
}

@media screen and (max-width: 975px) {

	.header-text {
		margin-left: 2%;
		width: 96%;
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

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif;">

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

	<div class="main">
	<p class="title">Account Verifications</p>
	<p class="subtitle">We collect this information to make our platform more secure and to ensure a smooth lending process.</p>
	
	<div class="form-prediv" id="email-verify"></div>
	<form style="display: <?= $EmailDisplay ?>; margin-top: 100px;" class="form" method="post" action="#email-verify">
		<p class="input-text"><span style="margin-right: 5px;">Email Address </span><span class="account" style="overflow-wrap: break-word;"><?= mb_strimwidth($row4['email'], 0, 50, "..."); ?></span><span class="payment-method-box"><?php if(isset($not_verified_email)){echo ''.$not_verified_email.'';}?></span><span class="payment-method-box2"><?php if(isset($verified_email)){echo ''.$verified_email.'';}?></span></p>
		<p>Verify your Email in Order to be able to receive Important Notifications from Instant Borrow</p>
		<input name="email_verify" type="submit" class="<?= $email_button_class; ?>" value="<?= $email_button; ?>" <?php if(isset($disabled)){echo ''.$disabled.'';}?>>
	</form>
	<form class="form" method="post" style="display: <?= $EnterCodeBoxDisplay ?>;">
		<p class="input-text">Enter Email Verification Code</p>
		<div style="margin-bottom: 30px;">We sent a 6-digit code to <span style="overflow-wrap: break-word;"><?= mb_strimwidth($row4['email'], 0, 50, "..."); ?></span></div>
		<input name="email_verification_code" type="number" class="input" required autocomplete="off">
		<input name="email_verifcation_submit" type="submit" class="set-button" value="Confirm">
	</form>
	<div style="font-weight: 500; color: red; margin-top: 15px;">
	<?php
	if(isset($email_error_message)){ 
	echo $email_error_message;
	}
	?>
	</div>
	
	<div class="form-prediv" id="phone-verify"></div>
	<form method="post" class="form" action="#phone-verify">
		<p class="input-text"><span style="margin-right: 5px;">Phone Number </span><span class="account" style="overflow: hidden; white-space: nowrap;"><?= mb_strimwidth($row['phone_number'], 0, 50, "..."); ?></span><span class="payment-method-box"><?php if(isset($not_verified_phone)){echo ''.$not_verified_phone.'';}?></span><span class="payment-method-box2"><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}?></span></p>
		<p>Verify your Phone Number to Communicate with other Users when Lending and Borrowing</p>
		<input name="phone_set" id="loan" class="input" style="width: calc(64% - 10px); margin-left: 36%" required autocomplete="off" placeholder="Phone Number" type="number">
		
		<div style="width: calc(34% - 7px); margin-top: -54px;">
		<select name="country_code_set" class="input-select" required>
			<option name="default_country" selected="selected" value ="-1">Country Code</option>
			<?php
			foreach($arrRegions as $region){
				echo "<option style='color: #2b80ff;  font-size: 1.15rem; font-weight: 500;' value=".$region.">+". $phoneUtil->getCountryCodeForRegion($region) ." ".$region."</option>";
			}
			?>
		</select>
		</div>
		
		<input name="phone_submit" type="submit" class="set-button" value="<?= $phone_placeholder; ?>">
		
		<div style="color: red; margin-top: 15px;"><?php if(isset($invalid_phone_number)){echo ''.$invalid_phone_number.'';}?></div>
	</form>

	<div class="form-prediv" id="address-verify"></div>
	<form method="post" class="form" id="address-form"  action="#address-verify">
		<p class="input-text">Address <span class="payment-method-box"><?php if(isset($not_verified_address)){echo ''.$not_verified_address.'';}?></span><span class="payment-method-box2"><?php if(isset($verified_address)){echo ''.$verified_address.'';}?></span></p>
		
		<span class="address-text"><span style="margin-right: 5px;">Street Address </span><span class="account"><?= mb_strimwidth($row2['address'], 0, 100, "..."); ?></span></span>
		<input  id="ship-address" name="address_set" class="input-address" required autocomplete="off" placeholder="Street Name and House Number">
		
		<span class="address-text"><span style="margin-right: 5px;">City and ZIP Code </span><span class="account"><?= mb_strimwidth($row2['city'], 0, 50, "..."); ?><?php if(isset($separator)){echo ''.$separator.'';}?> <?= mb_strimwidth($row2['postcode'], 0, 20, "..."); ?></span></span>
		<div style="width: calc(59% - 7px);" ><input id="locality" name="city_set" class="input-address" required autocomplete="off" placeholder="City"></div>
		<div style="width: calc(39% - 10px); margin-left: calc(61% + 10px); margin-top: -74px;"><input id="postcode" name="postcode_set" class="input-address" required autocomplete="off" placeholder="ZIP Code"></div>
		
		<span class="address-text"><span style="margin-right: 5px;">Country </span><span class="account"><?= $row2['country']; ?></span></span>
		<input id="country" name="country_set" class="input-address" required autocomplete="off" placeholder="Country" style="margin-bottom: 10px;">
		<input name="address_submit" type="submit" class="set-button" value="<?= $address_placeholder; ?>">
		
		<input id="address2" hidden>
		<input id="state" hidden>
		
		<div style="color: red; margin-top: 15px;"><?php if(isset($invalidCountry)){echo ''.$invalidCountry.'';}?></div>
	</form>

	<div class="form-prediv" id="id-verify"></div>
	<form method="post" class="form" enctype="multipart/form-data" action="#id-verify" id="id-verification">
		<p class="input-text">ID Card & Picture<span class="payment-method-box"><?php if(isset($not_verified_idcard)){echo ''.$not_verified_idcard.'';}?></span><span class="payment-method-box2"><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}?></span><span class="payment-method-box3"><?php if(isset($underverification_idcard)){echo ''.$underverification_idcard.'';}?></span></p>
		<p>Upload a Valid form of ID and a Clear Picture of your Face</p>
		<p style="margin-top: -7px;">Both are Required for Verification and will not be Shared with other Users</p>
		<div style="display:<?= $uploadDisplay; ?>" class="input-container"><label for="id-upload"><span class="label-text1">Select ID</span><input type="file" id="id-upload" name="idcard_upload" class="upload-input" required></label></div>
		<div style="display:<?= $uploadDisplay; ?>" class="input-container"><label for="picture-upload"><span class="label-text2">Select Picture</span><input type="file" id="picture-upload" name="picture_upload" class="upload-input" required></label></div>
		<div style="margin-top: 20px;"><span class="address-text" style="display:<?= $uploadDisplay; ?>">Date of Birth</span></div>
		<input class="input" type="date" name="date_birth" autocomplete="off" required style="color: #00c4ff; font-weight: bold; font-size: 1.45rem; display:<?= $uploadDisplay; ?>">
		<input style="margin-top: 15px;" name="idcard_submit" type="submit" class="<?= $setbutton_class; ?>" value="<?= $setbutton_value; ?>" <?php if(isset($upload_disabled)){echo ''.$upload_disabled.'';}?>>
		<?php
		if(isset($file_error_message)){ 
		echo $file_error_message;
		}
		?>
		<?php
		if(isset($CorrectIdMessage)){ 
		echo $CorrectIdMessage;
		}
		?>
	</form>


		
		<div class="explain">
		<p class="explain-title">Manage Verifications</p>
		<p>In order to the keep the Instant Borrow a Safe Place and to comply with Regulations, we must verify some Information from our Users.</p>

		<p>You cannot Request a Loan without Having Completed these Verifications.</br>However, you can lend money to Other Users without Verifying your Account.</p>
		
		<p>When you complete Verifications, your Trustscore Goes Up.</br>When Account is Fully Verified, you Earn 50 Trustscore Points.</p>

		<p style="font-weight: 500; margin-top: 40px;">If you Have any Questions about Verifications, Refer to the <a href="lender-guide.php" style="text-decoration: none; color: #3d91e0;">Lender's Guide</a>, the <a href="borrower-guide.php" style="text-decoration: none; color: #3d91e0;">Borrower's Guide</a> Or <a href="contact-us.php" style="text-decoration: none; color: #3d91e0;">Contact our Support team.</a></p>

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

</body>

</html>
