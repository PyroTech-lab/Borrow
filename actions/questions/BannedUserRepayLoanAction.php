<?php

session_start();
require('actions/database.php');






if(isset($_GET['id']) AND !empty($_GET['id'])){

	
	
	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND id_borrower = ?');
    $checkIfLoanExists->execute(array($_GET['id'], $_SESSION['id']));
	
	if($checkIfLoanExists->rowCount() > 0){


        $LoanInfos = $checkIfLoanExists->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_lender = $LoanInfos['id_lender'];
		$username_lender = $LoanInfos['username_lender'];
		$id_borrower = $LoanInfos['id_borrower'];
		$repaid_date = date('Y-m-d H:i:s');
		$idOfTheQuestion = $_GET['id'];
		
		
	$GeBannedDetails = $bdd->prepare('SELECT reason FROM banned_users WHERE id_user = ?');
    $GeBannedDetails->execute(array($id_borrower));

        $GetBannedReason = $GeBannedDetails->fetch();

       $reason = $GetBannedReason['reason'];
		
		
		if($reason == "unpaid"){
			$reason_public = "Unpaid Loan";
		}
		
		if($reason == "fraud"){
			$reason_public = "Fraud";
		}
       

	
	$GetPaymentMethod = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ?');
    $GetPaymentMethod->execute(array($id_lender));
	
	$DisplayPaymentMethods = $GetPaymentMethod->fetch();
	
	$paypal = $DisplayPaymentMethods['paypal'];
	$cashapp = $DisplayPaymentMethods['cashapp'];
	$venmo = $DisplayPaymentMethods['venmo'];
	$zelle = $DisplayPaymentMethods['zelle'];
	$chime = $DisplayPaymentMethods['chime'];
	
	
	$status = "paid_afterban_notseen";
	
	
	if(strlen($paypal) == 0){
	$paypal_notset= "none";
	}else{ $paypal_notset = "";}
	
	if(strlen($cashapp) == 0){
	$cashapp_notset= "none";
	}else{ $cashapp_notset = "";}
	
	if(strlen($venmo) == 0){
	$venmo_notset= "none";
	}else{ $venmo_notset = "";}
	
	if(strlen($zelle) == 0){
	$zelle_notset= "none";
	}else{ $zelle_notset = "";}
	
	if(strlen($chime) == 0){
	$chime_notset= "none";
	}else{ $chime_notset = "";}
	
	
	if($paypal_notset== ""){
	$default= "paypal";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "")){
	$default= "cashapp";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "")){
	$default= "venmo";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "")){
	$default= "zelle";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "none")AND($chime_notset == "")){
	$default= "chime";}
	
	if(($paypal_notset== "none")AND($cashapp_notset== "none")AND($venmo_notset== "none")AND($zelle_notset == "none")AND($chime_notset == "none")){
	$default= "nothing";}

	
	
	
	
	

			
	if(isset($_POST['payment_paypal'])){
		
	$transactionId = ($_POST['paypal_id']);
		

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Paypal", repayment_transaction_id=? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Repayment Successfull!</div>";
	header("location: actions/users/logoutAction.php");
	}

	
	
	
	
	

	
	if(isset($_POST['payment_cashapp'])){
		
	$transactionId = ($_POST['cashapp_id']);
	

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Cashapp", repayment_transaction_id= ? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Repayment Successfull!</div>";
	header("location: actions/users/logoutAction.php");
	}

	
	
	
	

	
	if(isset($_POST['payment_venmo'])){
		
	$transactionId = ($_POST['venmo_id']);
	

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Venmo", repayment_transaction_id = ? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Repayment Successfull!</div>";
	hheader("location: actions/users/logoutAction.php");
	}

	
	
	
	
	

	
	if(isset($_POST['payment_zelle'])){
		
	$transactionId = ($_POST['zelle_id']);
		

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Zelle", repayment_transaction_id = ? WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Repayment Successfull!</div>";
	header("location: actions/users/logoutAction.php");
	}

	

	
	if(isset($_POST['payment_chime'])){
		
	$transactionId = ($_POST['chime_id']);
		

    $loanRepayed = $bdd->prepare('UPDATE loan SET repaid_date = ?, status = ?, payment_method_repayment="Chime", repayment_transaction_id WHERE id= ?');
	$loanRepayed->execute(array($repaid_date, $status, $transactionId, $idOfTheQuestion));
	
	$success_message = "<div class='success'>Repayment Successfull!</div>";
	header("location: actions/users/logoutAction.php");
	}
	

	

	
}else{$Loannotfound ="yes";}

}else{$Loannotfound ="yes";}



