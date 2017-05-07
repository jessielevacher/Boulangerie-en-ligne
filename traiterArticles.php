<?php
  require("Panier.class.php");
  require("Boulangerie.class.php");
  session_start();
  $panier = $_SESSION['panier'];
  $listeArticles = $_SESSION['listeArticles'];
  
  if (isset ($_POST ["action"])){
  
  }else{
    if (isset ($_POST ["effacerP"]){
     for ($i=0; $i< count($this->listeArticles) ; $i++){
        if ($this->listeArticles[$i]->getClassement()=="pain" || $this->listeArticles[$i]->getClassement()=="viennoiserie") {
            $this->listeArticles[$i]->getQuantite()=0;
          }
      }
     }
     
     if (isset ($_POST ["effacerC"]){
       for ($i=0; $i< count($this->listeArticles) ; $i++){
        if ($this->listeArticles[$i]->getClassement()=="chocolat") {
            $this->listeArticles[$i]->getQuantite()=0;
          }
      }
     }
     
     if (isset ($_POST ["effacerG"]){
       for ($i=0; $i< count($this->listeArticles) ; $i++){
        if ($this->listeArticles[$i]->getClassement()=="gateau") {
            $this->listeArticles[$i]->getQuantite()=0;
          }
      }
     }
     
   }
  
 ?>
