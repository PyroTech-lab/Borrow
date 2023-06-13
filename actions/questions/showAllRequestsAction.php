<?php

require('actions/database.php');


	$limitLow = 0;
	$limitHigh = 3;
	$class1 = "load-more-visible";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";

if (isset($_GET['load_more1'])) {
	$limitLow = 0;
	$limitHigh = 30;
	$class1 = "load-more-hidden";
	$class2 = "load-more-visible";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more2'])) {
	$limitLow = 0;
	$limitHigh = 60;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-visible";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more3'])) {
	$limitLow = 0;
	$limitHigh = 90;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-visible";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more4'])) {
	$limitLow = 0;
	$limitHigh = 120;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-visible";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more5'])) {
	$limitLow = 0;
	$limitHigh = 180;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-visible";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more6'])) {
	$limitLow = 0;
	$limitHigh = 210;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-visible";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more7'])) {
	$limitLow = 0;
	$limitHigh = 210;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-visible";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more8'])) {
	$limitLow = 0;
	$limitHigh = 210;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-visible";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more9'])) {
	$limitLow = 0;
	$limitHigh = 210;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-visible";
	$classButton = "borrow-button-container";
}
if (isset($_GET['load_more10'])) {
	$limitLow = 0;
	$limitHigh = 210;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-hidden";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	$classButton = "borrow-button-container-noloadmore";
}





$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');

if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
}



if(isset($_GET['loan_amount_search']) AND !empty($_GET['loan_amount_search'])){
$usersSearch1 = $_GET['loan_amount_search'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search']) AND !empty($_GET['interest_search'])){
$usersSearch2 = $_GET['interest_search'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search']) AND !empty($_GET['trustscore_search'])){

	
$usersSearch3 = $_GET['trustscore_search'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search']) AND !empty($_GET['repayment_date_search'])){
$usersSearch4 = $_GET['repayment_date_search'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear']) AND !empty($_GET['clear'])){
	
	$clear_filters = $_GET['clear'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}




if (isset($_GET['sortby_newest'])){
	
	$sortby_newest = $_GET['sortby_newest'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest'])){
	
	$sortby_interest = $_GET['sortby_interest'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}
