<?php

require('actions/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];


    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM loan WHERE id = ? AND status = "request"');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        
        $questionsInfos = $checkIfQuestionExists->fetch();

		$idOfTheQuestion = $questionsInfos['id'];
        $loan_amount = $questionsInfos['loan_amount'];
        $repayment_amount = $questionsInfos['repayment_amount'];
        $repayment_date = $questionsInfos['repayment_date'];
        $id_borrower = $questionsInfos['id_borrower'];
        $username_borrower = $questionsInfos['username_borrower'];
		$notes = $questionsInfos['notes'];
		
		if (strlen($notes) !==0){
						$notes_display = $notes;
						}else{
						$notes_display = "No Notes from Borrower";
						}
        


				$getAllunpaidLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="unpaid" OR status="unpaid_notseen" OR status="unpaid_banned" OR status="unpaid_banned_archived")');
				$getAllunpaidLoans->execute(array($id_borrower));

					$unpaidCountMessage = $getAllunpaidLoans->rowCount();
					
						if($unpaidCountMessage==1){
						$singular4 = "Loan";
						}else{
						$singular4 = "Loans";
						}




				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="paid_late" OR status="paid_late_notseen")');
				$getAllLoans->execute(array($id_borrower));

					$PaidLateCountMessage = $getAllLoans->rowCount();
					
						if($PaidLateCountMessage==1){
						$singular3 = "Loan";
						}else{
						$singular3 = "Loans";
						}


				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND (status="paid_ontime" OR status="paid_ontime_notseen")');
				$getAllLoans->execute(array($id_borrower));

					$PaidOntimeCountMessage = $getAllLoans->rowCount();
					
						if($PaidOntimeCountMessage==1){
						$singular2 = "Loan";
						}else{
						$singular2 = "Loans";
						}



				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getAllLoans->execute(array($id_borrower));

					$AllCountMessage = $getAllLoans->rowCount();

						if($AllCountMessage==1){
						$singular1 = "Loan";
						}else{
						$singular1 = "Loans";
						}





				$checkIfUserAlreadyExists3 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$checkIfUserAlreadyExists3->execute(array($id_borrower));
						
				if($checkIfUserAlreadyExists3->rowCount() !== 0){	

				$getBorrowedAmount = $bdd->prepare('SELECT SUM(loan_amount) AS total_borrowed FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getBorrowedAmount->execute(array($id_borrower));

					$row = $getBorrowedAmount->fetch(PDO::FETCH_ASSOC);
					$getBorrowedAmountMessage = $row['total_borrowed'];
				}else{
					$getBorrowedAmountMessage = "0.0000000001";
				}		
					
					
					
					

					
				$getRepayedBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND (status="paid_ontime" OR status="paid_late" OR status="paid_ontime_notseen" OR status="paid_late_notseen")');
				$getRepayedBorrowedAmount->execute(array($id_borrower));

					$row = $getRepayedBorrowedAmount->fetch(PDO::FETCH_ASSOC);
					$getRepayedBorrowedAmountMessage = $row['total_repayment_borrowed'];

					



				$checkIfUserAlreadyExists4 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$checkIfUserAlreadyExists4->execute(array($id_borrower));
						
				if($checkIfUserAlreadyExists4->rowCount() !== 0){

				$getSupposedRepaymentBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getSupposedRepaymentBorrowedAmount->execute(array($id_borrower));

					$row = $getSupposedRepaymentBorrowedAmount->fetch(PDO::FETCH_ASSOC);
					$getSupposedRepaymentBorrowedAmountMessage = $row['total_repayment_borrowed'];
				}else{
					$getSupposedRepaymentBorrowedAmountMessage = "0.0000000001";
				}
				
				



				$GetBorrowersCountry = $bdd->prepare('SELECT country FROM users WHERE id = ?');
				$GetBorrowersCountry->execute(array($id_borrower));
				
				$getcountry = $GetBorrowersCountry->fetch(PDO::FETCH_ASSOC);
				
				if (empty($getcountry['country'])){
				$country = "unknown";
				}
				else{
				$country = $getcountry['country'];
				}
				
				
				$GetProfilePicture = $bdd->prepare('SELECT profile_picture FROM users WHERE id = ?');
				$GetProfilePicture->execute(array($id_borrower));
				
				$GetPicture = $GetProfilePicture->fetch(PDO::FETCH_ASSOC);
				
				if (empty($GetPicture['profile_picture'])){
				$profile_picture = "default.png";
				}
				else{
				$profile_picture = $GetPicture['profile_picture'];
				}
				
	    }else{$Loannotfound ="yes";}
		
}else{$Loannotfound ="yes";}


