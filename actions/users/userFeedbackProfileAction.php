<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfUser = $_GET['id'];
	
	$CheckFeedback = $bdd->prepare('SELECT positive_feedback, negative_feedback FROM feedback WHERE id_user = ?');
	$CheckFeedback->execute(array($idOfUser));


	$FeedbackVerifications = $CheckFeedback->fetch(PDO::FETCH_ASSOC);
	$positive_feedback = $FeedbackVerifications['positive_feedback'];
	$negative_feedback = $FeedbackVerifications['negative_feedback'];
	
}