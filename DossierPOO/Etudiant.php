<?php
class Etudiant {
    public $prenom;
    public $nom;
    public $formation;

    public function __construct ($n,$p,$f){
        $this->nom=$n;
        $this->prenom=$p;
        $this->formation=$f;

    }

    public function afficher(){
        return $this->nom.' '. $this->prenom.' suit la formation '.$this->formation;
    }

    public function __destruct(){
        echo'fin de traitement...';
    }
}

$e= new Etudiant ('cheikh','diop','IAGE');  
echo $e-> afficher();