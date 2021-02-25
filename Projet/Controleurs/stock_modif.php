<?php
$prod = $_POST['prod'];
$stock = $_POST['stock'];
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


$res = $bdd->query("SELECT id_produit FROM produit WHERE nom_produit = '$prod'");
if ($res)
	{	
	while ($data = $res->fetch())
		{
		$test = $data['id_produit'];
		}	
	}

  $requete = $bdd->query("UPDATE produit SET stock_dispo='$stock' WHERE id_produit = '$test'");
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }
header('Location: ../Vues/index_producteur.php');
?>