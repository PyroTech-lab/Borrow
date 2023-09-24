<?php
require('actions/questions/updateDatabases.php');
require('actions/users/securityAction.php');
require('actions/users/notificationAction.php');
?>


<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Easily Borrow Money Online with No Credit Score - Instant Borrow</title>

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
	text-align: center;
		margin-top: 160px;
}

.content {
	width: 40%;
	margin-left: 30%;
}

.title {
	font-weight: 500;
	font-size: 2.82rem;
}

.subtitle {
	font-size: 1.1rem;
	line-height: 32px;
	color: #4f4f4f;
	margin-top: 60px;
}

.button-container {
	margin-top: 60px;
}

.button {
	width: 350px;
	height: 50px;
	border: 0px;
	border-radius: 0.325rem;
	color: white;
	font-weight: 500;
	font-size: 1.32rem;
	background-color: #2b80ff;
	transition: background-color 0.2s;
}

.button:hover {
	background-color: #00c4ff;
}

.section1 {
	
}

.section-title {
	font-weight: 500;
	font-size: 2.82rem;
	margin-bottom: 200px;
}

.section2 {
	 background-color: black;
	 color: white;
	 margin-top: 205px;
	 padding-top: 100px;
	 padding-bottom: 1px;
}

.section2-container {
	text-align: left;
	width: 30%;
	margin-left: 18%;
	margin-top: 60px;
}

.section2-title {
	font-weight: 500;
	font-size: 2rem;
}

.section2-text {
	font-size: 1.1rem;
	line-height: 32px;
}

.section2-images {
	text-align: right;
	margin-right: 18%;
	margin-top: -300px;
	margin-bottom: 200px;
}



.section3 {
	 background-color: #f7f7f7;
	 color: black;
	 padding-top: 100px;
	 padding-bottom: 1px;
}

.section3-container {
	text-align: left;
	width: 30%;
	margin-left: 18%;
	margin-top: 60px;
}

.section3-pretitle {
	text-transform: uppercase;
	color: #00c4ff;
	font-weight: 500;
	margin-bottom: -30px;
}

.section3-title {
	font-weight: 500;
	font-size: 2rem;
}

.section3-text {
	font-size: 1.1rem;
	line-height: 32px;
}

.section3-images {
	text-align: right;
	margin-right: 18%;
	margin-top: -250px;
	margin-bottom: 200px;
}

.bottom {
	background-color: f7f7f7;
}

.pretitle-bottom {
	font-size: 1.2rem;
	font-weight: 500;
	color: #00c4ff;
	margin-bottom: -35px;
	text-transform: uppercase;
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

	.section2-container {
		margin-left: calc(50% - 590px);
		width: 550px;
	}

	.section2-images {
		margin-left: calc(50% + 90px);
	}
	
	.section3-container {
		margin-left: calc(50% - 570px);
		width: 550px;
	}

	.section3-images {
		margin-left: calc(50% + 150px);
	}

}


@media screen and (max-width: 1725px) {
	
	.image-left {
		margin-left: calc(50% - 650px);
	}

	.image-right {
		margin-right: calc(50% - 620px);
	}
	
	.content {
		width: 700px;
		margin-left: calc(50% - 350px);
	}
	
}

@media screen and (max-width: 1330px) {

	.image-left-container {
		margin-top: -190px;
	}
	
	.image-right-container {
		margin-top: -130px;
	}
	
	.image-left {
		margin-left: calc(50% - 555px);
	}

	.image-right {
		margin-right: calc(50% - 550px);
	}
	
	.image-3 {
		margin-left: -30px;
	}
	
	.image-4 {
		margin-left: -50px;
	}
	
	.image-5 {
		margin-left: -70px;
	}
	
}

@media screen and (max-width: 1275px) {

	.section2-container {
		margin-left: calc(50% - 550px);
		width: 550px;
	}

	.section2-images {
		margin-left: calc(50% + 30px);
	}
	
	.section3-container {
		margin-left: calc(50% - 520px);
		width: 550px;
	}

	.section3-images {
		margin-left: calc(50% + 80px);
	}
	
	.image-3 {
		margin-left: 0px;
	}
	
	.image-4 {
		margin-left: 0px;
	}
	
	.image-5 {
		margin-left: 0px;
	}

}


@media screen and (max-width: 1190px) {

	.image-1 {
		width: 450px;
		height: auto;
	}

	.image-2 {
		width: 450px;
		height: auto;
	}
	
	.image-3 {
		width: 450px;
		height: auto;
	}

	.image-5 {
		width: 450px;
		height: auto;
	}
	

	.section2-container {
		margin-left: calc(50% - 510px);
		width: 550px;
	}

	.section2-images {
		margin-left: calc(50% + 60px);
	}
	
	.section3-container {
		margin-left: calc(50% - 500px);
		width: 550px;
	}

	.section3-images {
		margin-left: calc(50% + 50px);
	}

}

