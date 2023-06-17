<?php

use PHPMailer\PHPMailer\PHPMailer;
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
	
$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ?');
$checkIfLoanExists->execute(array($_GET['id']));
	
if($checkIfLoanExists->rowCount() > 0){
	
	$LoanInfos = $checkIfLoanExists->fetch();
		
	$repaid_date = date('Y-m-d H:i:s');
	$id_lender = $_SESSION['id'];
	$username_lender = $_SESSION['username'];
	$idOfLoan = $_GET['id'];
	$loan_amount = $LoanInfos['loan_amount'];
	$repayment_amount = $LoanInfos['repayment_amount'];
	$repayment_date = $LoanInfos['repayment_date'];
	$id_borrower = $LoanInfos['id_borrower'];
	$username_borrower = $LoanInfos['username_borrower'];
	$payment_method_repayment = $LoanInfos['payment_method_repayment'];
	
	$GetBorrowerEmail = $bdd->prepare('SELECT email FROM users WHERE id = ?');
	$GetBorrowerEmail->execute(array($id_borrower));
		
	$DisplayEmail = $GetBorrowerEmail->fetch();
		
	$borrower_email = $DisplayEmail['email'];
	
	
			if(isset($_POST['repayment_receivedconfirmation'])){
				
				
				
			$checkConfirmationAlreadyReported = $bdd->prepare('SELECT repayment_received FROM loan WHERE id = ?');
			$checkConfirmationAlreadyReported->execute(array($idOfLoan));
			
			$PaymentCheck = $checkConfirmationAlreadyReported->fetch();
			$PaymentMadeOrNot = $PaymentCheck['repayment_received'];

			if($PaymentMadeOrNot == "no_correct_id"){
				
				
			$repayment = $_POST['repayment'];
			
			
			if($repayment == 'received'){
			
				$SetPaymentmade= $bdd->prepare('UPDATE loan SET repayment_received="yes" WHERE id = ?');
				$SetPaymentmade->execute(array($idOfLoan));
				
				$confirmed_message = "<div class='payment-received'>Repayment Confirmed!</div>";
				
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
				$phpmailer->Subject = ''.$username_lender.' Received your '.$repayment_amount.'$ Repayment';

				$phpmailer->Body = '<html>
									<p>'.$username_lender.' Received your '.$repayment_amount.'$ Repayment on Instant Borrow.</p>
									<p>The Proof you sent of your Repayment was accepted and '.$username_lender.' confirmed Receiving your Repayment.</p>
									<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
									<p>If you havent Borrowed On Instant Borrow, please Ignore this message.</p>
									<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
									</html>';
				$phpmailer->AltBody = ''.$username_lender.' Received your '.$repayment_amount.'$ Repayment.';
				}
			
			if($repayment == 'not_received'){
				
				$SetPaymentNotmade = $bdd->prepare('UPDATE loan SET repayment_received="no_correct_id_notconfirmed" WHERE id = ?');
				$SetPaymentNotmade->execute(array($idOfLoan));
				
				$notreceived_message = "<div class='payment-notreceived'>Repayment Not Received. Borrower will Be banned for Fraud.</div>";
				
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
				$phpmailer->Subject = 'Your Proof of Repayment was Rejected';

				$phpmailer->Body = '<html>
									<p>Our Team Determined the proof of repayment you submited was not legitimate.</p>
									<p>'.$username_lender.' also Reported still not receiving your Repayment.</p>
									<p>Log Into Instant Borrow to resolve the issue.</p>
									<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
									<p>If you havent Borrowed On Instant Borrow, please Ignore this message.</p>
									<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
									</html>';
				$phpmailer->AltBody = 'Your '.$repayment_amount.'$ Repayment.';
				}
				
				}else{
					
					if($PaymentMadeOrNot == "yes"){
					$error_message_received = "<div class='error-message'>You Have Already Reported Receiving the Payment.</div>";
					}
					if($PaymentMadeOrNot == "no_correct_id_notconfirmed"){
					$error_message_not_received = "<div class='error-message'>You Have Already Reported not Receiving the Payment.</div>";
					}
					
				}

				}
	
	
}else{$Loannotfound ="yes";}
	
}else{$Loannotfound ="yes";}