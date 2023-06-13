<?php

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
				}
			
			if($repayment == 'not_received'){
				
				$SetPaymentNotmade = $bdd->prepare('UPDATE loan SET repayment_received="no_correct_id_notconfirmed" WHERE id = ?');
				$SetPaymentNotmade->execute(array($idOfLoan));
				
				$notreceived_message = "<div class='payment-notreceived'>Repayment Not Received. Borrower will Be banned for Fraud.</div>";
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