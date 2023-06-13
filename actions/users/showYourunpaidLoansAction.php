<?php
session_start();
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status, repayment_received FROM loan WHERE id_borrower = ? AND (status="unpaid" OR status="unpaid_notseen" OR status="unpaid_banned" OR status="unpaid_banned_archived")');
$getAllMyQuestions->execute(array($_SESSION['id']));



if($getAllMyQuestions->rowCount() == 0){
	$errorMsg = "You do not have any Unpaid Loans";

}else{
	$RepayLoan = "Repay Loan";
}
