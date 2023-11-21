<?php
    try{
        $cnx =new PDO('mysql:host=localhost;dbname=hiya_ecommerce','root','');
    }
    catch(PDOException $e){
        print "Erreur !:".$e->getMessage();
    }
?>