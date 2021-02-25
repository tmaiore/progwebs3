<?php

class Connexion{
	
private $host;
private $user;
private $bdd;
private $passwd;
private $co;

public function __construct($bdd) {
	
$this->host = "localhost";
$this->user = "root";
$this->bdd = "bd_projet";
$this->passwd = "";
}


public function connexion() {
	
$this->co = mysqli_connect($this->host , $this->user , $this->passwd, $this->bdd) or die("erreur de connexion");
return $this->co;
}

public function deconnexion() {
	
mysqli_close($this->co);

}

}

?>