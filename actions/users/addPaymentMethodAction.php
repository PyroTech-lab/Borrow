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








if(isset($_POST['wise_submit'])){
	
		$id_user6 = $_SESSION['id'];
	
			$wise_set = htmlspecialchars($_POST['wise_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE payment_method SET wise = ? WHERE id_user= ?');
			$insertQuestionOnWebsite->execute(array($wise_set, $id_user6));
			
			header("Refresh:0");
				}
				
				
				
				
				







if(isset($_POST['remove_paypal'])){
$removePaypal = $bdd->prepare('UPDATE payment_method SET paypal = NULL WHERE id_user= ?');
    $removePaypal->execute(array($_SESSION['id']));
	
	header("Refresh:0");
}


if(isset($_POST['remove_cashapp'])){
$removeCashapp = $bdd->prepare('UPDATE payment_method SET cashapp = NULL WHERE id_user= ?');
    $removeCashapp->execute(array($_SESSION['id']));
	
	header("Refresh:0");
}



if(isset($_POST['remove_venmo'])){
$removeVenmo = $bdd->prepare('UPDATE payment_method SET venmo = NULL WHERE id_user= ?');
    $removeVenmo->execute(array($_SESSION['id']));
	
	header("Refresh:0");
}


if(isset($_POST['remove_zelle'])){
$removeZelle = $bdd->prepare('UPDATE payment_method SET zelle = NULL WHERE id_user= ?');
    $removeZelle->execute(array($_SESSION['id']));
	
	header("Refresh:0");
}


if(isset($_POST['remove_chime'])){
$removeChime = $bdd->prepare('UPDATE payment_method SET chime = NULL WHERE id_user= ?');
    $removeChime->execute(array($_SESSION['id']));
	
	header("Refresh:0");
}


if(isset($_POST['remove_wise'])){
$removeWise = $bdd->prepare('UPDATE payment_method SET wise = NULL WHERE id_user= ?');
    $removeWise->execute(array($_SESSION['id']));
	
	header("Refresh:0");
}