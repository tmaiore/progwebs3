<?php require_once("banniere.html"); ?>
<head>
    <style>
        body{
        text-align:center;
    }
    </style>
</head>
<body>
<form method="post" action="../Controleurs/ajout_compte.php">

    <label for="pseudo">Login</label><br>
    <input type="text" id="login" name="login" maxlength="20" placeholder="votre login" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>
          
    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" required="required"><br><br>
          
    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" placeholder="votre nom"><br><br>
          
    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom"><br><br>
  
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>
                
    <label for="adresse">Adresse</label><br>
    <textarea id="adresse" name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br><br>

    <label for="quartier">Quartier</label><br>
    <input type="text" id="quartier" name="quartier" placeholder="votre quartier" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>

    <label>Type de compte</label><br>
    <input name="compte" value="test" type="radio" >Client
    <input name="compte" value="tset" type="radio" >Producteur
    
 
    <input type="submit" name="inscription" value="S'inscrire" >
</form>
</body>
 