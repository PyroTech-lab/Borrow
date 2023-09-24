<?php
require('actions/users/securityAction.php');
require('actions/questions/showAllRequestsAction.php');
require('actions/users/notificationAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/userTrustScore.php');
require('actions/users/bannedAction.php');
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Instant Borrow - Lend and Borrow Money Safely and Easily</title>

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
	background-color: #f8f8f8;
}

.search-visible {
	display: block;
}

.search-hidden {
	display: none;
}

.sticky{
	z-index: 1;
	position: fixed;
	margin-top: -20px;
	width: 20%;
	background-color: transparent;
	text-align: left;
}

.sticky-text {
	width: 75%;
	font-size: 1.11rem;
	color: #383838;
}

.sticky-input {
	width: calc(100% - 7px);
	height: 40px;
	background-color: white;
	margin-top: -10px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.35rem;
	font-weight: bold;
	color: #00c4ff;
	padding-left: 7px;
	position: relative;
	z-index: 50;
}



.sticky-input:hover {
	outline: 1px solid #00c4ff;
	background-color: white;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.01); /* IE 9 */
	-webkit-transform: scale(1.01); /* Safari 3-8 */
	transform: scale(1.01); 
}

.sticky-input:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.sticky-input-bottom {
	display: none;
	width: calc(100% - 7px);
	height: 40px;
	background-color: white;
	margin-top: -10px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.35rem;
	font-weight: bold;
	color: #00c4ff;
	padding-left: 7px;
}

.sticky-input-bottom:hover {
	outline: 1px solid #00c4ff;
	background-color: white;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.01); /* IE 9 */
	-webkit-transform: scale(1.01); /* Safari 3-8 */
	transform: scale(1.01); 
}

.sticky-input-bottom:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

/* Firefox */
sticky-input-bottom[type=number] {
  -moz-appearance: textfield;
}

