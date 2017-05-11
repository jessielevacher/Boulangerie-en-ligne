<!-- author Léa
date 1/05/2017 -->

<?php

require("Client.class.php");

//on réutilise la session déjà ouverte afin d'enregistrer les nouvelles données relatives à notre client connecté
session_start();
$client=$_SESSION["client"] ;
$client->enregistrerInfosComplementaires();
//$client->__destruct();

//puis on ferme la session
session_destroy();

//On nous redirige vers la page de connexion
header("Location: ./page_connexion.html");

?>
