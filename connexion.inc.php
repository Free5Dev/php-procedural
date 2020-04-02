<?php 
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=catalogue', 'root', '');
    }catch(Exception $e){
        print('Erreur:'.$e->getMessage());
        die();
    }
?>