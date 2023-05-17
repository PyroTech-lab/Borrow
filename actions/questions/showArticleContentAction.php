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
        
    }else{
        $errorMsg = "No Requests Found";
    }
	
		
				$checkIfUserExists = $bdd->prepare('SELECT email, name, username FROM users WHERE id = ?');
				$checkIfUserExists->execute(array($id_borrower));

				if($checkIfUserExists->rowCount() > 0){
				

				$usersInfos = $checkIfUserExists->fetch();

				$user_email = $usersInfos['email'];
				$user_fullname = $usersInfos['name'];
				$user_username = $usersInfos['username'];


				$getHisQuestions = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="active" OR status="paid_ontime" OR status="paid_late" OR status="unpaid" ORDER BY id DESC');
				$getHisQuestions->execute(array($id_borrower));
				
				if($getHisQuestions->rowCount() > 0){
				
				 $question = $getHisQuestions->fetch();
				 
				$loan_amount = $question['loan_amount'];
				$repayment_amount = $question['repayment_amount'];
				$repayment_date = $question['repayment_date'];
				$status = $question['status'];
				
				}else{
					$errorMsg = "User has not Borrowed Money yet";
				}




				$getAllunpaidLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="unpaid"');
				$getAllunpaidLoans->execute(array($id_borrower));

					$unpaidCountMessage = $getAllunpaidLoans->rowCount();




				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="paid_late"');
				$getAllLoans->execute(array($id_borrower));

					$PaidLateCountMessage = $getAllLoans->rowCount();


				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="paid_ontime"');
				$getAllLoans->execute(array($id_borrower));

					$PaidOntimeCountMessage = $getAllLoans->rowCount();



				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getAllLoans->execute(array($id_borrower));

					$AllCountMessage = $getAllLoans->rowCount();







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
					
					
					
					

					
				$getRepayedBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND status="paid_ontime" OR status="paid_late"');
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
				
				
				$checkIfLoanIsUnpaid = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="active" AND repayment_date < NOW()');
				$checkIfLoanIsUnpaid->execute(array($id_borrower));
						
				if($checkIfLoanIsUnpaid->rowCount() !== 0){	

				$SetLoanUnpaid = $bdd->prepare('UPDATE loan SET status="unpaid" WHERE id_borrower = ? AND status="active" AND repayment_date < NOW()');
				$SetLoanUnpaid->execute(array($id_borrower));
}
}
}	
