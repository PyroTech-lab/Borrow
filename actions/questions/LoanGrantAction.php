<?php

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
		
	if(isset($_POST['confirm_lend'])){

    $loanGrant = $bdd->prepare('UPDATE loan SET granting_date = ?, id_lender = ?, username_lender = ?, status = ? WHERE id= ?');
	$loanGrant->execute(array($granting_date, $id_lender, $username_lender, $status, $idOfTheQuestion));
	
	header("location: profile.php");
	
	}
	
}else{$Loannotfound ="yes";}

}else{$Loannotfound ="yes";}



