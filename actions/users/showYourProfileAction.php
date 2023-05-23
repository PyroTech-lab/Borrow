<?php
require('actions/database.php');

$getAllactiveLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="active" OR status="active_notseen")');
$getAllactiveLoans->execute(array($_SESSION['id']));

	$activeCountMessage = $getAllactiveLoans->rowCount();






	
$getAllLoanRequest = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="request"');
$getAllLoanRequest->execute(array($_SESSION['id']));

	$requestCountMessage = $getAllLoanRequest->rowCount();
	






$getAllunpaidLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="unpaid"');
$getAllunpaidLoans->execute(array($_SESSION['id']));

	$unpaidCountMessage = $getAllunpaidLoans->rowCount();








$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
$getAllLoans->execute(array($_SESSION['id']));

	$AllCountMessage = $getAllLoans->rowCount();





$getLentAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_lender = ?');
$getLentAllLoans->execute(array($_SESSION['id']));

	$AllLentCountMessage = $getLentAllLoans->rowCount();


$getLentPaidLateLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="paid_late" OR status="paid_late_notseen")');
$getLentPaidLateLoans->execute(array($_SESSION['id']));

	$AllPaidLateCountMessage = $getLentPaidLateLoans->rowCount();




	
$checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM loan WHERE id_lender = ?');
$checkIfUserAlreadyExists->execute(array($_SESSION['id']));
		
if($checkIfUserAlreadyExists->rowCount() !== 0){
	
$getLentAmount = $bdd->prepare('SELECT SUM(loan_amount) AS total_lent FROM loan WHERE id_lender = ?');
$getLentAmount->execute(array($_SESSION['id']));

	$row = $getLentAmount->fetch(PDO::FETCH_ASSOC);
	$getLentAmountMessage = $row['total_lent'];
}else{
	$getLentAmountMessage = "0.0000000001";
}
	






$checkIfUserAlreadyExists2 = $bdd->prepare('SELECT * FROM loan WHERE id_lender = ? AND (status="paid_ontime" OR status="paid_late" OR status="paid_ontime_notseen" OR status="paid_late_notseen")');
$checkIfUserAlreadyExists2->execute(array($_SESSION['id']));
		
if($checkIfUserAlreadyExists2->rowCount() !== 0){	

$getRepayedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayed FROM loan WHERE id_lender = ? AND (status="paid_ontime" OR status="paid_late" OR status="paid_ontime_notseen" OR status="paid_late_notseen")');
$getRepayedAmount->execute(array($_SESSION['id']));

	$row = $getRepayedAmount->fetch(PDO::FETCH_ASSOC);
	$getRepayedAmountMessage = $row['total_repayed'];
}else{
	$getRepayedAmountMessage = "0.0000000001";
}




$checkIfUserAlreadyExists3 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
$checkIfUserAlreadyExists3->execute(array($_SESSION['id']));
		
if($checkIfUserAlreadyExists3->rowCount() !== 0){	

$getBorrowedAmount = $bdd->prepare('SELECT SUM(loan_amount) AS total_borrowed FROM loan WHERE id_borrower = ? AND NOT status="request"');
$getBorrowedAmount->execute(array($_SESSION['id']));

	$row = $getBorrowedAmount->fetch(PDO::FETCH_ASSOC);
	$getBorrowedAmountMessage = $row['total_borrowed'];
}else{
	$getBorrowedAmountMessage = "0.0000000001";
}		
	
	
	
	

	
$getRepayedBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND (status="paid_ontime" OR status="paid_late" OR status="paid_ontime_notseen" OR status="paid_late_notseen")');
$getRepayedBorrowedAmount->execute(array($_SESSION['id']));

	$row = $getRepayedBorrowedAmount->fetch(PDO::FETCH_ASSOC);
	$getRepayedBorrowedAmountMessage = $row['total_repayment_borrowed'];

	



$checkIfUserAlreadyExists4 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
$checkIfUserAlreadyExists4->execute(array($_SESSION['id']));
		
if($checkIfUserAlreadyExists4->rowCount() !== 0){

$getSupposedRepaymentBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND NOT status="request"');
$getSupposedRepaymentBorrowedAmount->execute(array($_SESSION['id']));

	$row = $getSupposedRepaymentBorrowedAmount->fetch(PDO::FETCH_ASSOC);
	$getSupposedRepaymentBorrowedAmountMessage = $row['total_repayment_borrowed'];
}else{
	$getSupposedRepaymentBorrowedAmountMessage = "0.0000000001";
}





$CheckPhoneAddress = $bdd->prepare('SELECT phone_number, address, city, country FROM users WHERE id = ?');
$CheckPhoneAddress->execute(array($_SESSION['id']));


	$row = $CheckPhoneAddress->fetch(PDO::FETCH_ASSOC);
	$phone_number = $row['phone_number'];
	$address= $row['address'];
	$city= $row['city'];
	$country= $row['country'];