@media screen and (max-width: 1145px) {

	.image-left-container {
		margin-top: -100px;
	}
	
	.image-right-container {
		margin-top: -105px;
		margin-bottom: -50px;
	}
	
	.image-left {
		margin-left: calc(50% - 470px);
	}

	.image-right {
		margin-right: calc(50% - 420px);
	}
	
}

@media screen and (max-width: 1085px) {
	
	.image-1 {
		width: 400px;
		height: auto;
	}

	.image-2 {
		width: 400px;
		height: auto;
	}
	
	.image-3 {
		width: 400px;
		height: auto;
	}
	
	.image-4 {
		width: 400px;
		height: auto;
	}

	.image-5 {
		width: 400px;
		height: auto;
	}
	
	.image-6 {
		width: 400px;
		height: auto;
	}
	

	.section2-container {
		margin-left: calc(50% - 480px);
		width: 550px;
	}

	.section2-images {
		margin-left: calc(50% + 80px);
	}
	
	.section3-container {
		margin-left: calc(50% - 480px);
		width: 550px;
	}

	.section3-images {
		margin-left: calc(50% + 80px);
	}
	
}

@media screen and (max-width: 1000px) {
	
	
	.section2-container {
		margin-left: calc(50% - 275px);
		width: 550px;
		text-align: center;
	}

	.section2-images {
		margin-top: 0px;
		margin-left: 0px;
		width: 100%;
		text-align: center;
	}
	
	.section3-container {
		margin-left: calc(50% - 275px);
		width: 550px;
		text-align: center;
	}

	.section3-images {
		margin-top: 0px;
		width: 100%;
		margin-left: 0px;
		text-align: center;
	}
	
	.image-1 {
		width: auto;
		height: auto;
		margin-left: 0px;
	}

	.image-2 {
		width: auto;
		height: auto;
		margin-left: 0px;
	}
	
	.image-3 {
		width: auto;
		height: auto;
		margin-left: 0px;
	}
	
	.image-4 {
		width: auto;
		height: auto;
		margin-left: 0px;
	}

	.image-5 {
		width: auto;
		height: auto;
		margin-left: 0px;
	}
	
	.image-6 {
		width: auto;
		height: auto;
		margin-left: 0px;
	}
	
	.section-title {
		font-size: 1.9rem;
		margin-top: 0px;
		margin-bottom: 150px;
	}
	
	.section2 {
		padding-top: 40px;
	}
	
	.section3 {
		padding-top: 40px;
	}

	
	.section2-images {
		margin-bottom: 50px;
	}
	
	.section3-images {
		margin-bottom: 50px;
	}
	
	.bottom {
		margin-top: 100px;
	}
	
}

@media screen and (max-width: 980px) {
	
	.main {
		margin-top: 145px;
	}
	
	.subtitle {
		margin-top: 40px;
	}
	
	.button-container {
		margin-top: 30px;
	}

	.image-left-container {
		margin-top: 20px;
	}
	
	.image-right-container {
		margin-top: -180px;
	}
	
	.image-left {
		margin-left: calc(50% - 320px);
	}

	.image-right {
		margin-right: calc(50% - 340px);
	}
	
}

@media screen and (max-width: 730px) {
	
	.main {
			margin-top: 130px;
	}
	
	.content {
		width: 96%;
		margin-left: 2%;
	}
	
	.title {
		font-size: 2.5rem;
	}
	
	.subtitle {
		font-size: 1.08rem;
	}
	
}

@media screen and (max-width: 700px) {
	
	.image-left {
		margin-left: calc(50% - 280px);
	}

	.image-right {
		margin-right: calc(50% - 300px);
		position: relative;
		z-index: -1;
	}
	
}

@media screen and (max-width: 620px) {
	
	.image-left {
		margin-left: calc(50% - 250px);
	}

	.image-right {
		margin-right: calc(50% - 270px);
	}
	
}


@media screen and (max-width: 570px) {
	
	.image-left {
		margin-left: calc(50% - 230px);
	}

	.image-right {
		margin-right: calc(50% - 250px);
		z-index: 1;
	}
	
	.image-right-container {
		margin-top: -115px;
		margin-left: 0%;
		width: 100%;
	}
	
	.image-left-container {
		margin-left: 0%;
		width: 100%;
	}
	
	.section2-container {
		width: 96%;
		margin-left: 2%;
	}
	
	.section3-container {
		width: 96%;
		margin-left: 2%;
	}
	
	.image-3 {
		width: 400px;
		height: auto;
	}
	
}



