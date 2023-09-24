<?php
require('actions/users/login_LendAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/ForgotPassword.php');
?>

<?php
if(isset($_SESSION['auth'])){
    header('Location: lend-panel.php?id='.$_GET['id'].'');
}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Login - Instant Borrow</title>

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

.main {
	width: 540px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 13vh;
	height: 500px;
	border-radius: 0.325rem;
	box-shadow: 0px 0px 15px 2px rgba(92, 125, 209, 0.5);
}

.text {
	position: absolute;
	width: 400px;
	margin-top: 30px;
	margin-left: 70px;
	font-size: 0.9rem;
	font-weight: 500;
	color: #383838;
	text-align: left;
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
	padding-left: 7px;
	font-size: 1.06rem;
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
	background-color: rgba(0, 196, 255, 0.05);
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}


.label-container {
	width: calc(100% - 7px);
	margin-top: -40px;
	margin-bottom: 70px;
	text-align: right;
}

.label-image {
	height: 13px;
	width: auto;
	position: absolute;
	margin-left: -20px;
}

.checkmark {
  height: 18px;
  width: 18px;
}

.forgot-link {
	border: 0;
	background-color: transparent;
	color: #2b80ff;
	font-weight: bold;
	font-size: 0.93rem;
}

.forgot-link:hover {
	color: #00c4ff;
}

.return-link {
	margin-top: 20px;
	border: 0;
	background-color: transparent;
	color: #2b80ff;
	font-weight: bold;
	font-size: 0.93rem;
}

.return-link:hover {
	color: #00c4ff;
}

.login-button {
	margin-top: 50px;
	margin-bottom: 10px;
	width: 101.5%;
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

.login-button:hover {
	background-color: #2b80ff;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}

.under-container {
	margin-top: 30px;
	color: #383838;
	font-size: 0.92rem;
	font-weight: 500;
}

.error-message {
	color: red;
	text-align: left;
	font-size: 0.96rem;
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

</style>

<style>

@media screen and (max-width: 570px) {	
	
	.main {
		width: 100%;
		border: 0px;
		margin-top: 0px;
		box-shadow: 0 0 0 0;
		height: 450px;
	}
	
	.text {
		width: 80%;
		margin-left: 10%;
	}
	
	.under-container {
		text-align: left;
		margin-top: 0px;
		margin-left: 10%;
	}
}

@media screen and (max-width: 450px) {	
	
	
	.text {
		width: 85%;
		margin-left: 7.5%;
	}
	
	.under-container {
		margin-left: 7.5%;
	}
}

@media screen and (max-width: 340px) {	
	
	
	.text {
		width: 90%;
		margin-left: 5%;
	}
	
	.under-container {
		margin-left: 5%;
	}
}

</style>

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif; text-align: center;">

<div class="main">
	<div class="text">
		<div style="display: <?= $BodyDisplay; ?>;">
			<p style="font-size: 1.4rem; font-weight: 500;">Sign In to Lend Money</p>
			<form method="post">
			<p style="margin-top: 40px;">Email</p>
				<input class="input" type="email" name="email" required autocomplete="off">
				<p style="margin-top: 20px;">Password</p>
				<input class="input" id="input" type="password" name="password" required>
				<div class="label-container"><label for="showPassword" class="label"><img src="assets/images/show-password.jpg" class="label-image"><input id="showPassword" type="checkbox" onclick="ShowPasswordFunction()" style="display: none;"></label></div>
				<input type="submit" class="login-button" name="login" value="login">
			</form>
			<div style="margin-top: -220px; text-align: right;"><form method="post"><input type="submit" value="Forgot Password?" name="forgot_password" class="forgot-link"></input></form></div>
			<div style="margin-top: 210px;"><?php if(isset($errorMsg)){ echo '<p class="error-message">'.$errorMsg.'</p>'; } ?></div>
		</div>
		<div style="display: <?= $ForgotFormDisplay; ?>;">
			<p style="font-size: 1.4rem; font-weight: 500;">Forgot Password</p>
			<form method="post">
				<p style="margin-top: 40px;">Email</p>
				<input class="input" type="email" style="margin-bottom: -50px;" name="recovery_email" required autocomplete="off">
				<input type="submit" class="login-button" name="continue" value="Continue">
				<?php if(isset($email_required )){ echo '<p class="error-message">'.$email_required .'</p>'; } ?>
			</form>
			<form method="post" style="text-align: center;">
				<input type="submit" value="Return to Login" name="return" class="return-link"></input>
			</form>
		</div>
		<div style="display: <?= $EnterCodeDisplay; ?>;">
			<p style="font-size: 1.4rem; font-weight: 500;">Enter your Code</p>
			<p style="margin-top: 40px;">A 6-Digit Code was sent to your Email Address</p>
			<form method="post">
				<input value="<?php if(isset($_POST['recovery_email'])) echo $_POST['recovery_email'] ?>" name="recovery_email_repeat" type="hidden">
				<p style="margin-top: 40px;">Verification Code</p>
				<input class="input" type="number" style="margin-bottom: -50px;" name="verification_code" required autocomplete="off">
				<input type="submit" class="login-button" name="submit_code" value="Submit">
				<?php if(isset($wrong_code )){ echo '<p class="error-message">'.$wrong_code .'</p>'; } ?>
			</form>
		</div>
		<div style="display: <?= $CreateNewCodeDisplay; ?>;">
			<p style="font-size: 1.4rem; font-weight: 500;">Set New Password</p>
			<form method="post">
			<input value="<?php if(isset($_POST['recovery_email_repeat'])) echo $_POST['recovery_email_repeat'] ?>" name="recovery_email_repeat_2" type="hidden">
				<input value="<?php if(isset($_POST['verification_code'])) echo $_POST['verification_code'] ?>" name="verification_code_repeat" type="hidden">
				<p style="margin-top: 40px;">New Password</p>
				<input class="input" id="input2" type="password" name="new_password" required>
				<div class="label-container"><label for="showPassword2" class="label"><img src="assets/images/show-password.jpg" class="label-image"><input id="showPassword2" type="checkbox" onclick="ShowPasswordFunction2()" style="display: none;"></label></div>
				<input style="margin-top: -1px;" type="submit" class="login-button" name="submit_new_password" value="Confirm">
				<?php if(isset($errorMsg )){ echo '<p class="error-message">'.$errorMsg .'</p>'; } ?>
			</form>
		</div>
	</div>
</div>

<div class="under-container">
	<p>Don't have an account? <a href="signup-lend.php" style="text-decoration: none; color: #00c4ff;">Sign Up</a></p>
</div>

<script>
function ShowPasswordFunction() {
  var x = document.getElementById("input");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function ShowPasswordFunction2() {
  var x = document.getElementById("input2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>

</html>
