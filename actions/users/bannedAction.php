<?php

require('actions/database.php');

$LogoutifBanned = $bdd->prepare('SELECT id_user FROM banned_users WHERE id_user= ?');
$LogoutifBanned->execute(array($_SESSION['id']));
			
if($LogoutifBanned->rowCount() !== 0){

header('Location: actions/users/logoutAction.php');
}