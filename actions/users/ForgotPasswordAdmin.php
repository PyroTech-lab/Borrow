<?php

use PHPMailer\PHPMailer\PHPMailer;
require('actions/database.php');

$ForgotFormDisplay = "none";
$BodyDisplay = "block";
$EnterCodeDisplay = "none";
$CreateNewCodeDisplay = "none";

if(isset($_POST['forgot_password'])){
	
	$ForgotFormDisplay = "block";
	$BodyDisplay = "none";
	$EnterCodeDisplay = "none";
	$CreateNewCodeDisplay = "none";
		
}

if(isset($_POST['return'])){
	
	$ForgotFormDisplay = "none";
	$BodyDisplay = "block";
	$EnterCodeDisplay = "none";
	$CreateNewCodeDisplay = "none";
		
}


if(isset($_POST['continue'])){
	
		
		if(!empty(htmlspecialchars($_POST['recovery_email']))){
		 
		$user_email = (htmlspecialchars($_POST['recovery_email']));
		
		$CheckIfEmailRegistered = $bdd->prepare('SELECT email FROM admin WHERE email= ?');
		$CheckIfEmailRegistered->execute(array($user_email));
		
		if($CheckIfEmailRegistered->rowCount() !== 0){

			$random_number = ''; for ($i = 0; $i<6; $i++) {$random_number .= mt_rand(0,9);}

			$insertCodeinData = $bdd->prepare('UPDATE admin  SET password_recovery_code= ? WHERE email=?');
			$insertCodeinData->execute(array($random_number, $user_email));

			require_once 'vendor/autoload.php';

			$phpmailer = new PHPMailer();
			$phpmailer->isSMTP();
			$phpmailer->Host = 'live.smtp.mailtrap.io';
			$phpmailer->SMTPAuth = true;
			$phpmailer->Port = 587;
			$phpmailer->Username = 'api';
			$phpmailer->Password = '80c05e0ef1f980aa713b7b0a91f9113e';

			$phpmailer->setFrom('contact@star-agency.digital','Instant Borrow');
			$phpmailer->addAddress(''.$user_email.'');
			$phpmailer->Subject = 'Instant Borrow Password Reset Code';

			$phpmailer->Body = '<html>
						  <head>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>Instant Borrower Notification</title>
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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$random_number.' is your Password Reset Code on Instant Borrow.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Instant Borrow Verification Code</p>
												<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 30px;">'.$random_number.'</span> Is your Password Reset Code on Instant Borrow.</p>
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
						$phpmailer->AltBody = ''.$random_number.' is your Instant Borrow verification Code.';
			
				$phpmailer->send();
			
			$ForgotFormDisplay = "none";
			$BodyDisplay = "none";
			$EnterCodeDisplay = "block";
			$CreateNewCodeDisplay = "none";
		
	
		}else{
		
			$ForgotFormDisplay = "none";
			$BodyDisplay = "none";
			$EnterCodeDisplay = "block";
			$CreateNewCodeDisplay = "none";
		}
	
	 }else{
		$email_required = "Please enter a Valid Email Address";
		
		$ForgotFormDisplay = "block";
		$BodyDisplay = "none";
		$EnterCodeDisplay = "none";
		$CreateNewCodeDisplay = "none";
	 }
		 
}


if(isset($_POST['submit_code'])){
	
	
	if(!empty($_POST['verification_code'])){
		
		$GetVerificationCode = $bdd->prepare('SELECT password_recovery_code FROM admin WHERE (password_recovery_code= ? AND email= ?)');
		$GetVerificationCode->execute(array($_POST['verification_code'], $_POST['recovery_email_repeat']));
		
		if($GetVerificationCode->rowCount() !== 0){
		
			$ForgotFormDisplay = "none";
			$BodyDisplay = "none";
			$EnterCodeDisplay = "none";
			$CreateNewCodeDisplay = "block";
			
		}else{
			$wrong_code = "Wrong Verification Code";
			
			$ForgotFormDisplay = "none";
			$BodyDisplay = "none";
			$EnterCodeDisplay = "block";
			$CreateNewCodeDisplay = "none";
		}
		
	}else{
	
		$ForgotFormDisplay = "none";
		$BodyDisplay = "none";
		$EnterCodeDisplay = "block";
		$CreateNewCodeDisplay = "none";
		
		$wrong_code = "Wrong Verification Code";
		
	}
	
}


if(isset($_POST['submit_new_password'])){
	
	if(!empty($_POST['new_password'])){
		
		$user_new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
		
			if(strlen($_POST['new_password']) >= 8){
				
				$updatePassword = $bdd->prepare('UPDATE admin SET password= ?, password_recovery_code="" WHERE (password_recovery_code=? AND email= ?)');
				$updatePassword->execute(array($user_new_password, $_POST['verification_code_repeat'], $_POST['recovery_email_repeat_2']));
				
				
				$checkIfUserExists = $bdd->prepare('SELECT * FROM admin WHERE email = ?');
				$checkIfUserExists->execute(array($_POST['recovery_email_repeat_2']));

				$usersInfos = $checkIfUserExists->fetch();
				
				$_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['email'] = $usersInfos['email'];
                $_SESSION['name'] = $usersInfos['name'];
                $_SESSION['username'] = $usersInfos['username'];
				
				header('Location: dashboard.php');
				
			}else{
				$errorMsg = "Password must contain at least 8 Characters";
				
				$ForgotFormDisplay = "none";
				$BodyDisplay = "none";
				$EnterCodeDisplay = "none";
				$CreateNewCodeDisplay = "block";
			}
		
	}else{
		$errorMsg = "Please complete all the fields...";
		
		$ForgotFormDisplay = "none";
		$BodyDisplay = "none";
		$EnterCodeDisplay = "none";
		$CreateNewCodeDisplay = "block";
	}
	
}