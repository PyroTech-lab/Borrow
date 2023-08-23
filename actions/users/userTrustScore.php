<?php

require('actions/database.php');
require('actions/questions/showArticleContentAction.php');
require('actions/users/userFeedbackLoanAction.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfLoan = $_GET['id'];
	
$getBorrowerId = $bdd->prepare('SELECT id_borrower FROM loan WHERE id = ?');
$getBorrowerId->execute(array($idOfLoan));

$row = $getBorrowerId->fetch(PDO::FETCH_ASSOC);
	$getIDfromBorrower = $row['id_borrower'];
	

$CheckVerifications = $bdd->prepare('SELECT email_verified, phone_number, address, identity_card, join_date FROM users WHERE id = ?');
$CheckVerifications->execute(array($getIDfromBorrower));


	$userVerifications = $CheckVerifications->fetch(PDO::FETCH_ASSOC);
	$email_verified = $userVerifications['email_verified'];
	$phone_verified = $userVerifications['phone_number'];
	$address_verified = $userVerifications['address'];
	$idcard_verified = $userVerifications['identity_card'];
	$join_date = $userVerifications['join_date'];
	
	if (strlen($email_verified) == 0) {
		$email = "0";
	
	}else{
		$email = "10";
	}
	
	
	if (strlen($phone_verified) == 0) {
		$phone = "0";
	
	}else{
		$phone = "10";
	}
	
	
	if (strlen($address_verified) == 0) {
		$address = "0";
	
	}else{
		$address = "10";
	}
	
	
	if (strlen($idcard_verified) == 0) {
		$idcard = "0";
	
	}else{
		$CheckIDVerified = $bdd->prepare('SELECT id_verified FROM users WHERE id = ?');
		$CheckIDVerified->execute(array($getIDfromBorrower));
		
		$row311 = $CheckIDVerified->fetch(PDO::FETCH_ASSOC);
		$verified_orNot311 = $row311['id_verified'];
		
		if($verified_orNot311 == "verified"){
		$idcard = "20";
		}
		
		if($verified_orNot311 == "under_verification"){
		$idcard = "0";
		}
	}
	
	
	
	
	$time_since_join = ((abs(strtotime(date("Y-m-d")) - strtotime($join_date)))/86400)/30;
	
	$trustscore1 = $email+$phone+$address+$idcard;
	
	$trustscore2 = ($trustscore1+sqrt($getBorrowedAmountMessage))-(exp($PaidLateCountMessage)-1);
	
	$trustscore3 = $trustscore2*(1-$unpaidCountMessage);
	
	$trustscore4 = $trustscore3+(2*sqrt($time_since_join));
	
	$trustscore5 = $trustscore4+$positive_feedback-(3*$negative_feedback);
	
	$trustscore6 = max($trustscore5, 0);
	$trustscore7 = min($trustscore6, 100);
	
$UpdateTrustscore = $bdd->prepare('UPDATE loan SET borrower_trustscore = '.$trustscore7.' WHERE id_borrower = ?');
$UpdateTrustscore->execute(array($getIDfromBorrower));
}