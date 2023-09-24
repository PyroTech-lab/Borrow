<?php
require('actions/questions/updateDatabases.php');
?>

<?php
session_start();
if(isset($_SESSION['auth'])){
    header('Location: borrow-money.php');
}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="index" />

<meta name="description" content="Borrow Money and Take out a personal loan on Instant Borrow. No credit score checks, no Paperwork, low Fees. Start now and Borrow anywhere from 100$ to 2000$.">
	
<title>Instant Borrow - Borrow Money Quickly with no Credit Score</title>

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

.title {
	width: 100%;
	font-size: 3.2rem;
	color: black;
	font-weight: 500;
	margin-bottom: 40px;
}

.subtitle {
	width: 100%;
	margin-top: -25px;
	margin-bottom: 80px;
	margin-right:60px;
	font-size: 1.2rem;
	font-weight: normal;
	color: #383838;
}

.subtitle-bold {
	color: #2b80ff;
	font-weight: 500;
}

.main {
	margin-top: 160px;
	width: 50%;
	margin-left: 25%;
	background-color: white;
	text-align: left;
}

.form-text {
	font-weight: 500;
	font-size: 1.1rem;
}


.input {
	width: calc(100% - 7px);
	height: 40px;
	background-color: #f7f7f7;
	margin-top: -10px;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.6rem;
	font-weight: bold;
	color: #00c4ff;
	padding-left: 7px;
}

.input:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.input:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}

.input-notes {
	width: calc(100% - 7px);
	height: 130px;
	margin-top: -10px;
	background-color: #f7f7f7;
	margin-bottom: 10px;
	border: 1px solid #00c4ff;
	border-radius: 0.125rem;
	transition: transform 0.2s;
	font-size: 1.11rem;
	font-weight: 500;
	color: #00c4ff;
	padding-left: 7px;
	resize: vertical;
	padding-top: 5px;
}

