<?php
require('actions/database.php');

$getPaypal = $bdd->prepare('SELECT paypal FROM payment_method WHERE id_user = ?');
$getPaypal->execute(array($_SESSION['id']));

$rowpaypal = $getPaypal->fetch(PDO::FETCH_ASSOC);
	$checkpaypal = $rowpaypal['paypal'];
	
	if (strlen($checkpaypal) == 0) {
		$paypal_no = "Not Set";
		$paypal_add = "Add Paypal Account";
	
	}else{
		$paypal_yes = "Set";
		$paypal_update = "Update Paypal Account";
	}
	

$getcashapp = $bdd->prepare('SELECT cashapp FROM payment_method WHERE id_user = ?');
$getcashapp->execute(array($_SESSION['id']));

$rowcashapp = $getcashapp->fetch(PDO::FETCH_ASSOC);
	$checkcashapp = $rowcashapp['cashapp'];
	
	if (strlen($checkcashapp) == 0) {
		$cashapp_no = "Not Set";
		$cashapp_add = "Add Cashapp Account";
	
	}else{
		$cashapp_yes = "Set";
		$cashapp_update = "Update Cashapp Account";
	}
	
	
	
$getvenmo = $bdd->prepare('SELECT venmo FROM payment_method WHERE id_user = ?');
$getvenmo->execute(array($_SESSION['id']));

$rowvenmo = $getvenmo->fetch(PDO::FETCH_ASSOC);
	$checkvenmo = $rowvenmo['venmo'];
	
	if (strlen($checkvenmo) == 0) {
		$venmo_no = "Not Set";
		$venmo_add = "Add Venmo Account";
	
	}else{
		$venmo_yes = "Set";
		$venmo_update = "Update Venmo Account";
	}
	
	
	
$getzelle = $bdd->prepare('SELECT zelle FROM payment_method WHERE id_user = ?');
$getzelle->execute(array($_SESSION['id']));

$rowzelle = $getzelle->fetch(PDO::FETCH_ASSOC);
	$checkzelle = $rowzelle['zelle'];
	
	if (strlen($checkzelle) == 0) {
		$zelle_no = "Not Set";
		$zelle_add = "Add Zelle Account";
	
	}else{
		$zelle_yes = "Set";
		$zelle_update = "Update Zelle Account";
	}
	
	




	
$getchime = $bdd->prepare('SELECT chime FROM payment_method WHERE id_user = ?');
$getchime->execute(array($_SESSION['id']));

$rowchime = $getchime->fetch(PDO::FETCH_ASSOC);
	$checkchime = $rowchime['chime'];
	
	if (strlen($checkchime) == 0) {
		$chime_no = "Not Set";
		$chime_add = "Add Chime Account";
	
	}else{
		$chime_yes = "Set";
		$chime_update = "Update Chime Account";
	}
	
	
	
	
	
$getwise = $bdd->prepare('SELECT wise FROM payment_method WHERE id_user = ?');
$getwise->execute(array($_SESSION['id']));

$rowwise = $getwise->fetch(PDO::FETCH_ASSOC);
	$checkwise = $rowwise['wise'];
	
	if (strlen($checkwise) == 0) {
		$wise_no = "Not Set";
		$wise_add = "Add WISE Account";
	
	}else{
		$wise_yes = "Set";
		$wise_update = "Update WISE Account";
	}
