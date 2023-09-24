<?php
require('actions/questions/updateDatabases.php');
?>


<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="index" />

<meta name="description" content="Lend on Instant Borrow. Get Big Returns in Record time. Discover our innovative Lending process and enjoy the best Platform on the Market. Start now with 10$.">
	
<title>Best Platform to Lend Money Online with Big Returns - Instant Borrow</title>

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

.image-left-container {
	text-align: left;
	margin-top: -370px;
}

.image-right-container {
	text-align: right;
	margin-top: -40px;
}

.image-left {
	margin-left: 14%;
}

.image-right {
	margin-right: calc(10% + 50px);
}


.section-title {
	font-weight: 500;
	font-size: 2.82rem;
	margin-bottom: 200px;
}

.section2 {
	 background-color: black;
	 color: white;
	 margin-top: 150px;
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
	margin-top: 150px;
	background-color: #f7f7f7;
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
		margin-left: calc(50% - 600px);
	}

	.image-right {
		margin-right: calc(50% - 620px);
	}
	
	.content {
		width: 700px;
		margin-left: calc(50% - 350px);
	}
	
}

@media screen and (max-width: 1275px) {

	.section2-container {
		margin-left: calc(50% - 540px);
		width: 550px;
	}

	.section2-images {
		margin-left: calc(50% + 20px);
	}
	
	.section3-container {
		margin-left: calc(50% - 520px);
		width: 550px;
	}

	.section3-images {
		margin-left: calc(50% + 80px);
	}

}

@media screen and (max-width: 1240px) {

	.image-left-container {
		margin-top: -170px;
	}
	
	.image-right-container {
		margin-top: -170px;
	}
	
	.image-left {
		margin-left: calc(50% - 500px);
	}

	.image-right {
		margin-right: calc(50% - 550px);
	}
	
}

@media screen and (max-width: 1140px) {

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
		margin-left: calc(50% - 500px);
		width: 550px;
	}

	.section2-images {
		margin-left: calc(50% + 50px);
	}
	
	.section3-container {
		margin-left: calc(50% - 500px);
		width: 550px;
	}

	.section3-images {
		margin-left: calc(50% + 50px);
	}

}

@media screen and (max-width: 1100px) {

	.image-left-container {
		margin-top: -110px;
	}
	
	.image-right-container {
		margin-top: -140px;
		margin-bottom: -50px;
	}
	
	.image-left {
		margin-left: calc(50% - 420px);
	}

	.image-right {
		margin-right: calc(50% - 420px);
	}
	
}

