<?php

require('actions/database.php');

$visible_onload_deleteaccount = "";

if(isset($_POST['delete_account'])){
	
	if(!empty($_POST['deleteaccount_password'])){
		
	$user_curent_password = htmlspecialchars($_POST['deleteaccount_password']);
	
	$GetPassword = $bdd->prepare('SELECT password FROM users WHERE id = ?');
	$GetPassword->execute(array($_SESSION['id']));
		
    $PasswordInfo = $GetPassword->fetch();
	
	if(password_verify($user_curent_password, $PasswordInfo['password'])){
	
	$sesion_id_1 = $_SESSION['id'];
	$sesion_id_2 = $_SESSION['id'];
	
	$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE (id_borrower= ? OR id_lender = ?) AND NOT(status="paid_ontime" OR status="paid_late" OR status="paid_ontime_notseen" OR status="paid_late_notseen" OR status="request" OR Status="unpaid_banned_archived")');
	$getAllLoans->execute(array($sesion_id_1, $sesion_id_2));


	if($getAllLoans->rowCount() == 0){
		
	$TranferUsertoDeletedTable = $bdd->prepare('INSERT INTO deleted_users(id_user, email, name, username, phone_number, address, city, country, identity_card) SELECT id, email, name, username, phone_number, address, city, country, identity_card FROM users WHERE id = ?');
    $TranferUsertoDeletedTable->execute(array($_SESSION['id']));
		
	$deleteAllLoans = $bdd->prepare('DELETE FROM loan WHERE id_borrower= ? AND status="request"');
    $deleteAllLoans->execute(array($_SESSION['id']));
	
	$deletePaymentMethods = $bdd->prepare('DELETE FROM payment_method WHERE id_user = ?');
    $deletePaymentMethods->execute(array($_SESSION['id']));
	
	$deleteFeedback = $bdd->prepare('DELETE FROM feedback WHERE id_user = ?');
    $deleteFeedback->execute(array($_SESSION['id']));
	
	$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
    $deleteUser->execute(array($_SESSION['id']));
	
	session_destroy();
	header('Location: index.php');
	
	}else{
		$errorMsg = "You cannot delete your account because you have active loans.";
		$visible_onload_deleteaccount = "-visible";
	}
	
	}else{
		$errorMsg = "Wrong password";
		$visible_onload_deleteaccount = "-visible";
	}
	
	}else{
		$errorMsg = "Please enter your password.";
		$visible_onload_deleteaccount = "-visible";
	}

}