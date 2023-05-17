<?php
session_start();
require('actions/database.php');


if(isset($_POST['signup'])){


    if(!empty($_POST['email']) AND !empty($_POST['name']) AND !empty($_POST['username']) AND !empty($_POST['password'])){
        

        $user_email = htmlspecialchars($_POST['email']);
        $user_fullname = htmlspecialchars($_POST['name']);
        $user_username = htmlspecialchars($_POST['username']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($user_email));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(email, name, username, password)VALUES(?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_email, $user_fullname, $user_username, $user_password));


            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, email, name, username FROM users WHERE email = ? AND name = ? AND username = ?');
            $getInfosOfThisUserReq->execute(array($user_email, $user_fullname, $user_username));

            $usersInfos = $getInfosOfThisUserReq->fetch();


            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['email'] = $usersInfos['email'];
            $_SESSION['name'] = $usersInfos['name'];
            $_SESSION['username'] = $usersInfos['username'];
			
			
			$AddUserToPaymentData = $bdd->prepare('INSERT INTO payment_method SET id_user = ?');
            $AddUserToPaymentData->execute(array($_SESSION['id']));

            header('Location: dashboard.php');

        }else{
            $errorMsg = "Email already registered";
        }

    }else{
        $errorMsg = "Please complete all the fields...";
    }

}