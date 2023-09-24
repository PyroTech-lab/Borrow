<?php
require('actions/users/securityAction.php');
require('actions/questions/RepayLoanAction.php');
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
	
<title>Repay your Loan - Instant Borrow</title>

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
	width: calc(49% - 5px);
	height: 200px;
	margin-top: 50px;
	padding-right: 5px;
}


.subtitle {
	font-weight: 500;
	margin-top: 10px;
	margin-bottom: 30px;
	font-size: 2.1rem;
	color: black;
}

.text {
	font-size: 1.12rem;
	margin-top: 10px;
	color: #383838;
}

.subtitle-recap {
	margin-left: 20px;
	font-weight: 500;
	margin-top: 10px;
	margin-bottom: 30px;
	font-size: 2.1rem;
	color: black;
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

.subtext1 {
	font-weight: 500;
	font-size: 1.9rem;
	color: #00c4ff;
}

.subtext2 {
	font-weight: 500;
	font-size: 1.3rem;
	color: #00c4ff;
}

.subtext2-username {
	font-weight: 500;
	font-size: 1.3rem;
	color: #00c4ff;
	margin-top: 0px;
}

.date-type2 {
	display: none;
}


.subtitle-chat {
	font-weight: 500;
	margin-top: 10px;
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

.payment {
	margin-top: -554px;
	margin-left: 51%;
	width: 49%;
	padding-bottom: 8px;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
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

.warning {
	font-size: 0.95rem;
	color: red;
	font-weight: 500;
	margin-top: 35px;
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

@media screen and (max-width: 1908px) {
	
	.chat-button {
		margin-top: -30px;
	}
	
}

@media screen and (max-width: 1800px) {
	
	.main	{
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 1650px) {
	
	.main	{
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1555px) {
	
	.main	{
		width: 96%;
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 1456px) {
	
	.chat-button {
		margin-top: -30px;
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
	
}

@media screen and (max-width: 1145px) {
	
	.main {
		width: 70%;
		margin-left: 15%;
	}
	
	.loan-recap {
		width: 100%;
		height: 265px;
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
	
}

@media screen and (max-width: 1059px) {
	
	.chat-button {
		margin-top: -30px;
	}
	
}


@media screen and (max-width: 950px) {
	
	.main {
		width: 80%;
		margin-left: 10%;
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

@media screen and (max-width: 750px) {
	
	.main {
		width: 85%;
		margin-left: 7.5%;
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
		margin-top: 130px;
	}
	
}

@media screen and (max-width: 551px) {
	
	.payment {
		height: 672px;
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
	
}



@media screen and (max-width: 450px) {

	.subtext2-username {
		overflow: scroll;
		margin-right: 10px;
	}

}

@media screen and (max-width: 428px) {
	
	.chat-div {
		height: 227px;
	}
	
}

@media screen and (max-width: 425px) {
	
	.subtitle {
		font-size: 1.7rem;
	}
	
	.subtitle-chat {
		font-size: 1.7rem;
	}
	
}

@media screen and (max-width: 410px) {
	
	.main {
		margin-top: 115px;
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

@media screen and (max-width: 390px) {
	
	.select-method {
		overflow: scroll;
		width: 80%;
		padding-left: 0px;
		border-left: 20px solid white;
	}

	
	.column-2 {
		margin-left: 55%;
		width: 45%;
	}
	
	.chat-button {
		width: calc(100% - 40px);
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

@media screen and (max-width: 355px) {

	.recap-text {
		display: none;
	}
	
	.date-type1 {
		display: none;
	}

	.date-type2 {
		display: block;
	}
	
	.date-word {
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
		<div class="subtitle-popup"><span>Contact Lender</span></div>
		<p class="popup-text">Phone Number:</p>
		<p class="popup-phone-text"><?= $phone_number_display; ?></p>
		<div class="popup-text"><span style="color: red;">Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="close-button" onclick="ClosePopup()">Close</button>
	</div>	
</div>



<div class="main">
	
	<div class="loan-recap">
		<div class="subtitle-recap"><span>Repayment<span class="recap-text"> Recap</span></span></div>
		<div class="column-1">
		<div class="text">You Repay</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		<div class="text">You Borrowed</br><span class="subtext1"><?= $loan_amount; ?>$</span></div>
		</div>
		<div class="column-2">
		<div class="text">Repayment<span class="date-word"> Date</span></br><span class="subtext2" style="color: red;"><span class="date-type1"><?= date('M jS, Y', strtotime($repayment_date)); ?></span><span class="date-type2"><?= date('j M Y', strtotime($repayment_date)); ?></span></span></div>
		<div class="text"  style="margin-top: 24px;">Lender</br><a href="profile-user.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><p class="subtext2-username"><?= mb_strimwidth($username_lender, 0, 14, "..."); ?></p></a></div>
		</div>
	</div>
	
	<div class="chat-div">
		<div class="subtitle-chat"><span>Contact <a href="profile-user.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><span style="color: #00c4ff;"><?= mb_strimwidth($username_lender, 0, 9, "..."); ?></span></a></span></div>
		<div class="chat-text"><span style="color: red;">Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="chat-button" onclick="OpenPopup()">Contact</button>
	</div>
	
	<div class="payment">
				<div class="select-method-title">
				<p class="subtitle"><span class="select-text">Select </span>Payment Method</p>
				</div>
				<div class="select-method">
					<span class="payment-method-box" id="paypal-select" onclick="ShowPaypal()" style="display: <?= $paypal_notset; ?>;">Paypal</span><span class="payment-method-box" id="cashapp-select" onclick="ShowCashapp()" style="display: <?= $cashapp_notset; ?>;">Cashapp</span><span class="payment-method-box" id="venmo-select" onclick="ShowVenmo()" style="display: <?= $venmo_notset; ?>;">Venmo</span><span class="payment-method-box" id="zelle-select" onclick="ShowZelle()" style="display: <?= $zelle_notset; ?>;">Zelle</span><span class="payment-method-box" id="chime-select" onclick="ShowChime()" style="display: <?= $chime_notset; ?>;">Chime</span>
				</div>
				
				<div class="payment-box" id="paypal">
					<span class="payment-box-title">Paypal</span>
					<p>Lender's Paypal Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= $paypal; ?></span></p>
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
					<div class="warning"><span>Lender will Confirm Payment. Any Abuse will Result in a Ban.</span></div>
					</form>
				
	
				<?php
				if(isset($error_message_paypal)){ 
				echo $error_message_paypal;
				}
				?>
				</div>
				
				<div class="payment-box" id="cashapp">
					<span class="payment-box-title">Cashapp</span>
					<p>Lender's Cashapp Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= $cashapp; ?></span></p>
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
					<div class="warning"><span>Lender will Confirm Payment. Any Abuse will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_cashapp)){ 
				echo $error_message_cashapp;
				}
				?>
				</div>
				
				<div class="payment-box" id="venmo">
					<span class="payment-box-title">Venmo</span>
					<p>Lender's Venmo Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= $venmo; ?></span></p>
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
					<div class="warning"><span>Lender will Confirm Payment. Any Abuse will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_venmo)){ 
				echo $error_message_venmo;
				}
				?>
				</div>
				
				<div class="payment-box" id="zelle">
					<span class="payment-box-title">Zelle</span>
					<p>Lender's Zelle Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= $zelle; ?></span></p>
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
					<div class="warning"><span>Lender will Confirm Payment. Any Abuse will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_zelle)){ 
				echo $error_message_zelle;
				}
				?>
				</div>
				
				<div class="payment-box" id="chime">
					<span class="payment-box-title">Chime</span>
					<p>Lender's Chime Address: <span class="payment-address" style="overflow-wrap: break-word;"><?= $chime; ?></span></p>
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
					<div class="warning"><span>Lender will Confirm Payment. Any Abuse will Result in a Ban.</span></div>
					</form>
				<?php
				if(isset($error_message_chime)){ 
				echo $error_message_chime;
				}
				?>
				</div>
			
				
				<?php
				if(isset($success_message)){ 
				echo $success_message;
				}
				?>
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