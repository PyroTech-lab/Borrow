<?php
session_start();
require('actions/database.php');


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


                header('Location: dashboard.php');
    
            }else{
                $errorMsg = "Wrong Email or Password";
            }

        }else{
			
					$checkIfUserBanned = $bdd->prepare('SELECT * FROM banned_users WHERE email = ?');
					$checkIfUserBanned->execute(array($user_email));
					
					if($checkIfUserBanned->rowCount() > 0){
						
						$BannedusersInfos = $checkIfUserBanned->fetch();
						
						if(password_verify($user_password, $BannedusersInfos['password'])){
							
						$GetUnpaidLoan = $bdd->prepare('SELECT id FROM loan WHERE id_borrower = ? AND (status="unpaid_banned_archived" OR status="unpaid_banned")');
						$GetUnpaidLoan->execute(array($BannedusersInfos['id_user']));
						
						if($GetUnpaidLoan->rowCount() > 0){
						
						$GetLoanId = $GetUnpaidLoan->fetch();
					
						$_SESSION['banned'] = true;
						$_SESSION['id'] = $BannedusersInfos['id_user'];
						
						header('Location: banned.php?id='.$GetLoanId['id'].'');
						
						}else{
							$errorMsg = "Wrong Email or Password";
						}
						
						}else{
							$errorMsg = "Wrong Email or Password";
						}
					
					}else{
						$errorMsg = "Wrong Email or Password";
					}
        }

    }else{
        $errorMsg = "Please fill out all the fields...";
    }

}