<?php

require('actions/database.php');



if(isset($_POST['confirm_repay'])){
	
	if(isset($_GET['id']) AND !empty($_GET['id'])){

	$idOfTheQuestion = $_GET['id'];
	$repaid_date = date('Y-m-d H:i:s');
	
	$getLoan = $bdd->prepare('SELECT repayment_date FROM loan WHERE id= ?');
	$getLoan->execute(array($idOfTheQuestion));
	
	
	if($getLoan->rowCount() > 0){

	$LoanInfo = $getLoan->fetch();

	$repayment_date = $LoanInfo['repayment_date'];
	
	if($repaid_date>$repayment_date){
		
	$loanRepaidLate = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = "paid_late" WHERE id= ?');
	$loanRepaidLate->execute(array($repayment_date, $idOfTheQuestion));
		
	}else{

	$loanRepaidOntime = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = "paid_ontime" WHERE id= ?');
	$loanRepaidOntime->execute(array($repaid_date, $idOfTheQuestion));
	}
        
}
	
}

}
