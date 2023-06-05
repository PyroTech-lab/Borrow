<?php
session_start();
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status, feedback_given FROM loan WHERE id_borrower = ? AND NOT status="request" ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));

if($getAllMyQuestions->rowCount() == 0){
	$errorMsg = "You Haven't Borrowed Any Money yet";
}