.input-notes:hover {
	outline: 1px solid #00c4ff;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.input-notes:focus {
	outline: 1px solid #00c4ff;
	background-color: rgba(0, 196, 255, 0.08);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
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

.input[type="date"] {
  -webkit-text-fill-color: #00c4ff;
}

input::-webkit-datetime-edit-day-field:focus,
input::-webkit-datetime-edit-month-field:focus,
input::-webkit-datetime-edit-year-field:focus {
    background-color: #e5de00;
    color: white;
	border-radius: 0.325rem;
}

.borrow-button {
	margin-top: 35px;
	width: 100%;
	height: 50px;
	background-color: #00c4ff;
	color: white;
	font-size: 1.18rem;
	font-weight: bold;
	border: 0;
	border-radius: 0.325rem;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform 0.2s;
	transition: background-color 0.2s;
}

.borrow-button:hover {
	background-color: #2b80ff;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.under-container {
	margin-top: 40px;
}

.how-to {
	padding: 9px;
	width: 150px;
	background-color: #de0404;
	color: white;
	border: 2px solid #de0404;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
}

.lend-button {
	padding: 9px;
	width: 150px;
	right: 0;
	background-color: #f2a100;
	color: white;
	border: 2px solid #f2a100;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 0.88rem;
}

.lend-button-container {
	margin-left: 155px;
	margin-top: -38px;	
}

.how-to:hover {
	background-color: #ff0303;
	border: 2px solid #ff0303;
}

.lend-button:hover {
	background-color: #edd500;
	border: 2px solid #edd500;
}

.explain {
	margin-top: 100px;
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
	margin-top: -202px;
}

.inner-box1 {
	border: 1px solid #b3b3b3;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
}

.inner-box2 {
	border: 1px solid #b3b3b3;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
}

.inner-box3 {
	border: 1px solid #b3b3b3;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
}

.inner-box4 {
	border: 1px solid #b3b3b3;
	border-radius: 0.25rem;
	padding-left: 20px;
	padding-right: 20px;
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
	
	.main {
		width: 55%;
		margin-left: 22.5%;
	}
	
}

@media screen and (max-width: 1550px) {
	
	.main {
		width: 60%;
		margin-left: 20%;
	}
	
}

@media screen and (max-width: 1350px) {
	
	.main {
		width: 65%;
		margin-left: 17.5%;
	}
	
}

@media screen and (max-width: 1150px) {
	
	.main {
		width: 70%;
		margin-left: 15%;
	}
	
}

@media screen and (max-width: 1057px) {
	
	.inner-box3 {
		padding-bottom: 26px;
	}
	
	.step4 {
		margin-top: -227px;
	}
	
}

@media screen and (max-width: 1000px) {
	
	.main {
		width: 75%;
		margin-left: 12.5%;
	}
	
	.inner-box3 {
		padding-bottom: 0px;
	}
	
	.step4 {
		margin-top: -201px;
	}
	
}

@media screen and (max-width: 987px) {
	
	.inner-box3 {
		padding-bottom: 26px;
	}
	
	.step4 {
		margin-top: -227px;
	}
	
}


@media screen and (max-width: 935px) {
	
	.main {
		margin-top: 145px;
	}
	
	.steps-title {
		font-size: 1.5rem;
	}
	
	.step2 {
		margin-top: -241px;
	}
	
	.step4 {
		margin-top: -218px;
	}
		
}

@media screen and (max-width: 905px) {
	
	.main {
		width: 80%;
		margin-left: 10%;
	}
	
}


@media screen and (max-width: 834px) {
	
	.inner-box2 {
		padding-bottom: 26px;
	}
	
	.step2 {
		margin-top: -267px;
	}
	
}


@media screen and (max-width: 830px) {
	
	.inner-box3 {
		padding-bottom: 0px;
	}
	
	.step4 {
		margin-top: -217px;
	}
	
}

@media screen and (max-width: 823px) {
	
	.inner-box3 {
		padding-bottom: 25px;
	}
	
	.step4 {
		margin-top: -242px;
	}
	
}


@media screen and (max-width: 767px) {
	
	.main {
		width: 85%;
		margin-left: 7.5%;
	}
	
	.borrow-button {
		margin-top: 20px;
	}
	
}

@media screen and (max-width: 722px) {
	
	.inner-box2 {
		padding-bottom: 0px;
	}
	
	.step2 {
		margin-top: -267px;
	}
	
}

@media screen and (max-width: 684px) {
	
	.inner-box3 {
		padding-bottom: 0px;
	}
	
	.inner-box4 {
		padding-bottom: 1px;
	}
	
	.step4 {
		margin-top: -243px;
	}
	
}

@media screen and (max-width: 682px) {
	
	.steps-title {
		font-size: 1.40rem;
	}
	
	.inner-box2 {
		padding-bottom: 26px;
	}

	
	.step2 {
		margin-top: -290px;
	}
	
	.step4 {
		margin-top: -240px;
	}
	
	.inner-box4 {
		padding-bottom: 0px;
	}
	
}


@media screen and (max-width: 655px) {
	
	.box-container {
		width: 86%;
		margin-left: 7%;
	}
	
	.steps-title {
		font-size: 1.72rem;
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
	
	.main {
		width: 90%;
		margin-left: 5%;
	}
	
}



@media screen and (max-width: 595px) {
	.main {
		margin-top: 125px;
	}
	
	.title {
		font-size: 2.4rem;
	}
	
	.subtitle {
		font-size: 1.12rem;
	}
	
	.explain {
		margin-top: 70px;

	}

}

@media screen and (max-width: 530px) {
	
	.main {
		width: 96%;
		margin-left: 2%;
	}
	
	.input {
		width: calc(100% - 12px);
	}
	
	.input-notes {
		width: calc(100% - 12px);
	}
	
	.subtitle {
		margin-bottom: 50px;
	}	
	
}

@media screen and (max-width: 505px) {
	.main {
		margin-top: 120px;
	}
	
	.borrow-button {
		margin-top: 10px;
	}
	
}

@media screen and (max-width: 430px) {
	
	.steps-title {
		font-size: 1.5rem;
	}
	
}

@media screen and (max-width: 410px) {
	
	.explain {
		margin-top: 55px;

	}
}


@media screen and (max-width: 370px) {

	.subtitle {
		font-size: 1.08rem;
		margin-bottom: 40px;
	}
	
	.explain {
		margin-top: 50px;
	}
	
	.explain-title {
		font-size: 1.95rem;
	}
	
}

@media screen and (max-width: 350px) {
	.main {
		margin-top: 100px;
	}
		
	.explain-title {
		font-size: 1.87rem;
	}
}

@media screen and (max-width: 335px) {
	.main {
		margin-top: 90px;
	}
		
}

</style>

<style>
@media screen and (max-width: 1550px) {
	
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

@media screen and (max-width: 930px) {
	
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


<body style="margin: 0px; font-family: 'Poppins', sans-serif;">

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

<div class="main">
	<h1 class="title">Borrow Money</h1>
	<h2 class="subtitle"><span class="subtitle-bold">Take out a Loan</span> on Instant Borrow - <span class="subtitle-bold">0% Platform Fees</span>, No <span class="subtitle-bold">Paperwork</span>, Incredibly <span class="subtitle-bold">Fast and Easy</span>.</h2>
		
		<form onsubmit="return validateMyForm();" method="post">
		<p class="form-text">Loan Amount (USD)</p>
		<input name="loan_amount" id="loan" class="input" type="number" min="10" max="2000" required autocomplete="off">
		<p class="form-text">Repayment Amount (USD)</p>
		<input name="repayment_amount" id="repayment" class="input" type="number" min="11" max="4000" required autocomplete="off">
		<div id="text-box" style="color: red;"></div>
		<p class="form-text">Repayment Date</p>
		<input name="repayment_date" id="datefield" class="input" type="date" required min="<?=date('Y-m-d');?>" max="<?=date('Y-m-d',strtotime('now +4 month'));?>">
		</br>
		<p class="form-text">Notes</p>
		<textarea name="notes" class="input-notes" autocomplete="off"></textarea>
		<input name="submit" type="submit" class="borrow-button" value="Borrow Money" formaction="signup-borrow.php">
		</form>
		
		
	
	
		
		<div class="under-container">
			<a href="#explain"><button class="how-to">How to Borrow?</button></a>
			<div class="lend-button-container"><a href="index.php"><button class="lend-button">Lend Money</button></a></div>
		</div>

		<div class="explain">
			<a href="borrower-info.php" style="text-decoration: none;" target="blank"><h3 class="explain-title">Take out a Loan on Instant Borrow&nbsp;<span class="link-round">🡕</span></h3></a>
			
			<p style="font-weight: 500; font-size: 1.28rem; margin-top: 50px; color:#2b80ff;">Welcome to the World of Peer-to-Peer Finance.</p> 
			
			<p style="font-weight: normal;">Instant Borrow connects Borrowers directly with Lenders and eliminates the need for Banks or other Financial Institutions.</br>Keep total Control over your Funds, Transact Directly with other Users and Forget about lengthy Approval Processes and High Fees.</p>

			<p style="font-weight: 500; font-size: 1.28rem; color:#2b80ff;">The Easiest Way to Get a Loan Right Now, No Matter Your Credit Score.</p>
			
			<p class="explain-howto">THIS IS HOW TO DO IT:</p>
			
			<div class="step1"><h3 class="steps-title">1-CREATE AN ACCOUNT</h3><div class="inner-box1"><p class="steps-subtitle ">Sign Up and Verify your Account</p><p>What you Need to <span class="explain-bold">Get Started</span>:</br>-Valid <span class="explain-bold">Email Address</span></br>-<span class="explain-bold">Phone Number</span></br>-Form of <span class="explain-bold">Identification</span></p></div></div>
			<div class="step2"><h3 class="steps-title">2-REQUEST A LOAN</h3><div class="inner-box2"><p class="steps-subtitle">Create a Loan request:</p><p>The <span class="explain-bold">Amount</span> you Want to <span class="explain-bold">Borrow</span></br>The <span class="explain-bold">Amount</span> you Will <span class="explain-bold">Repay</span></br>The  <span class="explain-bold">Repayment Date</span></br><span class="explain-bold">Notes</span> About the Loan</p></div></div>
			<div class="step3"><h3 class="steps-title">3-RECEIVE MONEY</h3><div class="inner-box3"><p class="steps-subtitle">When your Loan is Granted:</p><p>Lender Sends <span class="explain-bold">Payment</span></br><span class="explain-bold">Confirm</span> Funds Have Been Received</p></div></div>
			<div class="step4"><h3 class="steps-title">4-REPAY</h3><div class="inner-box4"><p class="steps-subtitle">On (Or Before) the Repayment Date:</p><p><span class="explain-bold">Send Funds</span> to the Borrower</br><span class="explain-bold">Confirm</span> the Transaction was Made</p></div></div>
			
			<p class="explain-text-bottom" style="margin-top: 60px;">All payments are Confirmed by Instant Borrow and are Protected with Advanced security Measures. The Marketplace is closely Monitored and all Users are Verified to ensure a safe Trading Environment.</p>
			
			
			<p class="explain-text-bottom">Personnal Information is Fully Protected by Instant Borrow and is only Given to the Lender if the Borrower fails to Repay his Loan.</p>

			<p class="explain-text-bottom">If you have any Questions, please <a href="contact.php" target="blank" style="color: #3d91e0; text-decoration: none;">Contact Us</a> or Read our User Guides at the Bottom of the Page. We'll always be there for you!</p>

			<h3 class="bottom-text">Borrowing Money on Instant Borrow is Safe, Easy and Fast - Experience the Next Revolution in the world of Finance and get all the Funds you Need in Record Time</h3>
		</div>
</div>

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>


<script>

function validateMyForm()
{
    var mrp = parseFloat($('#loan').val());
    var id = parseFloat($('#repayment').val());

    if (mrp >= id) {
    document.getElementById('text-box').innerHTML = "Repayment Amount must be larger than Loan Amount!";
    return false;
  }

  return true;
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


</body>

</html>
