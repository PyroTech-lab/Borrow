<?php
require('actions/users/showOneUsersProfileAction.php'); 
require('actions/users/showOneUsersVerificationsActions.php');
require('actions/questions/updateDatabases.php');
require('actions/users/userTrustscoreForProfile.php');
require('actions/users/userFeedbackProfileAction.php');
?>

<?php
session_start();
if(isset($_SESSION['auth'])){
    header('Location: profile-user.php?id='.$_GET['id'].'');
}
?>


<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="index" /> 
	
<title><?= $user_username; ?> - Instant Borrow</title>

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
	z-index: 10;
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
	height: 220px; 
	width: 360px;
	text-align: center;
	margin-left: calc(50% - 200px);
	margin-top: calc(50vh - 150px);
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

.close-button:hover {
	background-color: #00c4ff;
}

.popup-location {
	background-color:  rgba(0, 0, 0, 0.76);
	position: fixed;
	z-index: 999;
	text-align: center;
	height: 100%;
	width: 100%;
	display: none;
}

.location-div {
	background-color:  white;
	color: black;
	height: 150px; 
	width: 500px;
	text-align: center;
	margin-left: calc(50% - 250px);
	margin-top: calc(50vh - 120px);
	border-radius: 0.325rem;
	padding: 1px;
}


.location-text {
	font-size:1.1rem;
}

.location-button {
	margin-top: 0px;
	height: 40px;
	width: 200px;
	background-color: #2b80ff;
	color: white;
	font-weight: 500;
	font-size: 1.35rem;
	border-radius: 0.325rem;
	border: 0px;
	outline: 0px;
	transition: background-color 0.2s;
}

.location-button:hover {
	background-color: #00c4ff;
}

