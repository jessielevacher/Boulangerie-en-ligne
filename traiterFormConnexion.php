<?php

require("Client.class.php");

session_start();


if ( !empty ( $_POST ["pseudo"]) && !empty ( $_POST ["mdp"]) && isset( $_POST["connecter"]) ) {
  // recherche de l'utilisateur : dans fichier info.txt


	$fichier = @fopen("Fichiers/info.txt", "r");
	$found=false;
	
	if ($fichier) {
		while ( (($buffer = fgets($fichier)) !== false) && (!$found) ) {
			$champ=explode(" ",$buffer);
			if (($champ[0]==$_POST ["pseudo"]) && ( $champ[1]==$_POST ["mdp"]))
			{
				$found=true;
			}
				
		}
		fclose($fichier);
	}
	

  if ( $found ) 
 //après avoir vérifié que l'utilisateur peut se connecter, je garde les informations
 //que je vais utiliser dans les autres pages dans l'array  $_SESSION
   { 
	   // !!!!! créer un client en chargaeant ses données (recupereInfo())
	 $_SESSION["client"] = $client;
	 header("Location: ./pagePrincipale.html");
   }
    // header ("Location ...") rédirige le navigateur vers la page indiquée à partir du script
  else {	
		echo '<script language="JavaScript">
			alert("Votre pseudo ou votre mot de passe est incorrect");
			window.location.replace("page_connexion.html");
			</script>';
			
		} 
}
  else 
  	  {
		  echo '<script language="JavaScript">
			alert("Votre pseudo ou votre mot de passe n est pas renseigné");
			window.location.replace("page_connexion.html");
			</script>';
  	  }
  ?>
