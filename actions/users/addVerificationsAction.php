<?php

require('actions/database.php');


if(isset($_POST['phone_submit'])){
	
		$id_user = $_SESSION['id'];
	
			$phone_set = htmlspecialchars($_POST['phone_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE users SET phone_number = ? WHERE id= ?');
			$insertQuestionOnWebsite->execute(array($phone_set, $id_user));
			
			header("Refresh:0");
				}


if(isset($_POST['address_submit'])){
	
		$id_user = $_SESSION['id'];
	
			$address_set = htmlspecialchars($_POST['address_set']);
			$city_set = htmlspecialchars($_POST['city_set']);
			$country_set = htmlspecialchars($_POST['country_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE users  SET address=?, city=?, country=? WHERE id=?');
			$insertQuestionOnWebsite->execute(array($address_set, $city_set, $country_set, $id_user));
			
			header("Refresh:0");
				}
				
				

if(isset($_POST['idcard_submit'])){
	
		$id_user = $_SESSION['id'];
	
			$idcard_set = htmlspecialchars($_POST['idcard_set']);

			$insertQuestionOnWebsite = $bdd->prepare('UPDATE users SET identity_card = ? WHERE id= ?');
			$insertQuestionOnWebsite->execute(array($idcard_set, $id_user));
			
			header("Refresh:0");
				}
				
				