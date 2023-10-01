<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

	$chat_margin_top = "-432px";
	$chat_width = "calc(49% - 40px)";
	$chat_margin_left = "51%";
	$chat_height = "200px";
	$chat_margin_bottom = "322px";
	$bottom_display = "none";

 
    $idOfLoan = $_GET['id'];

		
	$checkIfLoanExists = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND id_lender = ?');
    $checkIfLoanExists->execute(array($idOfLoan, $_SESSION['id']));

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
		$FeedbackGivenOrNot = $LoanInfos['feedback_given'];
		$repaymentReceived = $LoanInfos['repayment_received'];
		
			if(($status!=="paid_ontime_notseen")AND($status!=="paid_late_notseen")) {
			
			$bottom_display = "block";	
			}


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



			if(empty($FeedbackGivenOrNot)){

			if(isset($_POST['notification_repaid'])){
				
				
					if(!empty($repaymentReceived)){
				
					$MarkSeenOntime= $bdd->prepare('UPDATE loan SET status="paid_ontime" WHERE id = ? AND status="paid_ontime_notseen"');
					$MarkSeenOntime->execute(array($idOfLoan));

					$MarkSeenLate = $bdd->prepare('UPDATE loan SET status="paid_late" WHERE id = ? AND status="paid_late_notseen"');
					$MarkSeenLate->execute(array($idOfLoan));
					
					}
				
					$feedback = $_POST['feedback'];
						if($feedback == 'positive'){
					
						$SetPositiveFeedback= $bdd->prepare('UPDATE feedback SET positive_feedback=positive_feedback+1 WHERE id_user = ?');
						$SetPositiveFeedback->execute(array($id_borrower));
						
						$addFeedbacktoLoanTable = $bdd->prepare('UPDATE loan SET feedback_given="Positive" WHERE id = ?');
						$addFeedbacktoLoanTable->execute(array($idOfLoan));
						
						$positive_feedback = "<div class='popup-positive'><div class='positive-div'><div class='subtitle-positive'><span>Feedback Submitted</span></div><img class='positive-image' src='assets/images/positive.png'><a href=''><button class='positive-button'>Close</button></a></div></div>";
					
						}
					
					if($feedback == 'negative'){
					
						$SetNegativeFeedback= $bdd->prepare('UPDATE feedback SET negative_feedback=negative_feedback+1 WHERE id_user = ?');
						$SetNegativeFeedback->execute(array($id_borrower));
						
						$addFeedbacktoLoanTable = $bdd->prepare('UPDATE loan SET feedback_given="Negative" WHERE id = ?');
						$addFeedbacktoLoanTable->execute(array($idOfLoan));
					
						$negative_feedback = "<div class='popup-negative'><div class='negative-div'><div class='subtitle-negative'><span>Feedback Submitted</span></div><img class='negative-image' src='assets/images/negative.png'><a href=''><button class='negative-button'>Close</button></a></div></div>";
					
						}

				}

			}else{
				$feedback_display ="none";
				$chat_margin_top = "30px";
				$chat_width = "calc(100% - 40px)";
				$chat_margin_left = "0px";
				$chat_height = "160px";
				$chat_margin_bottom = "30px";
			}


		}else {$Loannotfound ="yes";}


}else{ $Loannotfound ="yes";}