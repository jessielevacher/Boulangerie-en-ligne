<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Panier.class.php");
  require("Commande.class.php");
  require("Client.class.php");

  if(isset ($_POST ["action"]) && !empty ( $_POST ["jour"]) && !empty ( $_POST ["mois"]) && !empty ( $_POST ["annee"]) && !empty ( $_POST ["moment"]) && )
  //ET PANIER NON VIDE !!
  {
    //On crée une commande
    $commande = new Commande($panier, $_POST ["jour"], $_POST ["mois"], $_POST ["annee"], $_POST ["moment"]);
    //On ajouter la commande à la liste des commandes du client
    $client->ajouterCommande($commande);
    //On ouvre la page commande.php
    //<a href="commandes.php">Commandes</a> à tester
  }
  else {
      echo "<p> Tous les champs doivent être renseignés </p>";
  }

  for ($i=0; $i < count($panier->getListeArticles()); $i++) {
    if(isset ($_POST ["strval($i)"])) {
      $panier->supprimerArticle($i);
      header("location:panier.php");
    }
  }
  ?>
