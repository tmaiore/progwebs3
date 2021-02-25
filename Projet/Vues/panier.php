<?php require_once("banniere_client.html"); 
session_start();?>
<!DOCTYPE html>
<html>
<link href="../style_boot.css" rel="stylesheet">
<head>
	<title>Site</title>
</head>
<style>
	table{
  border-collapse: collapse
}

td{
  border: 1px solid black;
  padding: 10px;
}
</style>
<?php
$prod= $_POST['prod'];
$login = $_SESSION['login'];
try
{

	$bdd = new PDO('mysql:host=localhost;dbname=bd_projet;charset=utf8', 'root', '');
}
catch(Exception $e)
{

        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query("SELECT id_produit FROM produit WHERE nom_produit = '$prod'");
$reponse2 = $bdd->query("SELECT id_client FROM client WHERE login_client = '$login'");

while ($donnees = $reponse->fetch())
{
  while ($donnees2 = $reponse2->fetch()){
   $idprod = $donnees['id_produit'];
   $idcli = $donnees2['id_client'];
   $prix = $_POST['prix'];
   $quantite = $_POST['quantite'];
   $prixt =  $prix * $quantite; 
    $req = $bdd->exec("INSERT INTO `panier`(`id_client`, `id_produit`, `nom_produit`, `quantite`, `prix_kilo`, `prix_total`) VALUES ('$idcli', '$idprod','$prod', '$quantite', '$prix', '$prixt')");
  }
}
$reponse->closeCursor(); 
$reponse2->closeCursor();
?>
<body>
  <form method="POST" action="commande.php">
  <h1> Votre panier </h1>

  <table>
  <tr>
    <td>Nom</td>
    <td>Quantité</td>
    <td>Prix à l'unité</td>
    <td>Prix total</td>

  </tr>
  <tr>
<?php 
$reponse = $bdd->query("SELECT * FROM panier WHERE id_client = '$idcli'");

while($donnees = $reponse->fetch())
{
?>
  <td><?php echo $donnees['nom_produit']; ?></td><input type="hidden" id="prod" name="prod" value="<?php echo $donnees['nom_produit']; ?>"></input>
    <td><?php echo $donnees['quantite']; ?></td><input type="hidden" id="quantite" name="quantite" value="<?php echo $donnees['quantite']; ?>"></input>
    <td><?php echo $donnees['prix_kilo']; ?></td><input type="hidden" id="prix" name="prix" value="<?php echo $donnees['prix_kilo']; ?>"></input>
    <td><?php echo $donnees['prix_total']; ?></td><input type="hidden" id="prixt" name="prixt" value="<?php echo $donnees['prix_total']; ?>"></input>
  </tr>
<?php
}
?>
  
</table>

<button type=submit> Commander </button>
</form>

</body>
</html>