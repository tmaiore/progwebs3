<?php require_once("banniere.html"); ?>
<!doctype html>
<html lang="fr">
<link href="../style_boot.css" rel="stylesheet">
<head>
<title> Site </title>
<style>
	body{
		text-align: center;
	}
</style>
</head>
<body>
<form action = "../Controleurs/connexion_session.php" method="POST">
<h1> Connexion </h1>


<label for="pseudo">Login</label><br>
<input type="text" id="login" name="login" maxlength="20" placeholder="votre login" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>
          
<label for="mdp">Mot de passe</label><br>
<input type="password" id="mdp" name="mdp" required="required"><br><br>

<label for="civilite">Type de compte</label><br>
<input name="type" value="Producteur" checked="" type="radio" >Producteur
<input name="type" value="Client" type="radio" >Client<br><br> 

<input type="submit" value="Se connecter">
</form>
</body>
