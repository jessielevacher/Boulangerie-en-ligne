<!-- author Jessie & Laetitia
date 1/05/2017 -->

<?php

  class Commande {
    protected $numeroCommande;
    protected $date;
    protected $moment;
    protected $prixTotal;
    protected $listeArticlesCommandes;

    public function __construct($panier, $jour, $mois, $annee, $moment) {
      //On met un numéro de commande aléatoire = combinaison de 10 lettres et chiffres
      $alphabet="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $num = '';
      for($i = 0; $i < 10; $i++)
	       $num=$num.$alphabet[rand(0,35)];
      $this->numeroCommande = $num;

      $this->date = [$jour,$mois,$annee];
      $this->moment = $moment;

      //On récupère le total du panier
      $this->prixTotal = $panier->getTotal();

      //On remplit la liste des articles commandés avec les articles qui ont une quantité
      //différente de 0 dans le panier
      $nbArticles = 0;
      for ($i = 0; $i < count($panier->getListeArticles()); $i++) {
        if ($panier->getListeArticles()[$i]->getQuantite()!=0) {
          $article = clone $panier->getListeArticles()[$i];
          $this->listeArticlesCommandes[$nbArticles] = $article;
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