@media screen and (max-width: 525px) {
	
	
	.image-1 {
		max-width: 96%;
		height: auto;
	}
	
	.image-2 {
		max-width: 96%;
		height: auto;
	}
	
	.image-3 {
		max-width: 96%;
		height: auto;
	}
	
	.image-4 {
		max-width: 96%;
		height: auto;
	}
	
	.image-5 {
		max-width: 96%;
		height: auto;
	}
	
	.image-6 {
		max-width: 96%;
		height: auto;
	}
	
	.section-title {
		font-size: 1.8rem;
		margin-top: 0px;
		margin-bottom: 100px;
	}
	
	.section2 {
		padding-top: 20px;
	}
	
	.section3 {
		padding-top: 20px;
	}
	
	.button-container {
		margin-top: 40px;
		margin-bottom: 40px;
	}
	
	.section2-images {
		margin-bottom: 20px;
	}
	
	.section3-images {
		margin-bottom: 20px;
	}
	
}

@media screen and (max-width: 500px) {
	
	.image-left {
		margin-left: calc(50% - 210px);
	}

	.image-right {
		margin-right: calc(50% - 230px);
		z-index: -1;
	}
	
}

@media screen and (max-width: 460px) {
	
	.image-left {
		margin-left: calc(50% - 190px);
	}

	.image-right {
		margin-right: calc(50% - 210px);
		z-index: -1;
	}
	
}

@media screen and (max-width: 450px) {
	
	
	.main {
			margin-top: 120px;
	}
	
	.title {
		font-size: 2.2rem;
	}
	
	.section-title {
		font-size: 2.2rem;
	}
	
}

@media screen and (max-width: 420px) {
	
	.button {
		width: 300px;
	}


	.image-left {
		margin-left: calc(50% - 170px);
	}

	.image-right {
		margin-right: calc(50% - 190px);
		z-index: -1;
	}
	
}

@media screen and (max-width: 390px) {
	

	.image-left {
		margin-left: calc(50% - 155px);
	}

	.image-right {
		margin-right: calc(50% - 185px);
		z-index: -1;
	}
	
	
}

@media screen and (max-width: 370px) {
	

	.image-left {
		display: none;
	}

	.image-right-container {
		width: 96%;
		margin-left: 2%;
		text-align: center;
		margin-top: 20px;
		padding: 0px;
	}
	
	.image-right {
		margin-left: 0px;
		margin-right: 0px;
		max-width: 100%;
	}
	
	
}

@media screen and (max-width: 359px) {
	
	.title {
		font-size: 2rem;
	}
	
	.section-title {
		font-size: 2rem;
	}
	
	.subtitle {
		font-size: 1rem;
	}
	
}

