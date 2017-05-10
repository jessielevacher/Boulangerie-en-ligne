<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Client.class.php");

  class Boulangerie {
    protected $listeArticles;

    public function __construct() {
      //On remplit la listeArticles avec le fichier comme dans la classe Panier
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
    }

    public function AfficherCategorie($debut, $fin) {
      for ($i = $debut; $i < $fin; $i++) {
					echo "<tr class=\"panier\">";
					echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
					$prix = $this->listeArticles[$i]->getPrix();
					echo "<td class=\"panier\">".$prix."€</td>";
					echo  "<td class=\"panier\"><input type=\"number\" name=\"".strval($i)."\" min=\"0\" max=\"50\" defaultValue=\"0\"></td>";
					echo "</tr>";
      }
    }

  }
?>
