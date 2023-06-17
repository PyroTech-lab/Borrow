<?php
require('actions/questions/BannedUserRepayLoanAction.php');
require('actions/questions/updateDatabases.php');
?>

<?php
if(!isset($_SESSION['banned'])){
    header('Location: index.php');
}
?>

<?php
	if(isset($Loannotfound)){ 
	header('Location: loannotfound-banned.php');
	}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Instant Borrow</title>

<!-- icons generatoed with https://favicomatic.com/ -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/images/icons/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/images/icons/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/images/icons/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/images/icons/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/images/icons/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="assets/images/icons/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

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
	margin-left: calc(100% - 207px);
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
	margin-top: -22px;
	margin-left: calc(100% - 67px);
}

.logout-button {
	height: 20px;
	width: auto;
	transition: transform 0.2s;
}

.chat-header {
	height: 25px;
	width: auto;
	transition: transform 0.2s;
}

.logout-button:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.chat-header:hover {
	-ms-transform: scale(1.1); /* IE 9 */
	-webkit-transform: scale(1.1); /* Safari 3-8 */
	transform: scale(1.1); 
}

.everything-except-header {
	position: absolute;
	width: 100%;
}

.main {
	margin-top: 80px;
	margin-left: 10%;
	width: 80%;
	background-color: #f7f7f7;
}


.banned {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 100%;
	height: 245px;
}

.loan-recap {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 49%;
	height: 300px;
	margin-top: 50px;
}

.chat-div {
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
	width: 49%;
	height: 200px;
	margin-top: 50px;
}


.subtitle {
	font-weight: bold;
	margin-top: 20px;
	margin-bottom: 30px;
	font-size: 1.8rem;
	color: #00c4ff;
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
	margin-top: -237px;
}

.subtext1 {
	font-weight: bold;
	font-size: 1.8rem;
	color: #00c4ff;
}

.subtext2 {
	font-weight: bold;
	font-size: 1.2rem;
	color: #00c4ff;
}


.subtitle-chat {
	font-weight: bold;
	margin-top: 20px;
	margin-bottom: 5px;
	margin-left: 20px;
	font-size: 1.8rem;
	color: #00c4ff;
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
	padding: 10px;
	border-radius: 0.325rem;
	font-weight: bold;
	font-size: 1.02rem;
	color: white;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	transition: transform .2s;
}

.chat-button:hover {
	background-color: #00c4ff;
	-ms-transform: scale(1.05); /* IE 9 */
	-webkit-transform: scale(1.05); /* Safari 3-8 */
	transform: scale(1.05); 
}

.payment {
	margin-top: -554px;
	margin-left: 51%;
	margin-bottom: 80px;
	width: 49%;
	height: 552px;
	border-radius: 0.425rem;
	background-color: #fcfcfc;
	box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
	border: 1px solid #00c4ff;
}


