<?php
session_start();
require('actions/database.php');


if(isset($_POST['signup'])){


    if(!empty($_POST['email']) AND !empty($_POST['name']) AND !empty($_POST['password'])){
        

        $user_email = htmlspecialchars($_POST['email']);
        $user_fullname = htmlspecialchars($_POST['name']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM admin WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($user_email));
		

        if(($checkIfUserAlreadyExists->rowCount() == 0)){
		
			
				if(strlen($_POST['password']) >= 8){
            

				$insertUserOnWebsite = $bdd->prepare('INSERT INTO admin(email, name, password)VALUES(?, ?, ?)');
				$insertUserOnWebsite->execute(array($user_email, $user_fullname, $user_password));


				$getInfosOfThisUserReq = $bdd->prepare('SELECT id, email, name FROM admin WHERE email = ? AND name = ?');
				$getInfosOfThisUserReq->execute(array($user_email, $user_fullname));

				$usersInfos = $getInfosOfThisUserReq->fetch();


				$_SESSION['admin'] = true;
				$_SESSION['id'] = $usersInfos['id'];
				$_SESSION['email'] = $usersInfos['email'];
				$_SESSION['name'] = $usersInfos['name'];
	
				$errorMsg = "Administrator Added";
				
				}else{
					 $errorMsg = "Password must contain at least 8 Characters";
				}
		
			
			}else{
				$errorMsg = "Email already registered";
			}

		}else{
			$errorMsg = "Please complete all the fields...";
		}

}