<?php
session_start();
require('actions/database.php');
require('actions/questions/showArticleContentAction.php');


if(isset($_POST['login'])){


    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        

        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);


        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $checkIfUserExists->execute(array($user_email));

        if($checkIfUserExists->rowCount() > 0){
            

            $usersInfos = $checkIfUserExists->fetch();


            if(password_verify($user_password, $usersInfos['password'])){
            

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['email'] = $usersInfos['email'];
                $_SESSION['name'] = $usersInfos['name'];
                $_SESSION['username'] = $usersInfos['username'];


                header('Location: lend-yeslogin.php?id=<?= $id_author; ?>');
    
            }else{
                $errorMsg = "Wrong password";
            }

        }else{
            $errorMsg = "Email not recognized";
        }

    }else{
        $errorMsg = "Please fill out all the fields...";
    }

}