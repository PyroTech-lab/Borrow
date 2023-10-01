<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfUser = $_GET['id'];
	
$getBorrowerId = $bdd->prepare('SELECT id_borrower FROM loan WHERE id = ?');
$getBorrowerId->execute(array($idOfUser));

$row = $getBorrowerId->fetch(PDO::FETCH_ASSOC);
	$getIDfromBorrower = $row['id_borrower'];
	

$verifyAccount = $bdd->prepare('SELECT phone_number, join_date FROM users WHERE id = ?');
$verifyAccount->execute(array($getIDfromBorrower));


	$row = $verifyAccount->fetch(PDO::FETCH_ASSOC);
	$verified_orNot = $row['phone_number'];
	$user_join_date = $row['join_date'];
	
	if (strlen($verified_orNot) == 0) {
		$not_verified_phone = "Not Verified";
		$cross1 = "assets/images/cross.png";
	
	}else{
		$verified_phone = "Verified";
		$checkmark1 ="assets/images/checkmark.png";
	}
	


$verifyAccount2 = $bdd->prepare('SELECT address FROM users WHERE id = ?');
$verifyAccount2->execute(array($getIDfromBorrower));


	$row2 = $verifyAccount2->fetch(PDO::FETCH_ASSOC);
	$verified_orNot2 = $row2['address'];
	
	if (strlen($verified_orNot2) == 0) {
		$not_verified_address = "Not Verified";
		$cross2 = "assets/images/cross.png";
	
	}else{
		$verified_address = "Verified";
		$checkmark2 ="assets/images/checkmark.png";
	}
	


$verifyAccount3 = $bdd->prepare('SELECT identity_card FROM users WHERE id = ?');
$verifyAccount3->execute(array($getIDfromBorrower));


	$row3 = $verifyAccount3->fetch(PDO::FETCH_ASSOC);
	$verified_orNot3 = $row3['identity_card'];
	
	if (strlen($verified_orNot3) == 0) {
		$not_verified_idcard = "Not Verified";
		$cross3 = "assets/images/cross.png";
		$setbutton_class = "set-button";
		$uploadDisplay="block";
		$setbutton_value = "Upload ID";
		$box_display = "none";
	
	}else{
		
		$verifyAccount31 = $bdd->prepare('SELECT id_verified FROM users WHERE id = ?');
		$verifyAccount31->execute(array($getIDfromBorrower));
		
		$row31 = $verifyAccount31->fetch(PDO::FETCH_ASSOC);
		$verified_orNot31 = $row31['id_verified'];
		
		if($verified_orNot31 == "verified"){

		$verified_idcard = "Verified";
		$checkmark3 ="assets/images/checkmark.png";
		$uploadDisplay="none";
		$upload_disabled="disabled";
		$setbutton_class = "set-button2";
		$setbutton_value = "ID Verified";
		$box_display = "none";
		
		}
		
		if($verified_orNot31 == "under_verification"){

		$underverification_idcard = "Under Verification";
		$cross31 ="assets/images/cross2.png";
		$uploadDisplay="none";
		$upload_disabled="disabled";
		$setbutton_class = "set-button3";
		$setbutton_value = "ID Under Verification";
		$box_display = "inline";
		$margin_left = "-20px;";
		$margin_left2 = "-28px;";
		
		}
	}
	
	
	
$verifyAccount4 = $bdd->prepare('SELECT email, email_verified FROM users WHERE id = ?');
$verifyAccount4->execute(array($getIDfromBorrower));


	$row4 = $verifyAccount4->fetch(PDO::FETCH_ASSOC);
	$verified_orNot4 = $row4['email_verified'];
	
	if (strlen($verified_orNot4) == 0) {
		$not_verified_email = "Not Verified";
		$cross4 = "assets/images/cross.png";
	
	}else{
		$verified_email = "Verified";
		$checkmark4 ="assets/images/checkmark.png";
	}
	
}