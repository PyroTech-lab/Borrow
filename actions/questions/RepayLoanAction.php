<?php

require('actions/database.php');



	if(isset($_GET['id']) AND !empty($_GET['id'])){

$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ?');
$checkIfLoanExists->execute(array($_GET['id']));

if($checkIfLoanExists->rowCount() > 0){

        $LoanInfos = $checkIfLoanExists->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_lender = $LoanInfos['id_lender'];
		$username_lender = $LoanInfos['username_lender'];





if(isset($_POST['confirm_repay'])){
	

	$idOfTheQuestion = $_GET['id'];
	$repaid_date = date('Y-m-d H:i:s');
	
	$getLoan = $bdd->prepare('SELECT repayment_date FROM loan WHERE id= ?');
	$getLoan->execute(array($idOfTheQuestion));
	
	
	if($getLoan->rowCount() > 0){

	$LoanInfo = $getLoan->fetch();

	$repayment_date = $LoanInfo['repayment_date'];
	$repayment_date_plusOne = date('Y-m-d', strtotime($repayment_date. ' + 1 days'));
	
	if($repaid_date>$repayment_date_plusOne){
		
	$loanRepaidLate = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = "paid_late_notseen" WHERE id= ?');
	$loanRepaidLate->execute(array($repayment_date, $idOfTheQuestion));
	
	$successMsg = "<span>Your Loan has been repaid succesfully!</span><a href='dashboard.php'><button>Back to Home</button></a>";
		
	}else{

	$loanRepaidOntime = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = "paid_ontime_notseen" WHERE id= ?');
	$loanRepaidOntime->execute(array($repaid_date, $idOfTheQuestion));
	
	$successMsg = "<span>Your Loan has been repaid succesfully!</span><a href='dashboard.php'><button>Back to Home</button></a>";
	}
	
	}
        
}
	
}else{$Loannotfound ="yes";}

}else{$Loannotfound ="yes";}
