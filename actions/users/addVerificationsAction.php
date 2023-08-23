<?php
use PHPMailer\PHPMailer\PHPMailer;
require('actions/database.php');

			 
$EnterCodeBoxDisplay = "none";
$EmailDisplay = "block";




require_once 'vendor/autoload.php';
$phoneUtil = \libphonenumber\PhoneNumberUtil::getinstance();
$arrRegions = $phoneUtil->getSupportedRegions();

if(isset($_POST['phone_submit'])){
	
	if ($_POST['country_code_set']!=-1) {
	
	if((strlen($_POST['phone_set']) >= 4)and(strlen($_POST['phone_set']) < 16)){


	$phone_number = $_POST['phone_set'];
	$region = $_POST['country_code_set'];
	
	$parseNumber = $phoneUtil->parse($phone_number, $region);
	
	if($phoneUtil->isValidNumber($parseNumber)){
	
		$id_user = $_SESSION['id'];
		
		$full_number = $phoneUtil->format($parseNumber, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
		
		
		$insertQuestionOnWebsite = $bdd->prepare('UPDATE users SET phone_number = ? WHERE id= ?');
		$insertQuestionOnWebsite->execute(array($full_number, $id_user));
		
		header("Refresh:0");

	}else {
		$invalid_phone_number = "Please enter a Valid Phone Number";
	}
	
	}else {
		$invalid_phone_number = "Please enter a Valid Phone Number";
	}
	
	}else {
		$invalid_phone_number = "Please Select a Country Code";
	}
}







if(isset($_POST['address_submit'])){
	
	$country_set = ucwords(htmlspecialchars($_POST['country_set']));
	$country_icon = "assets/images/country-icons/$country_set.png"; 

		if (file_exists($country_icon)) {
	
		$id_user = $_SESSION['id'];
	
			$address_set = ucwords(htmlspecialchars($_POST['address_set']));
			$city_set = ucwords(htmlspecialchars($_POST['city_set']));
			$postcode_set = (htmlspecialchars($_POST['postcode_set']));
			$country_set = ucwords(htmlspecialchars($_POST['country_set']));

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE users  SET address=?, city=?, postcode=?, country=? WHERE id=?');
			$insertQuestionOnWebsite->execute(array($address_set, $city_set, $postcode_set, $country_set, $id_user));
			
			header("Refresh:0");
			
		}else {
			$invalidCountry= "Please Enter a Valid Country";
		}	

}
				





		

if (isset($_POST['idcard_submit']) && $_POST['idcard_submit'] == 'Upload ID'){
	
	$id_user = $_SESSION['id'];

	if (isset($_FILES['idcard_upload']) && $_FILES['idcard_upload']['error'] === UPLOAD_ERR_OK){

		$fileTmpPath = $_FILES['idcard_upload']['tmp_name'];
		$fileName = $_FILES['idcard_upload']['name'];
		$fileSize = $_FILES['idcard_upload']['size'];
		$fileType = $_FILES['idcard_upload']['type'];
		$fileNameCmps = explode(".", $fileName);
		$fileExtension = strtolower(end($fileNameCmps));

		$newFileName = md5(time() . $fileName) . '.' . $fileExtension;

		$allowedfileExtensions = array('jpg','png','pdf');
		if (in_array($fileExtension, $allowedfileExtensions)){

		  $uploadFileDir = 'assets/images/id-verification/under-verification/';
		  $dest_path = $uploadFileDir . $newFileName;
		  if(move_uploaded_file($fileTmpPath, $dest_path)) {
			
				$UpdateReceptionStatus = $bdd->prepare('UPDATE users SET id_verified ="under_verification", identity_card = ? WHERE id = ?');
				$UpdateReceptionStatus->execute(array($newFileName, $id_user));
			
				$CorrectIdMessage = "<div style='font-weight: 500; color: green; margin-top: 15px;'>ID Card Uploaded Succesfully. Verification Process Started.</div>";
				$FileUploadDisplay = "none";
				
				
	
	   
		}else{
		  $file_error_message = "<div style='font-weight: 500; color: red; margin-top: 15px;'>Only PNG, JPG and PDF files are Accepted.</div>";
		}


		}

	}
}				









if(isset($_POST['email_verify'])){

$EnterCodeBoxDisplay = "block";
$EmailDisplay = "none";
$user_email = $_SESSION['email'];
$id_user = $_SESSION['id'];

$random_number = ''; for ($i = 0; $i<6; $i++) {$random_number .= mt_rand(0,9);}

$insertCodeinData = $bdd->prepare('UPDATE users  SET verification_code= ? WHERE id=?');
$insertCodeinData->execute(array($random_number, $id_user));

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
$phpmailer->Subject = 'Instant Borrow Email Verification Code';

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
							<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0'.$random_number.' is your Instant Borrow verification Code.</span>
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
												<p style="font-family: sans-serif; font-size: 22px; font-weight: bold; margin: 0; margin-bottom: 30px;">Instant Borrow Verification</p>
												<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 30px;"><span style="color: #2b80ff; font-weight: bold; font-size: 19px;">'.$random_number.'</span> is your  Instant Borrow Verifcation Code.</p>
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
$phpmailer->AltBody = ''.$random_number.' Is your Instant Borrow verification Code.';

$phpmailer->send();
}


if(isset($_POST['email_verifcation_submit'])){
	

	if(!empty($_POST['email_verification_code'])){
		
		$id_user = $_SESSION['id'];
		$entered_email_code = $_POST['email_verification_code'];
		
		$GetVerificationCode = $bdd->prepare('SELECT verification_code FROM users WHERE id= ?');
		$GetVerificationCode->execute(array($id_user));
		
		$GetCode = $GetVerificationCode->fetch();

        $verification_code = $GetCode['verification_code'];

		if($entered_email_code == $verification_code){
			
			
			$insertVerifiedinData = $bdd->prepare('UPDATE users SET verification_code="", email_verified="yes" WHERE id= ?');
			$insertVerifiedinData->execute(array($id_user));
			
			$EnterCodeBoxDisplay = "none";
			$EmailDisplay = "block";
			
		}else{
			$email_error_message = "Wrong Verification Code.";
			
			$EnterCodeBoxDisplay = "block";
			$EmailDisplay = "none";
			

		}

	}

}
