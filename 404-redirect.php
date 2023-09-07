<?php
session_start();
if(isset($_SESSION['auth'])){
    header('Location: error-404.php');
}
?>

<?php
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: 404.php');
}
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex" />    
</head>
</html>
