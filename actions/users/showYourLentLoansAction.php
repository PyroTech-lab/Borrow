<?php
session_start();
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_lender = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));

if($getAllMyQuestions->rowCount() == 0){
	$errorMsg = "You Haven't Lent Any Money yet";
}
