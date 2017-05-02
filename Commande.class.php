<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Panier.class.php");

  class Commande {
    protected $numeroCommande;
    protected $date;
    protected $moment;
    protected $prixTotal;

    public function __construct($panier, $jour, $mois, $annee, $moment) {
      $alphabet="0123456789abcdefghijklmnopqrstuvwxyz";
      $num = '';
      for($i=0; $i < 10; $i++)
	       $num=$num.$alphabet[rand(0,35)];
      $this->numeroCommande = $num;
      $this->date = [$jour,$mois,$annee];
      $this->moment = $moment;
      $this->prixTotal = $panier->getTotal();
    }

  }
?>
