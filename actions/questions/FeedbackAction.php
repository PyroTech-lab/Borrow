<?php

require('actions/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfLoan = $_GET['id'];

		
	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ?');
    $checkIfLoanExists->execute(array($idOfLoan));

		if($checkIfLoanExists->rowCount() > 0){
		
        $LoanInfos = $checkIfLoanExists->fetch();

        $loan_amount = $LoanInfos['loan_amount'];
        $repayment_amount = $LoanInfos['repayment_amount'];
        $repayment_date = $LoanInfos['repayment_date'];
		$id_lender = $LoanInfos['id_lender'];
		$username_lender = $LoanInfos['username_lender'];
		$id_borrower = $LoanInfos['id_borrower'];
		$username_borrower = $LoanInfos['username_borrower'];
		$status = $LoanInfos['status'];
		
		}else {$Loannotfound ="yes";}


}else{ $Loannotfound ="yes";}


$getPaidOntime = $bdd->prepare('SELECT status FROM loan WHERE id = ? AND (status="paid_ontime_notseen" OR status="paid_ontime")');
$getPaidOntime->execute(array($idOfLoan));

if($getPaidOntime->rowCount() > 0){
	$status_public = "<span style='color: #1bbf02;'>Paid on Time</span>";
	
}


$getPaidLate = $bdd->prepare('SELECT status FROM loan WHERE id = ? AND (status="paid_late_notseen" OR status="paid_late")');
$getPaidLate->execute(array($idOfLoan));

if($getPaidLate->rowCount() > 0){
	$status_public = "<span style='color: #f7b228;'>Paid Late</span>";
}






if(isset($_POST['notification_repaid'])){
	
$MarkSeenOntime= $bdd->prepare('UPDATE loan SET status="paid_ontime" WHERE id = ? AND status="paid_ontime_notseen"');
$MarkSeenOntime->execute(array($idOfLoan));




$MarkSeenLate = $bdd->prepare('UPDATE loan SET status="paid_late" WHERE id = ? AND status="paid_late_notseen"');
$MarkSeenLate->execute(array($idOfLoan));

}


if(isset($_POST['notification_repaid'])){
	
	$feedback = $_POST['feedback'];
	
	
	$CheckIfFeddbackAlreadyGiven = $bdd->prepare('SELECT feedback_given FROM loan WHERE id = ?');
	$CheckIfFeddbackAlreadyGiven->execute(array($idOfLoan));
	
	$FeedbackCheck = $CheckIfFeddbackAlreadyGiven->fetch();

    $FeedbackGivenOrNot = $FeedbackCheck['feedback_given'];
	
	if(empty($FeedbackGivenOrNot)){
	
	
			if($feedback == 'positive'){
			
				$SetPositiveFeedback= $bdd->prepare('UPDATE feedback SET positive_feedback=positive_feedback+1 WHERE id_user = ?');
				$SetPositiveFeedback->execute(array($id_borrower));
				
				$addFeedbacktoLoanTable = $bdd->prepare('UPDATE loan SET feedback_given="Positive" WHERE id = ?');
				$addFeedbacktoLoanTable->execute(array($idOfLoan));
				
				$successmessage = "<div class='success-message-feedback'>Feedback submitted succesfully!</div>";
				}
			
			if($feedback == 'negative'){
			
				$SetNegativeFeedback= $bdd->prepare('UPDATE feedback SET negative_feedback=negative_feedback+1 WHERE id_user = ?');
				$SetNegativeFeedback->execute(array($id_borrower));
				
				$addFeedbacktoLoanTable = $bdd->prepare('UPDATE loan SET feedback_given="Negative" WHERE id = ?');
				$addFeedbacktoLoanTable->execute(array($idOfLoan));
				
				$successmessage = "<div class='success-message-feedback'>Feedback submitted succesfully!</div>";
				}

	}else{
		$errormessage = "<div class='error-message-feedback'>You have already given your feedback on this loan.</div>";
	}

}