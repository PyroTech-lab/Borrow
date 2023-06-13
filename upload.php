<?php
session_start();
require('actions/database.php');

if (isset($_POST['AddimageButton']) && $_POST['AddimageButton'] == 'Upload Image'){
	
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){

    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    $allowedfileExtensions = array('jpg','png');
    if (in_array($fileExtension, $allowedfileExtensions)){

      $uploadFileDir = 'assets/images/profile-images/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) {
        $success_message ='Profile Image was successfully Updated!';
		
		$InsertFileNameIntoDatabase = $bdd->prepare('UPDATE users SET profile_picture = ? WHERE id = ?');
		$InsertFileNameIntoDatabase->execute(array($newFileName, $_SESSION['id']));
      }
   
    }else{
      $error_message = 'You can only upload PNG and JPG files.';
    }
  }


}





elseif(isset($_POST['EditimageButton']) && $_POST['EditimageButton'] == 'Upload Image'){
	
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){

    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    $allowedfileExtensions = array('jpg','png');
    if (in_array($fileExtension, $allowedfileExtensions)){

      $uploadFileDir = 'assets/images/profile-images/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) {
        $success_message ='Profile Image was successfully Updated!';
		
		
		$GetProfilePicture = $bdd->prepare('SELECT profile_picture FROM users WHERE id = ?');
		$GetProfilePicture->execute(array($_SESSION['id']));
				
		$GetPicture = $GetProfilePicture->fetch(PDO::FETCH_ASSOC);
		
		$profile_picture = $GetPicture['profile_picture'];

		unlink('assets/images/profile-images/'.$profile_picture.'');
		
		$InsertFileNameIntoDatabase = $bdd->prepare('UPDATE users SET profile_picture = ? WHERE id = ?');
		$InsertFileNameIntoDatabase->execute(array($newFileName, $_SESSION['id']));
		
      }
   
    }else{
      $error_message = 'You can only upload PNG and JPG files.';
    }
  }
 

}

header("Location: profile.php");