<?php

require('actions/database.php');


if(isset($_POST['submit'])){
	
		$request_id_borrower = $_SESSION['id'];
	
		$checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status = "request"');
        $checkIfUserAlreadyExists->execute(array($request_id_borrower));

        if($checkIfUserAlreadyExists->rowCount() == 0){
			
			$checkIfUserAlreadyExists1 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status = "active"');
			$checkIfUserAlreadyExists1->execute(array($request_id_borrower));

			if($checkIfUserAlreadyExists1->rowCount() == 0){
				
				$checkIfUserAlreadyExists2 = $bdd->prepare('SELECT * FROM loan WHERE id_borrower = ? AND status = "unpaid"');
				$checkIfUserAlreadyExists2->execute(array($request_id_borrower));
				
				if($checkIfUserAlreadyExists2->rowCount() == 0){
			
					$checkIfUserAlreadyExists3 = $bdd->prepare('SELECT * FROM payment_method WHERE id_user = ? AND paypal ="" AND cashapp ="" AND venmo ="" AND zelle =""AND chime ="" AND wise =""');
					$checkIfUserAlreadyExists3->execute(array($request_id_borrower));
					
					if($checkIfUserAlreadyExists3->rowCount() == 0){

					$loan_amount = htmlspecialchars($_POST['loan_amount']);
					$repayment_amount = htmlspecialchars($_POST['repayment_amount']);
					$repayment_date = htmlspecialchars($_POST['repayment_date']);
					$request_date = date('Y-m-d H:i:s');
					$request_id_borrower = $_SESSION['id'];
					$request_username_borrower = $_SESSION['username'];
					$notes = nl2br(htmlspecialchars($_POST['notes']));
					$status = 'request';


					$insertQuestionOnWebsite = $bdd->prepare('INSERT INTO loan (loan_amount, repayment_amount, repayment_date, request_date, id_borrower, username_borrower, notes, status)VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
					$insertQuestionOnWebsite->execute(
						array(
							$loan_amount, 
							$repayment_amount, 
							$repayment_date,
							$request_date,
							$request_id_borrower,
							$request_username_borrower,
							$notes,
							$status
						)
					);
					
					$successMsg = "Your Request has been Published!";
					
						}else{
							$errorMsg = "You must connect a Payment Method Before Taking out a Loan.";
						}
					
						}else{
							$errorMsg = "You have an Unpaid Loan. Pay it before Borrowing again.";
						}
			  
					}else{
						$errorMsg = "You have already have an Active Loan.";
					}
	  
	}else{
		$errorMsg = "You have already Published a Loan Request. Click here to Delete it.";
	}
}