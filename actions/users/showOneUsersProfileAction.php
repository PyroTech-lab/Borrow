<?php

require('actions/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfUser = $_GET['id'];


    $checkIfUserExists = $bdd->prepare('SELECT email, name, username FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){
        

        $usersInfos = $checkIfUserExists->fetch();

        $user_email = $usersInfos['email'];
        $user_fullname = $usersInfos['name'];
        $user_username = $usersInfos['username'];


        $getHisQuestions = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="active" OR status="paid_ontime" OR status="paid_late" OR status="unpaid" ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));
		
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
				$getAllunpaidLoans->execute(array($idOfUser));

					$unpaidCountMessage = $getAllunpaidLoans->rowCount();




				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="paid_late"');
				$getAllLoans->execute(array($idOfUser));

					$PaidLateCountMessage = $getAllLoans->rowCount();


				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="paid_ontime"');
				$getAllLoans->execute(array($idOfUser));

					$PaidOntimeCountMessage = $getAllLoans->rowCount();



				$getAllLoans = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND NOT status="request"');
				$getAllLoans->execute(array($idOfUser));

					$AllCountMessage = $getAllLoans->rowCount();







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
					
					
					
					

					
				$getRepayedBorrowedAmount = $bdd->prepare('SELECT SUM(repayment_amount) AS total_repayment_borrowed FROM loan WHERE id_borrower = ? AND status="paid_ontime" OR status="paid_late"');
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
				
				
				$checkIfLoanIsUnpaid = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status="active" AND repayment_date < NOW()');
				$checkIfLoanIsUnpaid->execute(array($idOfUser));
						
				if($checkIfLoanIsUnpaid->rowCount() !== 0){	

				$SetLoanUnpaid = $bdd->prepare('UPDATE loan SET status="unpaid" WHERE id_borrower = ? AND status="active" AND repayment_date < NOW()');
				$SetLoanUnpaid->execute(array($idOfUser));
}




    }
}