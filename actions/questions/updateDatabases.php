<?php

use PHPMailer\PHPMailer\PHPMailer;
require('actions/database.php');


$checkIfLoanIsUnpaid = $bdd->prepare('SELECT * FROM loan WHERE (status="active" OR status="active_notseen") AND repayment_date < NOW() - INTERVAL 1 DAY');
$checkIfLoanIsUnpaid->execute(array());
			
	if($checkIfLoanIsUnpaid->rowCount() !== 0){

	$GetID = $checkIfLoanIsUnpaid->fetch();
		
	$id_borrower = $GetID['id_borrower'];
	$repayment_amount = $GetID['repayment_amount'];
	$username_lender = $GetID['username_lender'];
	
	
	
	$GetBorrowerEmail = $bdd->prepare('SELECT email FROM users WHERE id = ?');
	$GetBorrowerEmail->execute(array($id_borrower));
		
	$DisplayEmail = $GetBorrowerEmail->fetch();
		
	$borrower_email = $DisplayEmail['email'];
	

	$SetLoanUnpaid = $bdd->prepare('UPDATE loan SET status="unpaid_notseen" WHERE (status="active" OR status="active_notseen") AND repayment_date < NOW() - INTERVAL 1 DAY');
	$SetLoanUnpaid->execute(array());
	
	require_once 'vendor/autoload.php';

	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'live.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'api';
	$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

	$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
	$phpmailer->addAddress(''.$borrower_email.'');
	$phpmailer->Subject = 'You Have an unpaid Loan!';

	$phpmailer->Body = '<html>
						<p>Your '.$repayment_amount.'$ Repayment to '.$username_lender.' on Instant Borrow hasnt been made.</p>
						<p>Repay the Loan now or your Account will be suspended.</p>
						<p>Log Into Instant Borrow to resolve the issue.</p>
						<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
						<p>If you havent Borrowed On Instant Borrow, please Ignore this message.</p>
						<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
						</html>';
	$phpmailer->AltBody = 'Your '.$repayment_amount.'$ Repayment.';
	
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
			
			require_once 'vendor/autoload.php';

			$phpmailer = new PHPMailer();
			$phpmailer->isSMTP();
			$phpmailer->Host = 'live.smtp.mailtrap.io';
			$phpmailer->SMTPAuth = true;
			$phpmailer->Port = 587;
			$phpmailer->Username = 'api';
			$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

			$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
			$phpmailer->addAddress(''.$borrower_email.'');
			$phpmailer->Subject = 'You Instant Borrow Account was Suspended!';

			$phpmailer->Body = '<html>
								<p>Your Instant Borrow Account was suspended because your '.$repayment_amount.'$ Repayment to '.$username_lender.' on hasnt been made.</p>
								<p>'.$username_lender.' has been given your personnal information and will use it to get his money back.</p>
								<p>Log Into Instant Borrow to resolve the issue as quickly as possible.</p>
								<a href="https://instant-borrow.com"><button>Log Into Instant Borrow</button></a>
								<p>If you havent Borrowed On Instant Borrow, please Ignore this message.</p>
								<p>You are Receiving this Neccessary Notification because you are Registered on instant-borrow.com.</p>
								</html>';
			$phpmailer->AltBody = 'Your '.$repayment_amount.'$ Repayment.';
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

