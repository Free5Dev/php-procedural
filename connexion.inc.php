<?php 
// try catch 
try{
    // connexion in bdd
    $bdd = new PDO('mysql:host=localhost;dbname=catalogue;charset=utf8', 'root', '');
}catch(Exception $e){
    print('Erreur:'.$e->getMessage());
    die();
}