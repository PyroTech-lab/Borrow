<?php
require('actions/users/showYourLentLoansAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/notificationAction.php');
require('actions/users/bannedAction.php');
?>

<?php
if(!isset($_SESSION['auth'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Your Lent Loans - Instant Borrow</title>

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
	min-height: calc(100vh - 553px);
}


.title {
	margin-left: 10%;
	color: #00c4ff;
	font-weight: 500;
	font-size: 2.32rem
}

.transaction-details {
	margin-left: 10%;
	width: 80%;
	padding-bottom: 15px;
	margin-top: 50px;
	margin-bottom: 28px;
	border: 1px solid #bababa;
	background-color: #f7f7f7;
	border-radius: 0.325rem;
	text-align: left;
}

.details-line2 {
	display: none;
}


.loan-amount {
	height: 23px;
	margin-top: 15px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.loan-amount-1 {
	height: 23px;
	margin-top: 15px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.repay-amount {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 16.6%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.repay-amount-1 {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 16.6%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.interest-rate	{
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 33.2%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.interest-rate-1	{
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 33.2%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.repay-date {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 49.8%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.repay-date-1 {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 49.8%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.feedback {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 66%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.feedback-1 {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 66%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.payment-method {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 82.6%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}


.payment-method-1 {
	height: 23px;
	text-align: center;
	width: 16.6%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 82.6%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
}

.display-bottom {
	display: none;
	height: 23px;
	text-align: left;
	width: 100%;
	background-color: transparent;
	margin-top: 8px;
	padding-top: 2px;
	margin-left: 0%;
	color: #383838;
	font-weight: 500;
	font-size: 1.05rem;
	margin-bottom: -9px;
	border-top: 1px solid #bababa;
}

.status-bottom {
	display: none;
}

.feedback-bottom-visible {
	display: none;
}


.loan-request {
	margin-left: 10%;
	width: 80%;
	margin-top: -23px;
	text-align: left;
	margin-bottom: 35px;
	padding-bottom: 15px;
	border: 1px solid #bababa;
	background-color: white;
	border-radius: 0.325rem;
	transition: transform .2s;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.image-negative {
	height: 18px;
	margin-bottom: -3px;
}

.image-positive {
	height: 18px;
	margin-bottom: -1px;
}

.no-feedback-image {
	height: 18px;
	margin-bottom: -3px;
}

.feedback-type-2 {
	display: none;
}


.loan-request:hover {
	background-color: #fbfbfb;
  -ms-transform: scale(1.0055); /* IE 9 */
  -webkit-transform: scale(1.0055); /* Safari 3-8 */
  transform: scale(1.0055); 
}

.time-format2 {
	display: none;
}

.error-message {
	font-weight: 500;
	font-size: 1.05rem;
	margin-bottom: 30px;
	text-align: left;
}

.error-message-container {
	color: #383838;
	margin-left: 10%;
}

.under-container {
	margin-left: 10%;
	margin-bottom: 100px;
}

.load-more {
	padding: 9px;
	width: 150px;
	background-color: #de0404;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
}

.borrow-button {
	padding: 9px;
	min-width: 150px;
	right: 0;
	background-color:  #f2a100;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
}

.load-more:hover {
	background-color: #ff0303;
}

.borrow-button:hover {
	background-color: #edd500;
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
	
	.title {
		width: 85%;
		margin-left: 7.5%;
	}
	
	.transaction-details {
		width: 85%;
		margin-left: 7.5%;
	}
	
	.error-message-container {
		width: 85%;
		margin-left: 7.5%;
	}
	
	.loan-request {
		width: 85%;
		margin-left: 7.5%;
	}
	
	.under-container {
		width: 85%;
		margin-left: 7.5%;
	}
}

@media screen and (max-width: 1550px) {
	
	.title {
		width: 90%;
		margin-left: 5%;
	}
	
	.transaction-details {
		width: 90%;
		margin-left: 5%;
	}
	
	.error-message-container {
		width: 90%;
		margin-left: 5%;
	}
	
	.loan-request {
		width: 90%;
		margin-left: 5%;
	}
	
	.under-container {
		width: 90%;
		margin-left: 5%;
	}
	
	.loan-amount {
		
	}
	
	.repay-amount {
		width: 20%
	}
	
	.interest-rate {
		width: 20%;
		margin-left: 36.6%;
	}
	
	.repay-date {
		width: 13.2%;
		margin-left: 56.6%;
	}
	
	.feedback {
		width: 17%;
		margin-left: 69.8%;
	}
	
	.payment-method {
		width: 13.2%;
		margin-left: 86.8%;
	}
	
	.repay-amount-1 {
		width: 20%
	}
	
	.interest-rate-1 {
		width: 20%;
		margin-left: 36.6%;
	}
	
	.repay-date-1 {
		width: 13.2%;
		margin-left: 56.6%;
	}
	
	.feedback-1 {
		width: 17%;
		margin-left: 69.8%;
	}
	
	.payment-method-1 {
		width: 13.2%;
		margin-left: 86.8%;
	}
	
}

@media screen and (max-width: 1300px) {
	
	.title {
		width: 96%;
		margin-left: 2%;
	}

	.transaction-details {
		width: 96%;
		margin-left: 2%;
	}
	
	.error-message-container {
		width: 96%;
		margin-left: 2%;
	}
	
	.loan-request {
		width: 96%;
		margin-left: 2%;
	}
	
	.under-container {
		width: 96%;
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 910px) {

	.transaction-details {
		padding-bottom: 21px;
	}

	.loan-amount-1 {
		margin-top: 2px;
		width: 16.6%;
	}
	
	.loan-amount {
		width: 16.6%;
	}
	
	.repay-amount {
		width: 16.6%;
		margin-left: 16.6%;
	}
	
	.repay-amount-1 {
		width: 16.6%;
		margin-left: 16.6%;
	}
	
	.interest-rate {
		width: 16.6%;
		margin-left: 33.2%;
	}
	
	.interest-rate-1 {
		width: 16.6%;
		margin-left: 33.2%;
	}
	
	.repay-date {
		width: 17%;
		margin-left: 49.8%;
	}
	
	.repay-date-1 {
		width: 17%;
		margin-left: 49.8%;
		margin-top: -19px;
	}
	
	.feedback {
		width: 16.6%;
		margin-left: 66.8%;
	}
	
	.feedback-1 {
		width: 16.6%;
		margin-left: 66.8%;
	}
	
	.payment-method {
		width: 16.6%;
		margin-left: 83.4%;
	}
	
	.payment-method-1 {
		width: 16.6%;
		margin-left: 83.4%;
	}
	
	.details-line1 {
		display: none;
	}
	
	.details-line2 {
		display: block;
	}	
	
	.time-format1 {
		display: none;
	}
	
	.time-format2 {
		display: block;
	}
	
}

@media screen and (max-width: 730px) {

	
	.loan-amount-1 {
		width: 20%;
		margin-left: 0%;
	}
	
	.loan-amount {
		width: 20%;
		margin-left: 0%;
	}
	
	.repay-amount {
		width: 20%;
		margin-left: 20%;
	}
	
	.repay-amount-1 {
		width: 20%;
		margin-left: 20%;
	}
	
	.interest-rate {
		width: 20%;
		margin-left: 40%;
	}
	
	.interest-rate-1 {
		width: 20%;
		margin-left: 40%;
	}
	
	.repay-date {
		width: 20%;
		margin-left: 60%;
	}
	
	.repay-date-1 {
		width: 20%;
		margin-left: 60%;
	}
	
	.feedback {
		width: 20%;
		margin-left: 80%;
	}
	
	.feedback-1 {
		width: 20%;
		margin-left: 80%;
	}
	
	.payment-method {
		display: none;
	}
	
	.payment-method-1 {
		display: none;
	}
	
	.display-bottom {
		display: block;
	}
	
	.feedback-bottom-visible {
		display: block;
		margin-left: 10px;
	}
	
}

@media screen and (max-width: 670px) {
	
	.main {
		margin-top: 130px;
	}
	
}

@media screen and (max-width: 615px) {
	
	.title {
		font-size: 2.17rem;
	}

	.loan-amount-1 {
		width: 25%;
		margin-left: 0%;
	}
	
	.loan-amount {
		width: 25%;
		margin-left: 0%;
	}
	
	.repay-amount {
		width: 25%;
		margin-left: 25%;
	}
	
	.repay-amount-1 {
		width: 25%;
		margin-left: 25%;
	}
	
	.interest-rate {
		width: 25%;
		margin-left: 50%;
	}
	
	.interest-rate-1 {
		width: 25%;
		margin-left: 50%;
	}
	
	.repay-date {
		display: none;
	}
	
	.repay-date-1 {
		display: none;
	}
	
	.feedback {
		width: 25%;
		margin-left: 75%;
	}
	
	.feedback-1 {
		width: 25%;
		margin-left: 75%;
		margin-top: -17px;
	}
	
	.payment-method {
		display: none;
	}
	
	.payment-method-1 {
		display: none;
	}
	
	.status-bottom { 
		display: block;
		text-align: right;
		margin-right: 10px;
		margin-top: -26px;
	}

	
}

@media screen and (max-width: 505px) {
	
	.main {
		margin-top: 120px;
	}
	
	.feedback-type-1 {
		display: none;
	}

	.feedback-type-2 {
		display: inline;
	}
}

@media screen and (max-width: 450px) {
	
	.loan-amount-1 {
		width: 20%;
		margin-left: 0%;
		font-size: 0.95rem;
	}
	
	.loan-amount {
		width: 20%;
		margin-left: 0%;
	}
	
	.repay-amount {
		width: 28%;
		margin-left: 20%;
	}
	
	.repay-amount-1 {
		width: 28%;
		margin-left: 20%;
		font-size: 0.95rem;
	}
	
	.interest-rate {
		width: 30%;
		margin-left: 48%;
	}
	
	.interest-rate-1 {
		width: 30%;
		margin-left: 48%;
		font-size: 0.95rem;
	}
	
	
	.feedback {
		width: 22%;
		margin-left: 78%;
	}
	
	.feedback-1 {
		width: 22%;
		margin-left: 78%;
		margin-top: -17px;
		font-size: 0.95rem;
		margin-bottom: -8px;
	}
	
}

@media screen and (max-width: 405px) {

	.loan-amount-1 {
		font-size: 0.9rem;
	}

	
	.repay-amount-1 {
		font-size: 0.9rem;
	}
	
	
	.interest-rate-1 {
		font-size: 0.9rem;
	}
	
	
	.feedback-1 {
		font-size: 0.9rem;
		margin-bottom: -12px;
	}

	.borrow-button {
		width: 49%;
	}
	
	.load-more {
		width: 49%;
	}
	
	.title {
		font-size: 2.02rem;
	}
	
	.status-indicator {
		display: none;
	}
	

}

@media screen and (max-width: 365px) {
	
	.title {
		font-size: 1.97rem;
	}	

}

@media screen and (max-width: 350px) {
	
	.error-message {
		font-size: 0.95rem;
	}
	
}

@media screen and (max-width: 335px) {
	
	.main {
		margin-top: 100px;
	}
	
}


</style>


<style>

@media screen and (max-width: 1850px) {
	
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

@media screen and (max-width: 1300px) {
	
	.header-text {
		width: 96%;
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
	<p class="title">Your Lent Loans</p>

 	<div class="transaction-details">
	<div class="loan-amount-1"><span class="details-line1">Loan Amount</span><span class="details-line2">Loan</br>Amount</span></div>
	<div class="repay-amount-1"><span class="details-line1">Repayment Amount</span><span class="details-line2">Repayment</br>Amount</span></div>
	<div class="interest-rate-1"><span class="details-line1">Repayment Date</span><span class="details-line2">Repayment</br>Date</span></div>
	<div class="repay-date-1"><span>Status</span></div>
	<div class="feedback-1"><span>Borrower</span></div>
	<div class="payment-method-1"><span>Feedback</span></div>
	</div>
			
	<div class="error-message-container">
		<?php
		
		 if(isset($errorMsg)){ 
			echo '<p class="error-message">'.$errorMsg.'</p>'; 
		 }?>
	</div>	
		        <?php 

            while($question = $getAllMyQuestions->fetch()){
				
				if(($question['repayment_received'] == "no_notseen")OR($question['repayment_received'] == "no")OR($question['repayment_received'] == "no_correct_id")OR($question['repayment_received'] == "no_correct_id_notconfirmed")){
				$status_color = "#9e3dff";
				$status_public = "Under Review";
				$image_status = "<img class='status-image' src='assets/images/status-underverification.png'>";
				
				}else{
				
					if(($question['status'] == "paid_ontime")OR($question['status'] == "paid_ontime_notseen")){
						$status_color = "#03cf00";
						$status_public = "Paid On Time";
						$image_status = "<img class='status-image' src='assets/images/status-paid.png'>";
					}elseif(($question['status'] == "paid_late")OR($question['status'] == "paid_late_notseen")){
						$status_color = "Orange";
						$status_public = "Paid Late";
						$image_status = "<img class='status-image' src='assets/images/status-paidlate.png'>";
					}elseif(($question['status'] == "unpaid")OR($question['status'] == "unpaid_notseen")OR($question['status'] == "unpaid_banned")OR($question['status'] == "unpaid_banned_archived")){
						$status_color = "Red";
						$status_public = "Unpaid";
						$image_status = "<img class='status-image' src='assets/images/status-unpaid.png'>";
					}elseif(($question['status'] == "active")OR($question['status'] == "active_notseen")){
						$status_color = "#2b80ff";
						$status_public = "Active";
						$image_status = "<img class='status-image' src='assets/images/status-active.png'>";
					}elseif(($question['status'] == "paid_afterban_notseen")OR($question['status'] == "paid_afterban")){
						$status_color = "orange";
						$status_public = "Paid After ban";
						$image_status = "<img class='status-image' src='assets/images/status-paidlate.png'>";
					}
				}
				
				if($question['feedback_given'] == "positive"){
					$feedback = "Positive";
					$feedback_color ="green";
					$feedback_image ="<img src='assets/images/positive.png' class='image-positive'>";
				}elseif($question['feedback_given'] == "negative"){
					$feedback = "Negative";
					$feedback_color ="red";
					$feedback_image ="<img src='assets/images/negative.png' class='image-negative'>";
				}else {
					$feedback = "None";
					$feedback_color ="#b3b3b3";
					$feedback_image ="<img src='assets/images/no-feedback.png' class='no-feedback-image'>";
				}
                ?>
			

	<div class="loan-request">
		<div class="loan-details">	
				<div class="loan-amount"><span><?= $question['loan_amount']; ?>$</span></div>
				<div class="repay-amount"><span><?= $question['repayment_amount']; ?>$</span></div>
				<div class="interest-rate"><span class="time-format1"><?= date('M jS, Y', strtotime($question['repayment_date'])); ?></span><span class="time-format2"><?= date('j M y', strtotime($question['repayment_date'])); ?></span></div>
				<div class="repay-date"><span style="color: <?= $status_color; ?>;"><?= $status_public; ?></span></div>
				<div class="feedback"><a style="text-decoration: none; color: #3d91e0;" href="profile-user.php?id=<?= $question['id_borrower']; ?>"><span><?= mb_strimwidth($question['username_borrower'], 0, 9, "..."); ?></span></a></div>
				<div class="payment-method"><span style="color: <?= $feedback_color; ?>;"><?= $feedback; ?></span></div>
				<div class="display-bottom">
				<div class="feedback-bottom-visible">Feedback: <span class="feedback-type-1" style="color: <?= $feedback_color; ?>;"><?= $feedback; ?></span><span class="feedback-type-2"><?= $feedback_image; ?></span></div>
				<div class="status-bottom"><span class="status-indicator">Status: </span><span class="status-bottom-text" style="color: <?= $status_color; ?>;"><?= $status_public; ?></span></div>
				</div>
		</div>
	</div>
                <?php
            }

        ?>
		
		
	
		
		<div class="under-container">
		<a href="dashboard.php"><button class="load-more">Lend Money</button></a>
		<a href="borrow-money.php"><button class="borrow-button">Borrow Money</button></a>
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
