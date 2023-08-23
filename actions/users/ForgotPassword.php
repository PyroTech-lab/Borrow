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
		
		$CheckIfEmailRegistered = $bdd->prepare('SELECT email FROM users WHERE email= ?');
		$CheckIfEmailRegistered->execute(array($user_email));
		
		if($CheckIfEmailRegistered->rowCount() !== 0){

			$random_number = ''; for ($i = 0; $i<6; $i++) {$random_number .= mt_rand(0,9);}

			$insertCodeinData = $bdd->prepare('UPDATE users  SET password_recovery_code= ? WHERE email=?');
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
			$phpmailer->Subject = 'Instant Borrow Email Verification Code';

			$phpmailer->Body = '<html><span>'.$random_number.'</span></br><span>Is your Instant Borrow Verification Code.</span></html>';
			$phpmailer->AltBody = ''.$random_number.' Is your Instant Borrow verification Code.';
			
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
		
		$GetVerificationCode = $bdd->prepare('SELECT password_recovery_code FROM users WHERE (password_recovery_code= ? AND email= ?)');
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
				
				$updatePassword = $bdd->prepare('UPDATE users SET password= ?, password_recovery_code="" WHERE (password_recovery_code=? AND email= ?)');
				$updatePassword->execute(array($user_new_password, $_POST['verification_code_repeat'], $_POST['recovery_email_repeat_2']));
				
				
				$checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE email = ?');
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