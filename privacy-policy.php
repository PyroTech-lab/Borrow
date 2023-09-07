<?php
require('actions/questions/updateDatabases.php');
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="index" />

<meta name="description" content="Instant Borrow Privacy Policy - Find out how we process your Data and Personal Information. Rest assured knowing your Data is stored Securely and Privately.">	

	
	<title>Privacy Policy - Instant Borrow</title>

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

.message-container {
	margin-top: 200px;
	margin-left: 10%;
	margin-bottom: 120px;
	width: 80%;
}

.message-title {
	font-size: 2.85rem;
	font-weight: bold;
	color: #00c4ff;
	text-align: center;
}

.message-subtitle {
	margin-top: -10px;
	font-size: 1.85rem;
	font-weight: bold;
}

.message-button {
	margin-top: 50px;
	background-color: #2b80ff;
	color: white;
	font-weight: bold;
	font-size: 1.65rem;
	border-radius: 0.125rem;
	border: 0px;
	padding: 10px;
	outline: 1px solid #2b80ff;
	transition: background-color 0.2s;
}

.message-button:hover {
	background-color: #00c4ff;
	outline: 1px solid #00c4ff;
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


<div class="message-container">

<h1 class="message-title">Instant Borrow Privacy Policy</h1>

<p>Note: By creating a Profile, you are consenting to this Privacy Policy, meaning you give us permission to use your data as described herein. Although your consent is voluntary, without it, we will not be able to provide you with access to the Platform.

Federal law gives consumers the right to limit some but not all sharing. Federal law also requires us to tell you how we collect, share, and protect your personal information. Please read this notice carefully to understand what we do.

Lendee APP LLC, a Delaware corporation, together with its applicable subsidiaries, affiliates, assignees, and successors (collectively, “Lendee“, “we“, “us” or “our“) are committed to your personal privacy and your security online. This Privacy Policy describes the ways we collect, use, share, and protect your personal information.

Information We Collect About You
We collect information about you in the following ways:

Information You Provide: To use Lendee’s website [Lendee.com] (the “Platform“), whether as a prospective borrower or a prospective lender, you will be required to create a user profile (a “Profile”), which will include furnishing Personal Information, which may include your name, email address, mailing address, telephone number and Social Security Number. If you are interested in obtaining a loan, you will also be required to provide additional financial information, which may include income, employment, and bank account information. To verify your identity and the information that you have been provided, you may also be asked to scan and upload images of certain documents, including your driver’s license or other form of identification.

Information from Third Parties: Third parties, such as credit bureaus and social media platforms, may provide us with information related to you. We may combine this information with information we already have about you to assist prospective lenders in evaluating your loan request or for similar purposes.

Information from Your Use of the Platform: We may collect additional behavioral information based on your use of the Platform. This may include information regarding the performance of loans you obtain on the Platform, as well as history of Applications or Loan offers, and more general information such as device information and log-in information. Lendee uses cookies when you access your Profile to keep track of your session, authenticate your account, and detect fraud. You can control the use of cookies within your web browser; however, if you reject cookies, your ability to use some features or areas of the Platform may be limited.

How Long We Retain Information We Collect
We will retain your information for the period necessary to fulfill the purposes outlined in this Privacy Policy, or as necessary to comply with legal obligations and our backup, archival, and audit procedures.

How We Use Information We Collect
Information we collect from you may be used in one or more of the following ways:

To verify your identity and age as well as to guard against potential fraud;

To obtain, with your authorization, third-party data from credit bureaus, social media sites, or others in connection with your loan request;

To personalize your experience using the Platform;

To provide customer service and to send regular communications regarding your transactions and related offers;

To enable our service providers to provide you with services, such as funds payments, billing, and collection activities, as needed;

To market additional products and services to you;

To improve the Platform and to develop or offer new products and services;

To enforce agreements with you;

To comply with a court order, legal process, or applicable law, including retaining personal data or responding to any government or regulatory request; and/or

For any other purpose for which you provide your consent.

Information We Share
We may share information with third parties for everyday business purposes, including:

Other Lendee users that are interested in considering your loan request, including but not limited to those Lendee users that ultimately fund your loan request (the “Lender“);

Our banking partners, and other third party service providers, including our software provider, and debt collection companies.

Credit bureaus to report repayment status of loans made through the Platform, as permitted by law; and

Government officials, including law enforcement, when we are subject to subpoena, court order or similar legal procedures or we need to do so to comply with law.

Lendee will not sell or license any of your personal information to third parties for their marketing purposes and will only share your personal information with third parties as described above. We may share aggregated, non-identifiable user information with third parties, such as advertisers and content distributors.

Third Party Data Collection
Some content on the Platform may be provided by third parties, including advertisers, analytics companies, and application providers, which may use cookies or other tracking technologies to collect information about you on the Platform. If you have any questions about an advertisement or related content, you should contact the third party provider directly as they may give you the option to not have your information collected or used for targeted advertising.

Compliance with State and Federal Laws
This Privacy Policy may not constitute your entire set of privacy rights, as these may also vary from state to state. To be certain of your privacy rights, you may wish to contact the appropriate agency in your state charged with overseeing privacy rights for consumers.

Modifications to This Policy
Lendee may update this Privacy Policy from time to time as it deems necessary in its sole discretion. By using or accessing the Platform, you agree that we may modify this policy at any time without prior notice. If there are material changes to this Privacy Policy, we will provide notice where and in the manner required by applicable law, including but not limited to, through the Lendee website. The last modified date at the bottom of this page reflects the most recent version of the Privacy Policy.

Your continued use of the Platform after any modification of this policy shall constitute your agreement to be bound by any such changes. We will, however, seek your consent to future modifications to the extent we are required by applicable law.

How You Can Contact Us
You may either log in to your Profile on the Platform or email us at support@Lendee.com to request access to, correct, or delete any personal information that you have provided to us or to exercise any other data protection right to which we are subject under applicable law, statute, or regulation. Please note that we may not accommodate a request to change information if we believe the change would violate any law or legal requirement or cause the information to be incorrect. You may also contact us at the following: submit a request here.

If you have any questions or concerns regarding this Privacy Policy, please contact us by emailing us at support@Lendee.com.</p>

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
			<a href="https://reddit.com" class="footer-link" target="blank"><img class="widget" src="assets/images/reddit-widget.png"></a>
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
