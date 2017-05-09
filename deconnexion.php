<?php
require("traiterFormConnexion.php");
require("Client.class.php");
session_start();
$client=$_SESSION["client"] ;
$client->enregistrerInfosComplementaires();
session_destroy();
header("Location: ./page_connexion.html");
?>
