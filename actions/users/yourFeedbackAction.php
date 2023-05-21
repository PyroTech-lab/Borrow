<?php

require('actions/database.php');
	

$CheckFeedback = $bdd->prepare('SELECT positive_feedback, negative_feedback FROM feedback WHERE id_user = ?');
$CheckFeedback->execute(array($_SESSION['id']));


	$userFeedback = $CheckFeedback->fetch(PDO::FETCH_ASSOC);
	
	$positive_feedback = $userFeedback['positive_feedback'];
	$negative_feedback = $userFeedback['negative_feedback'];
