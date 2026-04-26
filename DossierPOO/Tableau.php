<?php
class Tableau {

    public $entier;

    public static function remplir ($n) {
        $entier = [];
        for ($i = 0; $i < $n; $i++){
            $entier[] = rand(1,100);
        }
        return $entier;

    }

    public static function trier ($tab) {
        sort ($entier);
        return $entier;
    }

    public static function afficher ($tab) {
        foreach ($entier as $element){
            echo $element.' ';
        }

    }

}

$n = 5;
$tabnontrier = Tableau::remplir($n);
echo "Tableau non trié: ";
Tableau::affciher($entier);
echo "<br>"
$tabtrier = Tableau::trier($entier);
echo "Tableau trié: ";
Tableau::affciher($entier);
