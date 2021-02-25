<?php
    
        require_once("../Modele/bd.php");
        require_once("../Modele/Membres.php");
    
        if (isset($_POST["login"]) && isset($_POST["mdp"]) ) {

        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $type = $_POST['type'];

        $connexion = new Connexion("bd_projet");
        $co = $connexion->connexion() or die("erreur de connexion");
   
        $membre = new Membre($co, $login, $mdp);
        $membre->connexion_session();
    
        if ($_POST["type"] == "Client") {
        $sql1 = "SELECT login_client FROM client WHERE login_client = '$login'";
        $req1 = mysqli_query($co, $sql1);
        $sql2 = "SELECT mdp_client FROM client WHERE mdp_client = '$mdp'";
        $req2 = mysqli_query($co, $sql2);
        $data1 = mysqli_fetch_assoc($req1);
        $data2 = mysqli_fetch_assoc($req2);

        if($data2['mdp_client'] != $mdp || $data1['login_client'] != $login){
            echo '<p>Mauvais login / password. Merci de recommencer</p>';
            include('../Vues/connexion.php');
            exit;
        }
        else {
           $_SESSION['login'] = $login;
           header('Location: ../Vues/index_client.php');
        }
        }
        else if ($_POST["type"] == "Producteur"){
        $sql1 = "SELECT login_producteur FROM producteur WHERE login_producteur = '$login'";
        $req1 = mysqli_query($co, $sql1);
        $sql2 = "SELECT mdp_producteur FROM producteur WHERE mdp_producteur = '$mdp'";
        $req2 = mysqli_query($co, $sql2);
        $data1 = mysqli_fetch_assoc($req1);
        $data2 = mysqli_fetch_assoc($req2);

        if($data2['mdp_producteur'] != $mdp || $data1['login_producteur'] != $login){
            echo '<p>Mauvais login / password. Merci de recommencer</p>';
            include('../Vues/connexion.php');
            exit;
        }
        else {
           $_SESSION['login'] = $login;
           header('Location: ../Vues/index_producteur.php');
        }
    }
        
    }
    




?>