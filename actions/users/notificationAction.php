<?php
require('actions/database.php');

$checkUnpaidLoans = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status FROM loan WHERE id_borrower = ? AND status="unpaid"');
$checkUnpaidLoans->execute(array($_SESSION['id']));


if($checkUnpaidLoans->rowCount() > 0){
	$UnpaidMsg = "You have an Unpaid Loan. Click here to repay it.";

}






$checkDueSoonLoans = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status FROM loan WHERE id_borrower = ? AND (status="active" OR status="active_notseen") AND repayment_date < NOW() + INTERVAL 1 DAY');
$checkDueSoonLoans->execute(array($_SESSION['id']));


if($checkDueSoonLoans->rowCount() > 0){
	
	$LoanInfos = $checkDueSoonLoans->fetch();
	 
	$repayment_date = $LoanInfos['repayment_date'];
	$date = strtotime($repayment_date);
	$remaining =$date - time();
	$hours_remaining = floor(((($remaining) % 86400) / 3600) +24);

	$RepaymentDateSoonMsg = "Your Loan is Due in $hours_remaining Hours. Click here to repay it.";

}



$checkReceivedRepayments = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, id_borrower, username_borrower, status FROM loan WHERE id_lender = ? AND (status="paid_ontime_notseen" OR status="paid_late_notseen")');
$checkReceivedRepayments->execute(array($_SESSION['id']));


if($checkReceivedRepayments->rowCount() > 0){
	
	$RepaymentInfos = $checkReceivedRepayments->fetch();
	 
	$repayment_amount = $RepaymentInfos['repayment_amount'];
	$username_borrower = $RepaymentInfos['username_borrower'];
	$IdforFeedback = $RepaymentInfos['id'];
	
	$ReceiveRepaymentMsg = "$username_borrower repaid you $repayment_amount$!";
}




$checkReceivedLoans = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status FROM loan WHERE id_borrower = ? AND status="active_notseen"');
$checkReceivedLoans->execute(array($_SESSION['id']));


if($checkReceivedLoans->rowCount() > 0){
	
	$ReceivedInfos = $checkReceivedLoans->fetch();
	 
	$loan_amount = $ReceivedInfos['loan_amount'];
	$username_lender = $ReceivedInfos['username_lender'];
	
	$ReceiveLoanMsg = "$username_lender lent you $loan_amount$!";
}




if(isset($_POST['notification_receivedloan'])){
	
$MarkSeen = $bdd->prepare('UPDATE loan SET status="active" WHERE id_borrower = ? AND status="active_notseen"');
$MarkSeen->execute(array($_SESSION['id']));

header("Refresh:0");
}

