<?php

require_once "../init.php";

global $bdd;

if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
            
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');// recup le pseudo/mdp de la bdd
        $recupUser->execute(array($pseudo, $mdp));

        if($recupUser->rowCount()> 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('location: /index.php');
        }else{
            header('location: /inscription.php?error=1');
        }    
    }else{
        header('location: /inscription.php?error=3');
    } 
}