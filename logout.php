<?php
session_start();
$_SESSION =  array();
Session_unset();
session_destroy();
header('Location: connexion.php');
?>
