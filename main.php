<?php
session_start();
if(empty($_SESSION['mdp'])){
    header('Location: connexion.php');
}
echo $_SESSION['pseudo'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
<a href="logout.php"><button>Se deconnecter</button></a>

</body>
</html>