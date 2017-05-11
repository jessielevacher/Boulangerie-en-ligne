<!-- author Léa
date 1/05/2017 -->

<?php

/* test l'enregistrement des infos dans le fichier info.txt
 sous la forme "pseudo motDePasseHache ID" sur chaque ligne */
 
 require("Client.class.php");
 
 
 function recupererNbClients()
{//On recupère le nombre de clients déjà inscrit et on l'incrémente de 1 car on va en créer un nouveau le nombre ressorti sera alors l'id du nouveau client
    $fichier = @fopen("Fichiers/nbClients.txt", "a+");
		$numClient=fgets($fichier);
		$numClient=$numClient+1;
		ftruncate($fichier,0);
		fputs($fichier,$numClient);
	fclose($fichier);
	
    return $numClient;
}


  function recupererInfos($id){ //on récupère la ligne du fichier clients.txt correspondant à l'id du client qui souhaite se connecter
		
		$fichier = @fopen("Fichiers/clients.txt", "r+");		   
		$contenu = fread($fichier, filesize("Fichiers/clients.txt"));
		$contenu = explode("\n", $contenu); 
		fclose($fichier);		 
		
		 $param = stripslashes(urldecode($contenu[$id-1]));
		$client = unserialize ($param); //on désérialise l'objet pour le récupérer en tant qu'objet

	return $client;
       
    }
    
 $id=recupererNbClients();
 
 //on crée un client
 $client = new Client("Martin","laura","14/02/1995","fregegehe","Jumelles","27220","femme","0603235656","lmartin",$id);
 //on enregistre son pseudo et mot de passe et lui affecte un identifiant
 $client->enregistrerInfos("coucou08");
 //on enregistre l'objet sérialisé dans un fichier à la place correspondante
 $client->enregistrerInfosComplementaires();

 //on récupère les données que l'on vient d'enregistrer, on peut alors ensuite retravailler sur cet objet client
 $client1=recupererInfos($id-1);
 
 //vérifions que nous avons récupéré le bon client
 echo $client1->getPseudo()."\n";
  echo $client1->getPrenom()."\n";
   echo $client1->getSexe()."\n";
 
 
?>
