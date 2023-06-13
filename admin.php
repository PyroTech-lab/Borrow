<?php
require('actions/users/securityAction.php');
require('actions/questions/updateDatabases.php');
require('actions/users/adminAction.php');
?>


<!DOCTYPE html>

<html>

<body>

<h1>Loans Under Verification</h1>
<?php 
            while($question = $GetLoansUnderverification->fetch()){
                ?>
			<div>
				<div>Loan ID: <?= $idOfLoan; ?></div>
				<div>Loan Amount: <?= $question['loan_amount']; ?>$</div>
				<div>Repayment Amount: <?= $question['repayment_amount']; ?>$</div>
				<div>Granting Date: <?= date('M jS, Y', strtotime($question['granting_date'])); ?></div>
				<div>Repayment Date: <?= date('M jS, Y', strtotime($question['repayment_date'])); ?></div>
				<div>Repaid Date: <?= date('M jS, Y', strtotime($question['repaid_date'])); ?></div>
				<div>Lender: <?= $question['username_lender']; ?></div>
				<div>Borrower: <?= $question['username_borrower']; ?></div>
				<div>Trustscore: <?= $question['borrower_trustscore']; ?>/100</div>
				<div style="color: green;">Positive Feedback: <?= $question['borrower_positive_feedback']; ?></div>
				<div style="color: red;">Negative Feedback: <?= $question['borrower_negative_feedback']; ?></div>
				<div>Status: <?= $question['status']; ?></div>
				<div>Failed Tries To get ID: <?= $question['repayment_id_confirmation_tries']; ?></div>
				<div>Repayment Proof: <img style="height: 20px; width: auto;" src="assets/images/repayment-proof/<?= $question['repayment_proof']; ?>"></div>
				
				<form method="post">
				<input type="submit" value="Loan Repaid" name="repaid">
				<input type="submit" value="Loan Not Repaid" name="not_repaid">
				</form>
				
				<?php 
				if(isset($result)){ 
						echo ''.$result.''; 
				}
				?>		
			</div>
			
			<?php
				}
			?>


</body>

</html>