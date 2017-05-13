<!-- author Léa
date 1/05/2017 -->

<?php

require("Client.class.php");

  function recupererInfos($id){ //on récupère la ligne du fichier clients.txt correspondant à l'id du client qui souhaite se connecter

		$fichier = @fopen("Fichiers/clients.txt", "r+");
		$contenu = fread($fichier, filesize("Fichiers/clients.txt"));
		$contenu = explode("\n", $contenu);
		fclose($fichier);

		 $param = stripslashes(urldecode($contenu[$id-1]));
		$client = unserialize ($param); //on désérialise l'objet pour le récupérer en tant qu'objet

	return $client;

    }

//on ouvre un session
session_start();


if ( !empty ( $_POST ["pseudo"]) && !empty ( $_POST ["mdp"]) && isset( $_POST["connecter"]) ) {

  // Si l'utilisateur a bien rempli tous les champs, on recherche l'utilisateur : dans fichier info.txt

	$fichier = @fopen("Fichiers/info.txt", "r");
	$found=false;

	if ($fichier) {
		while ( (($buffer = fgets($fichier)) !== false) && (!$found) ) {
			$champ=explode(" ",$buffer);
			//nous vérifions la cohérence du pseudo entré avec le mot de passe (traité avec un fonction de hashage)
			if (($champ[0]==$_POST ["pseudo"]) && password_verify($_POST ["mdp"],$champ[1]))
			{
				$found=true;
				$id=$champ[2];
			}

		}
		fclose($fichier);
	}


  if ( $found )
 //après avoir vérifié que l'utilisateur peut se connecter car il existe, je garde les informations
 //que je vais utiliser dans les autres pages dans l'array  $_SESSION
   {
	   // créer un client en chargaeant ses données enregistrées
	   $client=recupererInfos($id);
	 $_SESSION["client"] = $client;
	 //on se redirige vers la page principale du site
	 header("Location: ./pagePrincipale.html");
   }

  else {	//si l'utilisateur n'est pas reconnu dans le fichier on affiche le message suivant et on reste sur le page active
		echo '<script language="JavaScript">
			alert("Votre pseudo ou votre mot de passe est incorrect");
			window.location.replace("page_connexion.html");
			</script>';

		}
}
  else
  	  {//si l'utilisateur n'a pas rempli tous les champs alors on affiche le message suivant à l'écran et on reste sur la page active
		  echo '<script language="JavaScript">
			alert("Votre pseudo ou votre mot de passe n est pas renseigné");
			window.location.replace("page_connexion.html");
			</script>';
  	  }
  ?>
