<?php
require('actions/questions/updateDatabases.php');
require('actions/users/adminAction.php');
require('actions/users/adminSignupAction.php');
?>

<?php
if(!isset($_SESSION['admin'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="robots" content="noindex" />
	
<title>Administrator - Instant Borrow</title>

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

.everything-except-header {
	position: absolute;
	width: 100%;
}

.main {
	margin-left: 20%;
	width: 60%;
	margin-bottom: 100px;
}

.loan-verification {
	border: 1px solid #2b80ff;
	padding: 10px;
	border-radius: 0.325rem;
	margin-bottom: 20px;
}

.title {
	text-align: center;
	margin-bottom: 50px;
	margin-top: 120px;
}

.subtitle {
	margin-bottom: 50px;
	margin-top: 50px;
}

.number-to-verifiy {
	margin-left: 10px;
	font-size: 1.1rem;
}

.user-info {
	font-weight: 500;
}

.button-div {
	margin-top: -130px;
	text-align: right;
}

.button-approve {
	background-color: #04eb00;
	color: white;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	height: 50px;
	width: 171px;
	font-size: 0.95rem;
}

.button-approve:hover {
	background-color: #03ab00;
}

.button-reject {
	background-color: red;
	color: white;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	height: 50px;
	width: 171px;
	font-size: 0.95rem;
	margin-bottom: 5px;
	margin-left: 0px;
}

.button-reject:hover {
	background-color: #c40000;2161c2
}

.button-view {
	background-color: #2b80ff;
	color: white;
	font-weight: 500;
	border: 0;
	border-radius: 0.325rem;
	height: 50px;
	width: 171px;
	font-size: 0.95rem;
	margin-bottom: 10px;
	margin-top: 10px;
}

.button-view:hover {
	background-color: #2161c2;
}

.text {
	width: 400px;
	font-size: 0.9rem;
	font-weight: 500;
	color: #383838;
	text-align: left;
	margin-bottom: 70px;
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

.signup-button {
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
}

.signup-button:hover {
	background-color: red;
	-ms-transform: scale(1.015); /* IE 9 */
	-webkit-transform: scale(1.015); /* Safari 3-8 */
	transform: scale(1.015); 
}
</style>

</head>

<body style="margin: 0px; font-family: 'Poppins', sans-serif; background-color: #f7f7f7;">

<div class="header">
	<div class="header-text">
		<div class="logo"><img src="assets/images/logo.png" class="logo-image"></div>
		<div class="signup"><div><a href="actions/users/logoutAction.php" style="text-decoration: none; color: black;"><img src="assets/images/logout.png" class="logout-button"></a></div></div>
	</div>
</div>

<div class="everything-except-header">

<div class="main">

<h1 class="title">Instant Borrow Administrator</h1>

<h2 class="subtitle">Loans Under Verification</h2>
					
					<p class="number-to-verifiy"><?= $numberofLoans; ?> Loans Under Verification</p>
					
				<?php 
				if(isset($result1)){ 
						echo ''.$result1.''; 
				}
				?>	
<?php 
            while($question = $GetLoansUnderverification->fetch()){
                ?>
			<div class="loan-verification">
				<div>Loan ID: <span class="user-info"><?= $GetLoansUnderverification['id']; ?></span></div>
				<div>Loan Amount: <span class="user-info"><?= $GetLoansUnderverification['loan_amount']; ?>$</span></div>
				<div>Repayment Amount: <span class="user-info"><?= $GetLoansUnderverification['repayment_amount']; ?>$</span></div>
				<div>Granting Date: <span class="user-info"><?= date('M jS, Y', strtotime($GetLoansUnderverification['granting_date'])); ?></span></div>
				<div>Repayment Date: <span class="user-info"><?= date('M jS, Y', strtotime($GetLoansUnderverification['repayment_date'])); ?></span></div>
				<div>Repaid Date: <span class="user-info"><?= date('M jS, Y', strtotime($GetLoansUnderverification['repaid_date'])); ?></span></div>
				<div>Lender: <span class="user-info"><?= $GetLoansUnderverification['username_lender']; ?></span></div>
				<div>Borrower: <span class="user-info"><?= $GetLoansUnderverification['username_borrower']; ?></span></div>
				<div>Trustscore: <span class="user-info"><?= $GetLoansUnderverification['borrower_trustscore']; ?>/100</span></div>
				<div style="color: green;">Positive Feedback: <?= $GetLoansUnderverification['borrower_positive_feedback']; ?></div>
				<div style="color: red;">Negative Feedback: <?= $GetLoansUnderverification['borrower_negative_feedback']; ?></div>
				<div>Status: <span class="user-info"><?= $GetLoansUnderverification['status']; ?></span></div>
				<div><span class="user-info">Failed Tries To get ID: <?= $GetLoansUnderverification['repayment_id_confirmation_tries']; ?></span></div>
				
				<div class="button-div">
				<a href="assets/images/repayment-proof/<?= $GetLoansUnderverification['repayment_proof']; ?>" target="blank"><button class="button-view">View Repayment Proof</button></a>
				<form method="post">
				<input class="button-approve" type="submit" value="Approve Repayment" name="repaid<? $GetLoansUnderverification['id']; ?>">
				<input class="button-reject" type="submit" value="Reject Repayment" name="not_repaid<? $GetLoansUnderverification['id']; ?>">
				</form>
				</div>
				
			</div>
			
			<?php
				}
			?>


<h2 class="subtitle">ID Cards Under Verification</h2>
			<p class="number-to-verifiy"><?= $numberofIDCards; ?> ID Cards Under Verification</p>
			
				<?php 
				if(isset($result2)){ 
						echo ''.$result2.''; 
				}
				?>
				
<?php 
            while($IDCardInfos = $getIDCards->fetch()){
                ?>
				<div class="loan-verification">
				
				<div><span>Name:</span><a style="color: #00c4ff; text-decoration: none; font-size: 1.2rem;" href="user-profile.php?id=<?=$IDCardInfos['id']; ?>" target="blank"><span class="user-info"> <?= $IDCardInfos['name']; ?></span></a></div>
				<div><span>Date of Birth:</span><span class="user-info"> <?= date('M jS, Y', strtotime($IDCardInfos['date_birth'])); ?></span></div>
				<div><span>Username:</span><span class="user-info"> <?= $IDCardInfos['username']; ?></span></div>
				<div><span>Address:</span><span class="user-info"> <?= $IDCardInfos['address']; ?>,<span> <span class="user-info"> <?= $IDCardInfos['city']; ?>,</span><span class="user-info"> <?= $IDCardInfos['postcode']; ?></span></div>
				<div><span>Country:</span><span class="user-info"> <?= $IDCardInfos['country']; ?></span></div>
				
				<div class="button-div"> 
				<span class="link"><a href="assets/images/id-verification/<?= $IDCardInfos['identity_card']; ?>" target="blank"><button class="button-view">View ID Card</button></a></span>
				<span class="link"><a href="assets/images/id-pictures/<?= $IDCardInfos['picture']; ?>" target="blank"><button class="button-view">View Picture</button></a></span>
				<form method="post">
				<input class="button-approve" type="submit" value="Approve ID" name="id_accepted">
				<input class="button-reject" type="submit" value="Reject ID" name="id_rejected">
				</form>
				</div>

				</div>
			<?php
				}
			?>
			
	
	<h2 class="subtitle">Duplicate Users Check</h2>
	
	<div style="margin-bottom: 20px;"><?= $number_ofDuplicates; ?> Duplicate Users Found</div>
	
					<?php 
				if(isset($result3)){ 
						echo ''.$result3.''; 
				}
				?>
			
			<?php while(($getname = $CheckifDuplicateUsers->fetch())){ 
			?>
			
				<div class="loan-verification">
				
				<div><span>Name:</span><a style="color: #00c4ff; text-decoration: none; font-size: 1.2rem;" href="user-profile.php?id=<?=$getname['id']; ?>" target="blank"><span class="user-info"> <?= $getname['name']; ?></span></a></div>
				<div><span>Date of Birth:</span><span class="user-info"> <?= date('M jS, Y', strtotime($getname['date_birth'])); ?></span></div>
				<div><span>Username:</span><span class="user-info"> <?= $getname['username']; ?></span></div>
				<div><span>Address:</span><span class="user-info"> <?= $getname['address']; ?>,<span> <span class="user-info"> <?= $getname['city']; ?>,</span><span class="user-info"> <?= $getname['postcode']; ?></span></div>
				<div><span>Country:</span><span class="user-info"> <?= $getname['country']; ?></span></div>
				
				<div class="button-div">
				<span class="link"><a href="assets/images/id-verification/<?= $getname['identity_card']; ?>" target="blank"><button class="button-view">View ID Card</button></a></span>
				<span class="link"><a href="assets/images/id-pictures/<?= $getname['picture']; ?>" target="blank"><button class="button-view">View Picture</button></a></span>
				<form method="post">
				<input class="button-approve" type="submit" value="Approve User" name="user_accepted">
				<input class="button-reject" type="submit" value="Ban User" name="user_rejected">
				</form>
				</div>

				</div>
			
			<?php } ?>
			
	<h2 class="subtitle">Banned Users Check</h2>
	
	<span><?= $number_ofBanned; ?> Banned Users Found</span>
	
					<?php 
				if(isset($result4)){ 
						echo ''.$result4.''; 
				}
				?>
		
			<?php while(($getname_banned = $CheckifDuplicateUsersBanned->fetch())){ ?>
			
				<div class="loan-verification">
				
				<div><span>Name:</span><a style="color: #00c4ff; text-decoration: none; font-size: 1.2rem;" href="user-profile.php?id=<?=$getname_banned['id']; ?>" target="blank"><span class="user-info"> <?= $getname_banned['name']; ?></span></a></div>
				<div><span>Date of Birth:</span><span class="user-info"> <?= date('M jS, Y', strtotime($getname_banned['date_birth'])); ?></span></div>
				<div><span>Username:</span><span class="user-info"> <?= $getname_banned['username']; ?></span></div>
				<div><span>Address:</span><span class="user-info"> <?= $getname_banned['address']; ?>,<span> <span class="user-info"> <?= $getname_banned['city']; ?>,</span><span class="user-info"> <?= $getname_banned['postcode']; ?></span></div>
				<div><span>Country:</span><span class="user-info"> <?= $getname_banned['country']; ?></span></div>
				
				<div class="button-div">
				<span class="link"><a href="assets/images/id-verification/<?= $getname_banned['identity_card']; ?>" target="blank"><button class="button-view">View ID Card</button></a></span>
				<span class="link"><a href="assets/images/id-pictures/<?= $getname_banned['picture']; ?>" target="blank"><button class="button-view">View Picture</button></a></span>
				<form method="post">
				<input class="button-approve" type="submit" value="Approve User" name="user_accepted_banned">
				<input class="button-reject" type="submit" value="Ban User" name="user_rejected_banned">
				</form>
				</div>

				</div>
	
			<?php } ?>
			
			
	<h2 class="subtitle">Ban Users</h2>
	
	<div class="text">
	<form method="post">
	<p>Enter Username to Ban</p>
	<input class="input" type="text" name="user_ban" required autocomplete="off">
	<p>Enter Reason</p>
	<input class="input" type="text" name="ban_reason" required autocomplete="off">
	<input class="signup-button" type="submit" name="ban" value="Ban user">
	</form>
	</div>
			
	<h2 class="subtitle">Add Administrators</h2>
	
	<div class="text">
	
		<form method="post">
		<p style="margin-top: 40px;">Email</p>
		<input class="input" name="email" required autocomplete="off">
		<p style="margin-top: 20px;">Full Name</p>
		<input class="input" name="name" required autocomplete="off">
		<p style="margin-top: 20px;">Password</p>
		<input class="input" id="input" type="password" name="password" required>
		<div class="label-container"><label for="showPassword" class="label"><img src="assets/images/show-password.jpg" class="label-image"><input id="showPassword" type="checkbox" onclick="ShowPasswordFunction()" style="display: none;"></label></div>
		<input type="submit" class="signup-button" name="signup" value="Add Administrator">
		 <?php if(isset($errorMsg)){ echo '<p class="error-message">'.$errorMsg.'</p>'; } ?>
		</form>
	</div>

</div>

</div>

</body>

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

</html>
