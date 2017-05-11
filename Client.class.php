<!-- author Jessie, Laetitia et Léa
date 1/05/2017 -->

<?php
  require("Panier.class.php");
  require("Commande.class.php");

  class Client  {
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
    protected $panier;
    protected $id;

    public function __construct($nom, $prenom, $dateNaissance, $adresse, $CP, $ville, $sexe, $telephone, $pseudo, $iD) {
  		$this->nom = $nom;
  		$this->prenom = $prenom;
  		$this->dateNaissance = $dateNaissance;
  		$this->adresse = $adresse;
  		$this->CP = $CP;
  		$this->ville = $ville;
  		$this->sexe = $sexe;
  		$this->telephone = $telephone;
  		$this->pseudo = $pseudo;
  		$this->listeCommandes = array();
  		$this->panier = new Panier();
  		$this->id = $iD;
    }

    public function __destruct() {}

	  // Getteurs //
    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
      return $this->nom;
    }

    public function getDateDeNaissance() {
      return $this->DateDeNaissance;
    }

    public function getAdresse() {
      return $this->adresse;
    }

    public function getVille() {
      return $this->ville;
    }

    public function getCP() {
      return $this->CP;
    }

    public function getPseudo() {
      return $this->pseudo;
    }

    public function getSexe() {
      return $this->sexe;
    }

    public function getTelephone() {
      return $this->telephone;
    }

    public function getListeCommandes() {
      return $this->listeCommandes;
    }

    public function getPanier() {
      return $this->panier;
    }

    public function getid() {
      return $this->id;
    }

	// Autres méthodes //

	 //Enregistre le pseudo mot de passe et id du client sur le fichier info.txt prévu à cet effet
   public function enregistrerInfos($mdp) {
      $fichier = @fopen("Fichiers/info.txt", "a+");
      fputs($fichier, $this->pseudo." ".$mdp." ".$this->id."\n");
      fclose($fichier);
    }

	  //enregistre le client en tant qu'objet (serialisation) dans le fichier clients.txt
    public function enregistrerInfosComplementaires() {

		//Si le fichier est vide, on l'enregistre sur la première ligne venue
      if (filesize("Fichiers/clients.txt")==0) {
        $fichier = @fopen("Fichiers/clients.txt", "a+");
      	$a=serialize($this);
		    $param = urlencode($a);
		    fwrite($fichier,$param);
      	fclose($fichier);
      }
      else { //sinon on l'enregistre sur la ligne correspondant à son ID, ce qui efface la version précédente si il y en avait une
        $fichier = @fopen("Fichiers/clients.txt", "r+"); //on lit le fichier
		    $contenu = fread($fichier, filesize("Fichiers/clients.txt"));
		    $contenu = explode(PHP_EOL, $contenu); //on le divise selon les sauts à la ligne
        fclose($fichier);
        $i=$this->id;
		    $a=serialize($this);
		    $param=urlencode($a); //on serialise l'objet
		    $contenu[$i]=$param; //on le met à la bonne place

			  $contenu = implode(PHP_EOL, $contenu);
        $fichier = @fopen("Fichiers/clients.txt", "w"); //on reécrit le fichier
		    fwrite($fichier, $contenu);
        fclose($fichier);
      }
    }


    public function afficherArticlesCommande($i) {
      $chaine = "";
      for ($j = 0; $j < count($this->listeCommandes[$i]->getListeArticlesCommandes()) ; $j++) {
        $chaine=$chaine.$this->listeCommandes[$i]->getListeArticlesCommandes()[$j]->getQuantite()." ".$this->listeCommandes[$i]->getListeArticlesCommandes()[$j]->getNom()."<br/>";
      }
      return $chaine;
    }

    //On affiche les commandes càd :
    //numéro de la commande ; date ; moment ; liste des articles (quantité + nom du produit) ; prix total
    public function afficherCommandes() {
      for ($i = 0; $i < count($this->listeCommandes); $i++) {
        echo "<tr class=\"panier\">";
        echo "<td class=\"panier\">".$this->listeCommandes[$i]->getNumero()."</td>";
        echo "<td class=\"panier\">".$this->listeCommandes[$i]->getDate()[0]."/".$this->listeCommandes[$i]->getDate()[1]."/".$this->listeCommandes[$i]->getDate()[2]." | ".$this->listeCommandes[$i]->getMoment()."</td>";
        $chaine = $this->afficherArticlesCommande($i);
        echo "<td class=\"panier\">".$chaine."</td>";
        echo "<td class=\"panier\">".$this->listeCommandes[$i]->getTotal()."€ </td>";
        echo "</tr>";
      }
    }

    //On ajoute une commande à la liste des commandes
    public function ajouterCommande($commande) {
      $this->listeCommandes[count($this->listeCommandes)] = $commande;
    }


}
?>
