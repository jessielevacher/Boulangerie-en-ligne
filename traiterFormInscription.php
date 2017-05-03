
<?php
if ( !empty ( $_POST ["nom"]) && !empty ( $_POST ["prenom"]) && !empty ( $_POST ["adresse"]) && !empty ( $_POST ["ville"]) && !empty ( $_POST ["cp"]) && !empty ( $_POST ["telephone"]) && !empty ( $_POST ["jour"]) && !empty ( $_POST ["mois"]) && !empty ( $_POST ["annee"]) && isset( $_POST["monSexe"])  && !empty ( $_POST ["pseudo"])  && !empty ( $_POST ["mdp"])  && !empty ( $_POST ["cmdp"])) {

if (isset($_POST['telephone']))
{
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']); // On rend inoffensives les balises HTML que le visiteur a pu entrer
    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
    {
        echo 'Le ' . $_POST['telephone'] . ' est un numéro <strong>valide</strong> !';
    }
    else
    {
        //echo ' <script type ='text/javascript'> alert ('le numéro de téléphone est invalide'); window.location.replace("page_inscription.html") </script> ';
     echo '<script language="JavaScript">
	alert("le numéro de téléphone est invalide");
	window.location.replace("page_inscription.html");
	</script>';
        //header("Location: ./page_inscription.html");
    }
}
else  echo '<script language="JavaScript">
	alert("Certains champs ne sont pas renseignés");
	window.location.replace("page_inscription.html");
	</script>';

	
}
	
	
?>

