<?php
session_start();
require('actions/database.php');

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload'){
	
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
        $message ='File is successfully uploaded.';
		
		$InsertFileNameIntoDatabase = $bdd->prepare('UPDATE users SET profile_picture = ? WHERE id = ?');
		$InsertFileNameIntoDatabase->execute(array($newFileName, $_SESSION['id']));
      }
   
    }else{
      $message = 'File type not Supported: PNG, JPG';
    }
  }

}

header("Location: profile.php");