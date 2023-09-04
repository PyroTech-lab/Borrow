<?php
session_start();
if(isset($_SESSION['auth'])){
    header('Location: 404loggedin.php');
}
?>

<?php
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: 404notloggedin.php');
}
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex" />    
</head>
</html>
