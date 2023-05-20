<?php

require('actions/database.php');


$checkIfLoanIsUnpaid = $bdd->prepare('SELECT * FROM loan WHERE (status="active" OR status="active_notseen") AND repayment_date < NOW() - INTERVAL 1 DAY');
	$checkIfLoanIsUnpaid->execute(array());
			
	if($checkIfLoanIsUnpaid->rowCount() !== 0){	

	$SetLoanUnpaid = $bdd->prepare('UPDATE loan SET status="unpaid" WHERE (status="active" OR status="active_notseen") AND repayment_date < NOW() - INTERVAL 1 DAY');
	$SetLoanUnpaid->execute(array());
	}
	
$deleteOldRequest = $bdd->query('DELETE FROM loan WHERE request_date < NOW() - INTERVAL 2 DAY  AND status="request"');