<?php
session_start();
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status FROM loan WHERE id_borrower = ? AND NOT status="request" ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));

if($getAllMyQuestions->rowCount() == 0){
	$errorMsg = "You Haven't Borrowed Any Money yet";
}


$getActive = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND status="active" OR status="active_notseen"');
$getActive->execute(array($_SESSION['id']));

if($getActive->rowCount() > 0){
	$status_public = "<span style='color: #2b80ff;'>Active</span>";
}


$getPaidOntime = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND status="paid_ontime" OR status="paid_ontime_notseen"');
$getPaidOntime->execute(array($_SESSION['id']));

if($getPaidOntime->rowCount() > 0){
	$status_public = "<span style='color: #1bbf02;'>Paid on Time</span>";
}


$getPaidLate = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND status="paid_late" OR status="paid_late_notseen"');
$getPaidLate->execute(array($_SESSION['id']));

if($getPaidLate->rowCount() > 0){
	$status_public = "<span style='color: #f7b228;'>Paid Late</span>";
}

$getPaidLate = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND status="unpaid"');
$getPaidLate->execute(array($_SESSION['id']));

if($getPaidLate->rowCount() > 0){
	$status_public = "<span style='color: red;'>Unpaid</span>";
}