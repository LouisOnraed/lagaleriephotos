<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=images;charset=utf8', 'root', 'root');
}
catch(Exception $e){
    die('Erreur SQL : '.$e->getMessage());
}
?>