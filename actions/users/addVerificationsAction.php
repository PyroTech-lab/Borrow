<?php
use PHPMailer\PHPMailer\PHPMailer;
require('actions/database.php');



$EnterCodeBoxDisplay = "none";



if(isset($_POST['phone_submit'])){
	
		$id_user = $_SESSION['id'];
	
			$phone_set = htmlspecialchars($_POST['phone_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE users SET phone_number = ? WHERE id= ?');
			$insertQuestionOnWebsite->execute(array($phone_set, $id_user));
			
			header("Refresh:0");
				}


if(isset($_POST['address_submit'])){
	
		$id_user = $_SESSION['id'];
	
			$address_set = htmlspecialchars($_POST['address_set']);
			$city_set = htmlspecialchars($_POST['city_set']);
			$country_set = htmlspecialchars($_POST['country_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE users  SET address=?, city=?, country=? WHERE id=?');
			$insertQuestionOnWebsite->execute(array($address_set, $city_set, $country_set, $id_user));
			
			header("Refresh:0");
				}
				
				

if(isset($_POST['idcard_submit'])){
	
		$id_user = $_SESSION['id'];
	
			$idcard_set = htmlspecialchars($_POST['idcard_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE users SET identity_card = ? WHERE id= ?');
			$insertQuestionOnWebsite->execute(array($idcard_set, $id_user));
			
			header("Refresh:0");
				}
				






if(isset($_POST['email_verify'])){

$user_email = $_SESSION['email'];

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

$phpmailer->Body = '<html><span>'.$random_number.'</span></br><span>Is your Instant Borrow Verification Code.</span></html>';
$phpmailer->AltBody = ''.$random_number.' Is your Instant Borrow verification Code.';


if (!$phpmailer->send()) {
	$mail_faillure = "Email Error. Please Try Again.";
}else{
	$mail_success = "Verifcation Email Sent.";
	$EnterCodeBoxDisplay = "block";
}



	if(isset($_POST['email_verifcation_submit'])){

		if(isset($_POST['email_verifcation_code'])){
	
			$entered_email_code = $_POST['email_verifcation_code'];

			$GetCode = $bdd->prepare('SELECT  verification_code FROM users WHERE id=?');
			$GetCode->execute(array($id_user));

			$CodeInfos = $GetCode->fetch();

			if($entered_email_code = '.$CodeInfos["verification_code"].'){
				
				
				$insertVerifiedinData = $bdd->prepare('UPDATE users  SET verification_code="" email_verified="yes" WHERE id=?');
				$insertVerifiedinData->execute(array($id_user));
				
				$EnterCodeBoxDisplay = "none";
				
				$email_verified_message = "Email verified!";
				
			}else{
				$email_notverified = "Wrong Verification Code.";
			}

		}

	}

}