<?php
session_start();
if ( !empty ( $_POST ["pseudo"]) && !empty ( $_POST ["mdp"]) && isset( $_POST["connecter"]) ) {
  // recherche de l'utilisateur : dans fichier info.txt


	$fichier = @fopen("info.txt", "r");
	$found=false;
	
	if ($fichier) {
		$chaine = $_POST["pseudo"]." ".$_POST["mdp"];
		while ( (($buffer = fgets($fichier)) !== false) && (!$found) ) {
			if ($buffer==$chaine){
				$found=true;
			}
				
		}
		fclose($fichier);
	}
	

  if ( $found ) 
 //après avoir vérifié que l'utilisateur peut se connecter, je garde les informations
 //que je vais utiliser dans les autres pages dans l'array  $_SESSION
   { 
	 $_SESSION["pseudo"] = $_POST["pseudo"];
	 header("Location: ./page_principale.html");
   }
    // header ("Location ...") rédirige le navigateur vers la page indiquée à partir du script
  else {header("Location: ./page_connexion.html");
		} 
}
  else 
  	  {header("Location: ./page_connexion.html");
  	  }
  ?>
