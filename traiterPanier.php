<!-- author Jessie & Laetitia
date 1/05/2017 -->

<?php
  require("Client.class.php");
  session_start();
  $client = $_SESSION['client'];

  if (isset ($_POST ["action"])) {
    if ($client->getPanier()->panierVide()==FALSE && !empty ( $_POST ["jour"]) && !empty ( $_POST ["mois"]) && !empty ( $_POST ["annee"]) && !empty ( $_POST ["moment"])) {
      //On crée une commande
      $commande = new Commande($client->getPanier(), $_POST ["jour"], $_POST ["mois"], $_POST ["annee"], $_POST ["moment"]);
      //On ajouter la commande à la liste des commandes du client
      $client->ajouterCommande($commande);
      //On réinitialise le panier
      $client->getPanier()->reinitialiserPanier(0,count($client->getPanier()->getListeArticles()));
      //On ouvre la page commande.php
      header("location:commandes.php");
    } else {
      if ($client->getPanier()->panierVide()==FALSE) { //=tous les champs ne sont pas remplis
        //On envoie un message d'erreur et on reste sur la page du panier
        echo '<script language="JavaScript">
        	alert("Certains champs ne sont pas renseignés");
          window.location.replace("panier.php");
        	</script>';
      } else { //=le panier est vide
        //On envoie un message d'erreur et on va sur la page principale
        echo '<script language="JavaScript">
        	alert("Votre panier est vide, vous ne pouvez pas effectuer de commande");
          window.location.replace("pagePrincipale.html");
        	</script>';
      }
    }

  } else { //=on n'a pas appuyé sur "Commander"
    for ($i=0; $i < count($client->getPanier()->getListeArticles()); $i++) {
      if(isset ($_POST [strval($i)])) {
        $client->getPanier()->supprimerArticle($i);
        header("location:panier.php");
      }
    }
  }
  ?>
