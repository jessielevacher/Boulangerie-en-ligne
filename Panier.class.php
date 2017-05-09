<!-- author Jessie & Laetitia
date 29/04/2017 -->

<?php
  //require("Article.class.php");

  class Panier {
    protected $listeArticles;
    protected $total;

    public function __construct() {
      //Dans le fichier articles.txt il y a :
      //nom du produit;quantité;chemin vers l'image;prix unitaire;catégorie

      //On parcourt le fichier et on remplit la liste d'articles avec tous les produits
      $i = 0;
      $fichier = fopen ("Fichiers/articles.txt", "r");
    	while (! feof ($fichier)) {
    		$c = fgets ($fichier);
        $Champ = explode(";",$c);
        $article = new Article($Champ[0],intval($Champ[1]),$Champ[2],floatval($Champ[3]));
    		$this->listeArticles[$i] = $article;
        $i = $i + 1;
      }
      fclose ($fichier);

      $this->total = 0;
    }

    public function getListeArticles() {
      return $this->listeArticles;
    }

    public function getTotal() {
      return $this->total;
    }

    public function ajouterArticle($nom, $quantite) {

    }

    //On supprime le ième article de la liste
    public function supprimerArticle($i) {
      $this->listeArticles[$i]->setQuantite(0);
    }

    //La quantité des articles de la liste compris entre $debut et $fin
    //reprennent une quantité nulle
    public function reinitialiserPanier($debut,$fin) {
      for ($i = $debut; $i < $fin; $i++) {
        $this->listeArticles[$i]->setQuantite(0);
      }
    }

    //Retourne vrai si le panier est vide, faux sinon
    public function panierVide() {
      $vide = TRUE;
      $i = 0;
      while ($i < count($this->listeArticles) && $vide == TRUE) {
        if ($this->listeArticles[$i]->getQuantite()!=0) {
          $vide = FALSE;
        }
        $i++;
      }
      return $vide;
    }

    //On affiche le panier càd :
    //nom du produit ; quantité ; prix (quantité * prix unitaire) ; bouton "supprimer"
    // /!\ On n'affiche QUE les produits ayant une quantité différente de 0 !
    //On affiche également le prix total du panier
    public function afficherPanier() {
      $this->total=0;
      for ($i=0; $i < count($this->listeArticles); $i++) {
        if ($this->listeArticles[$i]->getQuantite()!=0) {
          echo "<tr class=\"panier\">";
          echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
          echo "<td class=\"panier\">".$this->listeArticles[$i]->getQuantite()."</td>";
          $prix = $this->listeArticles[$i]->getQuantite()*$this->listeArticles[$i]->getPrix();
          echo "<td class=\"panier\">".$prix."€</td>";
          $this->total = $this->total + $prix;
          echo "<td class=\"panier\"><input type=\"submit\" name=\"".strval($i)."\" value=\"Supprimer\"/></td>";
          echo "</tr>";
        }
      }
      echo "<tr>";
      echo "<td colspan=\"2\" class=\"panier\">Total</td>";
      echo "<td colspan=\"2\" class=\"panier\">".$this->total."€ </td>";
      echo "</tr>";
    }

  }
?>
