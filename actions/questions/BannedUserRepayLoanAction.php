<?php

require('actions/database.php');




$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ?');
    $checkIfLoanExists->execute(array($_GET['id']));

        $LoanInfos = $checkIfLoanExists->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_lender = $LoanInfos['id_lender'];
		$username_lender = $LoanInfos['username_lender'];




if(isset($_POST['confirm_repay'])){
	
	if(isset($_GET['id']) AND !empty($_GET['id'])){

	$idOfTheQuestion = $_GET['id'];
	$repaid_date = date('Y-m-d H:i:s');
	
	$loanRepaid = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = "paid_late_notseen" WHERE id= ?');
	$loanRepaid->execute(array($repayment_date, $idOfTheQuestion));
	
	header('Location: actions/users/logoutAction.php');
	
        
}
	
}

