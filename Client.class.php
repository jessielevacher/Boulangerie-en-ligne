<!-- author Jessie, Laetitia et Léa
date 1/05/2017 -->

<?php
  require("Panier.class.php");

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

    public function __construct($nom, $prenom, $dateNaissance, $adresse, $CP, $ville, $sexe, $telephone, $pseudo) {
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
  		protected $id;
    }

    public function __destruct() {}

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

   public function enregistrerInfos($mdp) {
	
	$fichier = @fopen("Fichiers/info.txt", "a+");
		fputs($fichier, $this->pseudo." ".$mdp." ".$this->id." \n"); 
	fclose($fichier);
    }

    public function enregistrerInfosComplementaires() {
		
if (filesize("Fichiers/clients.txt")==0)
{
	$fichier = @fopen("Fichiers/clients.txt", "a+");
	fwrite($fichier,serialize($this));
	fclose($fichier);
		
}
else
{
$fichier = @fopen("Fichiers/clients.txt", "r+");		   
		$contenu = fread($fichier, filesize("Fichiers/clients.txt"));
		$contenu = explode(PHP_EOL, $contenu); 
fclose($fichier);		 
$i=$this->id;
		$contenu[$i]=serialize($this);
		
			$contenu = implode(PHP_EOL, $contenu);
$fichier = @fopen("Fichiers/clients.txt", "w");
		fwrite($fichier, $contenu);
fclose($fichier);	
}
  }
   

    public function recupererInfos(){

       
    }

    //On affiche les commandes càd :
    //numéro de la commande ; date ; moment ; liste des articles (quantité + nom du produit) ; prix total
    public function afficherCommandes() {
      for ($i = 0; $i < count($this->listeCommandes); $i++) {
        echo "<tr>";
        echo "<td>".$this->listeCommandes[$i]->getNumero()."</td>";
        echo "<td>".$this->listeCommandes[$i]->getDate()." / ".$this->listeCommandes[$i]->getMoment()."</td>";
        echo "<td>"
          for ($j = 0; $j < count($this->listeCommandes[$j]->getListeArticlesCommandes()) ; $j++) {
            echo $this->listeCommandes[$i]->getListeArticlesCommandes()[$j]->getQuantite()." ".$this->listeCommandes[$i]->getListeArticlesCommandes()[$j]->getNom()."<br/>";
          }
        echo "</td>";
        echo "<td>".$this->listeCommandes[$i]->getTotal()."€ </td>";
        echo "</tr>";
      }
    }

    //On ajoute une commande à la liste des commandes
    public function ajouterCommande($commande) {
      $this->listeCommandes[count($this->listeCommandes)] = $commande;
    }
    
  
}
?>
