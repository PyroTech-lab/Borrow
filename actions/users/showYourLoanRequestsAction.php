<?php
session_start();
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, status FROM loan WHERE id_borrower = ? AND status="request" ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));

if($getAllMyQuestions->rowCount() == 0){
	$errorMsg = "You do not have any Loan Requests";
}

if(isset($_POST['delete_request'])){
	$deleteThisQuestion = $bdd->prepare('DELETE FROM loan WHERE id_borrower = ? AND status="request"');
    $deleteThisQuestion->execute(array($_SESSION['id']));
	
	header("Refresh:0");
}