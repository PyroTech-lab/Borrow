<?php

use PHPMailer\PHPMailer\PHPMailer;
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
	
	$GetLenderEmail = $bdd->prepare('SELECT email, phone_number FROM users WHERE id = ?');
	$GetLenderEmail->execute(array($id_lender));
		
	$DisplayEmail = $GetLenderEmail->fetch();
		
	$lender_email = $DisplayEmail['email'];
	$phone_number = $DisplayEmail['phone_number'];
	
	
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
											
											$TranferUsertoBannedTable = $bdd->prepare('INSERT INTO banned_users(id_user, email, name, date_birth, username, password, phone_number, address, city, country, identity_card, picture, join_date) SELECT id, email, name, date_birth, username, password, phone_number, address, city, country, identity_card, picture, join_date FROM users WHERE id = ?');
											$TranferUsertoBannedTable->execute(array($_SESSION['id']));
			
											$AddBanReason = $bdd->prepare('UPDATE banned_users SET reason="fraud", banned_date= ? WHERE id_user = ?');
											$AddBanReason->execute(array($current_date, $_SESSION['id']));
											
											$deleteLoanRequests = $bdd->prepare('DELETE FROM loan WHERE id_borrower= ? AND status="request"');
											$deleteLoanRequests->execute(array($_SESSION['id']));
											
											$deletePaymentMethods = $bdd->prepare('DELETE FROM payment_method WHERE id_user = ?');
											$deletePaymentMethods->execute(array($_SESSION['id']));
											
											$deleteFeedback = $bdd->prepare('DELETE FROM feedback WHERE id_user = ?');
											$deleteFeedback->execute(array($_SESSION['id']));
											
											$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
											$deleteUser->execute(array($_SESSION['id']));
											
											
											require_once 'vendor/autoload.php';

											$phpmailer = new PHPMailer();
											$phpmailer->isSMTP();
											$phpmailer->Host = 'live.smtp.mailtrap.io';
											$phpmailer->SMTPAuth = true;
											$phpmailer->Port = 587;
											$phpmailer->Username = 'api';
											$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

											$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
											$phpmailer->addAddress(''.$lender_email.'');
											$phpmailer->Subject = ''.$username_borrower.' has not Repaid you '.$repayment_amount.'$ and was Banned';

					$phpmailer->Body = '<html>
						  <head>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>Instant Borrow Notification</title>
							<style>
						@media only screen and (max-width: 620px) {
						  table.body h1 {
							font-size: 28px !important;
							margin-bottom: 10px !important;
						  }

						  table.body p,
						table.body ul,
						table.body ol,
						table.body td,
						table.body span,
						table.body a {
							font-size: 16px !important;
						  }

						  table.body .wrapper,
						table.body .article {
							padding: 10px !important;
						  }

						  table.body .content {
							padding: 0 !important;
						  }

						  table.body .container {
							padding: 0 !important;
							width: 100% !important;
						  }

						  table.body .main {
							border-left-width: 0 !important;
							border-radius: 0 !important;
							border-right-width: 0 !important;
						  }

						  table.body .btn table {
							width: 100% !important;
						  }

						  table.body .btn a {
							width: 100% !important;
						  }

						  table.body .img-responsive {
							height: auto !important;
							max-width: 100% !important;
							width: auto !important;
						  }
						}
						@media all {
						  .ExternalClass {
							width: 100%;
						  }

						  .ExternalClass,
						.ExternalClass p,
						.ExternalClass span,
						.ExternalClass font,
						.ExternalClass td,
						.ExternalClass div {
							line-height: 100%;
						  }

						  .apple-link a {
							color: inherit !important;
							font-family: inherit !important;
							font-size: inherit !important;
							font-weight: inherit !important;
							line-height: inherit !important;
							text-decoration: none !important;
						  }

						  #MessageViewBody a {
							color: inherit;
							text-decoration: none;
							font-size: inherit;
							font-family: inherit;
							font-weight: inherit;
							line-height: inherit;
						  }

						  .btn-primary table td:hover {
							background-color: #34495e !important;
						  }

						  .btn-primary a:hover {
							background-color: #34495e !important;
							border-color: #34495e !important;
						  }
						}
						</style>
						  </head>
						  <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$username_borrower.' has not Repaid you '.$repayment_amount.'$ and was Banned from Instant Borrow.</span>
							<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
							  <tr>
								<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
								<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
								  <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

									<table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">
						 
									  <tr>
										<td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
										  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
											<tr>
											  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Repayment Proof not Received</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$username_borrower.'</span> has not Repaid you <span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$repayment_amount.'$</span> and was <span style="color: red; font-weight: bold; font-size: 18px;">Banned</span> from Instant Borrow.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">After you Reported not receiving your Repayment from <span style="color: #2b80ff; font-weight: bold; font-size: 16px;">'.$username_borrower.'</span>, he Failde to submit proof of his Payment.</p>
												<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
												  <tbody>
													<tr>
													  <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
														<table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
														  <tbody>
															<tr>
															  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #3498db;" valign="top" align="center" bgcolor="#3498db"> <a href="http://instant-borrow.com" target="_blank" style="border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #3498db; border-color: #3498db; color: #ffffff;">Log Into Instant Borrow</a> </td>
															</tr>
														  </tbody>
														</table>
													  </td>
													</tr>
												  </tbody>
												</table>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log Into Instant Borrow for Instructions on how to Proceed to get your Money back.</p>
											  </td>
											</tr>
										  </table>
										</td>
									  </tr>


									</table>

									<div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
									  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
										<tr>
										  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
											<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;"><img src="assets/images/logo.png" style="height: 50px; width: auto;"></span>
											<br> You are receiving this message because your email is registered on instant-borrow.com
										  </td>
										</tr>
										<tr>
										  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
											Copyright @ 2023 - '.date("Y").' Instant Borrow - All rights reserved
										  </td>
										</tr>
									  </table>
									</div>

								  </div>
								</td>
								<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
							  </tr>
							</table>
						  </body>
						</html>';
						$phpmailer->AltBody = ''.$username_borrower.' hasnt Repaid you '.$repayment_amount.'$ and was Banned from Instant Borrow.
												After you Reported not receiving your Repayment from '.$username_borrower.', he was not able to submit proof of his payment.
												Log Into Instant Borrow for Instructions on how to Proceed to get your Money back at www.instant-borrow.com';
				$phpmailer->send();
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
						
						
						require_once 'vendor/autoload.php';

						$phpmailer = new PHPMailer();
						$phpmailer->isSMTP();
						$phpmailer->Host = 'live.smtp.mailtrap.io';
						$phpmailer->SMTPAuth = true;
						$phpmailer->Port = 587;
						$phpmailer->Username = 'api';
						$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

						$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
						$phpmailer->addAddress(''.$lender_email.'');
						$phpmailer->Subject = ''.$username_borrower.' Submited proof of his '.$repayment_amount.'$ Repayment';

					$phpmailer->Body = '<html>
						  <head>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>Instant Borrow Notification</title>
							<style>
						@media only screen and (max-width: 620px) {
						  table.body h1 {
							font-size: 28px !important;
							margin-bottom: 10px !important;
						  }

						  table.body p,
						table.body ul,
						table.body ol,
						table.body td,
						table.body span,
						table.body a {
							font-size: 16px !important;
						  }

						  table.body .wrapper,
						table.body .article {
							padding: 10px !important;
						  }

						  table.body .content {
							padding: 0 !important;
						  }

						  table.body .container {
							padding: 0 !important;
							width: 100% !important;
						  }

						  table.body .main {
							border-left-width: 0 !important;
							border-radius: 0 !important;
							border-right-width: 0 !important;
						  }

						  table.body .btn table {
							width: 100% !important;
						  }

						  table.body .btn a {
							width: 100% !important;
						  }

						  table.body .img-responsive {
							height: auto !important;
							max-width: 100% !important;
							width: auto !important;
						  }
						}
						@media all {
						  .ExternalClass {
							width: 100%;
						  }

						  .ExternalClass,
						.ExternalClass p,
						.ExternalClass span,
						.ExternalClass font,
						.ExternalClass td,
						.ExternalClass div {
							line-height: 100%;
						  }

						  .apple-link a {
							color: inherit !important;
							font-family: inherit !important;
							font-size: inherit !important;
							font-weight: inherit !important;
							line-height: inherit !important;
							text-decoration: none !important;
						  }

						  #MessageViewBody a {
							color: inherit;
							text-decoration: none;
							font-size: inherit;
							font-family: inherit;
							font-weight: inherit;
							line-height: inherit;
						  }

						  .btn-primary table td:hover {
							background-color: #34495e !important;
						  }

						  .btn-primary a:hover {
							background-color: #34495e !important;
							border-color: #34495e !important;
						  }
						}
						</style>
						  </head>
						  <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$username_borrower.' Submited proof of his '.$repayment_amount.'$ Repayment on Instant Borrow.</span>
							<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
							  <tr>
								<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
								<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
								  <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

									<table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">
						 
									  <tr>
										<td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
										  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
											<tr>
											  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Repayment Proof Received</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$username_borrower.'</span> Submited proof of his <span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$repayment_amount.'$</span> Repayment on Instant Borrow.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">After you Reported not receiving your Repayment from <span style="color: #2b80ff; font-weight: bold; font-size: 16px;">'.$username_borrower.'</span>, he submited proof of his payment.</p>
												<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
												  <tbody>
													<tr>
													  <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
														<table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
														  <tbody>
															<tr>
															  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #3498db;" valign="top" align="center" bgcolor="#3498db"> <a href="http://instant-borrow.com" target="_blank" style="border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #3498db; border-color: #3498db; color: #ffffff;">Log Into Instant Borrow</a> </td>
															</tr>
														  </tbody>
														</table>
													  </td>
													</tr>
												  </tbody>
												</table>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log Into Instant Borrow to Confirm your Reception of the Payment.</p>
											  </td>
											</tr>
										  </table>
										</td>
									  </tr>


									</table>

									<div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
									  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
										<tr>
										  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
											<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;"><img src="assets/images/logo.png" style="height: 50px; width: auto;"></span>
											<br> You are receiving this message because your email is registered on instant-borrow.com
										  </td>
										</tr>
										<tr>
										  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
											Copyright @ 2023 - '.date("Y").' Instant Borrow - All rights reserved
										  </td>
										</tr>
									  </table>
									</div>

								  </div>
								</td>
								<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
							  </tr>
							</table>
						  </body>
						</html>';
						$phpmailer->AltBody = ''.$username_borrower.' Submited proof of his '.$repayment_amount.'$ Repayment.
												After you Reported not receiving your Repayment from '.$username_borrower.', he submited proof of his payment.
												Log Into Instant Borrow to confirm your reception of the Repayment at www.instant-borrow.com';
				$phpmailer->send();
				  }
			   
				}else{
				  $file_error_message = "<div class='error-message'>Only PNG, JPG and PDF files are Accepted.</div>";
				}
		

			}

		}
	
	
	
	
	}else{$Loannotfound ="yes";}
	
}else{$Loannotfound ="yes";}