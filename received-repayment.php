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


.logout-button:hover {
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
	height: 270px;
}

.loan-recap-2 {
	display: none;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
	width: 100%;
	height: 430px;
}

.disclaimer {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #2b80ff;
	width: calc(100% - 10px);
	margin-top: 10px;
	text-align: center;
	padding: 5px;
	font-weight: 500;
	color: #2b80ff;
}



.subtitle {
	font-weight: 500;
	margin-top: 20px;
	margin-left: 20px;
	margin-bottom: 20px;
	font-size: 2.1rem;
	color: black;
}

.text {
	font-size: 1.12rem;
	margin-top: 10px;
	color: #383838;
}

.text-hidden {
	display: none;
	font-size: 1.12rem;
	margin-top: 20px;
	color: #383838;
}

.date-type2 {
	display: none;
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
	margin-top: -310px;
}

.column-3 {
	margin-left: 66.6%;
	height: 300px;
	width: 33.4%;
	margin-top: -310px;
}

.subtext1 {
	font-weight: 500;
	font-size: 1.8rem;
	color: #00c4ff;
}

.subtext1-date {
	font-weight: 500;
	font-size: 1.8rem;
	color: red;
}

.subtext2 {
	font-weight: 500;
	font-size: 1.3rem;
	color: #00c4ff;
}

