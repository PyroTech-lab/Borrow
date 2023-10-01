<?php

session_start();
require('actions/database.php');
use PHPMailer\PHPMailer\PHPMailer;





if(isset($_GET['id']) AND !empty($_GET['id'])){

	
	
	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND id_borrower = ?');
    $checkIfLoanExists->execute(array($_GET['id'], $_SESSION['id']));
	
	if($checkIfLoanExists->rowCount() > 0){


        $LoanInfos = $checkIfLoanExists->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_lender = $LoanInfos['id_lender'];
		$username_lender = $LoanInfos['username_lender'];
		$id_borrower = $LoanInfos['id_borrower'];
		$repaid_date = date('Y-m-d H:i:s');
		$idOfTheQuestion = $_GET['id'];
		
		
	$GetLenderEmail = $bdd->prepare('SELECT email, phone_number FROM users WHERE id = ?');
    $GetLenderEmail->execute(array($id_lender));
	
	$DisplayEmail = $GetLenderEmail->fetch();
	
	$lender_email = $DisplayEmail['email'];
	$phone_number = $DisplayEmail['phone_number'];
	
	if (strlen($phone_number) !== 0) {
	$phone_number_display = $phone_number;	
	}else{
	$phone_number_display = "Unknown";
	}
		
		
	$GeBannedDetails = $bdd->prepare('SELECT reason FROM banned_users WHERE id_user = ?');
    $GeBannedDetails->execute(array($id_borrower));

        $GetBannedReason = $GeBannedDetails->fetch();

       $reason = $GetBannedReason['reason'];
		
		
		if($reason == "unpaid"){
			$reason_public = "Unpaid Loan";
		}
		
		if($reason == "fraud"){
			$reason_public = "Fraud";
		}
		
		if($reason == ""){
			$reason_public = "Fraud";
		}
       

	
	$GetPaymentMethod = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ?');
    $GetPaymentMethod->execute(array($id_lender));
	
	$DisplayPaymentMethods = $GetPaymentMethod->fetch();
	
	$paypal = $DisplayPaymentMethods['paypal'];
	$cashapp = $DisplayPaymentMethods['cashapp'];
	$venmo = $DisplayPaymentMethods['venmo'];
	$zelle = $DisplayPaymentMethods['zelle'];
	$chime = $DisplayPaymentMethods['chime'];
	
	
	$status = "paid_afterban_notseen";
	
	
	if(strlen($paypal) == 0){
	$paypal_notset= "none";
	}else{ $paypal_notset = "";}
	
	if(strlen($cashapp) == 0){
	$cashapp_notset= "none";
	}else{ $cashapp_notset = "";}
	
	if(strlen($venmo) == 0){
	$venmo_notset= "none";
	}else{ $venmo_notset = "";}
	
	if(strlen($zelle) == 0){
	$zelle_notset= "none";
	}else{ $zelle_notset = "";}
	
	if(strlen($chime) == 0){
	$chime_notset= "none";
	}else{ $chime_notset = "";}
	
	
	if($paypal_notset== ""){
	$default= "paypal";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "")){
	$default= "cashapp";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "")){
	$default= "venmo";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "")){
	$default= "zelle";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "none")AND($chime_notset == "")){
	$default= "chime";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "none")AND($chime_notset == "none")){
	$default= "nothing";}

	
	
	
	
	

			
	if(isset($_POST['payment_paypal'])){
		
	$transactionId = ($_POST['paypal_id']);
		

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Paypal", repayment_transaction_id=? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
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
	$phpmailer->Subject = ''.$username_borrower.' Repaid you '.$repayment_amount.'$!';

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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after Being Banned.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Repayment Received!</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$username_borrower.'</span> Repaid you <span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$repayment_amount.'$</span> on Instant Borrow after Being Banned.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Funds have Been Sent to your Paypal Account. They may take a few Minutes to arrive.</p>
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
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log into Instant Borrow for more Details.</p>
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
	$phpmailer->AltBody = ''.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after being banned.
						Funds have Been Sent to your Paypal Account. They may take a few Minutes to arrive.
						Log Into Instant Borrow for more details at www.instant-borrow.com';
	$phpmailer->send();

	header("location: actions/users/logoutAction.php");
	}

	
	
	
	
	

	
	if(isset($_POST['payment_cashapp'])){
		
	$transactionId = ($_POST['cashapp_id']);
	

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Cashapp", repayment_transaction_id= ? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
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
	$phpmailer->Subject = ''.$username_borrower.' Repaid you '.$repayment_amount.'$!';

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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after Being Banned.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Repayment Received!</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$username_borrower.'</span> Repaid you <span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$repayment_amount.'$</span> on Instant Borrow after Being Banned.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Funds have Been Sent to your Cashapp Account. They may take a few Minutes to arrive.</p>
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
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log into Instant Borrow for more Details.</p>
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
	$phpmailer->AltBody = ''.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after being banned.
						Funds have Been Sent to your Cashapp Account. They may take a few Minutes to arrive.
						Log Into Instant Borrow for more details at www.instant-borrow.com';
	$phpmailer->send();
	
	header("location: actions/users/logoutAction.php");
	}

	
	
	
	

	
	if(isset($_POST['payment_venmo'])){
		
	$transactionId = ($_POST['venmo_id']);
	

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Venmo", repayment_transaction_id = ? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
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
	$phpmailer->Subject = ''.$username_borrower.' Repaid you '.$repayment_amount.'$!';

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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after Being Banned.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Repayment Received!</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$username_borrower.'</span> Repaid you <span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$repayment_amount.'$</span> on Instant Borrow after Being Banned.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Funds have Been Sent to your Venmo Account. They may take a few Minutes to arrive.</p>
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
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log into Instant Borrow for more Details.</p>
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
	$phpmailer->AltBody = ''.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after being banned.
						Funds have Been Sent to your venmo Account. They may take a few Minutes to arrive.
						Log Into Instant Borrow for more details at www.instant-borrow.com';
	$phpmailer->send();
	
	header("location: actions/users/logoutAction.php");
	}

	
	
	
	
	

	
	if(isset($_POST['payment_zelle'])){
		
	$transactionId = ($_POST['zelle_id']);
		

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Zelle", repayment_transaction_id = ? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
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
	$phpmailer->Subject = ''.$username_borrower.' Repaid you '.$repayment_amount.'$!';

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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after Being Banned.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Repayment Received!</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$username_borrower.'</span> Repaid you <span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$repayment_amount.'$</span> on Instant Borrow after Being Banned.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Funds have Been Sent to your Zelle Account. They may take a few Minutes to arrive.</p>
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
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log into Instant Borrow for more Details.</p>
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
	$phpmailer->AltBody = ''.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after being banned.
						Funds have Been Sent to your Zelle Account. They may take a few Minutes to arrive.
						Log Into Instant Borrow for more details at www.instant-borrow.com';
	$phpmailer->send();
	
	header("location: actions/users/logoutAction.php");
	}

	

	
	if(isset($_POST['payment_chime'])){
		
	$transactionId = ($_POST['chime_id']);
		

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Chime", repayment_transaction_id WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
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
	$phpmailer->Subject = ''.$username_borrower.' Repaid you '.$repayment_amount.'$!';

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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after Being Banned.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Repayment Received!</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$username_borrower.'</span> Repaid you <span style="color: #2b80ff; font-weight: bold; font-size: 18px;">'.$repayment_amount.'$</span> on Instant Borrow after Being Banned.</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;">Funds have Been Sent to your Chime Account. They may take a few Minutes to arrive.</p>
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
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-top: 30px; margin-bottom: 15px;">Log into Instant Borrow for more Details.</p>
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
	$phpmailer->AltBody = ''.$username_borrower.' Repaid you '.$repayment_amount.'$ on Instant Borrow after being banned.
						Funds have Been Sent to your Chime Account. They may take a few Minutes to arrive.
						Log Into Instant Borrow for more details at www.instant-borrow.com';
	$phpmailer->send();
	
	header("location: actions/users/logoutAction.php");
	}
	

	

	
}else{$Loannotfound ="yes";}

}else{$Loannotfound ="yes";}
