<?php
require_once "../init.php";



if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
    $statement = $bdd->prepare('SELECT pseudo FROM users where pseudo = ?');
    $statement->execute([$_POST['pseudo']]);
    if($statement->rowCount() == 0)
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        $insertUser = $bdd ->prepare('INSERT INTO users(pseudo,mdp)VALUES(?, ?)');
        $insertUser->execute(array($pseudo, $mdp)); // inser pseudo et mdp dans la base de donnes 

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');// recup le pseudo/mdp de la bdd
        $recupUser->execute(array($pseudo, $mdp));
        if($recupUser->rowCount()> 0){
            $_SESSION['pseudo'] = $pseudo; 
            $_SESSION['mdp'] = $mdp; 
            $_SESSION['id'] = $recupUser->fetch()['id'];  
            header("Location: /connexion.php");        
        }
        
        } else {
            header('location: /inscription.php?error=2');
        }
    } else 
    {
        header('location: /inscription.php?error=3');
    }

