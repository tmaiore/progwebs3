<?php require_once("banniere_client.html"); 
session_start();
echo("Bonjour ".$_SESSION['login']." !");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  table{
  border-collapse: collapse;
  margin: auto;
}

td{
  border: 1px solid black;
  padding: 10px;
  text-align :center;
}
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0; }
.mySlides {display: none}


/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: black;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: black;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../images/agri.jpg" style="width:100%">
  <div class="text">1</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../images/agri.jpg" style="width:100%">
  <div class="text">2</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../images/agri.jpg" style="width:100%">
  <div class="text">3</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<h1 style="text-align:center"> Vos commandes</h1>
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

$restt = $bdd->query("SELECT id_client FROM client WHERE login_client = '$login'");
if ($restt)
  { 
  while ($data = $restt->fetch())
    {
    $idcli= $data['id_client'];
    } 
  }
$resultat = $bdd->query("SELECT * FROM commande WHERE id_client = '$idcli'");
 
if ($resultat)
  { 
  while ($data1 = $resultat->fetch())
    {
      ?>
        <table>
        <tr>
          <td>Identifiant du client</td>
          <td>Identifiant de la commande</td>
          <td>Prix</td>
          <td>Poids</td>
          <td>Options</td>
        </tr>
        <tr>
    <td><?php echo $data1['id_client']; ?></td>
    <td><?php echo $data1['id_commande']; ?></td>
    <td><?php echo $data1['prix_commande']; ?></td>
    <td><?php echo $data1['poids_commande'];; ?></td>
    <form method="POST" action="../Controleurs/supr_commande.php">
    <input type="hidden" name="idc" value="<?php echo $data1['id_commande']; ?>">
    <td><button type="submit">Supprimer la commande</button></td>
  </tr>
  <?php
    }
}
?>
</body>
</html> 