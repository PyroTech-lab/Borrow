<?php

require('actions/database.php');
require('actions/users/showYourProfileAction.php');
require('actions/users/yourFeedbackAction.php');


if(isset($_POST['submit'])){
	
		$request_id_borrower = $_SESSION['id'];
	
		$checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status = "request"');
        $checkIfUserAlreadyExists->execute(array($request_id_borrower));

        if($checkIfUserAlreadyExists->rowCount() == 0){
			
			$checkIfUserAlreadyExists1 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status = "active" OR status="active_notseen")');
			$checkIfUserAlreadyExists1->execute(array($request_id_borrower));

			if($checkIfUserAlreadyExists1->rowCount() == 0){
				
				$checkLoansUnderVerification = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (repayment_received="no_notseen" OR repayment_received="no" OR repayment_received="no_definitive" OR repayment_received = "no_correct_id")');
				$checkLoansUnderVerification->execute(array($request_id_borrower));

				if($checkLoansUnderVerification->rowCount() == 0){
				
					$checkIfUserAlreadyExists2 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="unpaid" OR status="unpaid_notseen" OR status="unpaid_banned" OR status="unpaid_banned_archived")');
					$checkIfUserAlreadyExists2->execute(array($request_id_borrower));
					
					if($checkIfUserAlreadyExists2->rowCount() == 0){
				
						$checkIfUserAlreadyExists3 = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ? AND paypal ="" AND cashapp ="" AND venmo ="" AND zelle =""AND chime =""');
						$checkIfUserAlreadyExists3->execute(array($request_id_borrower));
						
						if($checkIfUserAlreadyExists3->rowCount() == 0){
							
							$checkIfUserAlreadyExists4 = $bdd->prepare('SELECT * FROM users WHERE id = ? AND (email_verified="" OR phone_number ="" OR address ="" OR identity_card ="") ');
							$checkIfUserAlreadyExists4->execute(array($request_id_borrower));
							
							if($checkIfUserAlreadyExists4->rowCount() == 0){

							$loan_amount = htmlspecialchars($_POST['loan_amount']);
							$repayment_amount = htmlspecialchars($_POST['repayment_amount']);
							$repayment_date = htmlspecialchars($_POST['repayment_date']);
							$request_date = date('Y-m-d H:i:s');
							$request_id_borrower = $_SESSION['id'];
							$request_username_borrower = $_SESSION['username'];
							$notes = nl2br(htmlspecialchars($_POST['notes']));
							$status = 'request';
							$status_public = 'Request';


							$insertQuestionOnWebsite = $bdd->prepare('INSERT INTO loan (loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, notes, status)VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
							$insertQuestionOnWebsite->execute(
								array(
									$loan_amount, 
									$repayment_amount, 
									$repayment_date,
									$request_date,
									$request_id_borrower,
									$request_username_borrower,
									$notes,
									$status,
								)
							);
							
							$successMsg = "Your Request was Published Successfully!";
						
		
														$CheckVerifications = $bdd->prepare('SELECT email_verified, phone_number, address, identity_card, join_date FROM users WHERE id = ?');
														$CheckVerifications->execute(array($_SESSION['id']));


														$userVerifications = $CheckVerifications->fetch(PDO::FETCH_ASSOC);
														$email_verified = $userVerifications['email_verified'];
														$phone_verified = $userVerifications['phone_number'];
														$address_verified = $userVerifications['address'];
														$idcard_verified = $userVerifications['identity_card'];
														$join_date = $userVerifications['join_date'];
														
														if (strlen($email_verified) == 0) {
															$email = "0";
														
														}else{
															$email = "10";
														}
														
														
														if (strlen($phone_verified) == 0) {
															$phone = "0";
														
														}else{
															$phone = "10";
														}
														
														
														if (strlen($address_verified) == 0) {
															$address = "0";
														
														}else{
															$address = "10";
														}
														
														
														if (strlen($idcard_verified) == 0) {
															$idcard = "0";
														
														}else{
															$idcard = "20";
														}
														
														
														
														$time_since_join = ((abs(strtotime(date("Y-m-d")) - strtotime($join_date)))/86400)/30;
														
														$trustscore1 = $email+$phone+$address+$idcard;
														
														$trustscore2 = ($trustscore1+sqrt($getBorrowedAmountMessage))-(exp($AllPaidLateCountMessage)-1);
														
														$trustscore3 = $trustscore2*(1-$unpaidCountMessage);
														
														$trustscore4 = $trustscore3+(2*sqrt($time_since_join));
														
														$trustscore5 = $trustscore4+$positive_feedback-(3*$negative_feedback);
														
														$trustscore6 = max($trustscore5, 0);
														$trustscore7 = min($trustscore6, 100);
														
														
														$UpdateTrustscore = $bdd->prepare('UPDATE loan SET borrower_trustscore = '.$trustscore7.' WHERE id_borrower = ?');
														$UpdateTrustscore->execute(array($_SESSION['id']));
														
														
														
														
														
														$CheckFeedback = $bdd->prepare('SELECT positive_feedback, negative_feedback FROM feedback WHERE id_user = ?');
														$CheckFeedback->execute(array($_SESSION['id']));


															$userFeedback = $CheckFeedback->fetch(PDO::FETCH_ASSOC);
															
															$positive_feedback = $userFeedback['positive_feedback'];
															$negative_feedback = $userFeedback['negative_feedback'];
															
															

															$UpdateFeedback = $bdd->prepare('UPDATE loan SET borrower_positive_feedback=?, borrower_negative_feedback=? WHERE id_borrower = ?');
															$UpdateFeedback->execute(array($positive_feedback,$negative_feedback,$_SESSION['id']));
															
		
						
								}else{
									$errorMsg = "You must Complete all Verifications Before Taking out a Loan.";
								}
								
								
								}else{
									$errorMsg = "You must connect a Payment Method Before Taking out a Loan.";
								}
							
								}else{
									$errorMsg = "You have an Unpaid Loan. Pay it before Borrowing again.";
								}
							
							}else{
								$errorMsg = "You Cannot Borrow with a Loan Under Verification.";
							}
				  
						}else{
							$errorMsg = "You have an Active Loan. Pay it before Borrowing again.";
						}
	  
	}else{
		$errorMsg = "You have already Published a Loan Request.";
	}
}