@media screen and (max-width: 335px) {
	
	.main {
		margin-top: 110px;
	}
	
	.title {
		font-size: 1.8rem;
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

<div class="main">
      
<section class="section1">

        <div class="content">
            <h1 class="title">Access Low Interest Loans.</br>Fast, Safe and Easy</h1>
            <p class="subtitle">Do you need to Quickly <span style="color: #00c4ff; font-weight: 500;">Borrow up to $2000</span>? With Instant Borrow, you'll get Access to a Large Network of Lenders willing to Lend you the Money you need. No matter your <span style="color: #00c4ff; font-weight: 500;">Credit Score</span>, Instant Borrow allows you to Receive a Loan Extremely <span style="color: #00c4ff; font-weight: 500;">Quickly and Easily</span>.</p>
			<p style="font-weight: 500; font-size: 1.15rem; margin-top: 30px;">Follow the Next few Steps and Start Borrowing Now.</p>
        </div>
		<div class="button-container">
           <a style="text-decoration: none;" href="borrow-money.php"><button class="button">Borrow Now</button></a>
        </div>
		
<div class="image-left-container">
<img class="image-left" src="assets/images/loan-amount.png" alt="Choose Loan Amount">
</div>

<div class="image-right-container">
<img class="image-right" src="assets/images/payment-amount.png" alt="Request amount" >
</div>

</section>

			
<section class="section2">
	<div class="container">
		<div class="section-head">
			<h2 class="section-title">Why use Instant Borrow?</h2>
		</div>
		<div class="row single-feature single-feature-1">
			<div class="">
				<div class="section2-container">
					<p class="section2-title">Low credit score? No problem!</p>
					<p class="section2-text">Do you have a <span style="color: #00c4ff; font-weight: 500;">Low Credit Score?</span> No problem! Instant Borrow does not use Credit Scores so that Anyone can get the Loans they need.</br>Maximize your Instant Borrow Trust Score, Impress Lenders and <span style="color: #00c4ff; font-weight: 500;">Get your Money Fast!</span></p>
				</div>
			</div>
			<div class="section2-images">
				<picture><source srcset="assets/images/trustscore.png" type="image/png"><img class="image-1" src="assets/images/trustscore.png" alt="your loan request is being sent to Instant Borrow Lenders"></picture>
			</div>
		</div>
		<div class="row single-feature single-feature-2">
			<div class="">
				<div class="section2-container">
					<p class="section2-title">Loans at your Own rate</p>
					<p class="section2-text">With Instant Borrow, <span style="color: #00c4ff; font-weight: 500;">Decide the Interest Rate</span> and Repayment Date of your Own Loan.</br>We give you the Power to <span style="color: #00c4ff; font-weight: 500;">Control all Aspects of your Loan</span> and Choose what's Best for you.</p>	
				</div>
			</div>
			<div class="section2-images">
				<picture><source srcset="assets/images/borrow-money.png" type="image/png"><img class="image-2" src="assets/images/borrow-money.png" alt="Explore offers"></picture>
			</div>
		</div>
		<div class="row single-feature single-feature-3">
			<div class="">
				<div class="section2-container">
					<p class="section2-title">Borrow from All Around the World with no Fees</p>
					<p class="section2-text">Connect with a <span style="color: #00c4ff; font-weight: 500;">Worldwide Network</span> of Lenders on Instant Borrow.</br>Wichever Country you are in, we charge <span style="color: #00c4ff; font-weight: 500;">no Fees on Transactions</span>, assuring you get the Best possible Rates.</p>
				</div>
			</div>
			<div class="section2-images">
				<picture><source srcset="assets/images/send-international.png" type="image/png"><img class="image-3" src="assets/images/send-international.png" alt="Send Money Worldwide with no Fees"></picture>
			</div>
		</div>
	</div>
</section>


<section class="section3">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title">Get the Money you Need <br> in just a Few Steps</h2>
        </div>
        <div class="row step step-1">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 1</p>
                    <p class="section3-title">Create a Convincing profile</p>
                    <p class="section3-text">Complete your Profile details by adding Information about Yourself. The more Details you enter, the Higher the Chances of getting a Loan Are.</p>
                </div>
            </div>
            <div class="section3-images">
                <picture><source srcset="assets/images/profile.png" type="image/png"><img class="image-4" src="assets/images/profile.png" alt="borrower Money online Step-1"></picture>
			</div>
        </div>
        <div class="row step step-2">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 2</p>
                    <p class="section3-title">Create a Loan Request</p>
                    <p class="section3-text">Select the Amount you want to Borrow and Repay, choose a Repayment Date and Publish the Request. Your Loan will Instantly be Visible to our large Network of Lenders.</p>
                </div>
            </div>
            <div class="section3-images">
                <picture><source srcset="assets/images/publish-request.png" type="image/png"><img class="image-5" src="assets/images/publish-request.png" alt="Explore offers"></picture>
            </div>
        </div>
        <div class="row step step-3">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 3</p>
                    <p class="section3-title">Lenders Receive your Loan Request</p>
                    <p class="section3-text">Once you've Published your Loan, Lenders will Immediately Receive your Request and Fulfill It as Quickly as possible.</p>
                </div>
            </div>
            <div class="section3-images">
                <picture><source srcset="assets/images/request-published.png" type="image/png"><img class="image-6" src="assets/images/request-published.png" alt="borrower money online step-3"></picture>
			</div>
        </div>
		<div class="row step step-4">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 4</p>
                    <p class="section3-title">Get your Money Quickly and Easily!</p>
                    <p class="section3-text">Once a Lender Accepts your Request, Money will be Transferred Directly to the Account of your Choice. Get the funds you need Quickly and Easily!</p>
                </div>
            </div>
            <div class="section3-images">
				<picture><source srcset="assets/images/loan-received.png" type="image/png"><img class="image-7" src="assets/images/loan-received.png" alt="borrower money online step-4"></picture>
			</div>
        </div>
    </div>
</section>


<section class="bottom">
    <div class="container">
		<p class="pretitle-bottom">Taking the Hastle out of Finance</p>
		<p class="title">Because Money Should be Easy!</p>
			
		<div class="button-container">
			<a style="text-decoration: none;" href="borrow-money.php"><button class="button">Borrow Now</button></a>
		</div>
    </div>
</section>


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
