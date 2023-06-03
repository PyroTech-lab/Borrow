<?php

require('actions/database.php');


if(isset($_POST['change_password'])){


    if(!empty($_POST['current_password']) AND !empty($_POST['new_password'])){
        

        $user_curent_password = htmlspecialchars($_POST['current_password']);
        $user_new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
		
		if(strlen($_POST['new_password']) >= 8){


		$GetPassword = $bdd->prepare('SELECT password FROM users WHERE id = ?');
		$GetPassword->execute(array($_SESSION['id']));
		
        $PasswordInfo = $GetPassword->fetch();


            if(password_verify($user_curent_password, $PasswordInfo['password'])){
            
			$UpdatePassword = $bdd->prepare('UPDATE users SET password= ? WHERE id = ? ');
			$UpdatePassword->execute(array($user_new_password,$_SESSION['id']));

    
            }else{
                $errorMsg = "Wrong Password";
            }
			
		}else{
			$errorMsg = "Password must contain at least 8 Characters";
		}


    }else{
        $errorMsg = "Please fill out all the fields...";
    }

}