<?php

require('actions/database.php');
	

$CheckFeedback = $bdd->prepare('SELECT positive_feedback, negative_feedback FROM feedback WHERE id_user = ?');
$CheckFeedback->execute(array($_SESSION['id']));


	$userFeedback = $CheckFeedback->fetch(PDO::FETCH_ASSOC);
	
	$positive_feedback = $userFeedback['positive_feedback'];
	$negative_feedback = $userFeedback['negative_feedback'];
	
	

	$UpdateFeedback = $bdd->prepare('UPDATE loan SET borrower_positive_feedback=?, borrower_negative_feedback=? WHERE id_borrower = ?');
	$UpdateFeedback->execute(array($positive_feedback,$negative_feedback,$_SESSION['id']));
	
