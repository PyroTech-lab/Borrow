<?php

require('actions/database.php');


$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" ORDER BY id DESC LIMIT 0,20');

if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
}


if(isset($_GET['loan_amount_search']) AND !empty($_GET['loan_amount_search'])){
$usersSearch1 = $_GET['loan_amount_search'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" AND loan_amount>'.$usersSearch1.' ORDER BY loan_amount DESC');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}

if(isset($_GET['interest_search']) AND !empty($_GET['interest_search'])){
$usersSearch2 = $_GET['interest_search'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100)>'.$usersSearch2.' ORDER BY interest DESC');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['repayment_date_search']) AND !empty($_GET['repayment_date_search'])){
$usersSearch3 = $_GET['repayment_date_search'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" AND repayment_date<"%'.$usersSearch3.'%" ORDER BY repayment_date DESC');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear']) AND !empty($_GET['clear'])){
	
	$clear_filters = $_GET['clear'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" ORDER BY id DESC LIMIT 0,20');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}




if (isset($_GET['sortby_newest'])){
	
	$sortby_newest = $_GET['sortby_newest'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" ORDER BY id DESC LIMIT 0,20');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT 0,20');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT 0,20');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest'])){
	
	$sortby_interest = $_GET['sortby_interest'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT 0,20');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}