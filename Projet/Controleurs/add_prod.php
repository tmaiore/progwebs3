<?php
session_start();
$login = $_SESSION['login'];
$prod = $_POST['nom'];
$stock = $_POST['stock'];
$prix = $_POST['prix'];
$type = $_POST['type'];
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
$restt = $bdd->query("SELECT id_producteur FROM producteur WHERE login_producteur = '$login'");
if ($restt)
  { 
  while ($data = $restt->fetch())
    {
    $idproducteur= $data['id_producteur'];
    } 
  }
$rest = $bdd->query("SELECT id_categorie FROM categorie WHERE nom_categorie = '$type'");
if ($rest)
  { 
  while ($data = $rest->fetch())
    {
    $idcat = $data['id_categorie'];
    } 
  }



$req = $bdd->exec("INSERT INTO produit (id_categorie,id_producteur,nom_produit, prix_unité, stock_dispo) VALUES ('$idcat', '$idproducteur', '$prod', '$prix', '$stock')");

header('Location: ../Vues/index_producteur.php');

?>