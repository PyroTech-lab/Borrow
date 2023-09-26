<?php
require('actions/users/securityAction.php');
require('actions/questions/showBannedBorrowerInfo.php');
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
	
<title>Borrower Banned - Instant Borrow</title>

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

.popup-image {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: none;
}

.image-div {
	background-color:  white;
	color: black;
	height: 550px; 
	width: 360px;
	text-align: center;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 300px);
	border-radius: 0.325rem;
	padding: 10px;
}

.popup-img {
	max-width: 90%;
	max-height: 300px;
	border-radius: 0.325rem;
}

.subtitle-popup2 {
	margin-top: 0px;
	font-weight: 500;
	font-size: 2.32rem;
	color: #00c4ff;
}

.popup-text2 {
	font-size: 0.95rem;
	margin-top: 20px;
}

.close-button2 {
	margin-top: 20px;
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

.close-button2:hover {
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
	padding-right: 10px;
	width: calc(49% - 10px);
	height: 300px;
}

.chat-div {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: calc(49% - 10px);
	padding-right: 10px;
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

.date-type-2 {
	display: none;
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

.subtext3 {
	font-weight: 500;
	font-size: 1.1rem;
	color: #2b80ff;
}


.link-round {
	padding-top: 1px;
	padding-bottom: 1px;
	padding-right: 6px;
	padding-left: 6px;
	font-size: 0.93rem;
	background-color: white;
	color: #2b80ff;
	border: 1px solid #2b80ff;
	border-radius: 50%;
	vertical-align: middle;
}

.chat-text-name:hover .link-round{
	background-color: #00c4ff;
	color: white;
	border: 1px solid #00c4ff;
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
	margin-bottom: 15px;
	color: #383838;
}

.chat-text-name {
	margin-left: 20px;
	font-size: 1.05rem;
	margin-bottom: 15px;
	color: #383838;
}

.chat-button {
	background-color: #2b80ff;
	border: 0;
	padding-top: 10px;
	padding-bottom: 10px;
	margin-left: 20px;
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
	padding-right: 10px;
	width: calc(49% - 10px);
	height: 552px;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
}

.payment2 {
	display: none;
	padding-right: 10px;
	width: calc(49% - 10px);
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

@media screen and (max-width: 1896px) {
	
	.chat-button {
		margin-top: -5px;
	}
	
}

@media screen and (max-width: 1750px) {
	
	.main	{
		width: 85%;
		margin-left: 7.5%
	}
	
}

@media screen and (max-width: 1550px) {
	
	.main	{
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1350px) {
	
	.main	{
		width: 96%;
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 1097px) {
	
	.payment {
		height: 572px;
		margin-top: -574px;
	}
	
	.chat-div {
		height: 220px;
	}
	
	.column-2 {
		margin-left: 60%;
		width: 40%;
	}
	
}

@media screen and (max-width: 885px) {
	
	.main {
		width: 75%;
		margin-left: 12.5%;
	}
	
	.loan-recap {
		width: calc(100% - 10px);
		height: 270px;
	}
	
	.chat-div {
		width: calc(100% - 10px);
		margin-left: 0px;
		margin-top: 50px;
		height: 200px;
	}
	
	.payment2 {
		display: block;
		width: calc(100% - 10px);
		margin-left: 0px;
		margin-top: 50px;
	}
	
	.payment {
		display: none;
	}
	
}

@media screen and (max-width: 800px) {
	
	.main {
		width: 80%;
		margin-left: 10%;
	}
	
}

@media screen and (max-width: 750px) {
	
	.main {
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 700px) {
	
	.main {
		width: 90%;
		margin-left: 5%;
		margin-top: 130px;
	}
	
}

@media screen and (max-width: 650px) {
	
	.main {
		width: 96%;
		margin-left: 2%;
	}
	
}

@media screen and (max-width: 603px) {
	
	.loan-recap {
		height: 290px;
	}
	
}

@media screen and (max-width: 546px) {
	
	.payment2 {
		height: 572px;
	}
	
	.subtitle {
		font-size: 1.9rem;
	}
	
	.subtitle-chat {
		font-size: 1.9rem;
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
	
	.image-div {
		width: calc(90% - 20px);
		text-align: center;
		margin-left: calc(5%);
		margin-top: 20px;
		border-radius: 0.325rem;
		padding: 10px;
	}
	
}

@media screen and (max-width: 435px) {

	.chat-text {
		font-size: 0.98rem;
	}
	
	.payment2 {
		height: 545px;
	}

}

@media screen and (max-width: 420px) {
	
	.subtitle-popup {
		margin-top: 5px;
		font-size: 1.9rem;
	}
	
	.subtitle-popup2 {
		font-size: 1.9rem;
	}
	
	.main {
		margin-top: 115px;
	}

}

@media screen and (max-width: 405px) {
	
	.subtitle {
		font-size: 1.8rem;
		margin-left: 10px;
	}
	
	.subtitle-chat {
		font-size: 1.8rem;
		margin-left: 10px;
	}
	
	.column-1 {
		margin-left: 10px;
	}
	
	.chat-text {
		margin-left: 10px;
	}
	
	.chat-button {
		margin-left: 10px;
	}


}

@media screen and (max-width: 403px) {

	.agreed-word {
		display: none;
	}

}

@media screen and (max-width: 394px) {

	.chat-div {
		height: 220px;
	}

}

@media screen and (max-width: 389px) {

	.payment2 {
		height: 572px;
	}

}

@media screen and (max-width: 385px) {
	
	.close-button {
		margin-top: 40px;
		height: 50px;
		width: 90%;
	}
	
	.close-button2 {
		margin-top: 20px;
		height: 50px;
		width: 90%;
	}

}

@media screen and (max-width: 373px) {

	.image-div {
		height: 570px;
	}
	
}

@media screen and (max-width: 366px) {

	.payment2 {
		height: 582px;
	}

}

@media screen and (max-width: 345px) {
	
	.date-type-2 {
		display: block;
	}
	
	.date-type-1 {
		display: none;
	}
	
	.phone-number-div {
		width: calc(90% - 20px);
		margin-left: calc(5%);
		margin-top: calc(50vh - 210px);
		padding: 10px;
	}
	
	.image-div {
		height: 510px;
	}
	
	.subtitle-popup {
		font-size: 1.8rem;
	}
	
	.subtitle-popup2 {
		font-size: 1.7rem;
	}
	
	.popup-img {
		max-height: 250px;
	}
	
}

@media screen and (max-width: 335px) {
	
	.main {
		margin-top: 105px;
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

<div class="popup-image" id="popup-image">
	
	<div class="image-div" id="image-div">
		<div class="subtitle-popup2"><span>Borrower ID Picture</span></div>
		<img src="assets/images/id-pictures/<?= $borrower_picture; ?>" class="popup-img">
		<div class="popup-text2"><span>This is a Picture of <?= $name; ?>.</br>Instant Borrow gives as much Information as possible about the Borrower to facilitate the Repayment Process.</span></div>
		<button class="close-button2" onclick="ImageClose()">Close</button>
	</div>	
</div>


<div class="main">
	
	<div class="loan-recap">
		<div class="subtitle"><span>Unpaid Loan</span></div>
		<div class="column-1">
		<div class="text">Amount Lent</br><span class="subtext1"><?= $loan_amount; ?>$</span></div>
		<div class="text">Amount not Repayed</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		</div>
		<div class="column-2">
		<div class="text"><span class="agreed-word">Agreed </span>Repayment Date</br><span class="subtext2" style="color: red;"><span class="date-type-1"><?= date('M jS, Y', strtotime($repayment_date)); ?></span><span class="date-type-2"><?= date('j M Y', strtotime($repayment_date)); ?></span></span></div>
		<div class="text"  style="margin-top: 24px;">Borrower</br><a href="profile-user.php?id=<?= $id_borrower; ?>" style="text-decoration: none;" target="blank"><span class="subtext2"><?= mb_strimwidth($username_borrower, 0, 14, "..."); ?></span></a></div>
		</div>
	</div>
	
	<div class="payment2">
		<div class="subtitle-chat" style="margin-bottom: 30px;"><span>Borrower Details</span></div>
		<div class="chat-text" style="margin-top: 20px; margin-bottom: 30px;"><span class="subtext2"><?= mb_strimwidth($username_borrower, 0, 12, "..."); ?></span> Hasn't Repaid you and has been <span style="color: red;">Banned</span>.</br>This is the Information we Have About him:</div>
		<div class="chat-text-name" onclick="ImageOpen()">Full Name: </br><span class="subtext3"><?= $name; ?></span>&nbsp;<span class="link-round">🡕</span></div>
		<div class="chat-text">Email Address: </br><span class="subtext3"><?= $email_address; ?></span></div>
		<div class="chat-text">Phone Number: </br><span class="subtext3"><?= $phone_number; ?></span></div>
		<div class="chat-text">Location: </br><span class="subtext3"><?= $city; ?>, <?= $country; ?></span></div>
		<div class="chat-text" style="margin-top: 30px;">The Borrower will Always be Able to Repay you on His Account, even after being Banned.</div>
	</div>
	
	<div class="chat-div">
		<div class="subtitle-chat"><span>Contact <a href="profile-user.php?id=<?= $id_borrower; ?>" style="text-decoration: none;" target="blank"><span style="color: #00c4ff;"><?= mb_strimwidth($username_borrower, 0, 12, "..."); ?></span></a></span></div>
		<div class="chat-text"><span style="color: red;">Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<button class="chat-button" onclick="OpenPopup()">Contact</button>
	</div>
	
	<div class="payment">
		<div class="subtitle-chat" style="margin-bottom: 30px;"><span>Borrower Details</span></div>
		<div class="chat-text" style="margin-top: 20px; margin-bottom: 30px;"><span class="subtext2"><?= mb_strimwidth($username_borrower, 0, 12, "..."); ?></span> Hasn't Repaid you. He will be <span style="color: red;">Banned</span> In 7 Days.</br>This is the Information we Have about him:</div>
		<div class="chat-text-name" onclick="ImageOpen()">Full Name: </br><span class="subtext3"><?= $name; ?></span>&nbsp;<span class="link-round">🡕</span></div>
		<div class="chat-text">Email Address: </br><span class="subtext3"><?= $email_address; ?></span></div>
		<div class="chat-text">Phone Number: </br><span class="subtext3"><?= $phone_number; ?></span></div>
		<div class="chat-text">Location: </br><span class="subtext3"><?= $city; ?>, <?= $country; ?></span></div>
		<div class="chat-text" style="margin-top: 30px;">The Borrower will Always be Able to Repay you on His Account, even after being Banned.</div>
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

<script>
function ImageOpen() {
  document.getElementById("image-div").style.display = "block";
  document.getElementById("popup-image").style.display = "block";
}
</script>

<script>
function ImageClose() {
  document.getElementById("image-div").style.display = "none";
  document.getElementById("popup-image").style.display = "none";
}
</script>

</body>

</html>
