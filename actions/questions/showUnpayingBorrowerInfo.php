<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
	
	 $idOfLoan = $_GET['id'];

	$GetUnpaidLoanInfo = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND id_lender= ? AND (status="unpaid_notseen" OR status="unpaid")');
	$GetUnpaidLoanInfo->execute(array($idOfLoan, $_SESSION['id']));


	if($GetUnpaidLoanInfo->rowCount() > 0){
        

        $LoanInfos = $GetUnpaidLoanInfo->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_borrower = $LoanInfos['id_borrower'];
		$username_borrower = $LoanInfos['username_borrower'];
		
		
		$GetBorrowerInfo = $bdd->prepare('SELECT * FROM users WHERE id = ?');
		$GetBorrowerInfo->execute(array($id_borrower));
		
		$BorrowerInfos = $GetBorrowerInfo->fetch();
		
		$name = $BorrowerInfos['name'];
        $email_address = $BorrowerInfos['email'];
        $phone_number = $BorrowerInfos['phone_number'];
		$city = $BorrowerInfos['city'];
		$country = $BorrowerInfos['country'];
		$borrower_picture = $BorrowerInfos['picture'];
		
		if (strlen($phone_number) !== 0) {
		$phone_number_display = $phone_number;	
		}else{
		$phone_number_display = "Unknown";
		}
		
		
		$UpdateStatus = $bdd->prepare('UPDATE loan SET status="unpaid" WHERE id = ? AND id_lender= ? AND status="unpaid_notseen"');
		$UpdateStatus->execute(array($idOfLoan, $_SESSION['id']));
			
	}else{$Loannotfound ="yes";}

}else{$Loannotfound ="yes";}
	