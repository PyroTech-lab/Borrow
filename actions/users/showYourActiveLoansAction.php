<?php
session_start();
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, id_lender, username_lender, status, repayment_received FROM loan WHERE id_borrower = ? AND (status="active" OR status="active_notseen" OR status="active_under_verification") ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));

if($getAllMyQuestions->rowCount() == 0){
	$errorMsg = "You do not have any active loans";

}else{
	$RepayLoan = "Repay Loan";
}