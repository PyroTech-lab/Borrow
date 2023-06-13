<?php
require('actions/database.php');

$GetProfilePicture = $bdd->prepare('SELECT profile_picture users WHERE id = ?');
$GetProfilePicture->execute(array($_SESSION['id']));


if($checkUnpaidLoans->rowCount() > 0){
	$UnpaidMsg = "You have an Unpaid Loan. Click here to repay it.";

}