.select-method {
	padding: 20px;
	width: calc(100% - 40px);
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

.payment-box-title {
	font-weight: bold;
	font-size: 1.35rem;
	color: #2b80ff;
}

.payment-box-bold {
	font-weight: bold;
	color: #2b80ff;
	font-size: 1.2rem;
}

.input-container {
	width: 50%;
	margin-top: 50px;
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
	font-size: 1.02rem;
	font-weight: bold;
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



.success {
	margin-top: 40px;
	color: white;
	background-color: #12d400;
	border: 1px solid #12d400;
	text-align: center;
	border-radius: 0.325rem;
	font-weight: bold;
}


</style>

</head>


<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f7f7f7;">



<div class="everything-except-header">

<div class="main">
	
	<div class="banned">
	<p class="subtitle" style="margin-left: 20px;">You Have been Banned From Instant Borrow</p>
	<div class="column-1">
	<p class="text">Reason:</br><span class="subtext1" style="color: red;"><?= $reason_public; ?></span></p>
	<p class="text"><span style="color: #2b80ff; font-weight: 500;"><?= $username_lender; ?></span> Now Has Access to All your Personal Information.</p>
	</div>
	<div class="column-2" style="margin-top: -267px;">
	<p class="text"><span style="color: red; font-weight: 500;">You Must still Repay</span> and Chat with <span style="color: #2b80ff; font-weight: 500;"><?= $username_lender; ?></span>.</p>
	<p class="text">You Will not be Able to Create another Instant Borrow Account.</p>
	</div>
	</div>
	
	<div class="loan-recap">
		<div class="column-1">
		<div class="subtitle"><span>Repayment Recap</span></div>
		<div class="text">You Repay</br><span class="subtext1"><?= $repayment_amount; ?>$</span></div>
		<div class="text">You Lent</br><span class="subtext1"><?= $loan_amount; ?>$</span></div>
		</div>
		<div class="column-2">
		<div class="text">Repayment Deadline</br><span class="subtext2" style="color: red;"><?= date('M jS, Y', strtotime($repayment_date)); ?></span></div>
		<div class="text"  style="margin-top: 24px;">Lender</br><a href="user-profile-yeslogin.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><span class="subtext2"><?= $username_lender; ?></span></a></div>
		</div>
	</div>
	
	<div class="chat-div">
		<div class="subtitle-chat"><span>Chat with <a href="user-profile-yeslogin.php?id=<?= $id_lender; ?>" style="text-decoration: none;" target="blank"><span style="color: #560296;"><?= $username_lender; ?></span></a></span></div>
		<div class="chat-text"><span>Extensive Communication between the Lender and Borrower is highly Recommended.</span></div>
		<a href="" target="blank"><button class="chat-button">Chat with <span><?= $username_lender; ?></span></button></a>
	</div>
	
<div class="payment">
		
				<div class="select-method">
					<p class="subtitle" style="margin-top: 0px;">Select Payment Method</p>
					<span class="payment-method-box" id="paypal-select" onclick="ShowPaypal()" style="display: <?= $paypal_notset; ?>;">Paypal</span><span class="payment-method-box" id="cashapp-select" onclick="ShowCashapp()" style="display: <?= $cashapp_notset; ?>;">Cashapp</span><span class="payment-method-box" id="venmo-select" onclick="ShowVenmo()" style="display: <?= $venmo_notset; ?>;">Venmo</span><span class="payment-method-box" id="zelle-select" onclick="ShowZelle()" style="display: <?= $zelle_notset; ?>;">Zelle</span><span class="payment-method-box" id="chime-select" onclick="ShowChime()" style="display: <?= $chime_notset; ?>;">Chime</span>
				</div>
				
				<div class="payment-box" id="paypal">
					<span class="payment-box-title">Paypal</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Paypal Address: <span style="color: #3d91e0;"><?= $paypal; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div class="input-container">
					<span>Paypal Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Paypal Transaction ID" name="paypal_id" required autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_paypal">
					</div>
					</form>
				
	
				<?php
				if(isset($error_message_paypal)){ 
				echo $error_message_paypal;
				}
				?>
				</div>
				
				<div class="payment-box" id="cashapp">
					<span class="payment-box-title">Cashapp</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Cashapp Address: <span style="color: #3d91e0;"><?= $cashapp; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div class="input-container">
					<span>Cashapp Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Cashapp Transaction ID" required name="cashapp_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_cashapp">
					</div>
					</form>
				</div>
				
				<div class="payment-box" id="venmo">
					<span class="payment-box-title">Venmo</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Venmo Address: <span style="color: #3d91e0;"><?= $venmo; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div class="input-container">
					<span>Venmo Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Venmo Transaction ID" required name="venmo_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_venmo">
					</div>
					</form>
				</div>
				
				<div class="payment-box" id="zelle">
					<span class="payment-box-title">Zelle</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Zelle Address: <span style="color: #3d91e0;"><?= $zelle; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div class="input-container">
					<span>Zelle Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Zelle Transaction ID" required name="zelle_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_zelle"> 
					</div>
					</form>
				</div>
				
				<div class="payment-box" id="chime">
					<span class="payment-box-title">Chime</span>
					<p><span style="color: #3d91e0;"><?= $username_lender; ?>'s</span> Chime Address: <span style="color: #3d91e0;"><?= $chime; ?></span></p>
					<p>Amount to Send:</br><span class="payment-box-bold"><?= $repayment_amount; ?>$</span></p>
					<p>Instant Borrow Fee:</br><span class="payment-box-bold">0$</span></p>
					<form method="post">
					<div class="input-container">
					<span>Chime Transaction ID</span>
					</br>
					<input class="input" type="input" placeholder="Enter Chime Transaction ID" required name="chime_id" autocomplete="off">
					</div>
					<div class="button-container">
					<span class="submit-text">Confirm Repayment Has Been Sent</span>
					</br>
					<input class="submit-button" type="submit" value="Repayment Sent" name="payment_chime">
					</div>
					</form>
				</div>
			
				
				<?php
				if(isset($success_message)){ 
				echo $success_message;
				}
				?>
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

</body>

</html>
