<?php

// Pour commit: commit mokoy save sama mac push diokh ko git
// git add .
// git commit -m "linga modifier" git commit -m "class client" 
// git push

interface Authentifiable {
    public function seconnecter();
}

interface Affichable {
    public function afficher();
}

class Personne {
    private $id;
    private $nom;
    private $email;

    public function __construct($id, $nom, $email) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
    }

    public function getId() { 
        return $this->id; 
    
    }
    public function getNom() { 
        return $this->nom; 
    }
    public function getEmail() { 
        return $this->email; 
    }

    public function setId($id) { 
        $this->id = $id; 
    }
    public function setNom($nom) { 
        $this->nom = $nom; 
    }
    public function setEmail($email) { 
        $this->email = $email; 
    }

    public function afficherInfos() {
        echo "ID: " . $this->id . "  Nom: " . $this->nom . "  Email: " . $this->email . "\n";
    }
}

abstract class Utilisateur extends Personne implements Authentifiable, Affichable {
    private $login;
    private $motDePasse;
    private static $nombreUtilisateurs = 0;

    public function __construct($id, $nom, $email, $login, $motDePasse) {
        parent::__construct($id, $nom, $email);
        $this->login = $login;
        $this->motDePasse = $motDePasse;
        self::$nombreUtilisateurs++;
    }

    public function getLogin() { 
        return $this->login; 
    }
    public function getMotDePasse() { 
        return $this->motDePasse; 
    }

    public function setLogin($login) { 
        $this->login = $login; 
    }
    public function setMotDePasse($motDePasse) { 
        $this->motDePasse = $motDePasse; 
    }

    public function seConnecter() {
        echo "Utilisateur " . $this->getLogin() . " connecté.\n";
    }

    public static function afficherNombre() {
        echo "Nombre d'utilisateurs : " . self::$nombreUtilisateurs . "\n";
    }

    abstract public function afficherRole();
}


class Client extends Utilisateur {
    const TAUX_SIMPLE = 0.05;
    const TAUX_PREMIUM = 0.15;

    private $typeClient;

    public function __construct($id, $nom, $email, $login, $motDePasse, $typeClient) {
        parent::__construct($id, $nom, $email, $login, $motDePasse);
        $this->typeClient = $typeClient;
    }

    public function getTypeClient() { 
        return $this->typeClient; 
    }

    public function setTypeClient($typeClient) { 
        $this->typeClient = $typeClient; 
    }

    public function calculerReduction($montant) {
        $taux = ($this->typeClient === 'premium') ? self::TAUX_PREMIUM : self::TAUX_SIMPLE;
        return $montant * $taux;
    }

    public function afficherInfos() {
        parent::afficherInfos();
        echo "Type client: " . $this->typeClient . "\n";
    }

    public function afficherRole() {
        echo "Rôle : Client\n";
    }

    public function afficher() {
        $this->afficherInfos();
        $this->afficherRole();
    }
}
