<!-- author Jessie
date 29/04/2017 -->

<?php
  require("Article.class.php");

  class Panier {
    protected $listeArticles;
    protected $total;

    public function __construct() {
      //Dans le fichier il faut écrire :
      //baguette;0;image1;0.92
      //pain au chocolat;0;image2;0.75
      $i = 0;
      $fichier = fopen ("articles.txt", "r");
    	while (! feof ($fichier)) {
    		$c = fgetc ($fichier);
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

    public function supprimerArticle($i) {
      // $trouve = FALSE;
      // $i = 0;
      // while ($i < count($this->listeArticles) && $trouve == FALSE) {
      //   if ($this->listeArticles[$i]->getNom()==$nom) {
      //     $this->listeArticles[$i]->setQuantite(0);
      //     $trouve = TRUE;
      //   }
      //   $i = $i + 1;
      // }
      $this->listeArticles[$i]->setQuantite(0);
    }

    public function reinitialiserPanier($i,$j) {

    }

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

    public function afficherPanier() {
      for ($i=0; $i < count($this->listeArticles); $i++) {
        if ($this->listeArticles[$i]->getQuantite()!=0) {
          echo "<tr>";
          echo "<td> $this->listeArticles[$i]->getNom() </td>";
          echo "<td> $this->listeArticles[$i]->getQuantite() </td>";
          $prix = $this->listeArticles[$i]->getQuantite()*$this->listeArticles[$i]->getPrix();
          echo "<td> $prix </td>";
          $this->total = $this->total + $prix;
          echo "<td><input type=\"reset\" name=\"strval($i)\" value=\"Supprimer\"/></td>";
          echo "</tr>";
        }
      }
      echo "<tr>";
      echo "<td></td>";
      echo "<td></td>";
      echo "<td>Total</td>";
      echo "<td> $this->total </td>";
      echo "</tr>";
    }
  }
?>
