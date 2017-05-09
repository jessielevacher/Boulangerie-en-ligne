
<?php


require("Client.class.php");


function recupererNbClients()
{
    $fichier = @fopen("Fichiers/nbClients.txt", "a+");
		$numClient=fgets($fichier);
		$numClient=$numClient+1;
		ftruncate($fichier,0);
		fputs($fichier,$numClient);
	fclose($fichier);
	
    return $numClient;
}


function pseudoUtilise()
{
    $found=false;
	
	if ($fichier) {
		while ( (($buffer = fgets($fichier)) !== false) && (!$found) ) {
			$champ=explode(" ",$buffer);
			if (($champ[0]==$_POST ["pseudo"]))
			{
				$found=true;
			}
				
		}
		fclose($fichier);
	}
	return $found;
}

session_start();

$telOK=preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']);
$cpOK=preg_match("#^[0-9]{5}$#", $_POST['cp']);
$jourOK=preg_match("#^([0-2]?[0-9])|(3[0-1])$#", $_POST['jour']) ;
$moisOK=preg_match("#^0?[1-9]|1[0-2]$#", $_POST['mois']) ;
$anneeOK=preg_match("#^19[0-9][0-9]|200[0-9]|201[0-7]$#", $_POST['annee']);




if (  $telOK && $cpOK && $jourOK && $moisOK && $anneeOK && !empty ( $_POST ['nom']) && !empty ( $_POST ['prenom']) && !empty ( $_POST ["adresse"]) && !empty ( $_POST ["ville"]) && isset( $_POST["monSexe"])  && !empty ( $_POST ['pseudo'])   && !empty ( $_POST ["cmdp"]) && ($_POST ["cmdp"] == $_POST ["mdp"] ) ) {

if (pseudoUtilise())
{
	echo '<script language="JavaScript">
	alert("Ce pseudo est déjà utilisé");
	window.location.replace("page_inscription.html");
	</script>';
}
else
{
$birth=$_POST ["jour"]."/".$_POST ["mois"]."/".$_POST ["annee"];


$numClient=recupererNbClients();

$client=new Client($_POST ["nom"],$_POST ["prenom"],$birth,$_POST ["adresse"],$_POST ["ville"],$_POST ["cp"],$_POST ["monSexe"],$_POST ["telephone"],$_POST["pseudo"],$numClient);
$client->enregistrerInfos($_POST ['mdp']);
$_SESSION["client"] = $client;
header("Location: ./pagePrincipale.html");
}
}
else  
	echo '<script language="JavaScript">
	alert("Certains informations ne sont pas renseignées ou ne sont pas correctes");
	window.location.replace("page_inscription.html");
	</script>';

	
	
	
?>
