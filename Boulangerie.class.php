<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Article.class.php");

  class Boulangerie {
  //  protected $listeClients;
    protected $listeArticles;

    public function __construct() {
      //On remplit la listeClients
      // $i=0;
      // $fichier = fopen("Fichiers/clients.txt", "r")
      // while (! feof ($fichier)){
      //   $c = fgetc($fichier);
      //   $this->listeClients[$i] = $c
      //   $i = $i + 1 ;
      // }
      // fclose($fichier);

      //On remplit la listeArticles avec le fichier comme dans la classe Panier
      $i = 0;
      $fichier = fopen ("Fichiers/articles.txt", "r");
    	while (! feof ($fichier)) {
    		$c = fgetc ($fichier);
        $Champ = explode(";",$c);
        $article = new Article($Champ[0],intval($Champ[1]),$Champ[2],floatval($Champ[3]));
    		$this->listeArticles[$i] = $article;
        $i = $i + 1;
      }
      fclose ($fichier);

    }

    // public function AffichageViennoiserie(){
    //   for ($i=19; $i < 28; $i++) {
    //       echo "<tr class=\"panier\">";
    //       echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
    //       $prix = $this->listeArticles[$i]->getPrix();
    //       echo "<td class=\"panier\">".$prix."€</td>";
    //     //  echo  "<td class=\"panier\"><input type=\"number\" name=\"quantite".strval($i)."\" min=\"1\" max=\"50\" defaultValue=\"0\"></td>";
    //       echo "</tr>";
    //   }
    // }

//      public function AffichagePain(){
//       for ($i=29; $i < 36; $i++) {
//           echo "<tr class=\"panier\">";
//           echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
//           $prix = $this->listeArticles[$i]->getPrix();
//           echo "<td class=\"panier\">".$prix."€</td>";
//           echo  "<td class=\"panier\"><input type=\"number\" name=\"quantite".strval($i)."\" min=\"1\" max=\"50\" defaultValue=\"0\"></td>";
//           echo "</tr>";
//       }
//     }
//
//      public function AffichageChocolat(){
//       for ($i=37; $i < 54; $i++) {
//           echo "<tr class=\"panier\">";
//           echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
//           $prix = $this->listeArticles[$i]->getPrix();
//           echo "<td class=\"panier\">".$prix."€</td>";
//           echo  "<td class=\"panier\"><input type=\"number\" name=\"quantite".strval($i)."\" min=\"1\" max=\"50\" defaultValue=\"0\"></td>";
//           echo "</tr>";
//       }
//     }
//
//      public function AffichageGateau(){
//       for ($i=0; $i < 18; $i++) {
//           echo "<tr class=\"panier\">";
//           echo "<td class=\"panier\">".$this->listeArticles[$i]->getNom()."</td>";
//           $prix = $this->listeArticles[$i]->getPrix();
//           echo "<td class=\"panier\">".$prix."€</td>";
//           echo  "<td class=\"panier\"><input type=\"number\" name=\"quantite".strval($i)."\" min=\"1\" max=\"50\" defaultValue=\"0\"></td>";
//           echo "</tr>";
//     }
//
//   }
//
// // ajouter client
// //afficher les clients
//   public function getNbClients(){
//     $i = 0;
//     while (!empty($listeClients[$i])){
//       i=i+1;
//     }
//     return $i;
//   }

?>
