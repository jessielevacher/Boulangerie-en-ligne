<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Panier.class.php");
  require("Commande.class.php");
  require("Client.class.php");

  session_start();
  $client = $_SESSION['client'];
  $panier = $_SESSION['panier'];

  if (isset ($_POST ["action"])) {
    if ($panier->panierVide()==FALSE && !empty ( $_POST ["jour"]) && !empty ( $_POST ["mois"]) && !empty ( $_POST ["annee"]) && !empty ( $_POST ["moment"])) {
      //On crée une commande
      $commande = new Commande($panier, $_POST ["jour"], $_POST ["mois"], $_POST ["annee"], $_POST ["moment"]);
      //On ajouter la commande à la liste des commandes du client
      $client->ajouterCommande($commande);
      //On réinitialise le panier
      $panier->reinitialiserPanier(0,count($panier->listeArticles));
      //On ouvre la page commande.php
      header("location:commandes.php");
    } else {
      if ($panier->panierVide()==FALSE) { //=tous les champs ne sont pas remplis
        //On envoie un message d'erreur
        echo '<script language="JavaScript">
        	alert("Certains champs ne sont pas renseignés");
        	</script>';
        //On renvoie sur le panier
        header("location:panier.php");
      } else { //=le panier est vide
        //On envoie un message d'erreur
        echo '<script language="JavaScript">
        	alert("Votre panier est vide, vous ne pouvez pas effectuer de commande");
        	</script>';
        //On renvoie sur le panier
        header("location:pagePrincipale.php");
      }
    }

  } else { //=on n'a pas appuyé sur "Commander"
    for ($i=0; $i < count($panier->getListeArticles()); $i++) {
      if(isset ($_POST ["strval($i)"])) {
        $panier->supprimerArticle($i);
        header("location:panier.php");
      }
  }
  ?>
