<!-- author Jessie
date 29/04/2017 -->

<?php
  class Article {
    protected $nom;
    protected $quantite;
    protected $image;
    protected $prix;
    protected $classement;

    public function __construct($nom, $quantite, $image, $prix, $classement) {
      $this->nom = $nom;
      $this->quantite = $quantite;
      $this->image = $image;
      $this->prix = $prix;
      $this->classement = $classement;
    }

    public function getNom() {
		  return $this->nom;
	  }

    public function getQuantite() {
      return $this->quantite;
    }

    public function setQuantite($quantite) {
      $this->quantite = $quantite;
    }

    public function getImage() {
      return $this->image;
    }

    public function getPrix() {
      return $this->prix;
    }  
	  
    public function getClassement(){
      return $this->classement;
    }
    
   
  }
?>
