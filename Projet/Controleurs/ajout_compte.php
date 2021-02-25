<?php

$login = $_POST['login'];
$mdp = $_POST['mdp'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$quartier = $_POST['quartier'];
$type = $_POST['compte'];

try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=bd_projet;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}


if ($type == 'tset'){
	
  $req = $bdd->exec("INSERT INTO `producteur`(`id_producteur`, `nom_producteur`, `prenom_producteur`, `adresse_producteur`, `quartier_producteur`, `login_producteur`, `mdp_producteur`) VALUES ('$nom','$prenom','$email','$adresse','$quartier','$login','$mdp')");
}
else
{
	
$req1 = $bdd->exec("INSERT INTO client (nom_client,prenom_client,mail_client,adresse_client,quartier_client,login_client,mdp_client) VALUES ('$nom','$prenom','$email','$adresse','$quartier','$login','$mdp')");
}

header('Location: ../Vues/connexion.php');
        

?>