.borrower-details {
	margin-top: 50px;
	width: 39%;
	margin-left: 10%;
	margin-top: 160px;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	height: 525px;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.borrower-presentation {
	margin-left: 20px;
	margin-top: 30px;
}

.profile-picture {
	height: 70px;
	width: 70px;
	border-radius: 50%;
}

.country-icon {
	height: 25px;
	width: auto;
	margin-left: 10px;
	margin-bottom: -6px;
	margin-top: 5px;
	transition: transform 0.2s;
}

.country-icon:hover {
	-ms-transform: scale(1.09); /* IE 9 */
	-webkit-transform: scale(1.09); /* Safari 3-8 */
	transform: scale(1.09); 
}

.borrower-username-title {
	color: #00c4ff;
	font-weight: 500;
	font-size: 1.65rem;
}

.member-date-2 {
	display: none;
}

.name-2 {
	display: none;
}
.name-3 {
	display: none;
}

.name-4 {
	display: none;
}

.chat-button {
	margin-left: 20px;
	margin-top: 20px;
	margin-bottom: 20px;
	border-radius: 0.325rem;
	color: white;
	background-color: #2b80ff;
	width: 130px;
	height: 35px;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 0;
	font-weight: 500;
	font-size: 1.25rem;
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

.feedback-span2 {
	display: none;
	margin-left: 10px;
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

.text-break {
	display: none;
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
	transition: border 0.2s;
	transition: color 0.2s;
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
	transition: border 0.2s;
	transition: color 0.2s;
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
	margin-top: -527px;
	width: 39%;
	margin-left: 51%;
	border: 1px solid #2b80ff;
	border-radius: 0.325rem;
	height: 430px;
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
	font-size: 2.1rem;
	margin-top: 20px;
}

.recent-loans-title {
	margin-left: 10%;
	font-weight: 500;
	font-size: 2.1rem;
	margin-top: 135px;
	color: black;
}

.transaction-details {
	margin-left: 10%;
	width: 80%;
	padding-bottom: 15px;
	margin-top: -20px;
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

@media screen and (max-width: 1750px) {
	
	.borrower-details {
		width: 41.5%;
		margin-left: 7.5%
	}
	
	.loan-history {
		width: 41.5%;
	}
	
	.recent-loans-title {
		margin-left: 7.5%;
	}
	
	.transaction-details {
		margin-left: 7.5%;
		width: 85%;
	}
	
	.loan-request {
		margin-left: 7.5%;
		width: 85%;
	}
	
}

@media screen and (max-width: 1550px) {
	
	.column-2 {
		width: 45%;
		margin-left: 55%;
	}
	
	.recent-loans-title {
		margin-left: 5%;
	}
	
	.borrower-details {
		width: 44%;
		margin-left: 5%
	}
	
	.loan-history {
		width: 44%;
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
	
	.recent-loans-title {
		margin-left: 2%;
	}
	
	.borrower-details {
		width: 47%;
		margin-left: 2%
	}
	
	.loan-history {
		width: 47%;
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
	
}

@media screen and (max-width: 1190px) {
	
	.column-2 {
		width: 40%;
		margin-left: 60%;
	}
	
	.name-1 {
		display: none;
	}
	
	.name-2 {
		display: inline;
	}
	.name-3 {
		display: none;
	}

	.name-4 {
		display: none;
	}

}

@media screen and (max-width: 1180px) {

	.lender-name-1 {
		display: none;
	}

	.lender-name-2 {
		display: block;
	}

	.lender-name-3 {
		display: none;
	}
	
	.lender-name-4 {
		display: none;
	}

}


@media screen and (max-width: 910px) {

	.borrower-details {
		width: 80%;
		margin-left: 10%;
		margin-top: 140px;
	}
	
	.loan-history {
		margin-top: 50px;
		margin-left: 10%;
		width: 80%;
	}


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
	
	.recent-loans-title {
		margin-top: 50px;
	}

	
}

@media screen and (max-width: 880px) {

	.lender-name-1 {
		display: none;
	}

	.lender-name-2 {
		display: none;
	}

	.lender-name-3 {
		display: block;
	}
	
	.lender-name-4 {
		display: none;
	}

}

@media screen and (max-width: 860px) {

	.name-1 {
		display: none;
	}
	
	.name-2 {
		display: none;
	}
	.name-3 {
		display: inline;
	}

	.name-4 {
		display: none;
	}

}

@media screen and (max-width: 800px) {
	
	.borrower-details {
		width: 85%;
		margin-left: 7.5%;
	}
	
	.loan-history {
		margin-top: 50px;
		margin-left: 7.5%;
		width: 85%;
	}

}

@media screen and (max-width: 730px) {
	
	.borrower-details {
		margin-top: 130px;
		width: 90%;
		margin-left: 5%;
	}
	
	.loan-history {
		margin-top: 50px;
		margin-left: 5%;
		width: 90%;
	}

	
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
	
	.borrower-username-title {
		font-size: 1.55rem;
	}
	
}

@media screen and (max-width: 630px) {
	
	.borrower-details {
		width: calc(96% - 2px);
		margin-left: 2%;
	}
	
	.loan-history {
		margin-top: 50px;
		margin-left: 2%;
		width: calc(96% - 2px);
	}

}

@media screen and (max-width: 615px) {

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

@media screen and (max-width: 550px) {
	
	.location-div {
		width: calc(90% - 2px);
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 505px) {
	
	.feedback-type-1 {
		display: none;
	}

	.feedback-type-2 {
		display: inline;
	}
	
	.borrower-details {
		margin-top: 120px;
	}
	
	.borrower-username-title {
		font-size: 1.45rem;
	}
	
}

@media screen and (max-width: 500px) {

	.phone-number-div {
		width: calc(90% - 40px);
		text-align: center;
		margin-left: 5%;
		margin-top: calc(50vh - 220px);
		border-radius: 0.325rem;
		padding: 20px;
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
	
	.borrower-presentation {
		margin-left: 10px;
	}
	
	.subsection-title {
		margin-left: 10px;
	}
	
	.chat-button {
		margin-left: 10px;
	}
	
	.column-1 {
		margin-left: 10px;
	}
	
	.column-2 {
		margin-left: 55%;
		width: 45%;
	}
	
	.loan-history {
		height: 405px;
	}
	
	.subsection-title {
		font-size: 1.9rem;
	}
	
	.recent-loans-title {
		font-size: 1.9rem;
	}
	
	.lender-name-1 {
		display: none;
	}

	.lender-name-2 {
		display: none;
	}

	.lender-name-3 {
		display: none;
	}
	
	.lender-name-4 {
		display: block;
	}

	
}

@media screen and (max-width: 420px) {
	
	.subtitle-popup {
		margin-top: 5px;
		font-size: 1.9rem;
	}
	
	.phone-number-div {
		height: 200px;
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
	
	.borrower-details {
		margin-top: 110px;
	}
	
	.loan-history {
		margin-top: 35px;
	}
	
	.recent-loans-title {
		margin-top: 35px;
	}
	

}


@media screen and (max-width: 395px) {
	
	.column-2-bottom {
		margin-left: <?= $margin_left; ?>;
	}
	
	.loan-text {
		display: none;
	}
	
	.borrower-username-title {
		font-size: 1.35rem;
	}

}

@media screen and (max-width: 385px) {
	
	.close-button {
		height: 50px;
		width: 90%;
	}

}

@media screen and (max-width: 365px) {
	
	.member-date-2 {
		display: inline;
	}
	
	.member-date-1 {
		display: none;
	}

}

@media screen and (max-width: 359px) {

	.text-nobreak {
		display: none;
	}
	
	.text-break {
		display: inline-block;
	}
	
	.feedback-span2 {
		display: block;
		margin-top: 15px;
		font-size: 1.12rem;
	}
	
	.feedback-span {
		display: none;
	}
	
	.column-2-bottom {
		margin-top: -225px;
	}
	
	.borrower-details {
		height: 530px;
	}
	
	.loan-history {
		height: 435px;
	}
	
	.subsection-title {
		font-size: 1.7rem;
	}
	
	.recent-loans-title {
		font-size: 1.7rem;
	}
	
	.name-1 {
		display: none;
	}
	
	.name-2 {
		display: none;
	}
	.name-3 {
		display: none;
	}

	.name-4 {
		display: inline;
	}
}

@media screen and (max-width: 345px) {
	
	.location-text {
		font-size: 1.03rem;
	}
	
}

@media screen and (max-width: 340px) {
	
	.column-2-bottom {
		margin-left: <?= $margin_left2; ?>;
	}
	
}

@media screen and (max-width: 335px) {
	
	.borrower-details {
		margin-top: 100px;
	}
	
	.phone-number-div {
		width: calc(90% - 20px);
		margin-left: calc(5%);
		margin-top: calc(50vh - 210px);
		padding: 10px;
	}
	
	.subtitle-popup {
		font-size: 1.8rem;
	}
}

</style>

<style>
@media screen and (max-width: 1750px) {
	
	.header-text	{
		width: 85%;
		margin-left: 7.5%;
	}
	
}

@media screen and (max-width: 1550px) {
	
	.header-text	{
		width: 90%;
		margin-left: 5%;
	}
	
}

@media screen and (max-width: 1300px) {
	
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
		margin-left: calc(100% - 215px);
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
		margin-left: calc(100% - 135px);
	}
	
	.header-menu {
		display: block;
		width: 31px;
		height: 31px;
		margin-top: -23px;
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

@media screen and (max-width: 595px) {
	
	.explain-text-bottom {
		font-size: 0.95rem;
		line-height: 27px;
	}
	
	.bottom-text {
		font-size: 1.15rem;
		line-height: 27px;
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
	
	.borrow-under:hover {
		background-color: #536b8f;
	}


	.login-under {
		display: block;
		border-bottom: 0px;
		background-color: #00c4ff;
	}
	
	.login-under:hover {
		background-color: #00a2d4;
	}

	.text-under {
		font-size: 1.3rem;
	}
}

@media screen and (max-width: 405px) {
	
	.lend-button {
		width: 100%;
	}
	
	.lend-button-container {
		margin-left: 51%;
		width: 49%;
		margin-top: -38px;
	}
	
	.how-to {
		width: 49%;
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
		display: none;
	}
	
	.header-menu {
		margin-top: -27px;
	}
	
	.under-header {
		margin-top: 66px;
	}

	.signup-under {
		display: block;
		background-color: #00c4ff;
	}
	
	.signup-under:hover {
		background-color: #00a2d4;
	}
	
	.login-under {
		display: block;
		border-bottom: 1px solid white;
		background-color: #374861;
	}
	
	.login-under:hover {
		background-color: #536b8f;
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


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f7f7f7;">

<div class="header">
	<div class="header-text">
		<div class="logo"><a href="lender-info.php" style="text-decoration: none; color: black"><img src="assets/images/logo.png" class="logo-image"></a></div>
		<div class="lend"><a href="index.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow.php" style="text-decoration: none; color: black"><span class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="login.php" style="text-decoration: none; color: black"><span class="login-text">Login</span></a></div>
		<div class="signup"><a href="signup.php" style="text-decoration: none; color: black"><span class="signup-text">Sign Up</span></a></div>
		<div class="header-menu"><img id="menu-header" class="header-menu-image" src="assets/images/header-menu.jpg"></div>
	</div>
</div>
<div class="under-header" id="under-header">
		<a href="index.php" style="text-decoration: none; color: black"><div class="lend-under"><span class="text-under">Lend</span></div></a>
		<a href="borrow.php" style="text-decoration: none; color: black"><div class="borrow-under"><span class="text-under">Borrow</span></div></a>
		<a href="login.php" style="text-decoration: none; color: black"><div class="login-under"><span class="text-under">Login</span></div></a>
		<a href="signup.php" style="text-decoration: none; color: black"><div class="signup-under"><span class="text-under">Sign Up</span></div></a>
</div>

<div class="everything-except-header">

<div class="popup-phone-number" id="popup-phone-number">
	
	<div class="phone-number-div" id="phone-number-div">
		<div class="subtitle-popup"><span>Contact user</span></div>
		<p class="popup-phone-text">Log In to Access Contact Info</p>
		<button class="close-button" onclick="ClosePopup()">Close</button>
	</div>	
</div>

<div class="popup-location" id="popup-location">
	<div class="location-div" id="location-div">
		<p class="location-text">Location:</br><span style="color: #00c4ff;"><?= $country; ?></span></p>
		<button class="location-button" onclick="locationClose()">Close</button>
	</div>	
</div>

<div class="borrower-details">
		<p class="subsection-title">User Information</p>
		<div class="borrower-presentation">
		<img class="profile-picture" src="assets/images/profile-images/<?= $profile_picture; ?>">
		<div style="margin-top: -70px; margin-left: 80px;"><span class="borrower-username-title"><span class="name-1"><?= mb_strimwidth($user_username, 0, 18, "..."); ?></span><span class="name-2"><?= mb_strimwidth($user_username, 0, 18, "..."); ?></span><span class="name-3"><?= mb_strimwidth($user_username, 0, 17, "..."); ?></span><span class="name-4"><?= mb_strimwidth($user_username, 0, 11, "..."); ?></span></span><img style="display: <?= $country_image_display;?>" class="country-icon" src="assets/images/country-icons/<?=$country?>.png" onclick="locationOpen()"></br><span>Member since <span class="member-date-1"><?= date('F Y', strtotime($user_join_date)); ?></span><span class="member-date-2"><?= date('M Y', strtotime($user_join_date)); ?></span></span></div>
		</div>
		
		<button class="chat-button" onclick="OpenPopup()">Contact</button>
		
		<span class="feedback-span2">Positive feedback:<img style="margin-left: 27px;" class="thumbs-up" src="assets/images/positive.png"><span style="font-weight: 500; font-size: 1.55rem;"><?php echo ''.$positive_feedback.'';?></span></span>
		<span class="feedback-span2">Negative feedback:<img style="margin-left: 15px;" class="thumbs-down" src="assets/images/negative.png"><span style="font-weight: 500; font-size: 1.55rem;"><?php echo ''.$negative_feedback.'';?></span></span>
		
		<div class="column-1">
		<span class="feedback-span">Positive feedback</br><img class="thumbs-up" src="assets/images/positive.png"><span style="font-weight: 500; font-size: 1.55rem;"><?php echo ''.$positive_feedback.'';?></span></span>
		<div class="line" style="margin-top: 25px;"><span>Email</span></br><img class="checkmark" src="<?php if(isset($checkmark4)){echo ''.$checkmark4.'';}else {echo ''.$cross4.'';}?>"><span class="verification-box2"><?php if(isset($verified_email)){echo ''.$verified_email.'';}?></span><span class="verification-box"><?php if(isset($not_verified_email)){echo ''.$not_verified_email.'';}?></span></div>
		<div class="line"><p>Address</br><img class="checkmark" src="<?php if(isset($checkmark2)){echo ''.$checkmark2.'';}else {echo ''.$cross2.'';}?>"><span class="verification-box2"><?php if(isset($verified_address)){echo ''.$verified_address.'';}?></span><span class="verification-box"><?php if(isset($not_verified_address)){echo ''.$not_verified_address.'';}?></span></p></div>
		</div>
		
		<div class="column-2">
		<span class="feedback-span">Negative feedback</br><img class="thumbs-down" src="assets/images/negative.png"><span style="font-weight: 500; font-size: 1.55rem;"><?php echo ''.$negative_feedback.'';?></span></span>
		<div class="column-2-bottom">
		<div class="line"><p style="margin-top: 25px;">ID & Picture</br><img class="checkmark" src="<?php if(isset($checkmark3)){echo ''.$checkmark3.'';}elseif(isset($cross31)){echo ''.$cross31.'';}else {echo ''.$cross3.'';}?>"><span class="verification-box2"><?php if(isset($verified_idcard)){echo ''.$verified_idcard.'';}?></span><span class="verification-box"><?php if(isset($not_verified_idcard)){echo ''.$not_verified_idcard.'';}?></span><span class="verification-box3"><?php if(isset($underverification_idcard)){echo ''.$underverification_idcard.'';}?></span></p></div>
		<div class="line"><p>Phone Number</br><img class="checkmark" src="<?php if(isset($checkmark1)){echo ''.$checkmark1.'';}else {echo ''.$cross1.'';}?>"><span class="verification-box2"><?php if(isset($verified_phone)){echo ''.$verified_phone.'';}?></span><span class="verification-box"><?php if(isset($not_verified_phone)){echo ''.$not_verified_phone.'';}?></span></p></div>
		</div>
		</div>
</div>

<div class="loan-history">
	<p class="subsection-title">Loan History</p>
	<div class="column-1">
	<span class="text-nobreak" style="font-weight: 500; font-size: 1.15rem;">Amount Borrowed</span><span class="text-break" style="font-weight: 500; font-size: 1.15rem;">Amount</br>Borrowed</span></br><span style="font-size: 1.8rem; font-weight: 500; color: #00c4ff;"><?php echo ''.ROUND($getBorrowedAmountMessage).'';?>$</span>
	<div class="line" style="margin-top: 25px;"><span><span class="subtext"><?php echo ''.$AllCountMessage.'';?></span> <?php echo ''.$singular1.'';?> Taken</span></div>
	<div class="line"><span class="subtext"><?php echo ''.$PaidOntimeCountMessage.'';?></span> <span class="loan-text"><?php echo ''.$singular2.'';?></span> Repaid on Time</span></div>
	<div class="line" style="margin-top: 25px;"><span style="font-weight: 500; font-size: 1.15rem;">Trust Score</span></br><span style="font-size: 1.55rem; font-weight: 500; color: <?= $trustscore_color; ?>;"><?php echo ''.ROUND($trustscore7).'';?>/100</span></div>
	</div>
	
	<div class="column-2">
	<span class="text-nobreak" style="font-weight: 500; font-size: 1.15rem;">Amount Repaid</span><span class="text-break" style="font-weight: 500; font-size: 1.15rem;">Amount</br>Repaid</span></br><span style="font-size: 1.8rem; font-weight: 500; color: #00c4ff;"><?php echo ''.ROUND(($getRepayedBorrowedAmountMessage/$getSupposedRepaymentBorrowedAmountMessage)*100).'';?>%</span>
	<div class="line" style="margin-top: 25px;"><span><span class="subtext"><?php echo ''.$PaidLateCountMessage.'';?></span> <span class="loan-text"><?php echo ''.$singular3.'';?></span> Repaid Late</span></div>
	<div class="line"><span><span class="subtext"><?php echo ''.$unpaidCountMessage.'';?></span> Unpaid <?php echo ''.$singular4.'';?></span></div>
	</div>
</div>

<p class="recent-loans-title">Recent Loans</p>

  	<div class="transaction-details">
	<div class="loan-amount-1"><span class="details-line1">Loan Amount</span><span class="details-line2">Loan</br>Amount</span></div>
	<div class="repay-amount-1"><span class="details-line1">Repayment Amount</span><span class="details-line2">Repayment</br>Amount</span></div>
	<div class="interest-rate-1"><span class="details-line1">Repayment Date</span><span class="details-line2">Repayment</br>Date</span></div>
	<div class="repay-date-1"><span>Status</span></div>
	<div class="feedback-1"><span>Lender</span></div>
	<div class="payment-method-1"><span>Feedback</span></div>
	</div>
			
	<div class="error-message-container">
		<?php
		
		 if(isset($errorMsg)){ 
			echo '<p class="error-message">'.$errorMsg.'</p>'; 
		 }?>
	</div>	
		        <?php 

            while($question = $getHisQuestions->fetch()){
				
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
						$status_public = "Paid Late";
						$image_status = "<img class='status-image' src='assets/images/status-paidlate.png'>";
					}
				}
				
				if($question['feedback_given'] == "Positive"){
					$feedback = "Positive";
					$feedback_color ="green";
					$feedback_image ="<img src='assets/images/positive.png' class='image-positive'>";
				}elseif($question['feedback_given'] == "Negative"){
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
				<div class="feedback"><a style="text-decoration: none; color: #3d91e0;" href="user-profile.php?id=<?= $question['id_lender']; ?>"><span class="lender-name-1"><?= mb_strimwidth($question['username_lender'], 0, 18, "..."); ?></span><span class="lender-name-2"><?= mb_strimwidth($question['username_lender'], 0, 12, "..."); ?></span><span class="lender-name-3"><?= mb_strimwidth($question['username_lender'], 0, 9, "..."); ?></span><span class="lender-name-4"><?= mb_strimwidth($question['username_lender'], 0, 6, "..."); ?></span></a></div>
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

             

		


<div class="footer">
	<div class="footer-content">
		<div class="footer-1">
			<div><img src="assets/images/logo.png" class="logo-image-footer"></div>
		</div>
		<div class="footer-2">
			<div class="footer-subsection-title"><span>Company</span></div>
			<div class="footer-subsection-text"><a href="about.php" class="footer-link" target="blank"><span>About Instant Borrow</span></a></div>
			<div class="footer-subsection-text"><a href="contact.php" class="footer-link" target="blank"><span>Contact Us</span></a></div>
		</div>
		<div class="footer-3">
			<div class="footer-subsection-title"><span>Resources</span></div>
			<div class="footer-subsection-text"><a href="lender-info.php" class="footer-link" target="blank"><span>Lender's Guide</span></a></div>
			<div class="footer-subsection-text"><a href="borrower-info.php" class="footer-link" target="blank"><span>Borrower's Guide</span></a></div>
		</div>
		<div class="footer-4">
			<div class="footer-subsection-title"><span>Legal</span></div>
			<div class="footer-subsection-text"><a href="terms-conditions.php" class="footer-link" target="blank"><span>Terms & Conditions</span></a></div>
			<div class="footer-subsection-text"><a href="privacy-policy.php" class="footer-link" target="blank"><span>Privacy Policy</span></a></div>
		</div>
		<div class="footer-bottom">
			<div class="social-widgets">
			<a href="https://facebook.com" class="footer-link" target="blank"><img class="widget" src="assets/images/facebook-widget.png"></a>
			<a href="https://twitter.com" class="footer-link" target="blank"><img class="widget" src="assets/images/twitter-widget.png"></a>
			<a href="https://instagram.com" class="footer-link" target="blank"><img class="widget" src="assets/images/instagram-widget.png"></a>
			<a href="https://linkedin.com" class="footer-link" target="blank"><img class="widget" src="assets/images/linkedin-widget.png"></a>
			<a href="https://discord.com" class="footer-link" target="blank"><img class="widget" src="assets/images/discord-widget.png"></a>
			</div>
			<div class="footer-legal-bottom"><a class="link-legal" href="privacy-policy.php">Privacy Policy</a> - <a class="link-legal" href="terms-conditions.php">Terms and Conditions</a></div>
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
function locationOpen() {
  document.getElementById("location-div").style.display = "block";
  document.getElementById("popup-location").style.display = "block";
}
</script>

<script>
function locationClose() {
  document.getElementById("phone-number-div").style.display = "none";
  document.getElementById("popup-phone-number").style.display = "none";
}
</script>

</body>

</html>
