<?php
try{
    $bdd = new PDO('mysql: host=localhost; dbname=Borrow; charset=utf8;', 'root', '');
}catch(Exception $e){
    die('There was an error : ' . $e->getMessage());
}
