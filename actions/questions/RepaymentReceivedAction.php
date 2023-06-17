<?php

use PHPMailer\PHPMailer\PHPMailer;
require('actions/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfLoan = $_GET['id'];

		
	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ?');
    $checkIfLoanExists->execute(array($idOfLoan));

		if($checkIfLoanExists->rowCount() > 0){
		
        $LoanInfos = $checkIfLoanExists->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_lender = $LoanInfos['id_lender'];
		$username_lender = $LoanInfos['username_lender'];
		$id_borrower = $LoanInfos['id_borrower'];
		$username_borrower = $LoanInfos['username_borrower'];
		$payment_method_repayment = $LoanInfos['payment_method_repayment'];
		$repayment_transaction_id = $LoanInfos['repayment_transaction_id'];
		
		$GetBorrowerEmail = $bdd->prepare('SELECT email FROM users WHERE id = ?');
		$GetBorrowerEmail->execute(array($id_borrower));
		
		$DisplayEmail = $GetBorrowerEmail->fetch();
		
		$borrower_email = $DisplayEmail['email'];
	
		
			if(isset($_POST['notification_receivedrepayment'])){
				
				
				
			$checkPaymentAlreadyReported = $bdd->prepare('SELECT repayment_received FROM loan WHERE id = ?');
			$checkPaymentAlreadyReported->execute(array($idOfLoan));
			
			$PaymentCheck = $checkPaymentAlreadyReported->fetch();
			$PaymentMadeOrNot = $PaymentCheck['repayment_received'];

			if(empty($PaymentMadeOrNot)){
				
				
			$repayment = $_POST['repayment'];
			
			
			if($repayment == 'received'){
			
				$SetPaymentmade= $bdd->prepare('UPDATE loan SET repayment_received="yes" WHERE id = ?');
				$SetPaymentmade->execute(array($idOfLoan));
				
				$confirmed_message = "<div class='payment-received'>Repayment Confirmed!</div>";
				}
			
			if($repayment == 'not_received'){
				
				$SetPaymentNotmade = $bdd->prepare('UPDATE loan SET repayment_received="no_notseen" WHERE id = ?');
				$SetPaymentNotmade->execute(array($idOfLoan));
				
				$notreceived_message = "<div class='payment-notreceived'>Repayment Reported as Not Received. Borrower will Be Asked to Provide Extra Proof.</div>";
				
				
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
					$phpmailer->Subject = ''.$username_lender.' Didnt Receive your '.$repayment_amount.'$ Repayment';

					$phpmailer->Body = '<html>
										<p>'.$username_lender.' Reported not receiving your '.$repayment_amount.'$ repayment on Instant Borrow.</p>
										<p>You will need to provide Proof of your Payment or it will be marked as Unpaid.</p>
										<p>Log Into Instant Borrow to Provide proof of your Repayment.</p>
										<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
										<p>If you havent Borrowed On Instant Borrow, please Ignore this message.</p>
										<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
										</html>';
					$phpmailer->AltBody = ''.$username_lender.' Reported not receiving your '.$repayment_amount.'$ repayment.';
				
				
				}
				
				}else{
					
					if($PaymentMadeOrNot == "yes"){
					$error_message_received = "<div class='error-message'>You Have Already Reported Receiving the Payment.</div>";
					}
					if(($PaymentMadeOrNot == "no")OR($PaymentMadeOrNot == "no_notseen")){
					$error_message_not_received = "<div class='error-message'>You Have Already Reported not Receiving the Payment.</div>";
					}
					
				}

				}		
		
		
		
		
		
		
		}else {$Loannotfound ="yes";}


}else{ $Loannotfound ="yes";}


			