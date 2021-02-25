<?php
$livraison = $_POST['livraison'];
$produit = $_POST['prod'];
$idcommande = $_POST['commande'];

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bd_projet;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query("SELECT id_producteur FROM produit WHERE nom_produit ='$produit'");

  while ($donnees = $reponse->fetch())
    {
    $idprod = $donnees['id_producteur'];
    } 
$reponse->closeCursor(); 
echo (" producteur ").$idprod;
$reponse2 = $bdd->query("SELECT id_type FROM typelivraison WHERE nom_type ='$livraison'");
while ($donnees = $reponse2->fetch())
    {
    $livraison = $donnees['id_type'];
    } 
$reponse2->closeCursor(); 
echo (" livraison ").$livraison;
$reponse3 = $bdd->query("SELECT id_client FROM commande WHERE id_commande ='$idcommande'");
while ($donnees = $reponse3->fetch())
    {
    $idclient = $donnees['id_client'];
    } 
$reponse3 ->closeCursor(); 
echo (" client ").$idclient;
echo (" commande ").$idcommande;

$req = $bdd->exec("INSERT INTO livraison (id_client,id_producteur,id_type,id_commande,validée) VALUES ('$idclient','$idprod','$livraison','$idcommande','0')");
if ($req) echo("Commande terminée");

$req = $bdd->exec("DELETE FROM panier WHERE id_client = '$idclient'");

header('Location: ../Vues/index_client.php')
?>