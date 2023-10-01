<?php

require('actions/database.php');


if(isset($_POST['paypal_submit'])){
	
		$id_user1 = $_SESSION['id'];
	
			$paypal_set = htmlspecialchars($_POST['paypal_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE payment_method SET paypal = ? WHERE id_user= ?');
			$insertQuestionOnWebsite->execute(array($paypal_set, $id_user1));
			
			header("Refresh:0");
				}


if(isset($_POST['cashapp_submit'])){
	
		$id_user2 = $_SESSION['id'];
	
			$cashapp_set = htmlspecialchars($_POST['cashapp_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE payment_method SET cashapp = ? WHERE id_user= ?');
			$insertQuestionOnWebsite->execute(array($cashapp_set, $id_user2));
			
			header("Refresh:0");
				}
				
				

if(isset($_POST['venmo_submit'])){
	
		$id_user3 = $_SESSION['id'];
	
			$venmo_set = htmlspecialchars($_POST['venmo_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE payment_method SET venmo = ? WHERE id_user= ?');
			$insertQuestionOnWebsite->execute(array($venmo_set, $id_user3));
			
			header("Refresh:0");
				}
				
				
				
				

if(isset($_POST['zelle_submit'])){
	
		$id_user4 = $_SESSION['id'];
	
			$zelle_set = htmlspecialchars($_POST['zelle_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE payment_method SET zelle = ? WHERE id_user= ?');
			$insertQuestionOnWebsite->execute(array($zelle_set, $id_user4));
			
			header("Refresh:0");
				}
				
				
				
				
				
				
if(isset($_POST['chime_submit'])){
	
		$id_user5 = $_SESSION['id'];
	
			$chime_set = htmlspecialchars($_POST['chime_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE payment_method SET chime = ? WHERE id_user= ?');
			$insertQuestionOnWebsite->execute(array($chime_set, $id_user5));
			
			header("Refresh:0");
				}



				
				







if(isset($_POST['remove_paypal'])){

$CheckOtherPaymentmethods = $bdd->prepare('SELECT * FROM payment_method WHERE id_user= ?');
$CheckOtherPaymentmethods->execute(array($_SESSION['id']));	
	
$CheckForPaypal = $CheckOtherPaymentmethods->fetch(PDO::FETCH_ASSOC);
$checkCashapp = $CheckForPaypal['cashapp'];
$checkVenmo = $CheckForPaypal['venmo'];
$checkZelle = $CheckForPaypal['zelle'];
$checkChime = $CheckForPaypal['chime'];
	
if ((strlen($checkCashapp) == 0)AND(strlen($checkVenmo) == 0)AND(strlen($checkZelle)== 0)AND(strlen($checkChime) == 0)) {

	$error_message1 = "<div class='error-message'>You Cannot Remove your only Payment Method</div>";
	
	}else {
		$removePaypal = $bdd->prepare('UPDATE payment_method SET paypal = NULL WHERE id_user= ?');
		$removePaypal->execute(array($_SESSION['id']));
		
		header("Refresh:0");
	}
	
}


if(isset($_POST['remove_cashapp'])){

$CheckOtherPaymentmethods = $bdd->prepare('SELECT * FROM payment_method WHERE id_user= ?');
$CheckOtherPaymentmethods->execute(array($_SESSION['id']));	
	
$CheckForCashapp = $CheckOtherPaymentmethods->fetch(PDO::FETCH_ASSOC);
$checkPaypal = $CheckForCashapp['paypal'];
$checkVenmo = $CheckForCashapp['venmo'];
$checkZelle = $CheckForCashapp['zelle'];
$checkChime = $CheckForCashapp['chime'];
	
if ((strlen($checkPaypal) == 0)AND(strlen($checkVenmo) == 0)AND(strlen($checkZelle)== 0)AND(strlen($checkChime) == 0)) {

	$error_message2 = "<div class='error-message'>You Cannot Remove your only Payment Method</div>";
	
	}else {
		$removePaypal = $bdd->prepare('UPDATE payment_method SET cashapp = NULL WHERE id_user= ?');
		$removePaypal->execute(array($_SESSION['id']));
		
		header("Refresh:0");
	}
	
}



if(isset($_POST['remove_venmo'])){

$CheckOtherPaymentmethods = $bdd->prepare('SELECT * FROM payment_method WHERE id_user= ?');
$CheckOtherPaymentmethods->execute(array($_SESSION['id']));	
	
$CheckForVenmo = $CheckOtherPaymentmethods->fetch(PDO::FETCH_ASSOC);
$checkCashapp = $CheckForVenmo['cashapp'];
$checkPaypal = $CheckForVenmo['paypal'];
$checkZelle = $CheckForVenmo['zelle'];
$checkChime = $CheckForVenmo['chime'];
	
if ((strlen($checkCashapp) == 0)AND(strlen($checkPaypal) == 0)AND(strlen($checkZelle)== 0)AND(strlen($checkChime) == 0)) {

	$error_message3 = "<div class='error-message'>You Cannot Remove your only Payment Method</div>";
	
	}else {
		$removePaypal = $bdd->prepare('UPDATE payment_method SET venmo = NULL WHERE id_user= ?');
		$removePaypal->execute(array($_SESSION['id']));
		
		header("Refresh:0");
	}
	
}


if(isset($_POST['remove_zelle'])){

$CheckOtherPaymentmethods = $bdd->prepare('SELECT * FROM payment_method WHERE id_user= ?');
$CheckOtherPaymentmethods->execute(array($_SESSION['id']));	
	
$CheckForZelle = $CheckOtherPaymentmethods->fetch(PDO::FETCH_ASSOC);
$checkCashapp = $CheckForZelle['cashapp'];
$checkVenmo = $CheckForZelle['venmo'];
$checkPaypal = $CheckForZelle['paypal'];
$checkChime = $CheckForZelle['chime'];
	
if ((strlen($checkCashapp) == 0)AND(strlen($checkVenmo) == 0)AND(strlen($checkPaypal)== 0)AND(strlen($checkChime) == 0)) {

	$error_message4 = "<div class='error-message'>You Cannot Remove your only Payment Method</div>";
	
	}else {
		$removePaypal = $bdd->prepare('UPDATE payment_method SET zelle = NULL WHERE id_user= ?');
		$removePaypal->execute(array($_SESSION['id']));
		
		header("Refresh:0");
	}
	
}


if(isset($_POST['remove_chime'])){

$CheckOtherPaymentmethods = $bdd->prepare('SELECT * FROM payment_method WHERE id_user= ?');
$CheckOtherPaymentmethods->execute(array($_SESSION['id']));	
	
$CheckForChime = $CheckOtherPaymentmethods->fetch(PDO::FETCH_ASSOC);
$checkCashapp = $CheckForChime['cashapp'];
$checkVenmo = $CheckForChime['venmo'];
$checkZelle = $CheckForChime['zelle'];
$checkPaypal = $CheckForChime['paypal'];
	
if ((strlen($checkCashapp) == 0)AND(strlen($checkVenmo) == 0)AND(strlen($checkZelle)== 0)AND(strlen($checkPaypal) == 0)) {

	$error_message5 = "<div class='error-message'>You Cannot Remove your only Payment Method</div>";
	
	}else {
		$removePaypal = $bdd->prepare('UPDATE payment_method SET chime = NULL WHERE id_user= ?');
		$removePaypal->execute(array($_SESSION['id']));
		
		header("Refresh:0");
	}
	
}
