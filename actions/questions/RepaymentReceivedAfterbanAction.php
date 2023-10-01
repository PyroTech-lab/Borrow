<?php

require('actions/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfLoan = $_GET['id'];

		
	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND id_lender= ?');
    $checkIfLoanExists->execute(array($idOfLoan, $_SESSION['id']));

		if($checkIfLoanExists->rowCount() > 0){
		
        $LoanInfos = $checkIfLoanExists->fetch();
		
		$loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repaid_date = $LoanInfos['repaid_date'];
		$id_lender = $LoanInfos['id_lender'];
		$username_lender = $LoanInfos['username_lender'];
		$id_borrower = $LoanInfos['id_borrower'];
		$username_borrower = $LoanInfos['username_borrower'];
		$payment_method_repayment = $LoanInfos['payment_method_repayment'];
		$repayment_transaction_id = $LoanInfos['repayment_transaction_id'];
		
		}else {$Loannotfound ="yes";}


}else{ $Loannotfound ="yes";}


			     