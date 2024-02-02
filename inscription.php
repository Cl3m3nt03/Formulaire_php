<?php
session_start();

if(isset($_SESSION['id']))
{
    header("Location: /main.php");
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

<p style="color:red">
<?php 
if(isset($_GET['error']))
{
    if($_GET['error'] == 1)
    {
        echo "Votre Mot de passe ou Pseudo est incorrect";
    } else if($_GET['error'] == 2)
    {
        echo "Nom d'utilisateur déjà utilisé";
    } else if($_GET['error'] == 3)
    {
        echo "Veuillez Compléter Votre Pseudo ou bien Vote MDP";
    }
}

?>
</p>

<form method ="POST" action="/action/inscription.php" class="form1">
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