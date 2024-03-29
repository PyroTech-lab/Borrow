<?php
session_start();
require('actions/database.php');


if(isset($_POST['signup'])){


    if(!empty($_POST['email']) AND !empty($_POST['name']) AND !empty($_POST['username']) AND !empty($_POST['password'])){
        

        $user_email = htmlspecialchars($_POST['email']);
        $user_fullname = htmlspecialchars($_POST['name']);
        $user_username = htmlspecialchars($_POST['username']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$user_join_date = date('Y-m-d');


        $checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($user_email));
		
		$checkIfUserBanned = $bdd->prepare('SELECT email FROM banned_users WHERE email = ?');
        $checkIfUserBanned->execute(array($user_email));

        if(($checkIfUserAlreadyExists->rowCount() == 0)AND($checkIfUserBanned->rowCount() == 0)){
			
			$checkIfUsernameAvailable = $bdd->prepare('SELECT username FROM users WHERE username = ?');
			$checkIfUsernameAvailable->execute(array($user_username));
			
			$checkIfUsernameAvailable2 = $bdd->prepare('SELECT username FROM banned_users WHERE username = ?');
			$checkIfUsernameAvailable2->execute(array($user_username));
			
			 if(($checkIfUsernameAvailable->rowCount() == 0)AND($checkIfUsernameAvailable2->rowCount() == 0)){
				 
				if(strlen($_POST['username']) < 18){
			
				if(strlen($_POST['password']) >= 8){
            

				$insertUserOnWebsite = $bdd->prepare('INSERT INTO users(email, name, username, password, join_date)VALUES(?, ?, ?, ?,?)');
				$insertUserOnWebsite->execute(array($user_email, $user_fullname, $user_username, $user_password, $user_join_date));


				$getInfosOfThisUserReq = $bdd->prepare('SELECT id, email, name, username, join_date FROM users WHERE email = ? AND name = ? AND username = ? AND join_date= ?');
				$getInfosOfThisUserReq->execute(array($user_email, $user_fullname, $user_username, $user_join_date));

				$usersInfos = $getInfosOfThisUserReq->fetch();


				$_SESSION['auth'] = true;
				$_SESSION['id'] = $usersInfos['id'];
				$_SESSION['email'] = $usersInfos['email'];
				$_SESSION['name'] = $usersInfos['name'];
				$_SESSION['username'] = $usersInfos['username'];
				$_SESSION['join_date'] = $usersInfos['join_date'];
				
				
				$AddUserToPaymentData = $bdd->prepare('INSERT INTO payment_method SET id_user = ?');
				$AddUserToPaymentData->execute(array($_SESSION['id']));
				
				$AddUserToFeedbackSystem = $bdd->prepare('INSERT INTO feedback SET positive_feedback="0", negative_feedback="0", id_user = ?');
				$AddUserToFeedbackSystem->execute(array($_SESSION['id']));
				

				header('Location: borrow-money.php');
				
				}else{
					 $errorMsg = "Password must contain at least 8 Characters";
				}
				
				}else{
					$errorMsg = "Username must contain less than 18 Characters";
				}

				 }else{
					 $errorMsg = "Username already taken";
				 }
			
			
			}else{
				$errorMsg = "Email already registered";
			}

		}else{
			$errorMsg = "Please complete all the fields...";
		}

}