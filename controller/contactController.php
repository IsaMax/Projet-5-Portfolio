<?php

class contactController {

    public static function afficherMessage() {

        require 'view/contactView.php';
    }


    public static function postMessage() {

        $data = new contactManager();

        $success = $data->postMessage();

        require 'view/contactView.php';
    }
}