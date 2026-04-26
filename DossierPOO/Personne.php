<?php
class Personne {
    // public $prenom;
    // public $nom;

    private $prenom;
    private $nom;
    

    // public function coordonnees () {
    //     echo " Nom: $this->nom, Prenom: $this->prenom";
    // }

    function setNom ($n) {
        $this->nom = $n;
    }

    function setPrenom ($p) {
        $this->prenom = $p;
    }

    function getNom () {
       return $this->nom ;
    }

     function getPrenom () {
       return $this->prenom;
    }

    public function coordonnees(){
        return $this->prenom.' '.$this->nom;
    }
}
$p1= new Personne ();
// $p1->nom="ndiaye";
// $p1->prenom="cheikh";
// $p1->coordonnees();
$p1->setPrenom('cheikh2');
$p1->setNom('ndiaye2');
echo $p1->getPrenom()."<br>"; 
echo $p1->coordonnees();

