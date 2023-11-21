<?php

function getAllCategories(){
    //Connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT * FROM categorie ";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $categorie= $res->fetchAll();
    return $categorie;
}
function getCategorieBy($id){
    //connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT * FROM categorie Where ID = $id";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $categorie= $res->fetch();
    return $categorie;
}
function getAllProducts(){
    //connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT * FROM produit ";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $produit= $res->fetchAll();
    return $produit;
}
function getAllCmd(){
    //connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT visiteur.Nom,visiteur.Prénom,visiteur.NumTel,panier.Total,panier.Date_création,panier.Etat,panier.ID FROM visiteur, panier WHERE visiteur.ID = panier.Visiteur";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $cmd= $res->fetchAll();
    return $cmd;
}
function getAllPanier(){
    //connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT p.Nom, p.Image,c.Quantité,c.Panier FROM commande c, produit p  WHERE c.Produit = p.ID";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $panier= $res->fetchAll();
    return $panier;
}
function getProductBy($id){
    //connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT * FROM produit Where ID = $id";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $produit= $res->fetch();
    return $produit;
}
function addVisiteur($data){
    //connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "INSERT INTO visiteur(Nom,Prénom,NumTel,Email,Password) VALUES('".$data['Nom']."','".$data['Prénom']."','".$data['NumTel']."','".$data['Email']."','".$data['Password']."') ";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    if($res){
        return true;
    }
    else{
        return false;
    }
}
function connectVisiteur($data){
    //connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT * FROM visiteur WHERE Email='".$data['Email']."' AND Password='".$data['Password']."' ";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $user = $res->fetch();
    return $user;
}
function getAllVisiteur(){
    //Connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT * FROM visiteur ";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $visiteur= $res->fetchAll();
    return $visiteur;
}
function getStock(){
    //Connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "SELECT produit.Nom, stock.Quantité FROM produit, visiteur, stock WHERE produit.ID = stock.Produit";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    $stock= $res->fetchAll();
    return $stock;
}
function changerEtat($data){
    //Connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    $req = "UPDATE panier SET Etat='".$data['etat']."' WHERE ID='".$data['panier_id']."'";
    //exec req
    $res = $cnx->query($req);
}
function getPanierByEtat($panier,$etat){
    $panier_etat = array();
    foreach($panier as $p){
        if($p['Etat']==$etat){
            array_push($panier_etat,$p);
        }
    }
    return $panier_etat;
}
function modifierAdmin($data){
    //Connexion BD
    include 'C:\xampp\htdocs\hiya_ecommerce\config.php';
    //Création req
    if($data['mp'] != ""){
        $req="UPDATE visiteur SET Nom='".$data['nom']."', Prénom='".$data['prenom']."', Email='".$data['email']."', Password='".$data['mp']."', NumTel='".$data['numtel']."' WHERE ID='".$data['id_admin']."'";
    }
    else{
        $req="UPDATE visiteur SET Nom='".$data['nom']."', Prénom='".$data['prenom']."', Email='".$data['email']."', NumTel='".$data['numtel']."' WHERE ID='".$data['id_admin']."'";
    }
    //exec req
    $res = $cnx->query($req);
    return true;
}
?>