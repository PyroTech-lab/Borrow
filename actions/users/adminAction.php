<?php

require('actions/database.php');
	
$GetLoansUnderverification = $bdd->prepare('SELECT * FROM loan WHERE repayment_received ="no_correct_id_notconfirmed" ');
$GetLoansUnderverification->execute(array());


	$question = $GetLoansUnderverification->fetch();
		
	$idOfLoan = $question['id'];
	$id_lender = $question['id_lender'];
	$username_lender = $question['username_lender'];
	$id_borrower = $question['id_borrower'];
	$loan_amount = $question['loan_amount'];
	$repayment_amount = $question['repayment_amount'];
	$repayment_date = $question['repayment_date'];
	$payment_method_repayment = $question['payment_method_repayment'];
	$current_date = date('Y-m-d H:i:s');

if(isset($_POST['repaid'])){
	
	$SetPaymentmade= $bdd->prepare('UPDATE loan SET repayment_received="yes" WHERE id = ?');
	$SetPaymentmade->execute(array($idOfLoan));
	
	$result = "<span style='color: green;'>Loan Set as Repaid</span>";
}


if(isset($_POST['not_repaid'])){
	
	$SetPaymentmade= $bdd->prepare('UPDATE loan SET repayment_received="no_definitive" WHERE id = ?');
	$SetPaymentmade->execute(array($idOfLoan));
	
			$TranferUsertoBannedTable = $bdd->prepare('INSERT INTO banned_users(id_user, email, name, username, password, phone_number, address, city, country, identity_card, join_date) SELECT id, email, name, username, password, phone_number, address, city, country, identity_card, join_date FROM users WHERE id = ?');
			$TranferUsertoBannedTable->execute(array($id_borrower));
			
			$AddBanReason = $bdd->prepare('UPDATE banned_users SET reason="fraud", banned_date= ? WHERE id_user = ?');
			$AddBanReason->execute(array($id_borrower));
				
			$deleteLoanRequests = $bdd->prepare('DELETE FROM loan WHERE id_borrower= ? AND status="request"');
			$deleteLoanRequests->execute(array($id_borrower));
			
			$UpdateLoanStatus = $bdd->prepare('UPDATE loan SET status="unpaid_banned" WHERE id_borrower= ? AND (status="unpaid" OR status="unpaid_notseen")');
			$UpdateLoanStatus->execute(array($id_borrower));
			
			$deletePaymentMethods = $bdd->prepare('DELETE FROM payment_method WHERE id_user = ?');
			$deletePaymentMethods->execute(array($id_borrower));
			
			$deleteFeedback = $bdd->prepare('DELETE FROM feedback WHERE id_user = ?');
			$deleteFeedback->execute(array($id_borrower));
			
			$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
			$deleteUser->execute(array($id_borrower));
	
	$result = "<span style='color: red;'>Borrower Banned</span>";
}