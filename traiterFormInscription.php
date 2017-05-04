
<?php

require("Client.class.php");


$telOK=preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']);
$cpOK=preg_match("#^[0-9]{5}$#", $_POST['cp']);
$jourOK=preg_match("#^([0-2]?[0-9])|(3[0-1])$#", $_POST['jour']) ;
$moisOK=preg_match("#^0?[1-9]|1[0-2]$#", $_POST['mois']) ;
$anneeOK=preg_match("#^19[0-9][0-9]|200[0-9]|201[0-7]$#", $_POST['annee']);
$tmp="invalide";




    

session_start();
if ( $telOK && $cpOK && $jourOK && $moisOK && $anneeOK && !empty ( $_POST ["nom"]) && !empty ( $_POST ["prenom"]) && !empty ( $_POST ["adresse"]) && !empty ( $_POST ["ville"]) && isset( $_POST["monSexe"])  && !empty ( $_POST ["pseudo"])   && !empty ( $_POST ["cmdp"]) && ($_POST ["cmdp"] == $_POST ["mdp"] ) ) {

$birth= $_POST ["jour"]."/".$_POST ["mois"]."/".$_POST ["annee"];

$client=new Client($_POST ["nom"],$_POST ["prenom"],$birth,$_POST ["adresse"],$_POST ["ville"],$_POST ["cp"],$_POST ["monSexe"],$_POST ["telephone"],$_POST["pseudo"]);
$client->enregistrerInfos($_POST ["mdp"]);
$_SESSION["client"] = serialize($client);
header("Location: ./page_connexion.html");

}
else  
	echo '<script language="JavaScript">
	alert("Certains informations ne sont pas renseignées ou ne sont pas correctes");
	window.location.replace("page_inscription.html");
	</script>';

	
	
	
?>

