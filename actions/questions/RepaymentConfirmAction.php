<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){


	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND NOT repayment_received="yes"');
    $checkIfLoanExists->execute(array($_GET['id']));
	
	if($checkIfLoanExists->rowCount() > 0){
		
	$LoanInfos = $checkIfLoanExists->fetch();
		
	$repaid_date = date('Y-m-d H:i:s');
	$id_borrower = $_SESSION['id'];
	$username_lender = $_SESSION['username'];
	$idOfTheQuestion = $_GET['id'];
	$loan_amount = $LoanInfos['loan_amount'];
	$repayment_amount = $LoanInfos['repayment_amount'];
	$repayment_date = $LoanInfos['repayment_date'];
	$id_lender = $LoanInfos['id_lender'];
	$username_borrower = $LoanInfos['username_borrower'];
	$payment_method_repayment = $LoanInfos['payment_method_repayment'];
	
	$display1 = "block";
	$display2 = "none";
	$margin_top = "-302px";
	$margin_left = "51%";
	$width = "49%";

	

		if(isset($_POST['repayment_confirmation'])){
			
			if(isset($_POST['repayment_id_confirmation'])){
				
		
				$GivenTransactionId = ($_POST['repayment_id_confirmation']);
				
				$getRepaymentStatus = $bdd->prepare('SELECT repayment_received FROM loan WHERE id = ? AND id_borrower = ?');
				$getRepaymentStatus->execute(array($idOfTheQuestion, $_SESSION['id']));
				
				$getRepayment = $getRepaymentStatus->fetch(PDO::FETCH_ASSOC);
				$RepaymentStatus = $getRepayment['repayment_received'];
				
					if(($RepaymentStatus !== "no_definitive")AND($RepaymentStatus !== "no_correct_id")){
				
								$getRepaymentId = $bdd->prepare('SELECT repayment_transaction_id FROM loan WHERE id = ? AND id_borrower = ?');
								$getRepaymentId->execute(array($idOfTheQuestion, $_SESSION['id']));
								
								$getID = $getRepaymentId->fetch(PDO::FETCH_ASSOC);
								$RepaymentID = $getID['repayment_transaction_id'];
								
									if($GivenTransactionId == $RepaymentID){
										
										$UpdateReceptionStatus = $bdd->prepare('UPDATE loan SET repayment_received ="no" WHERE id = ? AND id_borrower = ?');
										$UpdateReceptionStatus->execute(array($idOfTheQuestion, $_SESSION['id']));
										
										
										$display1 = "none";
										$display2 = "block";
									
									}else{
										
										$UpdateReceptionStatus = $bdd->prepare('UPDATE loan SET repayment_received ="no", repayment_id_confirmation_tries = repayment_id_confirmation_tries+1 WHERE id = ? AND id_borrower = ?');
										$UpdateReceptionStatus->execute(array($idOfTheQuestion, $_SESSION['id']));
										
										$GetTotalTries = $bdd->prepare('SELECT repayment_id_confirmation_tries FROM loan WHERE id = ? AND id_borrower = ?');
										$GetTotalTries->execute(array($idOfTheQuestion, $_SESSION['id']));
										
										$getTries = $GetTotalTries->fetch(PDO::FETCH_ASSOC);
										$TotalTries = $getTries['repayment_id_confirmation_tries'];
										
										
										$TriesLeft = (3-$TotalTries);
										
											if($TriesLeft > 0){
												
											if($TriesLeft == 1){$tries = "Try";}else{$tries = "Tries";}
											
											$IncorrectIdMessage = "<div class='error-message'>Incorrect Transaction ID. You Have $TriesLeft $tries left.</div>";
											
											}else{
											
											$current_date = date('Y-m-d H:i:s');
											
											$ReceptionStatusUnpaid = $bdd->prepare('UPDATE loan SET repayment_received ="no_definitive", status="unpaid_banned" WHERE id = ? AND id_borrower = ?');
											$ReceptionStatusUnpaid->execute(array($idOfTheQuestion, $_SESSION['id']));
											
											$TranferUsertoBannedTable = $bdd->prepare('INSERT INTO banned_users(id_user, email, name, username, password, phone_number, address, city, country, identity_card, join_date) SELECT id, email, name, username, password, phone_number, address, city, country, identity_card, join_date FROM users WHERE id = ?');
											$TranferUsertoBannedTable->execute(array($_SESSION['id']));
			
											$AddBanReason = $bdd->prepare('UPDATE banned_users SET reason="fraud", banned-date= ? WHERE id_user = ?');
											$AddBanReason->execute(array($_SESSION['id'], $current_date));
											
											$deleteLoanRequests = $bdd->prepare('DELETE FROM loan WHERE id_borrower= ? AND status="request"');
											$deleteLoanRequests->execute(array($_SESSION['id']));
											
											$deletePaymentMethods = $bdd->prepare('DELETE FROM payment_method WHERE id_user = ?');
											$deletePaymentMethods->execute(array($_SESSION['id']));
											
											$deleteFeedback = $bdd->prepare('DELETE FROM feedback WHERE id_user = ?');
											$deleteFeedback->execute(array($_SESSION['id']));
											
											$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
											$deleteUser->execute(array($_SESSION['id']));
									
										}
									
									}
								
					}else{ header('Location: dashboard.php');}
			
			
			}
			
		}
		
		
		
		
		if (isset($_POST['repayment_upload']) && $_POST['repayment_upload'] == 'Upload Proof'){
	
			if (isset($_FILES['repayment_receipt_confirmation']) && $_FILES['repayment_receipt_confirmation']['error'] === UPLOAD_ERR_OK){

				$fileTmpPath = $_FILES['repayment_receipt_confirmation']['tmp_name'];
				$fileName = $_FILES['repayment_receipt_confirmation']['name'];
				$fileSize = $_FILES['repayment_receipt_confirmation']['size'];
				$fileType = $_FILES['repayment_receipt_confirmation']['type'];
				$fileNameCmps = explode(".", $fileName);
				$fileExtension = strtolower(end($fileNameCmps));

				$newFileName = md5(time() . $fileName) . '.' . $fileExtension;

				$allowedfileExtensions = array('jpg','png','pdf');
				if (in_array($fileExtension, $allowedfileExtensions)){

				  $uploadFileDir = 'assets/images/repayment-proof/';
				  $dest_path = $uploadFileDir . $newFileName;
				  if(move_uploaded_file($fileTmpPath, $dest_path)) {
					
						$UpdateReceptionStatus = $bdd->prepare('UPDATE loan SET repayment_received ="no_correct_id", repayment_proof = ? WHERE id = ? AND id_borrower = ?');
						$UpdateReceptionStatus->execute(array($newFileName, $idOfTheQuestion, $_SESSION['id']));
					
						$CorrectIdMessage = "<div class='success-message'>Information Uploaded Succesfully. Verification Process Started.</div>";
						$margin_top = "10px";
						$margin_left = "0%";
						$width = "100%";
						
						$display1 = "none";
						$display2 = "none";
				
				  }
			   
				}else{
				  $file_error_message = "<div class='error-message'>Only PNG, JPG and PDF files are Accepted.</div>";
				}
		

			}

		}
	
	
	
	
	}else{$Loannotfound ="yes";}
	
}else{$Loannotfound ="yes";}













	
	
	
	
	

