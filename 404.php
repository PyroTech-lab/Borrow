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
