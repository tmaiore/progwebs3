<?php require_once("banniere_producteur.html"); 
session_start(); ?>
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
  <h1 style="text-align:center"> Page d'ajout de produit </h1>
  <form method="POST" action="add_prod.php">
  <label for="pseudo">Nom du produit</label><br>
  <input type="text" id="nom" name="nom" maxlength="20" placeholder="votre produit"required="required"><br><br>
          
  <label for="number">Quantité</label><br>
  <input type="number" id="stock" name="stock" required="required"><br><br>

  <label for="number">Prix à l'unité</label><br>
  <input type="number" id="prix" name="prix" required="required"><br><br>

  <label for="civilite">Catégorie</label><br>
  <input name="type" value="baies" checked="" type="radio" >Baies
  <input name="type" value="fruit rouge" type="radio" >Fruit rouge
  <input name="type" value="legume vert" type="radio" >Légume vert<br><br> 


  <label for="avatar">Photo du produit:</label>
  <input type="file"
       id="img" name="img"
       accept="image/png, image/jpeg">
  <button type = submit>Ajouter le produit</button>
  </form>