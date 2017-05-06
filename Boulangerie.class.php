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
          <!-- 
            <td class=\"panier\">
          echo '<SELECT name="quantite" id="quantite">';
		        echo "<option selected disabled>Quantité</option>";
		          	//Lister les quantités possible
 		        	for($quantite=1; $quantite<=50;$quantite++)
			      	echo "<OPTION>$quantite<br></OPTION>";
          echo "</SELECT>";
          </td> 
          -->
          echo "</tr>";
        }
      }
    }

  }
?>
