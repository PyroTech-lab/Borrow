<?php

require('actions/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfUser = $_GET['id'];


    $checkIfUserExists = $bdd->prepare('SELECT email, name, username, join_date FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){
        

        $usersInfos = $checkIfUserExists->fetch();

        $user_email = $usersInfos['email'];
        $user_fullname = $usersInfos['name'];
        $user_username = $usersInfos['username'];
		$user_join_date = $usersInfos['join_date'];


		$getHisQuestions = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_lender, username_lender, status, feedback_given FROM loan WHERE id_borrower = ? AND NOT status="request" ORDER BY id DESC LIMIT 0,20');
		$getHisQuestions->execute(array($idOfUser));

		if($getHisQuestions->rowCount() == 0){
			$errorMsg = "User Hasn't Borrowed Any Money yet";
		}



				$getAllunpaidLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="unpaid" OR status="unpaid_notseen" OR status="unpaid_banned" OR status="unpaid_banned_archived")');
				$getAllunpaidLoans->execute(array($idOfUser));

					$unpaidCountMessage = $getAllunpaidLoans->rowCount();

						if($unpaidCountMessage==1){
						$singular4 = "Loan";
						}else{
						$singular4 = "Loans";
						}


				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="paid_late" OR status="paid_late_notseen")');
				$getAllLoans->execute(array($idOfUser));

					$PaidLateCountMessage = $getAllLoans->rowCount();
					
						if($PaidLateCountMessage==1){
						$singular3 = "Loan";
						}else{
						$singular3 = "Loans";
						}


				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="paid_ontime" OR status="paid_ontime_notseen")');
				$getAllLoans->execute(array($idOfUser));

					$PaidOntimeCountMessage = $getAllLoans->rowCount();
					
						if($PaidOntimeCountMessage==1){
						$singular2 = "Loan";
						}else{
						$singular2 = "Loans";
						}



				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getAllLoans->execute(array($idOfUser));

					$AllCountMessage = $getAllLoans->rowCount();
					
						if($AllCountMessage==1){
						$singular1 = "Loan";
						}else{
						$singular1 = "Loans";
						}







				$checkIfUserAlreadyExists3 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$checkIfUserAlreadyExists3->execute(array($idOfUser));
						
				if($checkIfUserAlreadyExists3->rowCount() !== 0){	

				$getBorrowedAmount = $bdd->prepare('SELECT SUM(loan_amount) AS total_borrowed FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getBorrowedAmount->execute(array($idOfUser));

					$row = $getBorrowedAmount->fetch(PDO::FETCH_ASSOC);
					$getBorrowedAmountMessage = $row['total_borrowed'];
				}else{
					$getBorrowedAmountMessage = "0.0000000001";
				}		
					
					
					
					

					
				$getRepayedBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND (status="paid_ontime" OR status="paid_late" OR status="paid_ontime_notseen" OR status="paid_late_notseen")');
				$getRepayedBorrowedAmount->execute(array($idOfUser));

					$row = $getRepayedBorrowedAmount->fetch(PDO::FETCH_ASSOC);
					$getRepayedBorrowedAmountMessage = $row['total_repayment_borrowed'];

					



				$checkIfUserAlreadyExists4 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$checkIfUserAlreadyExists4->execute(array($idOfUser));
						
				if($checkIfUserAlreadyExists4->rowCount() !== 0){

				$getSupposedRepaymentBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getSupposedRepaymentBorrowedAmount->execute(array($idOfUser));

					$row = $getSupposedRepaymentBorrowedAmount->fetch(PDO::FETCH_ASSOC);
					$getSupposedRepaymentBorrowedAmountMessage = $row['total_repayment_borrowed'];
				}else{
					$getSupposedRepaymentBorrowedAmountMessage = "0.0000000001";
				}
				
				
				
				$getActive = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND status="active" OR status="active_notseen"');
				$getActive->execute(array($idOfUser));

				if($getActive->rowCount() > 0){
					$status_public = "<span style='color: #2b80ff;'>Active</span>";
				}


				$getPaidOntime = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND status="paid_ontime" OR status="paid_ontime_notseen"');
				$getPaidOntime->execute(array($idOfUser));

				if($getPaidOntime->rowCount() > 0){
					$status_public = "<span style='color: #1bbf02;'>Paid on Time</span>";
				}


				$getPaidLate = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND status="paid_late" OR status="paid_late_notseen"');
				$getPaidLate->execute(array($idOfUser));

				if($getPaidLate->rowCount() > 0){
					$status_public = "<span style='color: #f7b228;'>Paid Late</span>";
				}

				$getPaidLate = $bdd->prepare('SELECT id, loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, status FROM loan WHERE id_borrower = ? AND (status="unpaid" OR status="unpaid_notseen" OR status="unpaid_banned" OR status="unpaid_banned_archived")');
				$getPaidLate->execute(array($idOfUser));

				if($getPaidLate->rowCount() > 0){
					$status_public = "<span style='color: red;'>Unpaid</span>";
				}

				
				
				$GetBorrowersCountry = $bdd->prepare('SELECT country FROM users WHERE id = ?');
				$GetBorrowersCountry->execute(array($idOfUser));
				
				$getcountry = $GetBorrowersCountry->fetch(PDO::FETCH_ASSOC);
				
				if (empty($getcountry['country'])){
				$country = "unknown";
				}
				else{
				$country = $getcountry['country'];
				}
				
				
				
				$GetProfilePicture = $bdd->prepare('SELECT profile_picture FROM users WHERE id = ?');
				$GetProfilePicture->execute(array($idOfUser));
				
				$GetPicture = $GetProfilePicture->fetch(PDO::FETCH_ASSOC);
				
				if (empty($GetPicture['profile_picture'])){
				$profile_picture = "default.png";
				}
				else{
				$profile_picture = $GetPicture['profile_picture'];
				}
				

    }else{
		$usernotfound ="yes";
	}
}