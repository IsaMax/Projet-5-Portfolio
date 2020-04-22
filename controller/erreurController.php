<?php

class erreurController {

    public static function afficheErreur($erreur) {

        $erreurAAfficher = $erreur;

        require 'view/erreurView.php';
    }

}