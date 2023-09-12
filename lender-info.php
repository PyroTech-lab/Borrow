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
	background-color: #f7f7f7;
}

.pretitle-bottom {
	font-size: 1.2rem;
	color: #4f4f4f;
	margin-bottom: -35px;
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

.footer-bottom-text {
	font-size: 0.86rem;
	color: #2b2b2b;
}

</style>

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f7f7f7;">
  
<div class="header">
	<div class="header-text">
		<div class="logo"><a href="about.php" style="text-decoration: none; color: black"><img src="assets/images/logo.png" class="logo-image"></a></div>
		<div class="lend"><a href="index.php" style="text-decoration: none; color: black"><span class="lend-text">Lend</span></a></div>
		<div class="borrow"><a href="borrow.php" style="text-decoration: none; color: black"><span class="borrow-text">Borrow</span></a></div>
		<div class="login"><a href="login.php" style="text-decoration: none; color: black"><span class="login-text">Login</span></a></div>
		<div class="signup"><a href="signup.php" style="text-decoration: none; color: black"><span class="signup-text">Sign Up</span></a></div>
	</div>
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
		
<div style="text-align: left; margin-top: -370px;">
<img class="" src="assets/images/repayment-received.png" alt="Request amount" style="margin-left: 14%;">
</div>

<div style="text-align: right; margin-top: -40px;">
<img class="" src="assets/images/profit-curve.png" alt="Choose Loan Amount" style="margin-right: calc(10% + 50px);">
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
				<picture><source srcset="assets/images/profile-2.png" type="image/png"><img class="img-fluid image-1 webpexpress-processed" src="assets/images/profile-2.png" alt="your loan request is being sent to Instant Borrow Lenders"></picture>
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
				<picture><source srcset="assets/images/lend-money.png" type="image/png"><img class="img-fluid image-1 webpexpress-processed" src="assets/images/lend-money.png" alt="Explore offers"></picture>
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
				<picture><source srcset="assets/images/send-international-lend.png" type="image/png"><img class="img-fluid image-1 webpexpress-processed" src="assets/images/send-international-lend.png" alt="Send Money Worldwide with no Fees"></picture>
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
                <picture><source srcset="assets/images/request-published-lend.png" type="image/png"><img class="img-fluid image-1 webpexpress-processed" src="assets/images/request-published-lend.png" alt="borrower Money online Step-1"></picture>
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
                <picture><source srcset="assets/images/profile-lend.png" type="image/png"><img class="img-fluid image-1 webpexpress-processed" src="assets/images/profile-lend.png" alt="Explore offers"></picture>
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
                <picture><source srcset="assets/images/payment-amount-lend.png" type="image/png"><img class="img-fluid image-1 webpexpress-processed" src="assets/images/payment-amount-lend.png" alt="borrower money online step-3"></picture>
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
            <div class="section3-images" style="margin-bottom: 150px;">
				<picture><source srcset="assets/images/repayment-received-2.png" type="image/png"><img class="img-fluid image-2 webpexpress-processed" src="assets/images/repayment-received-2.png" alt="borrower money online step-4"></picture>
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
			<div class="footer-bottom-text"><span>Copyright © 2023 - <?= date("Y"); ?> Instant Borrow. All rights reserved.</span></div>
		</div>
	</div>
</div>

</div>

</body>
</html>