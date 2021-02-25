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
$login = $_SESSION['login'];
$prod = $_POST['prod'];
$poidsc = 0;
$prixc = 0;
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=bd_projet;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query("SELECT id_client FROM client WHERE login_client = '$login'");



while ($donnees = $reponse->fetch())
{
  $idcli = $donnees['id_client'];
}

$reponse->closeCursor(); 

$reponse = $bdd->query("SELECT * FROM panier WHERE id_client = '$idcli'");

while ($donnees = $reponse->fetch())
{
  $poidsc += $donnees['quantite'];
  $prixc += $donnees['prix_total'];
}

$reponse->closeCursor(); 

$req = $bdd->exec("INSERT INTO `commande`(`id_client`, `prix_commande`, `poids_commande`) VALUES ('$idcli', '$prixc', '$poidsc')");

$reponse = $bdd->query("SELECT * FROM commande WHERE id_client = '$idcli'");

while ($donnees = $reponse->fetch())
{
  $idcom = $donnees['id_commande']; 
  $poids = $donnees['poids_commande'];
  $prix = $donnees['prix_commande'];
}
$reponse->closeCursor(); 
?>

<body>
  <form method="POST" action="../Controleurs/crea_commande.php">
	<h1> Votre commande</h1>

	<table>
  <tr>
    <td>Identifiant de la commande</td>
    <td>Poids de la commande</td>
    <td>Prix de la commande</td>
  </tr>
  <tr>
    <td><?php echo $idcom; ?></td>
    <td><?php echo $poids; ?></td>
    <td><?php echo $prix; ?></td>
  </tr>

  <input type="hidden" name='commande' value="<?php echo $idcom; ?>">

    
</table>
<br><br> 
    <label for="civilite">Type de livraison</label><br>
    <input name="type" value="Hebdo" checked="" type="radio" >Hebdomadaire
    <input name="type" value="Ponctuelle" type="radio" >Ponctuelle
    <input name="type" value="Group" type="radio" >Groupée<br><br> 

    <input type="hidden" name="prod" value="<?php echo $_POST['prod']; ?>">
    <input type="hidden" name="prix" value="<?php echo $prix; ?>">

    <label for="typelivraison">Choix du moyen de transport</label><br>
    <?php 
      $reponse = $bdd->query("SELECT nom_type FROM typelivraison WHERE poids_maximal > '$poids'");

      while ($donnees = $reponse->fetch())
      {
          ?>
          <input name="livraison" value="<?php echo $donnees['nom_type'];?>" checked="" type="radio" ><?php echo $donnees['nom_type'];?>
          <?php
      }
      $reponse->closeCursor(); 
    ?>

<br><br> <button type=submit> Valider </button>
</form>

</body>
</html>