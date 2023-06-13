<?php

require('actions/database.php');	

$visible_onload_changeemail = "";

		if(isset($_POST['change_email'])){
					
				if(!empty($_POST['emailchange_password'])){
		
				$user_password = htmlspecialchars($_POST['emailchange_password']);
				
				$GetPassword = $bdd->prepare('SELECT password FROM users WHERE id = ?');
				$GetPassword->execute(array($_SESSION['id']));
					
				$PasswordInfo = $GetPassword->fetch();
				
				if(password_verify($user_password, $PasswordInfo['password'])){
					
				$new_email = htmlspecialchars($_POST['new_email']);
				
				$checkIfEmailAlreadyRegistered = $bdd->prepare('SELECT email FROM users WHERE email = ?');
				$checkIfEmailAlreadyRegistered->execute(array($new_email));
				
				if(strlen($new_email) > 0){
				
					if($checkIfUserAlreadyExists->rowCount() == 0){
						
					$ChangeEmail = $bdd->prepare('UPDATE users SET email= ?, email_verified="" WHERE id = ?');
					$ChangeEmail->execute(array($new_email, $_SESSION['id']));
					}else{
						$email_error_message = "Email Already Registered";
					}
					
				}else{
					$email_error_message = "Please enter a Valid Email Address";
					$visible_onload_changeemail = "-visible";
				}
				
				}else{
					$email_error_message = "Wrong password";
					$visible_onload_changeemail = "-visible";
				}
					
				}else{
					$email_error_message = "Please enter your password.";
					$visible_onload_changeemail = "-visible";
				}
				
				}