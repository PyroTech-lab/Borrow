<?php

require('actions/database.php');

	$requests_display = "none";
	$limitLow = 0;
	$limitHigh = 1;
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
	
	$class_sort1 = "sort-by-visible";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-visible";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";

if ((isset($_GET['load_more1']))OR(isset($_GET['sortby_newest2']))OR(isset($_GET['sortby_loan_amount2']))OR(isset($_GET['sortby_repayment_date2']))OR(isset($_GET['sortby_interest2']))OR(isset($_GET['loan_amount_search2']))OR(isset($_GET['interest_search2']))OR(isset($_GET['trustscore_search2']))OR(isset($_GET['repayment_date_search2']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-visible";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-visible";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more2']))OR(isset($_GET['sortby_newest3']))OR(isset($_GET['sortby_loan_amount3']))OR(isset($_GET['sortby_repayment_date3']))OR(isset($_GET['sortby_interest3']))OR(isset($_GET['loan_amount_search3']))OR(isset($_GET['interest_search3']))OR(isset($_GET['trustscore_search3']))OR(isset($_GET['repayment_date_search3']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-visible";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-visible";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more3']))OR(isset($_GET['sortby_newest4']))OR(isset($_GET['sortby_loan_amount4']))OR(isset($_GET['sortby_repayment_date4']))OR(isset($_GET['sortby_interest4']))OR(isset($_GET['loan_amount_search4']))OR(isset($_GET['interest_search4']))OR(isset($_GET['trustscore_search4']))OR(isset($_GET['repayment_date_search4']))) {
	$requests_display = "inline";
	$limitLow = 0;
	$limitHigh = 90;
	$class1 = "load-more-hidden";
	$class2 = "load-more-hidden";
	$class3 = "load-more-hidden";
	$class4 = "load-more-visible";
	$class5 = "load-more-hidden";
	$class6 = "load-more-hidden";
	$class7 = "load-more-hidden";
	$class8 = "load-more-hidden";
	$class9 = "load-more-hidden";
	$class10 = "load-more-hidden";
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-visible";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-visible";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more4']))OR(isset($_GET['sortby_newest5']))OR(isset($_GET['sortby_loan_amount5']))OR(isset($_GET['sortby_repayment_date5']))OR(isset($_GET['sortby_interest5']))OR(isset($_GET['loan_amount_search5']))OR(isset($_GET['interest_search5']))OR(isset($_GET['trustscore_search5']))OR(isset($_GET['repayment_date_search5']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-visible";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-visible";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more5']))OR(isset($_GET['sortby_newest6']))OR(isset($_GET['sortby_loan_amount6']))OR(isset($_GET['sortby_repayment_date6']))OR(isset($_GET['sortby_interest6']))OR(isset($_GET['loan_amount_search6']))OR(isset($_GET['interest_search6']))OR(isset($_GET['trustscore_search6']))OR(isset($_GET['repayment_date_search6']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-visible";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-visible";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more6']))OR(isset($_GET['sortby_newest7']))OR(isset($_GET['sortby_loan_amount7']))OR(isset($_GET['sortby_repayment_date7']))OR(isset($_GET['sortby_interest7']))OR(isset($_GET['loan_amount_search7']))OR(isset($_GET['interest_search7']))OR(isset($_GET['trustscore_search7']))OR(isset($_GET['repayment_date_search7']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-visible";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-visible";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more7']))OR(isset($_GET['sortby_newest8']))OR(isset($_GET['sortby_loan_amount8']))OR(isset($_GET['sortby_repayment_date8']))OR(isset($_GET['sortby_interest8']))OR(isset($_GET['loan_amount_search8']))OR(isset($_GET['interest_search8']))OR(isset($_GET['trustscore_search8']))OR(isset($_GET['repayment_date_search8']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-visible";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-visible";
	$class_search9 = "search-hidden";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more8']))OR(isset($_GET['sortby_newest9']))OR(isset($_GET['sortby_loan_amount9']))OR(isset($_GET['sortby_repayment_date9']))OR(isset($_GET['sortby_interest9']))OR(isset($_GET['loan_amount_search9']))OR(isset($_GET['interest_search9']))OR(isset($_GET['trustscore_search9']))OR(isset($_GET['repayment_date_search9']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-visible";
	$class_sort10 = "sort-by-hidden";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-visible";
	$class_search10 = "search-hidden";
	
	$classButton = "borrow-button-container";
}
if ((isset($_GET['load_more9']))OR(isset($_GET['sortby_newest10']))OR(isset($_GET['sortby_loan_amount10']))OR(isset($_GET['sortby_repayment_date10']))OR(isset($_GET['sortby_interest10']))OR(isset($_GET['loan_amount_search10']))OR(isset($_GET['interest_search10']))OR(isset($_GET['trustscore_search10']))OR(isset($_GET['repayment_date_search10']))) {
	$requests_display = "inline";
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
	
	$class_sort1 = "sort-by-hidden";
	$class_sort2 = "sort-by-hidden";
	$class_sort3 = "sort-by-hidden";
	$class_sort4 = "sort-by-hidden";
	$class_sort5 = "sort-by-hidden";
	$class_sort6 = "sort-by-hidden";
	$class_sort7 = "sort-by-hidden";
	$class_sort8 = "sort-by-hidden";
	$class_sort9 = "sort-by-hidden";
	$class_sort10 = "sort-by-visible";
	
	$class_search1 = "search-hidden";
	$class_search2 = "search-hidden";
	$class_search3 = "search-hidden";
	$class_search4 = "search-hidden";
	$class_search5 = "search-hidden";
	$class_search6 = "search-hidden";
	$class_search7 = "search-hidden";
	$class_search8 = "search-hidden";
	$class_search9 = "search-hidden";
	$class_search10 = "search-visible";
	
	$classButton = "borrow-button-container-noloadmore";
}






$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');

if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
}



