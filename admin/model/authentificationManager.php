<?php

class AuthentificationManager extends Manager {

    public function verificationEmail() {
        $nbrEmail = 0;
        $ve = $this->dbConnect();

        $nbrEmail = $ve->prepare('SELECT COUNT(email) AS nbrEmail
                         FROM utilisateur 
                         WHERE email = ? ');

        $nbrEmail->execute([$_POST['email']]);

        return $nbrEmail->fetchAll();
    }

    public function insererDonneesInscr($mdpCrypte) {
        $id = $this->dbConnect();

        $idr = $id->prepare('INSERT INTO utilisateur(email,password)
                         VALUES(:email,:mdp)');


        $idr->execute([ ":email" => $_POST['email'],
            ":mdp"   => $mdpCrypte]);

    }

    public function getEmail() {
        $ge = $this->dbConnect();

        $ger = $ge->query('SELECT email FROM utilisateur');
        return $ger->fetchAll();
    }

    public function getMdp() {
        $gm = $this->dbConnect();

        $gmr = $gm->query('SELECT password FROM utilisateur');
        return $gmr->fetchAll();
    }

    public function getId() {
        $gi = $this->dbConnect();

        $gir = $gi->prepare('SELECT id FROM utilisateur WHERE email= ?');
        $gir->execute([$_POST['mailco']]);

        return $gir->fetch();
    }
}