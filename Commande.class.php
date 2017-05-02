<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Panier.class.php");

  class Commande {
    protected $numeroCommande;
    protected $date;
    protected $moment;
    protected $prixTotal;

    public function __construct($panier, $num, $jour, $mois, $annee, $moment) {
      $this->numeroCommande = $num;
      $this->date = [$jour,$mois,$annee];
      $this->moment = $moment;
      $this->prixTotal = $panier->getTotal();
    }

  }
?>