@media screen and (max-width: 1050px) {
	
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

@media screen and (max-width: 840px) {
	
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
		margin-top: 10px;
	}
	
	.image-right-container {
		margin-top: -220px;
	}
	
	.image-left {
		margin-left: calc(50% - 250px);
	}

	.image-right {
		margin-right: calc(50% - 270px);
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

@media screen and (max-width: 560px) {
	
	
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

@media screen and (max-width: 550px) {
	
	.image-left {
		margin-left: calc(50% - 20px);
	}

	.image-right-container {
		margin-left: calc(50% - 550px);
		position: relative;
		z-index: -1;
	}
	
	.bottom {
		margin-top: 70px;
	}
	
}

@media screen and (max-width: 500px) {
	
	
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
	
	.image-left {
		margin-left: calc(50% - 40px);
	}

	.image-right-container {
		margin-left: calc(50% - 510px);
		position: relative;
		z-index: -1;
	}
	
}

@media screen and (max-width: 420px) {
	
	.button {
		width: 300px;
	}
	
	.image-left {
		display: none;
	}

	.image-right-container {
		margin-left: 0%;
		width: 100%;
		text-align: center;
		margin-top: 0px;
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

<div class="main">
      
<section class="section1">

        <div class="content">
            <h1 class="title">Lend Money with High Returns.</br>Fast, Safe and Easy</h1>
            <p class="subtitle">Do you want to <span style="color: #00c4ff; font-weight: 500;">Lend Money with returns over 20%</span>? With Instant Borrow, you'll get Access to a Large Pool of Borrowers needing your Money. Start Investing with <span style="color: #00c4ff; font-weight: 500;"> as Little as 10$</span> and watch your Money grow <span style="color: #00c4ff; font-weight: 500;">Quickly, Safely and Easily</span>.</p>
			<p style="font-weight: 500; font-size: 1.15rem; margin-top: 30px;">Sign Up in less than 30 Seconds and Start Lending Now.</p>
        </div>
		<div class="button-container">
           <a style="text-decoration: none;" href="index.php"><button class="button">Start Now</button></a>
        </div>
		
		
<div class="image-left-container">
<img class="image-left" src="assets/images/repayment-received.png" alt="Request amount">
</div>

<div class="image-right-container">
<img class="image-right" src="assets/images/profit-curve.png" alt="Choose Loan Amount">
</div>


</section>

			
<section class="section2">
	<div class="container">
		<div class="section-head">
			<h2 class="section-title">Why Lend on Instant Borrow?</h2>
		</div>
		<div class="row single-feature single-feature-1">
			<div class="">
				<div class="section2-container">
					<p class="section2-title">High Quality Borrowers</br>Low Risk Loans</p>
					<p class="section2-text">Easily <span style="color: #00c4ff; font-weight: 500;">Visualise a Borrower's Profile</span>, Loan History, Trust Score and Feedback to ensure you're dealing with a High Quality Borrower. We always <span style="color: #00c4ff; font-weight: 500;">Verify Personnal Information</span> and make sure all our Users are Completely Trustworthy.<p>
				</div>
			</div>
			<div class="section2-images">
				<picture><source srcset="assets/images/profile-2.png" type="image/png"><img class="image-1" src="assets/images/profile-2.png" alt="your loan request is being sent to Instant Borrow Lenders"></picture>
			</div>
		</div>
		<div class="row single-feature single-feature-2">
			<div class="">
				<div class="section2-container">
					<p class="section2-title">High Profits, Easy Process</p>
					<p class="section2-text">Enjoy the <span style="color: #00c4ff; font-weight: 500;">Highest Profit Rates</span> on the Market and Experience our Incredibly Easy Lending Process.</br>Returns Frequently Exceeding 20% make us the <span style="color: #00c4ff; font-weight: 500;">Best Platform to grow your Money</span> Quickly and Effortlessly.</p>
				</div>
			</div>
			<div class="section2-images">
				<picture><source srcset="assets/images/lend-money.png" type="image/png"><img class="image-2" src="assets/images/lend-money.png" alt="Explore offers"></picture>
			</div>
		</div>
		<div class="row single-feature single-feature-3">
			<div class="">
				<div class="section2-container">
					<p class="section2-title">Lend from All Around the World with no Fees</p>
					<p class="section2-text">Connect with a <span style="color: #00c4ff; font-weight: 500;">Worldwide Network</span> of Borrowers on Instant Borrow.</br>Wichever Country you are in, we charge <span style="color: #00c4ff; font-weight: 500;">no Fees on Transactions</span>, assuring you get the Highest Possible Returns.</p>
				</div>
			</div>
			<div class="section2-images">
				<picture><source srcset="assets/images/send-international-lend.png" type="image/png"><img class="image-3" src="assets/images/send-international-lend.png" alt="Send Money Worldwide with no Fees"></picture>
			</div>
		</div>
	</div>
</section>


<section class="section3">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title">Lend Money and Profit <br> in just a Few Steps</h2>
        </div>
        <div class="row step step-1">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 1</p>
                    <p class="section3-title">Choose Among Hundreds of Loans</p>
					<p class="section3-text">Access a Huge amount of Loan Requests all in One Place. Get all the Details trough our Seamless Interface and Choose the Loan you Like the Most.</p>
                </div>
            </div>
            <div class="section3-images">
                <picture><source srcset="assets/images/request-published-lend.png" type="image/png"><img class="image-4" src="assets/images/request-published-lend.png" alt="borrower Money online Step-1"></picture>
			</div>
        </div>
        <div class="row step step-2">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 2</p>
                    <p class="section3-title">Review Loan & Borrower Details</p>
					<p class="section3-text">With one Tap, Learn everything about the Loan Request and the Borrower. Use the Borrower's Trust Score, Feedback and Past Loans to ensure you're Lending to someone you Trust.</p>
                </div>
            </div>
            <div class="section3-images">
                <picture><source srcset="assets/images/profile-lend.png" type="image/png"><img class="image-5" src="assets/images/profile-lend.png" alt="Explore offers"></picture>
            </div>
        </div>
        <div class="row step step-3">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 3</p>
                    <p class="section3-title">Send Funds and Sit Back</p>
					<p class="section3-text">Choose the Payment Method you want to use and Send the funds to the Borrower. From this point, we take care of Everything Else and you just have to Sit Back and Relax!</p>
                </div>
            </div>
            <div class="section3-images">
                <picture><source srcset="assets/images/payment-amount-lend.png" type="image/png"><img class="image-6" src="assets/images/payment-amount-lend.png" alt="borrower money online step-3"></picture>
			</div>
        </div>
		<div class="row step step-4">
            <div class="">
                <div class="section3-container">
					<p class="section3-pretitle">Step 4</p>
                    <p class="section3-title">Get Repaid, Enjoy the Profit</p>
                    <p class="section3-text">On or Before the Agreed Upon Date, the Borrower will Send you the Repayment. Confirm you have received the Funds, Rate the Borrower and Enjoy the profit!</p>
                </div>
            </div>
            <div class="section3-images">
				<picture><source srcset="assets/images/repayment-received-2.png" type="image/png"><img class="image-7" src="assets/images/repayment-received-2.png" alt="borrower money online step-4"></picture>
			</div>
        </div>
    </div>
</section>


<section class="bottom">
    <div class="container">
		<p class="pretitle-bottom">Taking the Hastle out of Finance</p>
		<p class="title">Because Money Should be Easy!</p>
			
		<div class="button-container">
			<a style="text-decoration: none;" href="index.php"><button class="button">Start Now</button></a>
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

</body>
</html>