.sticky-input-bottom[type="date"] {
  -webkit-text-fill-color: #00c4ff;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
sticky-input[type=number] {
  -moz-appearance: textfield;
}

.sticky-input[type="date"] {
  -webkit-text-fill-color: #00c4ff;
}

.symbol-right {
	margin-top: -49px;
	font-size:1.35rem;
	font-weight: 500;
	width: 1px;
	margin-left: calc(100% - 1px);
	text-align: left;
	color: #00c4ff;
	position: relative;
	z-index: 100
}

.symbol-bottom {
	margin-top: -49px;
	font-size:1.35rem;
	font-weight: 500;
	width: 1px;
	margin-left: calc(100% - 1px);
	text-align: left;
	color: #00c4ff;
	position: relative;
	z-index: 1
}

input::-webkit-datetime-edit-day-field:focus,
input::-webkit-datetime-edit-month-field:focus,
input::-webkit-datetime-edit-year-field:focus {
    background-color: #e5de00;
    color: white;
	border-radius: 0.325rem;
}

.find-offers {
	margin-top: 35px;
	width: 100%;
	height: 50px;
	background-color: #2b80ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.find-offers:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.find-offers-bottom {
	display: none;
	margin-top: 35px;
	width: 100%;
	height: 50px;
	background-color: #2b80ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
}

.find-offers-bottom:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.clear-filters {
	margin-top: 10px;
	border-radius: 0.125rem;
	border: 1px solid #00c4ff;
	color: #2b80ff;
	background-color: white;
	font-weight: 500;
	font-size: 0.85rem;
	transition: color 0.2s;
	transition: border 0.2s;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.clear-filters:hover {
	border: 1px solid #00c4ff;
	color: #00c4ff;
}


.main-right {
	width: 75%;
	margin-left: 25%;
}

.title {
	width: 90%;
	margin-left: 80px;
	margin-bottom: 40px;
	font-size: 3.2rem;
	color: black;
	font-weight: 500;
}

.subtitle {
	width: 90%;
	margin-top: -25px;
	margin-bottom: 80px;
	margin-left: 80px;
	margin-right:60px;
	font-size: 1.2rem;
	font-weight: normal;
	color: #383838;
}

.subtitle-bold {
	color: #00c4ff;
	font-weight: 500;
}

.sort-by-visible {
	display: block;
}

.sort-by-hidden {
	display: none;
}

.sort-by {
	margin-left: 60px;
	margin-bottom: -39px;
}

.sort-by-title {
	 margin-left: calc(85% - 150px);
	 font-size: 1.05rem;
	 font-weight: 500;
}

.sort-by-text {
	margin-top: -10px;
	text-align: center;
	border: 2px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	margin-left: calc(85% - 150px);
	height: 55px;
	border-radius: 0.325rem;
	background-color: white;
}

.sort-by-input {
	border: none;
	width: 100%;
	font-weight: bold;
	font-size: 0.92rem;
	color: #4d4d4d;
	text-align: left;
	background-color: transparent;
}

.sort-by-input:hover {
	outline: none;
	color: #00c4ff
}

.sort-by-input:active {
	outline: none;
	color: #00c4ff;
	caret-color: transparent;
}

.sort-by-input:focus {
	outline: none;
	color: #00c4ff;
	caret-color: transparent;
}

.sort-by-column-1 {
	margin-top: 2px;
	margin-left: 5px;
	width: calc(50% - 5px);
	height: 30px;
}

.sort-by-column-2 {
	width: calc(50% - 5px);
	height: 30px;
	margin-left: calc(50% - 5px);
	margin-top: -30px;
	
}

.container {
	margin-left: 20px;
}

.latest-requests {
	margin-left: 60px;
}

.transaction-details {
	margin-left: 60px;
	margin-bottom: 28px;
	padding: 10px;
	border: 1px solid #bababa;
	background-color: #d9d9d9;
	border-radius: 0.325rem;
	text-align: left;
}

.details-line2 {
	display: none;
}

.borrower {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}

.loan-amount {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 18%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}

.repay-amount {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 36%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}

.interest-rate	{
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 54%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}

.repay-date {
	height: 23px;
	text-align: center;
	width: 17%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 72%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 0.95rem;
}


.loan-request {
	margin-left: 60px;
	margin-top: -20px;
	text-align: left;
	margin-bottom: 40px;
	padding-top: 15px;
	padding-bottom: 5px;
	padding-left: 10px;
	padding-right: 10px;
	border: 1px solid #bababa;
	background-color: white;
	border-radius: 0.325rem;
	transition: transform .2s;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}


.loan-request:hover {
	background-color: #fbfbfb;
  -ms-transform: scale(1.0055); /* IE 9 */
  -webkit-transform: scale(1.0055); /* Safari 3-8 */
  transform: scale(1.0055); 
}

.borrower-2 {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	padding: 4px;
	color: #3d91e0;
	font-weight: 500;
	font-size: 1.02rem;
}

.loan-amount-2 {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 18%;
	padding: 4px;
	color: #383838;
	font-weight: bold;
	font-size: 1.15rem;
}

.repay-amount-2 {
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 36%;
	padding: 4px;
	color: #383838;
	font-weight: bold;
	font-size: 1.15rem;
}

.interest-rate-2	{
	height: 23px;
	text-align: center;
	width: 18%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 54%;
	padding: 4px;
	color: #383838;
	font-weight: bold;
	font-size: 1.15rem;
}

.repay-date-2 {
	height: 23px;
	text-align: center;
	width: 17%;
	background-color: transparent;
	margin-top: -31px;
	margin-left: 72%;
	padding: 4px;
	color: #383838;
	font-weight: 500;
	font-size: 1.1rem;
}

.date-format2 {
	display: none;
}

.lend-container-bottom {
	display: none;
}

.lend-button-bottom {
	display: none;
}

.borrower-bottom-2 {
	display: none;
}


.trustscore {
	text-align: center;
	width: 18%;
	height: 23px;
	margin-top: 19px;
	margin-left: 0%;
	background-color: transparent;
	padding-top: 5px;
}

.top-border {
	width: 100%;
	height: 23px;
	margin-top: -29px;
	border-top: 1px solid #bababa;
	padding-top: 5px;
	border-radius: 0, 0, 0.325rem, 0.325rem;
}


.feedback {
	text-align: center;
	width: 18%;
	height: 23px;
	margin-top: -29px;
	margin-left: 18.7%;
	background-color: transparent;
	padding-top: 5px;
	font-weight: bold;
}

.feedback-image {
	height: 15px; 
	width: auto;
	margin-bottom: -1px;
}

.feedback-spacing {
	margin-left: 17px;
	color: red;
}

.lend-button {
	width: 100px;
	margin-left: 5%;
	background-color: #04db5a;
	border: 0;
	border-radius: 0.325rem;
	height: 31px;
	font-weight: bold;
	font-size: 0.95rem;
	color: white;
}

.lend-button:hover {
	background-color: green;
}

.error-message {
	margin-left: 60px;
	font-weight: 500;
	font-size: 1.15rem;
	margin-top: -15px;
	margin-bottom: 50px;
	color: red;
}

.under-container {
	margin-left: 60px;
	margin-bottom: 100px;
}

.load-more-visible {
	padding: 9px;
	width: 150px;
	background-color: #de0404;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
	transition: background-color .2s;
}

.load-more-hidden {
	display: none;
}

.borrow-button-container{
	margin-left: 155px;
	margin-top: -38px;
}

.borrow-button-container-noloadmore{
	margin-left: 0px;
	margin-top: 0px;
}

.borrow-button {
	padding: 9px;
	width: 150px;
	right: 0;
	background-color: #f2a100;
	color: white;
	border: 2px solid white;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
	transition: background-color .2s;
}

.load-more-visible:hover {
	background-color: #ff0303;
}

.borrow-button:hover {
	background-color: #edd500;
}

.search-bottom {
	display: none;
}

.explain {
	margin-left: 80px;
	text-align: left;
	color: #2e2e2e;
}

.explain-title {
	font-size: 2.1rem;
	font-weight: 500;
	color: #00c4ff;
}

.explain-howto {
		font-weight: 500;
		font-size: 1.55rem;
		color: black;
		margin-top: 60px;
		margin-bottom: 60px;
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

.explain-title:hover .link-round{
	background-color: #00c4ff;
	color: white;
	border: 1px solid #00c4ff;
}

.step1 {
	width: 49%;
}

.step2 {
	width: 49%;
	margin-left: 51%;
	margin-top: -252px;
}

.step3 {
	width: 49%;
}

.step4 {
	width: 49%;
	margin-left: 51%;
	margin-top: -227px;
}

.inner-box {
	border: 1px solid #b3b3b3;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
	background-color: white;
}

.inner-box2 {
	border: 1px solid #b3b3b3;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
	background-color: white;
}

.steps-title {
	font-weight: 500;
	font-size: 1.72rem;
	color: #00c4ff;
	margin-bottom: 3px;
}

.steps-subtitle {
	font-weight: 500;
	font-size: 1.1rem;
}

.explain-bold {
	font-weight: 500;
	color: #2b80ff;
}

.explain-text-bottom {
	font-size: 0.99rem;
	line-height: 27px;
}

.bottom-text {
	font-weight: 500;
	font-size: 1.28rem;
	color: #2b80ff;
}

.footer {
	z-index: 10;
	position: absolute;
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
	
	.sticky-text	{
	width: 80%;
	}
	
}

@media screen and (max-width: 1650px) {
	
	.sticky	{
	width: 25%;
	}
	
	.main 	{
	width: 90%;
	margin-left: 5%;
	}
	
	.sticky-text	{
	width: 75%;
	}
	
	.header-text {
		margin-left: 5%;
		width: 90%;
	}
	
	.footer-content {
		margin-left: 5%;
		width: 90%;
	}
	
}

@media screen and (max-width: 1450px) {
	
	.main-right {
	width: 80%;
	margin-left: 20%;
	}
	
}

@media screen and (max-width: 1360px) {
	
	.main {
	width: 96%;
	margin-left: 2%;
	}
	
	.header-text {
		margin-left: 2%;
		width: 96%;
	}
	
	.footer-content {
		margin-left: 2%;
		width: 96%;
	}
	
	.sticky-text	{
	width: 82%;
	}
	
}

@media screen and (max-width: 1270px) {
	
	.main {
	width: 80%;
	margin-left: 10%;
	}
	
	.header-text {
		margin-left: 10%;
		width: 80%;
	}
	
	.footer-content {
		margin-left: 10%;
		width: 80%;
	}
	
	.sticky	{
	display: none;
	}
	
	.main-right {
	width: 100%;
	margin-left: 0%;
	}
	
	.container {
	margin-left: 0px;
	}
	
	.latest-requests {
	margin-left: 0px;
	}
	
	.transaction-details {
	margin-left: 0px;
	}
	
	.loan-request {
	margin-left: 0px;
	}
	
	.title {
	margin-left: 0px;
	width: 100%;
	}
	
	.subtitle {
	margin-left: 0px;
	width: 100%;
	}
	
	.under-container {
	margin-left: 0px;
	}
	
	.error-message {
		margin-left: 0px;
	}
	
	.explain {
	margin-left: 0px;
	}
	
	.under-container	{
		margin-bottom: 60px;
	}
	
	.search-bottom {
		display: block;
		margin-bottom: 100px;
	}
	
	
	.sticky-input-bottom { 
		display: block;
	}
	
	.bottom-column-1 {
		width: calc(48% - 7px);
	}
	
	.bottom-column-2 {
		margin-top: -170px;
		margin-left: 52%;
		width: calc(48% - 7px);
	}
	
	.find-offers-bottom {
		display: block;
		margin-top: 0px;
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
	
	.main {
	width: 86%;
	margin-left: 7%;
	}
	
	.header-text {
		margin-left: 7%;
		width: 86%;
	}
	
	.footer-content {
		margin-left: 7%;
		width: 86%;
	}

}

@media screen and (max-width: 1150px) {
	
	.main {
	width: 90%;
	margin-left: 5%;
	}
	
	.header-text {
		margin-left: 5%;
		width: 90%;
	}
	
	.footer-content {
		margin-left: 5%;
		width: 90%;
	}

}

@media screen and (max-width: 1000px) {
	
	.main {
	width: 96%;
	margin-left: 2%;
	}
	
	.header-text {
		margin-left: 2%;
		width: 96%;
	}
	
	.footer-content {
		margin-left: 2%;
		width: 96%;
	}

}

@media screen and (max-width: 935px) {
	
	.lend-button {
	display: none;
	}
	
	.borrower {
		width: 20%;
	}
	
	.borrower-2 {
		width: 20%;
	}
	
	.loan-amount {
		margin-left: 20%;
		width: 20%;
	}
	
	.loan-amount-2 {
		margin-left: 20%;
		width: 20%;
	}
	
	.repay-amount {
		margin-left: 40%;
		width: 20%;
	}
	
	.repay-amount-2 {
		margin-left: 40%;
		width: 20%;
	}

	.interest-rate {
		margin-left: 60%;
		width: 20%;
	}

	.interest-rate-2 {
		margin-left: 60%;
		width: 20%;
	}
	
	.repay-date {
		margin-left: 80%;
		width: 20%;
	}

	.repay-date-2 {
		margin-left: 80%;
		width: 20%;
	}
	
	.top-border {
		margin-top: -31px;
	}
	
	.lend-container-bottom {
		display: block;
		width: 20%;
		margin-left: 80%;
		margin-top: -26px;
	}
	
	.lend-button-bottom {
		display: block;
		height: 31px;
		width: 100%;
		background-color: #04db5a;
		border: 0;
		border-radius: 0.325rem;
		font-weight: bold;
		font-size: 0.95rem;
		color: white;
	}


	.lend-button-bottom:hover {
		background-color: green;
	}
	
	.trustscore {
		width: 20%;
		margin-left: 0%;
		margin-top: 52px;
	}
	
	.feedback {
		width: 20%;
		margin-left: 20%;
		margin-top: -25px;
	}
		
	.main {
		margin-top: 145px;
	}
	
	.logo-image-footer	{
		height: 70px;
		width: auto;
		margin-top: 10px;
	}
		

}


@media screen and (max-width: 885px) {
	
	
	.step2 {
		margin-top: -276px;
	}
	
	.inner-box2 {
	padding-bottom: 24px;
	}
}

@media screen and (max-width: 845px) {

	.borrower {
		width: 19%;
	}
	
	.borrower-2 {
		width: 19%;
	}
	
	.loan-amount {
		margin-left: 19%;
		width: 19%;
	}
	
	.loan-amount-2 {
		margin-left: 19%;
		width: 19%;
	}
	
	.repay-amount {
		margin-left: 38%;
		width: 24%;
	}
	
	.repay-amount-2 {
		margin-left: 38%;
		width: 24%;
	}

	.interest-rate {
		margin-left: 62%;
		width: 18%;
	}

	.interest-rate-2 {
		margin-left: 62%;
		width: 18%;
	}
	
	.repay-date {
		margin-left: 81%;
		width: 19%;
	}

	.repay-date-2 {
		margin-left: 81%;
		width: 19%;
	}
	
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

@media screen and (max-width: 820px) {

	.sort-by-text {
		margin-left: calc(80% - 150px);
		height: 55px;
	}
	
	.sort-by-title {
		margin-left: calc(80% - 150px);
	}

}

@media screen and (max-width: 805px) {

	.trustscore {
		width: 25%;
		margin-left: 0%;
		margin-top: 52px;
	}
	
	.feedback {
		width: 20%;
		margin-left: 40%;
		margin-top: -25px;
	}
	
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

@media screen and (max-width: 748px) {
	
	.transaction-details {
		padding-bottom: 30px;
	}
	
	.details-line1 {
		display: none;
	}
	
	.details-line2 {
		display: block;
	}
	
	.date-format1 {
		display: none;
	}
	
	.date-format2 {
		display: block;
	}

}

@media screen and (max-width: 741px) {
	
	.step2 {
		margin-top: -302px;
	}
	
	.inner-box2 {
	padding-bottom: 50px;
	}

}



@media screen and (max-width: 703px) {
	
	.step4 {
		margin-top: -252px;
	}
	
	.inner-box4 {
	padding-bottom: 24px;
	}
	
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

@media screen and (max-width: 655px) {
	
	.explain-howto {
		margin-left: 7%;
		width: 86%;
	}
	
	.box-container {
		width: 86%;
		margin-left: 7%;
	}
	
	.step1 {
		margin-left: 0px;
		margin-top: 0px;
		width: 100%;
	}
	
	.step2 {
		margin-left: 0px;
		margin-top: 0px;
		width: 100%;
	}
	
	.inner-box2 {
		padding-bottom: 0px;
	}	

	.step3 {
		margin-left: 0px;
		margin-top: 0px;
		width: 100%;
	}
	
	.step4 {
		margin-left: 0px;
		margin-top: 0px;
		width: 100%;
	}
}

@media screen and (max-width: 650px) {

	.trustscore {
		width: 30%;
		margin-left: 0%;
		margin-top: 52px;
	}
	
	.lend-container-bottom {
		width: 25%;
		margin-left: 75%;
		margin-top: -26px;
	}
	
	.sort-by-text {
	margin-left: calc(75% - 150px);
	height: 55px;
	}
	
	.sort-by-title {
	 margin-left: calc(75% - 150px);
	}
	
}

@media screen and (max-width: 595px) {
	
	.title {
		font-size: 2.4rem;
	}
	
	.subtitle {
		font-size: 1.12rem;
	}
	
	.explain-text-bottom {
		font-size: 0.95rem;
		line-height: 27px;
	}
	
	.bottom-text {
		font-size: 1.15rem;
		line-height: 27px;
	}
	
	
	.main {
		margin-top: 130px;
	}

}

@media screen and (max-width: 550px) {

	
	.trustscore {
		width: 35%;
		margin-left: 0%;
		margin-top: 52px;
	}
	
	.feedback-spacing {
		margin-left: 12px;
	}
	
	.explain-howto {
		margin-left: 4%;
		width: 92%;
	}
	
	.box-container {
		width: 92%;
		margin-left: 4%;
	}
	
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

@media screen and (max-width: 545px) {

	.borrower {
		display: none;	
	}
	
	.borrower-2 {
		display: none;
	}
	
	.loan-amount {
		margin-top: 0px;
		margin-left: 0%;
		width: 25%;
	}
	
	.loan-amount-2 {
		margin-top: 0px;
		margin-left: 0%;
		width: 25%;
	}
	
	.repay-amount {
		margin-left: 25%;
		width: 25%;
	}
	
	.repay-amount-2 {
		margin-left: 25%;
		width: 25%;
	}
	
	.interest-rate {
		margin-left: 50%;
		width: 25%;
	}
	
	.interest-rate-2 {
		margin-left: 50%;
		width: 25%;
	}
	
	.repay-date {
		margin-left: 75%;
		width: 25%;
	}
	
	.repay-date-2 {
		margin-left: 75%;
		width: 25%;
	}
	
	.lend-container-bottom {
		width: 30%;
		margin-left: 70%;
		margin-top: -26px;
	}

	.sort-by-text {
		margin-left: 0%;
		height: 55px;
	}
	
	.sort-by-title {
		margin-left: 0%;
	}
	
	.sort-by {
		margin-left: 0px;
		width: 260px;
		margin-bottom: 0px;
	}

}


@media screen and (max-width: 505px) {
	
	.explain-howto {
		margin-left: 0%;
		width: 100%;
	}
	
	.box-container {
		width: 100%;
		margin-left: 0%;
	}
	
	.bottom-text {
		font-size: 1.1rem;
	}
	
	.main {
		margin-top: 120px;
	}
	
	.container {
		margin-top: -30px;
	}
	
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
	
	.bottom-column-1 {
		width: calc(100% - 7px);
	}
	
	.bottom-column-2 {
		margin-top: 0px;
		margin-left: 0%;
		width: calc(100% - 7px);
	}
	
	.trustscore {
		width: 40%;
	}
	
	.feedback {
		margin-left: 44%;
	}
	
	.feedback-spacing {
		margin-left: 2px;
	}
	
	.loan-amount {
		margin-left: 0%;
		width: 21%;
	}
	
	.loan-amount-2 {
		margin-left: 0%;
		width: 21%;
	}
	
	.repay-amount {
		margin-left: 21%;
		width: 28%;
	}
	
	.repay-amount-2 {
		margin-left: 21%;
		width: 28%;
	}
	
	.interest-rate {
		margin-left: 49%;
		width: 23%;
	}
	
	.interest-rate-2 {
		margin-left: 49%;
		width: 23%;
	}
	
	.repay-date {
		margin-left: 72%;
		width: 28%;
	}
	
	.repay-date-2 {
		margin-left: 72%;
		width: 28%;
	}

}

@media screen and (max-width: 405px) {
	
	.logo-image {
		height: 55px;
		margin-top: -17px;
	}
	
	.trustscore {
		width: 44%;
	}
	
	.feedback {
		margin-left: 47%;
	}
	
	.feedback-spacing {
		display: none;
	}
	
	.loan-amount {
		font-size: 0.9rem;
	}
	
	
	.repay-amount {
		font-size: 0.9rem;
	}
	
	
	.interest-rate {
		font-size: 0.9rem;
	}
	
	
	.repay-date {
		font-size: 0.9rem;
	}
	
	.transaction-details {
		padding-bottom: 27px;
	}
	
	.borrow-button-container{
		margin-left: 50%;
		width: 50%
	}


	.borrow-button {
		width: 100%;
	}
	
	.load-more-visible {
		width: 50%;
	}

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
	
	.loan-amount {
		margin-left: 0%;
		width: 18%;
	}
	
	.loan-amount-2 {
		margin-left: 0%;
		width: 18%;
	}
	
	.repay-amount {
		margin-left: 20%;
		width: 28%;
	}
	
	.repay-amount-2 {
		margin-left: 20%;
		width: 28%;
	}
	
	.interest-rate {
		margin-left: 48%;
		width: 24%;
	}
	
	.interest-rate-2 {
		margin-left: 48%;
		width: 24%;
	}
	
	.repay-date {
		margin-left: 72%;
		width: 28%;
	}
	
	.repay-date-2 {
		margin-left: 72%;
		width: 28%;
	}
	
	.trustscore {
		width: 49%;
	}
	
	.feedback {
		margin-left: 48.5%;
	}
	
	.subtitle {
		font-size: 1.08rem;
	}
	
	.footer-2 {
		width: 159px;
		margin-left: 2%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(98% - 128px);
	}
	
}

@media screen and (max-width: 350px) {

	.logo-image {
		height: 50px;
		margin-top: -14px;
	}

	.loan-amount {
		margin-left: 0%;
		width: 33%;
	}
	
	.loan-amount-2 {
		margin-left: 0%;
		width: 33%;
	}
	
	.repay-amount {
		margin-left: 33%;
		width: 34%;
	}
	
	.repay-amount-2 {
		margin-left: 33%;
		width: 34%;
	}
	
	.interest-rate {
		margin-left: 66%;
		width: 33%;
	}
	
	.interest-rate-2 {
		margin-left: 66%;
		width: 33%;
	}
	
	.repay-date {
		display: none;
	}
	
	.repay-date-2 {
		display: none;
	}
	
	.subtitle {
		font-size: 1.05rem;
	}
	
	.main {
		margin-top: 100px;
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
	
	
	.trustscore {
		width: 55%;
	}
	
	.feedback {
		display: none;
	}
	
	.lend-container-bottom {
		width: 40%;
		margin-left: 60%;
		margin-top: -23px;
	}
	
	.footer-2 {
		width: 103px;
		margin-left: 6%;
	}

	.footer-3 {
		width: 128px;
		margin-left: calc(94% - 128px);
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
		margin-top: 70px;
	}

	.notification-receivedrepayment {
		margin-top: 70px;
	}

	.notification-receivedloan {
		margin-top: 70px;
	}

	.notification-unpaidborrower {
		margin-top: 70px;
	}

	.notification-bannedborrower {
		margin-top: 70px;
	}
	
}
</style>

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f8f8f8;">

<div class="header">
	<div class="header-text">
		<div class="logo"><a href="lender-guide.php" style="text-decoration: none; color: black"><img src="assets/images/logo.png" class="logo-image"></a></div>
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

	<div class="sticky" id="sticky">
	
	<div class="sticky-text">
	
	<form method="GET" class="<?= $class_search1 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search1" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search1" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search1" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search1" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear1" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search2 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search2" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search2" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search2" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search2" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear2" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search3 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search3" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search3" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search3" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search3" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear3" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search4 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search4" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search4" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search4" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search4" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear4" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search5 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search5" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search5" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search5" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search5" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear5" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search6 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search6" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search6" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search6" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search6" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear6" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search7 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search7" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search7" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search7" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search7" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear7" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search8 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search8" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search8" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search8" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search8" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear8" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search9 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search9" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search9" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search9" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search9" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear9" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search10 ?>">
		<p>Loan Amount</p>
		<input class="sticky-input" name="loan_amount_search10" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-right"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input" name="interest_search10" type="number" min="0" autocomplete="off"><div class="symbol-right"><span style="margin-left: -23px;">%</span></div>
		<p>Borrower Trust Score</p>
		<input class="sticky-input" name="trustscore_search10" type="number" min="0" max="100" autocomplete="off"><div class="symbol-right"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input" type="date" name="repayment_date_search10" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<input type="submit" class="find-offers" name="search" value="Find Offers">
		<input type="submit" name="clear10" value="Clear Filters" class="clear-filters">
	</form>
	
	</div>
	
	</div>

	<div class="main-right">
		<h1 class="title">Lend Money. Get Big Returns.</h1>
		<h2 class="subtitle"><span class="subtitle-bold">Lend and Borrow</span> on Instant Borrow - <span class="subtitle-bold">0% Platform Fees</span>, Unmatched <span class="subtitle-bold">Profits</span>, Incredibly <span class="subtitle-bold">Fast and Easy</span>.</h2>

		<div class="container">
		
			<div class="sort-by">
				<p class="sort-by-title">Sort By</p>
				<div class="sort-by-text">
				
					<form method="GET" class="<?= $class_sort1 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest1" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount1" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date1" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest1" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort2 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest2" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount2" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date2" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest2" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort3 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest3" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount3" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date3" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest3" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort4 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest4" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount4" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date4" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest4" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort5 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest5" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount5" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date5" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest5" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort6 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest6" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount6" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date6" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest6" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort7 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest7" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount7" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date7" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest7" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort8 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest8" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount8" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date8" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest8" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort9 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest9" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount9" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date9" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest9" value="Interest rate" type="submit">
					</div>
					</form>
					<form method="GET" class="<?= $class_sort10 ?>">
					<div class="sort-by-column-1">
						<input class="sort-by-input" name="sortby_newest10" value="Newest" type="submit">
						<input class="sort-by-input" name="sortby_loan_amount10" value="Loan Amount" type="submit">
					</div>
					<div class="sort-by-column-2">
						<input class="sort-by-input" name="sortby_repayment_date10" value="Repayment Date" type="submit">
						<input class="sort-by-input" name="sortby_interest10" value="Interest rate" type="submit">
					</div>
					</form>
					
				</div>
			</div>
		
		<div class="latest-requests"><p style="font-size: 1.15rem; font-weight: 500; color: #383838;">Latest Loan Requests:</p></div>
			<div class="transaction-details">
						<div class="borrower"><span style="color: #383838;">Borrower</span></div>
						<div class="loan-amount"><span class="details-line1">Loan Amount</span><span class="details-line2">Loan</br>Amount</span></div>
						<div class="repay-amount"><span class="details-line1">Repayment Amount</span><span class="details-line2">Repayment</br>Amount</span></div>
						<div class="interest-rate"><span class="details-line1">Interest Rate</span><span class="details-line2">Interest</br>Rate</span></div>
						<div class="repay-date"><span class="details-line1">Repayment Date</span><span class="details-line2">Repayment</br>Date</span></div>
			</div>
			
			<?php 
            while($question = $getAllQuestions->fetch()){
				
			if($question['borrower_trustscore'] < 50){
				$trustscore_color = "red";
			}elseif(($question['borrower_trustscore'] >= 50)AND($question['borrower_trustscore'] < 80)){
				$trustscore_color = "#00c4ff";
			}elseif($question['borrower_trustscore'] >= 80){
				$trustscore_color = "#2b80ff";
			}
                ?>
			<div class="loan-request">
				<div class="loan-details">
						<div style="padding-bottom: 10px;">
						<div class="borrower-2"><a href="profile-user.php?id=<?=$question['id_borrower']; ?>" style="text-decoration: none; color: #3d91e0;"><span><?= mb_strimwidth($question['username_borrower'], 0, 9, "..."); ?></span></a></div>
						<div class="loan-amount-2"><span><?= $question['loan_amount']; ?>$</span></div>
						<div class="repay-amount-2"><span><?= $question['repayment_amount']; ?>$</span></div>
						<div class="interest-rate-2"><span><?= $question['interest']; ?>%</span></div>
						<div class="repay-date-2"><span class="date-format1"><?= date('M jS, Y', strtotime($question['repayment_date'])); ?></span><span class="date-format2"><?= date('j M y', strtotime($question['repayment_date'])); ?></span></div>
						</div>
						<div style="text-align: right; margin-top: -40px;">
						<a href="lend.php?id=<?= $question['id']; ?>"><button class="lend-button">LEND</button><a>
						</div>
							<div class="trustscore">
								<span>Trustscore: <span style="font-weight: bold; color: <?= $trustscore_color; ?>;"><?= $question['borrower_trustscore']; ?>/100</span></span>
							</div>
							<div class="top-border"></div>
							<div class="feedback">
								<span style="color: green;"><img src="assets/images/positive.png" class="feedback-image"> <?php if(($question['borrower_positive_feedback']) < 100){ echo $question['borrower_positive_feedback'];}else{ echo "99";} ?></span>
								<span class="feedback-spacing"><img src="assets/images/negative.png" class="feedback-image"> <?php if(($question['borrower_negative_feedback']) < 10){ echo $question['borrower_negative_feedback'];}else{ echo "9";} ?></span>
							</div>
							<div class="lend-container-bottom">
								<a href="lend.php?id=<?= $question['id']; ?>" style="text-decoration: none;"><button class="lend-button-bottom">LEND</button><a>
							</div>
				</div>
			</div>
			<?php
				}
			?>
			
			<?php 
            if(isset($errorMsg)){ 
                echo '<p class="error-message">'.$errorMsg.'</p>'; 
            }
			?>
			
			
			
			<div class="under-container">
			
				<form method="GET">
				<input class="<?= $class1 ?>" id="load_more" name="load_more1" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class2 ?>" id="load_more" name="load_more2" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class3 ?>" id="load_more" name="load_more3" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class4 ?>" id="load_more" name="load_more4" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class5 ?>" id="load_more" name="load_more5" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class6 ?>" id="load_more" name="load_more6" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class7 ?>" id="load_more" name="load_more7" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class8 ?>" id="load_more" name="load_more8" type="submit" value="Load More Offers">
				</form>
				<form method="GET">
				<input class="<?= $class9 ?>" id="load_more" name="load_more9" type="submit" value="Load More Offers">
				</form>
				
				<div class="<?= $classButton ?>"><a href="borrow-money.php"><button class="borrow-button">Borrow Money</button></a></div>
			</div>
		
		</div>
		


	<div class="search-bottom">
	
	<form method="GET" class="<?= $class_search1 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search1" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search1" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search1" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search1" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear1" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search2 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search2" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search2" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search2" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search2" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear2" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search3 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search3" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search3" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search3" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search3" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear3" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search4 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search4" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search4" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search4" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search4" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear4" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search5 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search5" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search5" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search5" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search5" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear5" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search6 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search6" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search6" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search6" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search6" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear6" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search7 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search7" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search7" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search7" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search7" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear7" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search8 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search8" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search8" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search8" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search8" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear8" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search9 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search9" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search9" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search9" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search9" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear9" value="Clear Filters" class="clear-filters">
	</form>
	<form method="GET" class="<?= $class_search10 ?>">
		<div class="bottom-column-1">
		<p>Loan Amount</p>
		<input class="sticky-input-bottom" name="loan_amount_search10" type="number" min="10" max="2000" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -19px;">$</span></div>
		<p>Interest Rate</p>
		<input class="sticky-input-bottom" name="interest_search10" type="number" min="0" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -23px;">%</span></div>
		</div>
		<div class="bottom-column-2">
		<p>Borrower Trust Score</p>
		<input class="sticky-input-bottom" name="trustscore_search10" type="number" min="0" max="100" autocomplete="off"><div class="symbol-bottom"><span style="margin-left: -50px;">/100</span></div>
		<p>Repayment Date</p>
		<input class="sticky-input-bottom" type="date" name="repayment_date_search10" autocomplete="off"  min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</div>
		</br>
		<input type="submit" class="find-offers-bottom" name="search" value="Find Offers">
		<input type="submit" name="clear10" value="Clear Filters" class="clear-filters">
	</form>
	
	</div>


		
		
		<div class="explain">
			<a href="lender-guide.php" style="text-decoration: none;" target="blank"><h3 class="explain-title">Lend Money on Instant Borrow&nbsp;<span class="link-round">🡕</span></h3></a>
			
			<p style="font-weight: 500; font-size: 1.28rem; margin-top: 50px; color:#2b80ff;">Welcome to the World of Peer-to-Peer Finance.</p> 
			
			<p style="font-weight: normal;">Instant Borrow connects Borrowers and Lenders Together for a Safe, Seamless and Hastle-Free Experience.</p>
			<p>Keep total Control over your Funds, Transact Directly with other Users and Forget about Lengthy Approval Processes and High Fees.</p>

			<p style="font-weight: 500; font-size: 1.28rem; color:#2b80ff;">Lending on Instant Borrow is Quick, Easy, and a Great way to Make Money.</p>
			
			<p class="explain-howto">THIS IS HOW TO DO IT:</p>
			
			<div class="box-container">
			<div class="step1"><h3 class="steps-title">1-BROWSE</h3><div class="inner-box"><p class="steps-subtitle">Find in the Loan Requests Section:</p><p><span class="explain-bold">Loan Amounts</span></br><span class="explain-bold">Repayment Amounts</span> and <span class="explain-bold">Dates</span></br><span class="explain-bold">Interest</span> Rates</br><span class="explain-bold">Trustscores</span> and <span class="explain-bold">Feedback</span> Given to Borrowers</p></div></div>
			<div class="step2"><h3 class="steps-title">2-SELECT A LOAN</h3><div class="inner-box2"><p class="steps-subtitle">Get on the Loan Recap Page:</p><p>A <span class="explain-bold">Recap</span> of the Loan</br><span class="explain-bold">Information</span> About the Borrower</br>His Borrowing <span class="explain-bold">History</span></br><span class="explain-bold">Notes</span> Regarding the Loan</p></div></div>
			<div class="step3"><h3 class="steps-title">3-LEND</h3><div class="inner-box"><p class="steps-subtitle">On the Payment Page:</p><p>Choose your <span class="explain-bold">Payment Method</span></br><span class="explain-bold">Send Funds</span> to the Borrower</br><span class="explain-bold">Confirm</span> the Transaction was Made</p></div></div>
			<div class="step4"><h3 class="steps-title">4-PROFIT</h3><div class="inner-box"><p class="steps-subtitle">On the Repayment Date:</p><p>Borrower Sends <span class="explain-bold">Repayment</span></br><span class="explain-bold">Confirm</span> Funds Have Been Received</br><span class="explain-bold">Evaluate</span> the Borrower</p></div></div>
			</div>
			
			<p class="explain-text-bottom" style="margin-top: 60px;">All payments are Confirmed by Instant Borrow and are Protected with Advanced security Measures. The Marketplace is closely Monitored and all Users are Verified to ensure a safe Trading Environment.</p>
			
			<p class="explain-text-bottom">Personnal Information is Fully Protected by Instant Borrow and is only Given to the Lender if the Borrower fails to Repay his Loan.</p>

			<p class="explain-text-bottom">If you have any Questions, please <a href="contact-us.php" target="blank" style="color: #3d91e0; text-decoration: none;">Contact Us</a> or Read our User Guides at the Bottom of the Page. We'll always be there for you!</p>

			<h3 class="bottom-text">Lending on Instant Borrow is Safe, Easy and Lucrative — Experience the next Revolution in the world of Finance and Make Record Profits in Record Time</h3>
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

</body>

</html>
