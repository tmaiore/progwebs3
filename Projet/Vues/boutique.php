<?php require_once("banniere_client.html"); ?>
<!doctype html>
<html lang="en">
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
      }
    </style>
  </head>
  <body>
  <h1 style="text-align:center"> Liste des produits </h1>
<?php
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


$resultat = $bdd->query("SELECT nom_produit, stock_dispo FROM produit");
 
if ($resultat)
  { 
  while ($data1 = $resultat->fetch())
    {
      if ($data1['stock_dispo'] > 0 ){
?>
    <form method="POST" action="panier.php">
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
    <p>Quantité :</p><input type="number" id="quantite" name="quantite"><br><br>
    <button type = submit>Ajouter au panier</button>
   
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
  }

$reponse->closeCursor(); // Termine le traitement de la requête
?>