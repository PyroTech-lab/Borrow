<?php
require('actions/database.php');

$checkUnpaidLoans = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status FROM loan WHERE id_borrower = ? AND (status="unpaid" OR status="unpaid_notseen")');
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
	$receivedLoanId = $ReceivedInfos['id'];
	
	$ReceiveLoanMsg = "$username_lender lent you $loan_amount$!";
}





if(isset($_POST['notification_receivedloan'])){
	
$MarkSeen = $bdd->prepare('UPDATE loan SET status="active" WHERE id_borrower = ? AND status="active_notseen"');
$MarkSeen->execute(array($_SESSION['id']));

header('Location: received-loan.php?id='.$receivedLoanId.'');
}




$checkLoansUnderVerification = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status FROM loan WHERE id_borrower = ? AND (repayment_received="no_notseen" OR repayment_received="no")');
$checkLoansUnderVerification->execute(array($_SESSION['id']));


if($checkLoansUnderVerification->rowCount() > 0){
	
	$VerifcationInfos = $checkLoansUnderVerification->fetch();
	 
	$username_lender = $VerifcationInfos['username_lender'];
	$LentVerifcationLoanId = $VerifcationInfos['id'];
	
	$LentVerifcationLoanMsg = "$username_lender Hasn't Received your Repayment. Click Here to Resolve.";
}






$GetInfoFromUnpaid = $bdd->prepare('SELECT * FROM loan WHERE status="unpaid_notseen" AND id_lender= ?');
$GetInfoFromUnpaid->execute(array($_SESSION['id']));
			
	if($GetInfoFromUnpaid->rowCount() !== 0){	
	
			$GetInfo_unpaid = $GetInfoFromUnpaid->fetch();
			$username_borrower_unpaid = $GetInfo_unpaid['username_borrower'];
			$id_loan_unpaid = $GetInfo_unpaid['id'];
			
			$UnpaidBorrowerLoanMsg = "$username_borrower_unpaid hasn't Repaid you yet. Click Here for more Information.";

	}
	
	
	


$GetInfoFromNotPaying = $bdd->prepare('SELECT * FROM loan WHERE (status="unpaid_banned") AND id_lender= ?');
$GetInfoFromNotPaying->execute(array($_SESSION['id']));
			
	if($GetInfoFromNotPaying->rowCount() !== 0){	
	
			$GetInfo = $GetInfoFromNotPaying->fetch();
			$username_borrower = $GetInfo['username_borrower'];
			$id_loan = $GetInfo['id'];
			
			$BannedBorrowerLoanMsg = "$username_borrower hasn't Repaid you. Click Here to Resolve the Issue.";

	}
	
	
	
	
	

$GetInfoProofSubmitted = $bdd->prepare('SELECT * FROM loan WHERE (repayment_received="no_correct_id") AND id_lender= ?');
$GetInfoProofSubmitted->execute(array($_SESSION['id']));
			
	if($GetInfoProofSubmitted->rowCount() !== 0){	
	
			$GetProofInfo = $GetInfoProofSubmitted->fetch();
			$username_borrower = $GetProofInfo['username_borrower'];
			$id_loanRepaidProofGiven  = $GetProofInfo['id'];
			
			$RepaymentProofGivenMsg = "$username_borrower Submited Proof of his Repayment. Click Here for More Information.";

	}



$GetInfoPaidAferBan = $bdd->prepare('SELECT * FROM loan WHERE status="paid_afterban_notseen" AND id_lender= ?');
$GetInfoPaidAferBan->execute(array($_SESSION['id']));
			
	if($GetInfoPaidAferBan->rowCount() !== 0){	
	
			$GetAfterBanInfo = $GetInfoPaidAferBan->fetch();
			$username_borrower = $GetAfterBanInfo['username_borrower'];
			$id_loanPaidAfterBan  = $GetAfterBanInfo['id'];
			$loan_amount_afterban = $GetAfterBanInfo['loan_amount'];
			
			$PaidAfterBanMsg = "$username_borrower Repaid you $loan_amount_afterban$ After being Banned.";

	}



if(isset($_POST['notification_receivedpaidafertban'])){
	
$MarkSeen = $bdd->prepare('UPDATE loan SET status="paid_afterban" WHERE id_lender = ? AND id= ?');
$MarkSeen->execute(array($_SESSION['id'], $id_loanPaidAfterBan));

header('Location: receiverepayment-afterban.php?id='.$id_loanPaidAfterBan.'');
}