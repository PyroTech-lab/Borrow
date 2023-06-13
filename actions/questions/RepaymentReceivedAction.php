<?php

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
				
				$notreceived_message = "<div class='payment-notreceived'>Repayment Not Received. Borrower will Be Asked to Provide Extra Proof.</div>";
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


			