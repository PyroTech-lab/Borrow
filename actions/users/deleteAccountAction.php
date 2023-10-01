<?php

use PHPMailer\PHPMailer\PHPMailer;
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
		
	require_once 'vendor/autoload.php';

	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'live.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'api';
	$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

	$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
	$phpmailer->addAddress(''.$_SESSION['email'].'');
	$phpmailer->Subject = 'Instant Borrow Account Deleted';

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
								<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0">Your Instant Borrow Account was Deleted.</span>
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
													<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Instant Borrow Account Deleted</p>
													<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;">Your Instant Borrow Account was <span color: red;>Deleted</span>.</p>
													<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
													  <tbody>
														<tr>
														  <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
															<table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
															  <tbody>
																<tr>	
																</tr>
															  </tbody>
															</table>
														  </td>
														</tr>
													  </tbody>
													</table>
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
												<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;"><img src="assets/images/logo.png"></span>
												<br> You are receiving this message because your email was registered on instant-borrow.com
											  </td>
											</tr>
											<tr>
											  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
												Copyright © 2023 - '.date("Y").' Instant Borrow - All rights reserved.
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
	$phpmailer->AltBody = 'Your Instant Borrow Account was Deleted.';

	$phpmailer->send();
		
	$TranferUsertoDeletedTable = $bdd->prepare('INSERT INTO deleted_users(id_user, email, name,date_birth, username, phone_number, address, city, country, identity_card) SELECT id, email, name,date_birth, username, phone_number, address, city, country, identity_card, picture FROM users WHERE id = ?');
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