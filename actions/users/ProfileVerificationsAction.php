<?php

require('actions/database.php');

$verifyAccount = $bdd->prepare('SELECT phone_number FROM users WHERE id = ?');
$verifyAccount->execute(array($_SESSION['id']));


	$row = $verifyAccount->fetch(PDO::FETCH_ASSOC);
	$verified_orNot = $row['phone_number'];
	
	if (strlen($verified_orNot) == 0) {
		$not_verified_phone = "Not Verified";
		$cross1 = "assets/images/cross.png";
	
	}else{
		$verified_phone = "Verified";
		$checkmark1 ="assets/images/checkmark.png";
	}
	


$verifyAccount2 = $bdd->prepare('SELECT address FROM users WHERE id = ?');
$verifyAccount2->execute(array($_SESSION['id']));


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
$verifyAccount3->execute(array($_SESSION['id']));


	$row3 = $verifyAccount3->fetch(PDO::FETCH_ASSOC);
	$verified_orNot3 = $row3['identity_card'];
	
	if (strlen($verified_orNot3) == 0) {
		$not_verified_idcard = "Not Verified";
		$cross3 = "assets/images/cross.png";
	
	}else{
		$verified_idcard = "Verified";
		$checkmark3 ="assets/images/checkmark.png";
	}