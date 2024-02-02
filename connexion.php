<?php
session_start();
$bdd = new PDO('mysql:host=mariadb;dbname=espace_membre;charset=utf8;','root','root');
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
            header('location: main.php');
        }else{
            echo "Votre Mot de passe ou Pseudo est incorrect";
        }    

    }else{
        echo "Veuillez Compléter Votre Pseudo ou bien Vote MDP";
    } 
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body text-align="center">

<div style="text-align:center" class="formulaire">
<H1>Connexion</H1>
<form method ="POST" action="" class="form1">
    <input type="text" name ="pseudo"/>
    <br><br/>
    <input type="password" name = "mdp"/>
    <br><br/>
    <input type="submit" name = "envoi"/>
</form>

</div>

<a href="index.php">Retour</a>

</body>
</html>