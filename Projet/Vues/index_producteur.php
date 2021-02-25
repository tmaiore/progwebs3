<?php require_once("banniere_producteur.html"); 
session_start(); ?>
<!doctype html>
<html lang="en">
<link href="../style_boot.css" rel="stylesheet">
  <head>
    <meta charset="utf-8">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body{
      	text-align: center;
        margin-left: auto;
        margin-right: auto;
      }
        table{
  border-collapse: collapse;

}

td{
  border: 1px solid black;
  padding: 10px;
}
    </style>
  </head>
  <body>
  <h1 style="text-align:center"> Liste des produits </h1>
  <form method="POST" action="ajout_produit.php">
  <button type = submit>Ajouter un produit</button>
  </form>

<?php
$login = $_SESSION['login'];
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



$res = $bdd->query("SELECT id_producteur FROM producteur WHERE login_producteur = '$login'");
if ($res)
	{	
	while ($data = $res->fetch())
		{
		$test = $data['id_producteur'];
		}	
	}

$resultat = $bdd->query("SELECT nom_produit FROM produit where id_producteur = '$test'");
 
if ($resultat)
	{	
	while ($data1 = $resultat->fetch())
		{
?>
		<form method="POST" action="../Controleurs/stock_modif.php">
		<input type="hidden" id="prod" name = "prod" value="<?php echo $data1['nom_produit']; ?>">
<?php
		echo '<img src="../images/'.$data1['nom_produit'].'.jpg" style="width:20%">';
		$produit = $data1['nom_produit'];
		echo '<h1>'.$produit.'</h1>';
		$reponse = $bdd->query("SELECT stock_dispo FROM produit WHERE nom_produit = '$produit'");


// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
	
    <p>
    <strong>Stock restant</strong> : <?php echo $donnees['stock_dispo']; ?><br />
   </p>
   	<p>Nouveau stock :</p><input type="number" id="stock" name="stock"><br><br>
   	<button type = submit>Modifier le stock</button>
   
<?php

}

$reponse->closeCursor(); // Termine le traitement de la requête
$reponse = $bdd->query("SELECT prix_unité FROM produit WHERE nom_produit = '$produit'");

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>Prix à l'unité</strong> : <?php echo $donnees['prix_unité']; ?><br />
   </p>
   <?php $prix = $donnees['prix_unité']; ?>
   <input type="hidden" id="prix" name = "prix" value="<?php echo $prix; ?>">
   </form>
<?php
}
}
}


$reponse->closeCursor(); // Termine le traitement de la requête

?>
  <form method="POST" action="../Controleurs/valider_commande.php">
 <h1> Vos livraisons en cours </h1>

  <table>
  <tr>
    <td>Identifiant de la livraison</td>
    <td>Identifiant du client</td>
    <td>Identifiant de la commande</td>
    <td>Validation de la commande ?</td>
    <td>Options</td>
  </tr>
  <tr>
  
<?php
$reponse = $bdd->query("SELECT * FROM livraison WHERE id_producteur = '$test'");

while ($donnees = $reponse->fetch())
{
?>

    <td><?php echo $donnees['id_client']; ?></td>
    <td><?php echo $donnees['id_livraison']; ?></td><input type="hidden" id="livraison" name = "livraison" value="<?php echo $donnees['id_livraison']; ?>">
    <td><?php echo $donnees['id_commande']; ?></td>
    <td><?php if($donnees['validée'] == 0 ){ echo("non"); } else echo("oui");?></td>
    <?php
    if($donnees['validée'] == 0 ){?>
    <td><button type="submit">Valider la commande</button></td>
  
<?php 
}
?>
</tr>
<?php 
}
?>
</table>
</body>
</html>

