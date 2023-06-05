<?php

require('actions/database.php');

$LogoutifBanned = $bdd->prepare('SELECT username FROM banned_users WHERE username= ?');
$LogoutifBanned->execute(array($_SESSION['username']));
			
if($LogoutifBanned->rowCount() !== 0){

header('Location: actions/users/logoutAction.php');
}