<?php

require('actions/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){

 
    $idOfUser = $_GET['id'];


    $GetCountry = $bdd->prepare('SELECT country FROM users WHERE id = ?');
    $GetCountry->execute(array($idOfUser));
	
	$row = $GetCountry->fetch(PDO::FETCH_ASSOC);
	$BlankOrNot = $row['country'];
	
	
		if (strlen($BlankOrNot) == 0) {
		$country = "blank";
		}
		
		if($GetCountry = "Andorra"){
		$country = "ad";
		}
		
		if($GetCountry = "United Arab Emirates"){
		$country = "ae";
		}
	
	
}