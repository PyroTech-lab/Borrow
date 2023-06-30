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
						  <head>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>Simple Transactional Email</title>
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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Your '.$repayment_amount.'$ Repayment to '.$username_lender.' on Instant Borrow hasnt been made.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Unpaid Loan</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Your <span style="color: #2b80ff; font-weight: bold; font-size: 16px;">'.$repayment_amount.'$</span> Repayment to <span style="color: #2b80ff; font-weight: bold; font-size: 16px;">'.$username_lender.'</span> on Instant Borrow hasnt been made.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Your Account will be <span style="color: red; font-weight: bold; font-size: 16px;">Suspended</span> if you do not Repay the Loan.</p>
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
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log Into Instant Borrow to Resolve to Issue.</p>
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
											<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Instant Borrow Inc, 3 Abbey Road, San Francisco CA 94102</span>
											<br> You are receiving this message because your email is registered on instant-borrow.com .
										  </td>
										</tr>
										<tr>
										  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
											Copyright © 2023 - '.date("Y").' Instant Borrow. All rights reserved.
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
				$phpmailer->AltBody = 'Your '.$repayment_amount.'$ Repayment to '.$username_lender.' on Instant Borrow hasnt been made.
									Your Account will be Suspended if you do not repay the Loan.
									Log into Instant Borrow to Resolve the Issue at instant-borrow.com';
				$phpmailer->send();
	
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
						  <head>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>Simple Transactional Email</title>
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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Your Instant Borrow Account was suspended because your '.$repayment_amount.'$ Repayment to '.$username_lender.' on Instant Borrow hasnt been made.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Account Suspended</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Your Instant Borrow Account was <span style="color: red; font-weight: bold; font-size: 16px;">Suspended</span> because your <span style="color: #2b80ff; font-weight: bold; font-size: 16px;">'.$repayment_amount.'$</span> Repayment to <span style="color: #2b80ff; font-weight: bold; font-size: 16px;">'.$username_lender.'</span> on Instant Borrow hasnt been made.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 16px;">'.$username_lender.'</span> has been given your <span style="color: red; font-weight: bold; font-size: 16px;">Personnal Information</span> and will use it to get his Money back.</p>
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
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log Into Instant Borrow to Resolve to Issue as quickly as possible..</p>
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
											<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Instant Borrow Inc, 3 Abbey Road, San Francisco CA 94102</span>
											<br> You are receiving this message because your email is registered on instant-borrow.com .
										  </td>
										</tr>
										<tr>
										  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
											Copyright © 2023 - '.date("Y").' Instant Borrow. All rights reserved.
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
				$phpmailer->AltBody = 'Your Instant Borrow Account was suspended because your '.$repayment_amount.'$ Repayment to '.$username_lender.' on Instant Borrow hasnt been made.
									'.$username_lender.' has been given your personnal information and will use it to get his money back.
									Log into Instant Borrow to Resolve the Issue as quickly as possible at instant-borrow.com';
				$phpmailer->send();
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

