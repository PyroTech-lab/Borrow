<?php

require('actions/database.php');


$checkIfLoanIsUnpaid = $bdd->prepare('SELECT * FROM loan WHERE (status="active" OR status="active_notseen") AND repayment_date < NOW() - INTERVAL 1 DAY');
$checkIfLoanIsUnpaid->execute(array());
			
	if($checkIfLoanIsUnpaid->rowCount() !== 0){	

	$SetLoanUnpaid = $bdd->prepare('UPDATE loan SET status="unpaid_notseen" WHERE (status="active" OR status="active_notseen") AND repayment_date < NOW() - INTERVAL 1 DAY');
	$SetLoanUnpaid->execute(array());
	}
	


$deleteOldRequest = $bdd->prepare('SELECT * FROM loan WHERE request_date < NOW() - INTERVAL 2 DAY  AND status="request"');
$deleteOldRequest->execute(array());
			
	if($deleteOldRequest->rowCount() !== 0){	
	
	$deleteFromDatabase = $bdd->query('DELETE FROM loan WHERE request_date < NOW() - INTERVAL 2 DAY  AND status="request"');
	}
	
	
	
$BanUnpaidBorrowers = $bdd->prepare('SELECT * FROM loan WHERE (status="unpaid" OR status="unpaid_notseen") AND repayment_date < NOW() - INTERVAL 7 DAY');
$BanUnpaidBorrowers->execute(array());
			
	if($BanUnpaidBorrowers->rowCount() !== 0){	
	
		$GetBorrower = $BanUnpaidBorrowers->fetch();

		$idBorrower = $GetBorrower['id_borrower'];
		$current_date = date('Y-m-d H:i:s');
		
			$TranferUsertoBannedTable = $bdd->prepare('INSERT INTO banned_users(id_user, email, name, username, password, phone_number, address, city, country, identity_card, join_date) SELECT id, email, name, username, password, phone_number, address, city, country, identity_card, join_date FROM users WHERE id = ?');
			$TranferUsertoBannedTable->execute(array($idBorrower));
			
			$AddBanReason = $bdd->prepare('UPDATE banned_users SET reason="unpaid", banned_date= ? WHERE id_user = ?');
			$AddBanReason->execute(array($idBorrower, $current_date));
				
			$deleteLoanRequests = $bdd->prepare('DELETE FROM loan WHERE id_borrower= ? AND status="request"');
			$deleteLoanRequests->execute(array($idBorrower));
			
			$UpdateLoanStatus = $bdd->prepare('UPDATE loan SET status="unpaid_banned" WHERE id_borrower= ? AND (status="unpaid" OR status="unpaid_notseen")');
			$UpdateLoanStatus->execute(array($idBorrower));
			
			$deletePaymentMethods = $bdd->prepare('DELETE FROM payment_method WHERE id_user = ?');
			$deletePaymentMethods->execute(array($idBorrower));
			
			$deleteFeedback = $bdd->prepare('DELETE FROM feedback WHERE id_user = ?');
			$deleteFeedback->execute(array($idBorrower));
			
			$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
			$deleteUser->execute(array($idBorrower));
			}






$BanBorrowersFraudPayment = $bdd->prepare('SELECT * FROM loan WHERE (repayment_received="no_notseen" OR repayment_received="no")  AND repaid_date < NOW() - INTERVAL 7 DAY');
$BanBorrowersFraudPayment->execute(array());
			
	if($BanBorrowersFraudPayment->rowCount() !== 0){	
	
		$GetBorrower = $BanBorrowersFraudPayment->fetch();

		$idBorrower = $GetBorrower['id_borrower'];
		$current_date = date('Y-m-d H:i:s');
		
			$TranferUsertoBannedTable = $bdd->prepare('INSERT INTO banned_users(id_user, email, name, username, password, phone_number, address, city, country, identity_card, join_date) SELECT id, email, name, username, password, phone_number, address, city, country, identity_card, join_date FROM users WHERE id = ?');
			$TranferUsertoBannedTable->execute(array($idBorrower));
			
			$AddBanReason = $bdd->prepare('UPDATE banned_users SET reason="fraud", banned_date= ? WHERE id_user = ?');
			$AddBanReason->execute(array($idBorrower, $current_date));
				
			$deleteLoanRequests = $bdd->prepare('DELETE FROM loan WHERE id_borrower= ? AND status="request"');
			$deleteLoanRequests->execute(array($idBorrower));
			
			$UpdateLoanStatus = $bdd->prepare('UPDATE loan SET status="unpaid_banned" WHERE id_borrower= ? AND (status="unpaid" OR status="unpaid_notseen")');
			$UpdateLoanStatus->execute(array($idBorrower));
			
			$deletePaymentMethods = $bdd->prepare('DELETE FROM payment_method WHERE id_user = ?');
			$deletePaymentMethods->execute(array($idBorrower));
			
			$deleteFeedback = $bdd->prepare('DELETE FROM feedback WHERE id_user = ?');
			$deleteFeedback->execute(array($idBorrower));
			
			$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
			$deleteUser->execute(array($idBorrower));
			}