if(isset($_GET['loan_amount_search1']) AND !empty($_GET['loan_amount_search1'])){
$usersSearch1 = $_GET['loan_amount_search1'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.', 30');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search1']) AND !empty($_GET['interest_search1'])){
$usersSearch2 = $_GET['interest_search1'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.', 30');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search1']) AND !empty($_GET['trustscore_search1'])){

	
$usersSearch3 = $_GET['trustscore_search1'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.', 30');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search1']) AND !empty($_GET['repayment_date_search1'])){
$usersSearch4 = $_GET['repayment_date_search1'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.', 30');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear1']) AND !empty($_GET['clear1'])){
	
	$clear_filters = $_GET['clear1'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if(isset($_GET['loan_amount_search2']) AND !empty($_GET['loan_amount_search2'])){
$usersSearch1 = $_GET['loan_amount_search2'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search2']) AND !empty($_GET['interest_search2'])){
$usersSearch2 = $_GET['interest_search2'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search2']) AND !empty($_GET['trustscore_search2'])){

	
$usersSearch3 = $_GET['trustscore_search2'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search2']) AND !empty($_GET['repayment_date_search2'])){
$usersSearch4 = $_GET['repayment_date_search2'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear2']) AND !empty($_GET['clear2'])){
	
	$clear_filters = $_GET['clear2'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}

if(isset($_GET['loan_amount_search3']) AND !empty($_GET['loan_amount_search3'])){
$usersSearch1 = $_GET['loan_amount_search3'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search3']) AND !empty($_GET['interest_search3'])){
$usersSearch2 = $_GET['interest_search3'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search3']) AND !empty($_GET['trustscore_search3'])){

	
$usersSearch3 = $_GET['trustscore_search3'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search3']) AND !empty($_GET['repayment_date_search3'])){
$usersSearch4 = $_GET['repayment_date_search3'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear3']) AND !empty($_GET['clear3'])){
	
	$clear_filters = $_GET['clear3'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}

if(isset($_GET['loan_amount_search4']) AND !empty($_GET['loan_amount_search4'])){
$usersSearch1 = $_GET['loan_amount_search4'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search4']) AND !empty($_GET['interest_search4'])){
$usersSearch2 = $_GET['interest_search4'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search4']) AND !empty($_GET['trustscore_search4'])){

	
$usersSearch3 = $_GET['trustscore_search4'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search4']) AND !empty($_GET['repayment_date_search4'])){
$usersSearch4 = $_GET['repayment_date_search4'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear4']) AND !empty($_GET['clear4'])){
	
	$clear_filters = $_GET['clear4'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if(isset($_GET['loan_amount_search5']) AND !empty($_GET['loan_amount_search5'])){
$usersSearch1 = $_GET['loan_amount_search5'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search5']) AND !empty($_GET['interest_search5'])){
$usersSearch2 = $_GET['interest_search5'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search5']) AND !empty($_GET['trustscore_search5'])){

	
$usersSearch3 = $_GET['trustscore_search5'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search5']) AND !empty($_GET['repayment_date_search5'])){
$usersSearch4 = $_GET['repayment_date_search5'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear5']) AND !empty($_GET['clear5'])){
	
	$clear_filters = $_GET['clear5'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if(isset($_GET['loan_amount_search6']) AND !empty($_GET['loan_amount_search6'])){
$usersSearch1 = $_GET['loan_amount_search6'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search6']) AND !empty($_GET['interest_search6'])){
$usersSearch2 = $_GET['interest_search6'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search6']) AND !empty($_GET['trustscore_search6'])){

	
$usersSearch3 = $_GET['trustscore_search6'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search6']) AND !empty($_GET['repayment_date_search6'])){
$usersSearch4 = $_GET['repayment_date_search6'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear6']) AND !empty($_GET['clear6'])){
	
	$clear_filters = $_GET['clear6'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}



if(isset($_GET['loan_amount_search7']) AND !empty($_GET['loan_amount_search7'])){
$usersSearch1 = $_GET['loan_amount_search7'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search7']) AND !empty($_GET['interest_search7'])){
$usersSearch2 = $_GET['interest_search7'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search7']) AND !empty($_GET['trustscore_search7'])){

	
$usersSearch3 = $_GET['trustscore_search7'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search7']) AND !empty($_GET['repayment_date_search7'])){
$usersSearch4 = $_GET['repayment_date_search7'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear7']) AND !empty($_GET['clear7'])){
	
	$clear_filters = $_GET['clear7'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if(isset($_GET['loan_amount_search8']) AND !empty($_GET['loan_amount_search8'])){
$usersSearch1 = $_GET['loan_amount_search8'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search8']) AND !empty($_GET['interest_search8'])){
$usersSearch2 = $_GET['interest_search8'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search8']) AND !empty($_GET['trustscore_search8'])){

	
$usersSearch3 = $_GET['trustscore_search8'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search8']) AND !empty($_GET['repayment_date_search8'])){
$usersSearch4 = $_GET['repayment_date_search8'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear8']) AND !empty($_GET['clear8'])){
	
	$clear_filters = $_GET['clear8'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}



if(isset($_GET['loan_amount_search9']) AND !empty($_GET['loan_amount_search9'])){
$usersSearch1 = $_GET['loan_amount_search9'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search9']) AND !empty($_GET['interest_search9'])){
$usersSearch2 = $_GET['interest_search9'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search9']) AND !empty($_GET['trustscore_search9'])){

	
$usersSearch3 = $_GET['trustscore_search9'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search9']) AND !empty($_GET['repayment_date_search9'])){
$usersSearch4 = $_GET['repayment_date_search9'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear9']) AND !empty($_GET['clear9'])){
	
	$clear_filters = $_GET['clear9'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if(isset($_GET['loan_amount_search10']) AND !empty($_GET['loan_amount_search10'])){
$usersSearch1 = $_GET['loan_amount_search10'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND loan_amount >= '.$usersSearch1.' ORDER BY loan_amount DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['interest_search10']) AND !empty($_GET['interest_search10'])){
$usersSearch2 = $_GET['interest_search10'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (((repayment_amount/loan_amount)-1)*100) >= '.$usersSearch2.' ORDER BY interest DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['trustscore_search10']) AND !empty($_GET['trustscore_search10'])){

	
$usersSearch3 = $_GET['trustscore_search10'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND borrower_trustscore >= '.$usersSearch3.' ORDER BY borrower_trustscore DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}			


if(isset($_GET['repayment_date_search10']) AND !empty($_GET['repayment_date_search10'])){
$usersSearch4 = $_GET['repayment_date_search10'];
$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" AND (repayment_date BETWEEN "2000-10-10" AND "'.$usersSearch4.'") ORDER BY repayment_date DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Requests Found. Please try different Filters.";
	}
}


if(isset($_GET['clear10']) AND !empty($_GET['clear10'])){
	
	$clear_filters = $_GET['clear10'];
	$getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}








if (isset($_GET['sortby_newest1'])){
	
	$sortby_newest = $_GET['sortby_newest1'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount1'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount1'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date1'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date1'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest1'])){
	
	$sortby_interest = $_GET['sortby_interest1'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_newest2'])){
	
	$sortby_newest = $_GET['sortby_newest2'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount2'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount2'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date2'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date2'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest2'])){
	
	$sortby_interest = $_GET['sortby_interest2'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}

if (isset($_GET['sortby_newest3'])){
	
	$sortby_newest = $_GET['sortby_newest3'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount3'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount3'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date3'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date3'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest3'])){
	
	$sortby_interest = $_GET['sortby_interest3'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_newest4'])){
	
	$sortby_newest = $_GET['sortby_newest4'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount4'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount4'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date4'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date4'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest4'])){
	
	$sortby_interest = $_GET['sortby_interest4'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_newest5'])){
	
	$sortby_newest = $_GET['sortby_newest5'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount5'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount5'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date5'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date5'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest5'])){
	
	$sortby_interest = $_GET['sortby_interest5'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_newest6'])){
	
	$sortby_newest = $_GET['sortby_newest6'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount6'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount6'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date6'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date6'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest6'])){
	
	$sortby_interest = $_GET['sortby_interest6'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_newest7'])){
	
	$sortby_newest = $_GET['sortby_newest7'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount7'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount7'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date7'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date7'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest7'])){
	
	$sortby_interest = $_GET['sortby_interest7'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}



if (isset($_GET['sortby_newest8'])){
	
	$sortby_newest = $_GET['sortby_newest8'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount8'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount8'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date8'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date8'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest8'])){
	
	$sortby_interest = $_GET['sortby_interest8'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_newest9'])){
	
	$sortby_newest = $_GET['sortby_newest9'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount9'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount9'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date9'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date9'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest9'])){
	
	$sortby_interest = $_GET['sortby_interest9'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}




if (isset($_GET['sortby_newest10'])){
	
	$sortby_newest = $_GET['sortby_newest10'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY id DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_loan_amount10'])){
	
	$sortby_loan_amount = $_GET['sortby_loan_amount10'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY loan_amount+0 ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_repayment_date10'])){
	
	$sortby_repayment_date = $_GET['sortby_repayment_date10'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY repayment_date ASC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}


if (isset($_GET['sortby_interest10'])){
	
	$sortby_interest = $_GET['sortby_interest10'];
    $getAllQuestions = $bdd->query('SELECT ROUND(((repayment_amount/loan_amount)-1)*100) AS interest, id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, borrower_trustscore, borrower_positive_feedback, borrower_negative_feedback FROM loan WHERE status = "request" ORDER BY interest+0 DESC LIMIT '.$limitLow.','.$limitHigh.'');
	
	if($getAllQuestions->rowCount() == 0){
	$errorMsg = "No Loan Requests Found";
	}
}