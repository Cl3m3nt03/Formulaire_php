<?php
session_start();
$bdd = new PDO('mysql:host=mariadb;dbname=espace_membre;charset=utf8;','root','root');
if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
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
        }
    echo $_SESSION['id']; 

    }else{
        echo "Veuillez Compléter Votre Pseudo ou bien Vote MDP";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="formulaire" style="text-align:center">
<H1>Inscription</H1>
<form method ="POST" action="" class="form1">
    <input type="text" name ="pseudo"/>
        <br><br/>
    <input type="password" name = "mdp"/>
        <br><br/>
    <input type="submit" name = "envoi"/>

</form>
<br></br>
<form method = "POST" action = "connexion.php" style="text-align:center" class="form2">
 <input type = "submit" value = "Connexion"/>
</form>

</div>


inscription
</body>
</html>