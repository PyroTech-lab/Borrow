<?php

require('actions/database.php');

if(isset($_POST['confirm_lend'])){
	
	if(isset($_GET['id']) AND !empty($_GET['id'])){

	$granting_date = date('Y-m-d H:i:s');
	$id_lender = $_SESSION['id'];
	$username_lender = $_SESSION['username'];
	$status = "active_notseen";
	$idOfTheQuestion = $_GET['id'];

    $loanGrant = $bdd->prepare('UPDATE loan SET granting_date = ?, id_lender = ?, username_lender = ?, status = ? WHERE id= ?');
	$loanGrant->execute(array($granting_date, $id_lender, $username_lender, $status, $idOfTheQuestion));
	
	header("location:profile.php");
}

}