.subtext2-status {
	font-weight: 500;
	font-size: 1.3rem;
	color: #00c4ff;
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

.subtitle-feedback {
	font-weight: 500;
	margin-top: 20px;
	margin-bottom: 5px;
	margin-left: 20px;
	font-size: 2.1rem;
	color: black;
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

.submit:hover {
	background-color: #00c4ff;
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
	font-weight: 500;
	margin-bottom: 5px;
	font-size: 2.1rem;
	color: black;
}

.chat-text {
	font-size: 1.05rem;
	margin-bottom: 30px;
	color: #383838;
}

.chat-button {
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

@media screen and (max-width: 1800px) {
	
	.main	{
		width: 65%;
		margin-left: 17.5%
	}
	
}

@media screen and (max-width: 1650px) {
	
	.main	{
		width: 70%;
		margin-left: 15%;
	}
	
}

@media screen and (max-width: 1500px) {
	
	.main	{
		width: 75%;
		margin-left: 12.5%;
	}
	
}

@media screen and (max-width: 1350px) {
	
	.main	{
		width: 80%;
		margin-left: 10%;
	}
	
}

@media screen and (max-width: 1200px) {
	
	.main	{
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1050px) {
	
	.main	{
		width: calc(96% - 2px);
		margin-left: 2%;
	}
	
	.column-1 {
		width: 200px;
	}
	
	.column-2 {
		width: 150px;
		margin-left: calc(50% - 70px);
	}
	
	.column-3 {
		width: 200px;
		margin-left: calc(100% - 200px);
	}
	
	.subtext1-date {
		font-size: 1.5rem;
	}
	
}

@media screen and (max-width: 925px) {
	
	.chat-button {
		margin-top: -30px;
	}

}

@media screen and (max-width: 807px) {
	
	.submit {
		margin-top: -1px;
	}	

}

@media screen and (max-width: 807px) {
	
	.feedback-div {
		margin-left: 0px;
		width: 100%;
		height: 380px;
	}
	
	.chat-div {
		margin-top: 50px;
		margin-left: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		width: calc(100% - 40px);
		height: 170px;
	}	

}

@media screen and (max-width: 700px) {
	
	.main {
		margin-top: 130px;
	}
}

@media screen and (max-width: 648px) {
	
	.feedback-div {
		height: 400px;
	}
	
}

@media screen and (max-width: 600px) {
	
	.loan-recap {
		height: 340px;
	}
	
	.column-1 {
		width: 50%;
	}
	
	.column-2 {
		width: 40%;
		margin-left: 60%;
	}
	
	.column-3 {
		display: none;
	}
	
	.text-hidden {
		display: block;
	}
	
	.subtitle {
		font-size: 1.9rem;
	}
	
	.subtitle-feedback {
		font-size: 1.9rem;
	}
	
	.subtitle-chat {
		font-size: 1.9rem;
	}
	
}

@media screen and (max-width: 560px) {
	
	.confirmation-div {
		height: 480px;
	}
	
}


@media screen and (max-width: 530px) {
	
	.subtitle {
		font-size: 1.8rem;
	}
	
	.subtitle-feedback {
		font-size: 1.8rem;
	}
	
	.subtitle-chat {
		font-size: 1.8rem;
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

@media screen and (max-width: 505px) {
	
	.reception-text {
		display: none;
	}
	
}

@media screen and (max-width: 444px) {
	
	.chat-div {
		height: 195px;
	}
	
}

@media screen and (max-width: 434px) {
	
	.confirmation-div {
		height: 500px;
	}
	
}

@media screen and (max-width: 420px) {
	
	.subtitle-popup {
		margin-top: 5px;
		font-size: 1.9rem;
	}
	
	.main {
		margin-top: 115px;
	}
}


@media screen and (max-width: 385px) {
	
	.close-button {
		margin-top: 40px;
		height: 50px;
		width: 90%;
	}

}

@media screen and (max-width: 365px) {
	
	.confirmation-div {
		height: 520px;
	}
	
	.subtext2-status {
		font-size: 1.2rem;
	}
	
	

}

@media screen and (max-width: 350px) {
	
	.loan-recap {
		display: none;
	}

	.loan-recap-2 {
		display: block;
	}

	
	.text {
		margin-left: 20px;
		margin-top: 15px;
	}
	
	.text-left {
		float: left;
		font-size: 1.15rem;
		color: black;
	}


	.text-right {
		float: right;
		margin-right: 20px;
		color: #00c4ff;
		font-weight: 500;
		font-size: 1.8rem;
	}
	
	.subtitle {
		font-size: 1.6rem;
	}
	
	.subtitle-feedback {
		font-size: 1.6rem;
	}
	
	.subtitle-chat {
		font-size: 1.6rem;
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
	
	.disclaimer {
		font-size: 0.95rem;
	}
	
	.text-left {
		font-size: 1.09rem;
	}
	
}

@media screen and (max-width: 335px) {
		
	.chat-text {
		font-size: 0.975rem;
	}
	
	.main {
		margin-top: 105px;
	}
	
}

@media screen and (max-width: 327px) {
	
	.feedback-div {
		height: 420px;
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


@media screen and (max-width: 1800px) {
	
	.header-text	{
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 1650px) {
	
	.header-text	{
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1555px) {
	
	.header-text	{
		width: 96%;
		margin-left: 2%;
	}
	
}



@media screen and (max-width: 1145px) {
	
	.header-text {
		width: 90%;
		margin-left: 5%;
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

<div class="everything-except-header">

<div class="popup-phone-number" id="popup-phone-number">
	
	<div class="phone-number-div" id="phone-number-div">
		<div class="subtitle-popup"><span>Contact Borrower</span></div>
		<p class="popup-text">Phone Number:</p>
		<p class="popup-phone-text"><?= $phone_number_display; ?></p>
		<div class="popup-text"><span style="color: red;">Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="close-button" onclick="ClosePopup()">Close</button>
	</div>	
</div>

<div class="main">
	
	<div class="loan-recap">
		<div class="subtitle"><span>Repayment Received</span></div>
		<div class="column-1">
		<div class="text">Amount Received</br><span class="subtext1" style="color: #2b80ff"><?= $repayment_amount; ?>$</span></div>
		<div class="text">Instant Borrow Fee</br><span class="subtext1" style="color: #2b80ff">0$</span></div>
		<div class="text-hidden">Payment Method</br><span class="subtext2"><?= $payment_method_repayment; ?></span></div>
		</div>
		<div class="column-2">
		<div class="text">Profit margin</br><span class="subtext1" style="color: #2b80ff"><?= ROUND((($repayment_amount/$loan_amount)-1)*100); ?>%</span></div>
		<div class="text">Borrower</br><a href="profile-user.php?id=<?= $id_borrower; ?>" target="blank" style="text-decoration: none;"><span class="subtext2"><?= $username_borrower; ?></span></a></div>
		<div class="text-hidden">Status</br><span class="subtext2-status"><?= $status_public; ?></span></div>
		</div>
		<div class="column-3">
		<div class="text">Payment Method</br><span class="subtext2"><?= $payment_method_repayment; ?></span></div>
		<div class="text">Status</br><span class="subtext2"><?= $status_public; ?></span></div>
		</div>
	</div>
	
	<div class="loan-recap-2">
		<div class="subtitle"><span>Repayment Received</span></div>
		<div class="text" style="margin-top: 50px;"><span class="text-left">Amount Received:</span><span class="text-right" style="color: #2b80ff; margin-top: -10px;"><?= $repayment_amount; ?>$</span></div>
		</br>
		<div class="text"><span class="text-left">Instant Borrow Fee:</span><span class="text-right" style="color: #2b80ff; margin-top: -10px;">0$</span></div>
		</br>
		<div class="text" style="margin-top: 45px;"><span class="text-left">Profit margin:</span><span class="text-right" style="margin-top: -10px;"><?= ROUND((($repayment_amount/$loan_amount)-1)*100); ?>%</span></div>
		</br>
		<div class="text"><span class="text-left">Status:</span><span class="text-right" style="font-size: 1.15rem;"><?= $status_public; ?></span></div>
		</br>
		<div class="text"  style="margin-top: 40px;"><span class="text-left">Borrower:</span><a href="profile-user.php?id=<?= $id_borrower; ?>" target="blank" style="text-decoration: none;"><span class="text-right" style="font-size: 1.15rem; color: #2b80ff;"><?= mb_strimwidth($username_borrower, 0, 12, "..."); ?></span></a></div>
		</br>
		<div class="text"><span class="text-left">Payment Method:</span><span class="text-right" style="font-size: 1.15rem;"><?= $payment_method_repayment; ?></span></div>
	</div>
	
	<div class="disclaimer">
	<span>Amount Received on your Account may be Slightly Lower due to <?= $payment_method_repayment; ?>'s Fees.</span>
	</div>
	
	<div class="confirmation-div">
		<div  class="subtitle-feedback"><span>Confirm<span class="reception-text"> Reception of</span> Payment</span></div>
		<div  class="text-feedback"><span>Check on your <?= $payment_method_repayment; ?> Account if you Have Received the Funds.</span></br><span>It may Take a Few Minutes.</span></div>
		
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
		<div class="subtitle-chat"><span>Contact <a href="profile-user.php?id=<?= $id_borrower; ?>" style="text-decoration: none;" target="blank"><span style="color: #00c4ff;"><?= $username_borrower; ?></span></a></span></div>
		<div class="chat-text"><span style="color: red;">Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="chat-button" onclick="OpenPopup()">Contact</button>
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
function OpenPopup() {
  document.getElementById("phone-number-div").style.display = "block";
  document.getElementById("popup-phone-number").style.display = "block";
}
</script>

<script>
function ClosePopup() {
  document.getElementById("phone-number-div").style.display = "none";
  document.getElementById("popup-phone-number").style.display = "none";
}
</script>

</body>

</html>
