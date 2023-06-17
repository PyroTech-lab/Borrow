<?php

use PHPMailer\PHPMailer\PHPMailer;
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){


	
	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ?');
    $checkIfLoanExists->execute(array($_GET['id']));
	
	if($checkIfLoanExists->rowCount() > 0){
		
	$LoanInfos = $checkIfLoanExists->fetch();
		
	$granting_date = date('Y-m-d H:i:s');
	$id_lender = $_SESSION['id'];
	$username_lender = $_SESSION['username'];
	$status = "active_notseen";
	$idOfTheQuestion = $_GET['id'];
	$loan_amount = $LoanInfos['loan_amount'];
	$repayment_amount = $LoanInfos['repayment_amount'];
	$repayment_date = $LoanInfos['repayment_date'];
	$id_borrower = $LoanInfos['id_borrower'];
	$username_borrower = $LoanInfos['username_borrower'];
	
	$GetPaymentMethod = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ?');
    $GetPaymentMethod->execute(array($id_borrower));
	
	$DisplayPaymentMethods = $GetPaymentMethod->fetch();
	
	$paypal = $DisplayPaymentMethods['paypal'];
	$cashapp = $DisplayPaymentMethods['cashapp'];
	$venmo = $DisplayPaymentMethods['venmo'];
	$zelle = $DisplayPaymentMethods['zelle'];
	$chime = $DisplayPaymentMethods['chime'];
	
	$GetBorrowerEmail = $bdd->prepare('SELECT email FROM users WHERE id = ?');
    $GetBorrowerEmail->execute(array($id_borrower));
	
	$DisplayEmail = $GetBorrowerEmail->fetch();
	
	$borrower_email = $DisplayEmail['email'];
	
	
	
	if(strlen($paypal) == 0){
	$paypal_notset= "none";
	}else{ $paypal_notset = "";}
	
	if(strlen($cashapp) == 0){
	$cashapp_notset= "none";
	}else{ $cashapp_notset = "";}
	
	if(strlen($venmo) == 0){
	$venmo_notset= "none";
	}else{ $venmo_notset = "";}
	
	if(strlen($zelle) == 0){
	$zelle_notset= "none";
	}else{ $zelle_notset = "";}
	
	if(strlen($chime) == 0){
	$chime_notset= "none";
	}else{ $chime_notset = "";}
	
	
	if($paypal_notset== ""){
	$default= "paypal";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "")){
	$default= "cashapp";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "")){
	$default= "venmo";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "")){
	$default= "zelle";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "none")AND($chime_notset == "")){
	$default= "chime";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "none")AND($chime_notset == "none")){
	$default= "nothing";}

	
	$checkIfPaymentConnected = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ? AND paypal =""');
    $checkIfPaymentConnected->execute(array($_SESSION['id']));
	
	if($checkIfPaymentConnected->rowCount() == 0){
		
	
	if(isset($_POST['payment_paypal'])){
		
	$transactionId = ($_POST['paypal_id']);
		

    $loanGrant = $bdd->prepare('UPDATE loan SET granting_date = ?, id_lender = ?, username_lender = ?, status = ?, payment_method_payment="Paypal", payment_transaction_id=? WHERE id= ?');
	$loanGrant->execute(array($granting_date, $id_lender, $username_lender, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Loan Confirmed!</div>";
	
	require_once 'vendor/autoload.php';


	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'live.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'api';
	$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

	$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
	$phpmailer->addAddress(''.$borrower_email.'');
	$phpmailer->Subject = ''.$username_lender.' Lent you '.$loan_amount.'$!';

	$phpmailer->Body = '<html>
						<p>Loan granted!</p>
						<p>'.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!</p>
						<p>Funds have Been Sent to your Paypal Account. They may take a few Minutes to arrive.</p>
						<p>You Have until '.date('F jS, Y', strtotime($repayment_date)).' to Repay the Loan.</p>
						<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
						<p>If you didnt Request a Loan On Instant Borrow, please Ignore this message.</p>
						<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
						</html>';
	$phpmailer->AltBody = ''.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!';
	
	}
	
	}else{
	$error_message_paypal = "<a href='set-payment-method.php' style='text-decoration: none;'><div class='error'>Connect your Paypal Account Before Lending with Paypal.</div></a>";
	}
	
	
	
	
	
	
	
	$checkIfPaymentConnected = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ? AND cashapp =""');
    $checkIfPaymentConnected->execute(array($_SESSION['id']));
	
	if($checkIfPaymentConnected->rowCount() == 0){
	
	if(isset($_POST['payment_cashapp'])){
		
	$transactionId = ($_POST['cashapp_id']);
	

    $loanGrant = $bdd->prepare('UPDATE loan SET granting_date = ?, id_lender = ?, username_lender = ?, status = ?, payment_method_payment="Cashapp", payment_transaction_id= ? WHERE id= ?');
	$loanGrant->execute(array($granting_date, $id_lender, $username_lender, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Loan Confirmed!</div>";
	
	require_once 'vendor/autoload.php';


	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'live.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'api';
	$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

	$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
	$phpmailer->addAddress(''.$borrower_email.'');
	$phpmailer->Subject = ''.$username_lender.' Lent you '.$loan_amount.'$!';

	$phpmailer->Body = '<html>
						<p>Loan granted!</p>
						<p>'.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!</p>
						<p>Funds have Been Sent to your Cashapp Account. They may take a few Minutes to arrive.</p>
						<p>You Have until '.date('F jS, Y', strtotime($repayment_date)).' to Repay the Loan.</p>
						<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
						<p>If you didnt Request a Loan On Instant Borrow, please Ignore this message.</p>
						<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
						</html>';
	$phpmailer->AltBody = ''.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!';
	
	}
	
	}else{
		$error_message_cashapp = "<a href='set-payment-method.php' style='text-decoration: none;'><div class='error'>Connect your Cashapp Account Before Lending with Cashapp.</div></a>";
	}
	
	
	
	
	
	
	
	$checkIfPaymentConnected = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ? AND venmo =""');
    $checkIfPaymentConnected->execute(array($_SESSION['id']));
	
	if($checkIfPaymentConnected->rowCount() == 0){
	
	if(isset($_POST['payment_venmo'])){
		
	$transactionId = ($_POST['venmo_id']);
	

    $loanGrant = $bdd->prepare('UPDATE loan SET granting_date = ?, id_lender = ?, username_lender = ?, status = ?, payment_method_payment="Venmo", payment_transaction_id = ? WHERE id= ?');
	$loanGrant->execute(array($granting_date, $id_lender, $username_lender, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Loan Confirmed!</div>";
	
	require_once 'vendor/autoload.php';


	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'live.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'api';
	$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

	$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
	$phpmailer->addAddress(''.$borrower_email.'');
	$phpmailer->Subject = ''.$username_lender.' Lent you '.$loan_amount.'$!';

	$phpmailer->Body = '<html>
						<p>Loan granted!</p>
						<p>'.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!</p>
						<p>Funds have Been Sent to your Venmo Account. They may take a few Minutes to arrive.</p>
						<p>You Have until '.date('F jS, Y', strtotime($repayment_date)).' to Repay the Loan.</p>
						<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
						<p>If you didnt Request a Loan On Instant Borrow, please Ignore this message.</p>
						<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
						</html>';
	$phpmailer->AltBody = ''.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!';
	
	}
	
	}else{
		$error_message_venmo = "<a href='set-payment-method.php' style='text-decoration: none;'><div class='error'>Connect your Venmo Account Before Lending with Venmo.</div></a>";
	}
	
	
	
	
	
	
	$checkIfPaymentConnected = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ? AND zelle =""');
    $checkIfPaymentConnected->execute(array($_SESSION['id']));
	
	if($checkIfPaymentConnected->rowCount() == 0){
	
	if(isset($_POST['payment_zelle'])){
		
	$transactionId = ($_POST['zelle_id']);
		

    $loanGrant = $bdd->prepare('UPDATE loan SET granting_date = ?, id_lender = ?, username_lender = ?, status = ?, payment_method_payment="Zelle", payment_transaction_id = ? WHERE id= ?');
	$loanGrant->execute(array($granting_date, $id_lender, $username_lender, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Loan Confirmed!</div>";
	
		require_once 'vendor/autoload.php';


	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'live.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'api';
	$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

	$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
	$phpmailer->addAddress(''.$borrower_email.'');
	$phpmailer->Subject = ''.$username_lender.' Lent you '.$loan_amount.'$!';

	$phpmailer->Body = '<html>
						<p>Loan granted!</p>
						<p>'.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!</p>
						<p>Funds have Been Sent to your Zelle Account. They may take a few Minutes to arrive.</p>
						<p>You Have until '.date('F jS, Y', strtotime($repayment_date)).' to Repay the Loan.</p>
						<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
						<p>If you didnt Request a Loan On Instant Borrow, please Ignore this message.</p>
						<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
						</html>';
	$phpmailer->AltBody = ''.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!';
	
	}
	
	}else{
		$error_message_zelle = "<a href='set-payment-method.php' style='text-decoration: none;'><div class='error'>Connect your Zelle Account Before Lending with Zelle.</div></a>";
	}
	
	
	
	
	
	$checkIfPaymentConnected = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ? AND chime =""');
    $checkIfPaymentConnected->execute(array($_SESSION['id']));
	
	if($checkIfPaymentConnected->rowCount() == 0){
	
	if(isset($_POST['payment_chime'])){
		
	$transactionId = ($_POST['chime_id']);
		

    $loanGrant = $bdd->prepare('UPDATE loan SET granting_date = ?, id_lender = ?, username_lender = ?, status = ?, payment_method_payment="Chime", payment_transaction_id WHERE id= ?');
	$loanGrant->execute(array($granting_date, $id_lender, $username_lender, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Loan Confirmed!</div>";
	
		require_once 'vendor/autoload.php';


	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'live.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'api';
	$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

	$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
	$phpmailer->addAddress(''.$borrower_email.'');
	$phpmailer->Subject = ''.$username_lender.' Lent you '.$loan_amount.'$!';

	$phpmailer->Body = '<html>
						<p>Loan granted!</p>
						<p>'.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!</p>
						<p>Funds have Been Sent to your Chime Account. They may take a few Minutes to arrive.</p>
						<p>You Have until '.date('F jS, Y', strtotime($repayment_date)).' to Repay the Loan.</p>
						<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
						<p>If you didnt Request a Loan On Instant Borrow, please Ignore this message.</p>
						<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
						</html>';
	$phpmailer->AltBody = ''.$username_lender.' Lent you '.$loan_amount.'$ on Instant Borrow!';
	
	}
	
	}else{
		$error_message_chime = "<a href='set-payment-method.php' style='text-decoration: none;'><div class='error'>Connect your Chime Account Before Lending with Chime.</div></a>";
	}
	
	
	

	
}else{$Loannotfound ="yes";}

}else{$Loannotfound ="yes";}



