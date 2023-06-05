<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
	
	 $idOfLoan = $_GET['id'];

	$GetUnpaidLoanInfo = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND id_lender= ? AND status="unpaid_notseen"');
	$GetUnpaidLoanInfo->execute(array($idOfLoan, $_SESSION['id']));


	if($GetUnpaidLoanInfo->rowCount() > 0){
        

        $LoanInfos = $GetUnpaidLoanInfo->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_borrower = $LoanInfos['id_borrower'];
		$username_borrower = $LoanInfos['username_borrower'];
		
		
		$UpdateStatus = $bdd->prepare('UPDATE loan SET status="unpaid" WHERE id = ? AND id_lender= ? AND status="unpaid_notseen"');
		$UpdateStatus->execute(array($idOfLoan, $_SESSION['id']));
			
	}

}
	