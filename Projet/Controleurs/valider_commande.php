<?php
$livraison = $_POST['livraison'];
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
$reponse = $bdd->exec("UPDATE livraison SET validée = '1' WHERE id_livraison = '$livraison'");

header('Location: ../Vues/index_producteur.php');


?>