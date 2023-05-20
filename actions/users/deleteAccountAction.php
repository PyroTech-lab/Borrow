<?php

require('actions/database.php');

if(isset($_POST['delete_account'])){
	
	
	
	$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE (id_borrower OR id_lender) = ?');
	$getAllLoans->execute(array($_SESSION['id']));


	if($getAllLoans->rowCount() == 0){
		
	$deleteAllLoans = $bdd->prepare('DELETE FROM loans WHERE id_borrower = ? OR id_lender= ?');
    $deleteAllLoans->execute(array($_SESSION['id']));
	
	$deletePaymentMethods = $bdd->prepare('DELETE FROM payment_method WHERE id_user = ?');
    $deletePaymentMethods->execute(array($_SESSION['id']));
	
	$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
    $deleteUser->execute(array($_SESSION['id']));
	
	header("index.php");
	
	}else{
		$errorMsg = "You cannot delete your account because you have active loans.";
	}




}