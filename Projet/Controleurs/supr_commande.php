<?php
session_start();
$login = $_SESSION['login'];
$idc = $_POST['idc'];
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bd_projet;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->exec("DELETE FROM commande WHERE id_commande = '$idc'");
$req = $bdd->exec("DELETE FROM livraison WHERE id_commande = '$idc'");


header('Location: ../Vues/index_client.php');
?>