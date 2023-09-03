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
		$status = $LoanInfos['status'];
		$payment_method_payment = $LoanInfos['payment_method_payment'];
		$payment_transaction_id = $LoanInfos['payment_transaction_id'];
		
		
		$getPhoneNumber = $bdd->prepare('SELECT phone_number FROM users WHERE id = ?');
		$getPhoneNumber->execute(array($id_lender));
		
		$GetNumber = $getPhoneNumber->fetch();
		
		$phone_number = $GetNumber['phone_number'];
		
		
		}else {$Loannotfound ="yes";}


}else{ $Loannotfound ="yes";}


			