<?php

// Pour commit: commit mokoy save sama mac push diokh ko git
// git add .
// git commit -m "linga modifier" git commit -m "class Administrateur" 
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
        echo "ID: " . $this->id ."<br>". " Nom: " . $this->nom ."<br>". "  Email: " . $this->email . "<br>";
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
        echo "Utilisateur " . $this->getLogin() . " connecté.<br>";
    }

    public static function afficherNombre() {
        echo "Nombre d'utilisateurs : " . self::$nombreUtilisateurs . "<br>";
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
        echo "Type client: " . $this->typeClient . "<br>";
    }

    public function afficherRole() {
        echo "Rôle : Client<br>";
    }

    public function afficher() {
        $this->afficherInfos();
        $this->afficherRole();
    }
}

class Employe extends Utilisateur {
    private $salaire;

    public function __construct($id, $nom, $email, $login, $motDePasse, $salaire) {
        parent::__construct($id, $nom, $email, $login, $motDePasse);
        $this->salaire = $salaire;
    }

    public function getSalaire() { 
        return $this->salaire; 
    }

    public function setSalaire($salaire) { 
        $this->salaire = $salaire; 
    }

    public function calculerSalaireAnnuel() {
        return $this->salaire * 12;
    }

    public function afficherRole() {
        echo "Rôle : Employé<br>";
    }

    public function afficher() {
        $this->afficherInfos();
        $this->afficherRole();
    }
}


class Administrateur extends Utilisateur {
    public function __construct($id, $nom, $email, $login, $motDePasse) {
        parent::__construct($id, $nom, $email, $login, $motDePasse);
    }

    public function supprimerUtilisateur(Utilisateur $u) {
        echo "Utilisateur " . $u->getNom() . " supprimé par l'administrateur.<br>";
    }

    public function afficherRole() {
        echo "Rôle : Administrateur<br>";
    }

    public function afficher() {
        $this->afficherInfos();
        $this->afficherRole();
    }
}

function afficherUtilisateur(Affichable $u) {
    $u->afficher();
}

$client = new Client(1, "Omar khaissa", "khaissa@mail.com", "Omar", "pass123", "premium");
$employe = new Employe(2, "Damdam Ndong", "damdam@mail.com", "Damdam", "pass456", 350000);
$admin = new Administrateur(3, "Omzo Dollard", "zodollard@mail.com", "clara", "admin789");

echo "=== Affichage Client ===<br>";
afficherUtilisateur($client);

echo "<br>=== Affichage Employé ===<br>";
afficherUtilisateur($employe);

echo "<br>=== Affichage Administrateur ===<br>";
afficherUtilisateur($admin);

echo "<br>=== Connexions ===<br>";
$client->seConnecter();
$employe->seConnecter();
$admin->seConnecter();

echo "<br>=== Réduction Client ===<br>";
$montant = 100000;
$reduction = $client->calculerReduction($montant);
echo "Réduction sur $montant FCFA : $reduction FCFA\n";

echo "<br>=== Salaire Annuel Employé ===<br>";
$annuel = $employe->calculerSalaireAnnuel();
echo "Salaire annuel : $annuel FCFA\n";

echo "<br>=== Suppression par Admin ===<br>";
$admin->supprimerUtilisateur($client);

echo "<br>=== Nombre d'utilisateurs ===<br>";
Utilisateur::afficherNombre();