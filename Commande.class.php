<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Panier.class.php");

  class Commande {
    protected $numeroCommande;
    protected $date;
    protected $moment;
    protected $prixTotal;
    protected $listeArticlesCommandes;

    public function __construct($panier, $jour, $mois, $annee, $moment) {
      $alphabet="0123456789abcdefghijklmnopqrstuvwxyz";
      $num = '';
      for($i=0; $i < 10; $i++)
	       $num=$num.$alphabet[rand(0,35)];
      $this->numeroCommande = $num;

      $this->date = [$jour,$mois,$annee];
      $this->moment = $moment;
      $this->prixTotal = $panier->getTotal();

      $nbArticles = 0;
      for ($i=0; $i < count($panier->listeArticles); $i++) {
        if ($panier->listeArticles[$i]->getQuantite()!=0) {
          $this->listeArticlesCommandes[$nbArticles] = $panier->listeArticles[$i];
          $nbArticles++;
        }
      }
    }

    public function getNumero() {
      return $this->numeroCommande;
    }

    public function getDate() {
      return $this->date;
    }

    public function getMoment() {
      return $this->moment;
    }

    public function getTotal() {
      return $this->prixTotal;
    }

    public function getListeArticlesCommandes() {
      return $this->listeArticlesCommandes;
    }

  }
?>
