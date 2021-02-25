<?php

class Membre {

	public $id, $login, $mdp, $co;
public function __construct($login, $mdp, $co) {

            $this->co = $co;
            $this->login = $login;
            $this->mdp = $mdp;
         
    
}

public function connexion_session() {

	session_start();
	$_SESSION['login'] = $this->login;
}

public function deconnexion_session() {

	session_destroy();
	mysqli_close($this->co);
}

}

?>