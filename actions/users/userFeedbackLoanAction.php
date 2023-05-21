<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfLoan = $_GET['id'];
	
	$CheckFeedback = $bdd->prepare('SELECT id_borrower FROM loan WHERE id = ?');
	$CheckFeedback->execute(array($idOfLoan));
	
	
	$row = $CheckFeedback->fetch(PDO::FETCH_ASSOC);
	$getIDfromBorrower = $row['id_borrower'];
	

	$CheckFeedback = $bdd->prepare('SELECT positive_feedback, negative_feedback FROM feedback WHERE id_user = ?');
	$CheckFeedback->execute(array($getIDfromBorrower));


	$FeedbackVerifications = $CheckFeedback->fetch(PDO::FETCH_ASSOC);
	$positive_feedback = $FeedbackVerifications['positive_feedback'];
	$negative_feedback = $FeedbackVerifications['negative_feedback'];
	
}