<?php

require('actions/database.php');
require('actions/users/showOneUsersProfileAction.php');
require('actions/users/userFeedbackProfileAction.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfUser = $_GET['id'];
	

	$CheckVerifications = $bdd->prepare('SELECT email_verified, phone_number, address, identity_card, join_date FROM users WHERE id = ?');
	$CheckVerifications->execute(array($idOfUser));


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
		$idcard = "20";
	}
	
	
	
	
	$time_since_join = ((abs(strtotime(date("Y-m-d")) - strtotime($join_date)))/86400)/30;
	
	$trustscore1 = $email+$phone+$address+$idcard;
	
	$trustscore2 = ($trustscore1+sqrt($getBorrowedAmountMessage))-(exp($PaidLateCountMessage)-1);
	
	$trustscore3 = $trustscore2*(1-$unpaidCountMessage);
	
	$trustscore4 = $trustscore3+(2*sqrt($time_since_join));
	
	$trustscore5 = $trustscore4+$positive_feedback-(3*$negative_feedback);
	
	$trustscore6 = max($trustscore5, 0);
	$trustscore6 = min($trustscore5, 100);
	
	
$UpdateTrustscore = $bdd->prepare('UPDATE loan SET borrower_trustscore = '.$trustscore6.' WHERE id_borrower = ?');
$UpdateTrustscore->execute(array($idOfUser));
	
}