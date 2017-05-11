<!-- author  Léa
date 1/05/2017 -->

<?php


require("Client.class.php");


function recupererNbClients()
{//On recupère le nombre de clients déjà inscrit et on l'incrémente de 1 car on va en créer un nouveau
    $fichier = @fopen("Fichiers/nbClients.txt", "a+");
		$numClient=fgets($fichier);
		$numClient=$numClient+1;
		ftruncate($fichier,0);
		fputs($fichier,$numClient);
	fclose($fichier);
	
    return $numClient;
}


function pseudoUtilise()
{ //Vérifie si le pseudo choisi à l'inscription n'est pas déjà utilisé par un autre utilisateur
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
//On crée un session
session_start();

//vérification des expressions régulières
$telOK=preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']); //Un numéro de téléphone valide contient 5 binôme de 2 chiffres qui peuvent être séparé par un "-", un espace ou un point ou pas séparé du tout
$cpOK=preg_match("#^[0-9]{5}$#", $_POST['cp']); //un code postal valide contient uniquement 5 chiffre
$jourOK=preg_match("#^([0-2]?[0-9])|(3[0-1])$#", $_POST['jour']) ; //un jour valide est compris entre 01 et 31 ou 1 et 31
$moisOK=preg_match("#^0?[1-9]|1[0-2]$#", $_POST['mois']) ; //un mois valide est compris entre 01 et 12 ou 1 et 12
$anneeOK=preg_match("#^19[0-9][0-9]|200[0-9]|201[0-7]$#", $_POST['annee']); //une année de naissance valide est comprise entre 1900 et 2017 (aujourd'hui)
$mdpOK=(preg_match("#[0-9]#", $_POST['mdp']) && preg_match("#([[:alnum:]]|[[:punct:]]){8,}#", $_POST['mdp'])); //un mot de passe valide contient au moins 8 caractères et un chiffre ( par caractères nous entendons, lettres, chiffres et ponctuation)


//si toutes les expressions régulières sont vérifiées et qu'aucun champs n'est vide alors on peut créer le client
if (  $mdpOK && $telOK && $cpOK && $jourOK && $moisOK && $anneeOK && !empty ( $_POST ['nom']) && !empty ( $_POST ['prenom']) && !empty ( $_POST ["adresse"]) && !empty ( $_POST ["ville"]) && isset( $_POST["monSexe"])  && !empty ( $_POST ['pseudo'])   && !empty ( $_POST ["cmdp"]) && ($_POST ["cmdp"] == $_POST ["mdp"] ) ) {

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
//on crée un nouveau client
$client=new Client($_POST ["nom"],$_POST ["prenom"],$birth,$_POST ["adresse"],$_POST ["ville"],$_POST ["cp"],$_POST ["monSexe"],$_POST ["telephone"],$_POST["pseudo"],$numClient);
//on enregistre son pseudo, son mot de passe et son ID dans le fichier prévu à cet effet
$client->enregistrerInfos($_POST ['mdp']);
//on crée un variable de session pour pouvoir récuperer ce client sur toutes les pages
$_SESSION["client"] = $client;
//l'inscription s'étant bien effectuée, nous nous redirigeons vers la page principale
header("Location: ./pagePrincipale.html");
}
} //si certains champs sont mal renseignés alors le message suivant est affiché
else  
	echo '<script language="JavaScript">
	alert("Certains informations ne sont pas renseignées ou ne sont pas correctes");
	window.location.replace("page_inscription.html");
	</script>';

	
	
	
?>
