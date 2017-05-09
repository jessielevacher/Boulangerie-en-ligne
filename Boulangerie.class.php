<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Article.class.php");
  require("Panier.class.php");

  class Boulangerie {
    protected $listeArticles;
    protected $panier;

    public function __construct() {
      //On remplit la listeArticles avec le fichier comme dans la classe Panier
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

      //On crée le panier de la boulangerie
      $panier = new Panier();
    }
    
    public function AffichageViennoiserie(){
      for ($i=0; $i < count($this->listeArticles); $i++) {
        if ($this->listeArticles[$i]->getClassement()=="viennoiserie") {
          echo "<tr class=\"panier\">";
          echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
          $prix = $this->listeArticles[$i]->getPrix();
          echo "<td class=\"panier\">".$prix."€</td>";
          echo  "<td class=\"panier\">"<input type="number" name="quantité" min="1" max="50" defaultValue="0">"</td>";
          echo "</tr>";
        }
      }
    }
    
     public function AffichagePain(){
      for ($i=0; $i < count($this->listeArticles); $i++) {
        if ($this->listeArticles[$i]->getClassement()=="pain") {
          echo "<tr class=\"panier\">";
          echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
          $prix = $this->listeArticles[$i]->getPrix();
          echo "<td class=\"panier\">".$prix."€</td>";
          echo  "<td class=\"panier\">"<input type="number" name="quantité" min="1" max="50" defaultValue="0">"</td>";
          echo "</tr>";
        }
      }
    }
    
     public function AffichageChocolat(){
      for ($i=0; $i < count($this->listeArticles); $i++) {
        if ($this->listeArticles[$i]->getClassement()=="autre") {
          echo "<tr class=\"panier\">";
          echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
          $prix = $this->listeArticles[$i]->getPrix();
          echo "<td class=\"panier\">".$prix."€</td>";
          echo  "<td class=\"panier\">"<input type="number" name="quantité" min="1" max="50" defaultValue="0">"</td>";
          echo "</tr>";
        }
      }
    }
    
     public function AffichageGateau(){
      for ($i=0; $i < count($this->listeArticles); $i++) {
        if ($this->listeArticles[$i]->getClassement()=="gateau") {
          echo "<tr class=\"panier\">";
          echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
          $prix = $this->listeArticles[$i]->getPrix();
          echo "<td class=\"panier\">".$prix."€</td>";
          echo  "<td class=\"panier\">"<input type="number" name="quantité" min="1" max="50" defaultValue="0">"</td>";
          echo "</tr>";
        }
      }
    }

  }
?>
