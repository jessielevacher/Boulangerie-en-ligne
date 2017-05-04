<!-- author Jessie
date 1/05/2017 -->

<?php
  require("Commande.class.php");

  class Client {
    protected $nom;
    protected $prenom;
    protected $dateNaissance;
    protected $adresse;
    protected $CP;
    protected $ville;
    protected $sexe;
    protected $telephone;
    protected $pseudo;
    protected $listeCommandes;

    public function __construct() {

    }

    public function enregistrerInfos($pseudo, $mdp) {

    }

    public function enregistrerInfosComplementaires($nom, $prenom, $dateNaissance, $adresse, $CP, $ville, $sexe, $telephone) {

    }

    public function recupererInfos() {

    }

    public function afficherCommandes() {
      for ($i=0; $i < count($this->listeCommandes); $i++) {
        echo "<tr class=\"panier\">";
        echo "<td class=\"panier\">".$this->listeCommandes[$i]->getNumero()."</td>";
        echo "<td class=\"panier\">".$this->listeCommandes[$i]->getDate()." / ".$this->listeCommandes[$i]->getMoment()."</td>";
        echo "<td class=\"panier\">"
          for ($j=0; $j < count($this->listeCommandes[$j]->getListeArticlesCommandes()) ; $j++) {
            echo $this->listeCommandes[$i]->getListeArticlesCommandes()[$j]->getQuantite()." ".$this->listeCommandes[$i]->getListeArticlesCommandes()[$j]->getNom()."<br/>";
          }
        echo "</td>";
        echo "<td class=\"panier\">".$this->listeCommandes[$i]->getTotal()."€ </td>";
        echo "</tr>";
      }
    }

    public function ajouterCommande($commande) {
      $this−>listeCommandes[count($this->listeCommandes)] = $commande;
    }
  }
?>
