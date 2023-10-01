<?php

require('actions/database.php');


$verifyAccount = $bdd->prepare('SELECT phone_number, join_date FROM users WHERE id = ?');
$verifyAccount->execute(array($_SESSION['id']));


	$row = $verifyAccount->fetch(PDO::FETCH_ASSOC);
	$verified_orNot = $row['phone_number'];
	$user_join_date= $row['join_date'];
	
	if (strlen($verified_orNot) == 0) {
		$not_verified_phone = "Not&nbsp;Verified";
		$cross1 = "assets/images/cross.png";
		$phone_placeholder = "Add Phone Number";
	
	}else{
		$verified_phone = "Verified";
		$checkmark1 ="assets/images/checkmark.png";
		$phone_placeholder = "Change Phone Number";
	}
	


$verifyAccount2 = $bdd->prepare('SELECT address, city, postcode, country FROM users WHERE id = ?');
$verifyAccount2->execute(array($_SESSION['id']));


	$row2 = $verifyAccount2->fetch(PDO::FETCH_ASSOC);
	$verified_orNot2 = $row2['address'];
	$city = $row2['city'];
	$postcode = $row2['postcode'];
	$country = $row2['country'];
	
	if (strlen($postcode) !== 0) {
	$separator = ",";	
	}
	
	if (strlen($verified_orNot2) == 0) {
		$not_verified_address = "Not&nbsp;Verified";
		$cross2 = "assets/images/cross.png";
		$address_placeholder = "Add Address";
	
	}else{
		$verified_address = "Verified";
		$checkmark2 ="assets/images/checkmark.png";
		$address_placeholder = "Change Address";
	}
	


$verifyAccount3 = $bdd->prepare('SELECT identity_card FROM users WHERE id = ?');
$verifyAccount3->execute(array($_SESSION['id']));


	$row3 = $verifyAccount3->fetch(PDO::FETCH_ASSOC);
	$verified_orNot3 = $row3['identity_card'];
	
	if (strlen($verified_orNot3) == 0) {
		$not_verified_idcard = "Not&nbsp;Verified";
		$cross3 = "assets/images/cross.png";
		$setbutton_class = "set-button";
		$uploadDisplay="block";
		$setbutton_value = "Upload ID & Picture";
		$verification_display = "none";
	
	}else{
		
		$verifyAccount31 = $bdd->prepare('SELECT id_verified FROM users WHERE id = ?');
		$verifyAccount31->execute(array($_SESSION['id']));
		
		$row31 = $verifyAccount31->fetch(PDO::FETCH_ASSOC);
		$verified_orNot31 = $row31['id_verified'];
		
		if($verified_orNot31 == "verified"){

		$verified_idcard = "Verified";
		$checkmark3 ="assets/images/checkmark.png";
		$uploadDisplay="none";
		$upload_disabled="disabled";
		$setbutton_class = "set-button2";
		$setbutton_value = "ID & Picture Verified";
		$verification_display = "none";
		
		}
		
		if($verified_orNot31 == "under_verification"){

		$underverification_idcard = "Under&nbsp;Verification";
		$underverification_idcard2 = "Under&nbsp;Review";
		$cross31 ="assets/images/cross2.png";
		$uploadDisplay="none";
		$upload_disabled="disabled";
		$setbutton_class = "set-button3";
		$setbutton_value = "ID & Picture Under Verification";
		$verification_display = "inline";
		
		}
	}
	
	

$verifyAccount4 = $bdd->prepare('SELECT email, email_verified FROM users WHERE id = ?');
$verifyAccount4->execute(array($_SESSION['id']));


	$row4 = $verifyAccount4->fetch(PDO::FETCH_ASSOC);
	$verified_orNot4 = $row4['email_verified'];
	
	if (strlen($verified_orNot4) == 0) {
		$not_verified_email = "Not&nbsp;Verified";
		$email_button = "Verify Email";
		$email_button_class = "set-button";
		$cross4 = "assets/images/cross.png";
	
	}else{
		$verified_email = "Verified";
		$email_button = "Email Verified";
		$email_button_class = "set-button-verified";
		$disabled = "disabled";
		$checkmark4 ="assets/images/checkmark.png";
	}