<?php
class Voiture {
    // public $marque;
    // public $modele;
    // public int $annee;
    // public int $vitesse;
    private $marque;
    private $modele;
    private $annee;
    private $vitesse;

     function setmarque ($ma) {
        $this->marque = $ma;
    }

     function getmarque ($ma) {
       return $this->marque = $ma;
    }

    function setmodele ($mo) {
        $this->modele = $mo;
    }
    function setmodele ($mo) {
        return $this->modele = $mo;
    }





    // public function __construct ($mr,$mo,$an){
    //     $this->marque = $mr;
    //     $this->modele = $mo;
    //     $this->annee = $an;
    //     $this->vitesse = 0;
    // }

    public function accelerer($valeur){
        return $vitesse += $valeur;
    }

    public function freiner($valeur){
        if ($vitesse>=1){
            return $vitesse -= $valeur;
        }else{
            echo"impossible";
        }
        
    }    

    public function afficher() {
        echo "Voici une '.$this->marque.' '.$this->modele.' '.$this->annee.'.";
    }    

    }


$v = new Voiture('Ford','Fusion',2012);
$v2 = new Voiture('Toyota','Corolla',2020);
echo $v->afficher();
echo $v2->afficher();

// les methodes et proprietes static nont pas besoin detre instacier pour etre utiliser