<?php

 require("Client.class.php");
 session_start();
 $client = $_SESSION['client'];

/* Si l'utilisateur a validé des articles de la page des gâteaux, on ajoute au panier les articles qui ont été sélectionnés 
dans les quantités correspondantes. On redirige ensuite l'utilisateur vers la page principale */
	  if (isset( $_POST ["actionG"] )){
		  for($i = 0; $i < 18 ; $i++){
        if(!empty ($_POST [strval($i)])) {
          $n = $client->getPanier()->getListeArticles()[$i]->getNom();
          $client->getPanier()->ajouterArticle($n, $_POST [strval($i)] );
        }
		  }
      header("Location:pagePrincipale.html");
    }

/* Si l'utilisateur a validé des articles de la page des pains et viennoiseries, on ajoute au panier les articles
qui ont été sélectionnés dans les quantités correspondantes. On redirige ensuite l'utilisateur vers la page principale */
    if (isset( $_POST ["actionP"] )){
  		  for($i = 18; $i < 36; $i++){
          if(!empty ($_POST [strval($i)])) {
            $n = $client->getPanier()->getListeArticles()[$i]->getNom();
            $client->getPanier()->ajouterArticle($n, $_POST [strval($i)] );
          }
  		  }
        header("Location:pagePrincipale.html");
	  }

/* Si l'utilisateur a validé des articles de la page des chocolats, on ajoute au panier les articles qui ont été sélectionnés 
dans les quantités correspondantes. On redirige ensuite l'utilisateur vers la page principale */

    if (isset( $_POST ["actionC"] )){
		  for($i = 36; $i < 54; $i++){
        if(!empty ($_POST [strval($i)])) {
          $n = $client->getPanier()->getListeArticles()[$i]->getNom();
          $client->getPanier()->ajouterArticle($n, $_POST [strval($i)] );
        }
		  }
    header("Location:pagePrincipale.html");
    }

 ?>
