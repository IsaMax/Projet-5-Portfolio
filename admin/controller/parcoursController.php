<?php

class descriptionController {

    public static function afficherLesParcours() {

        $data = new parcoursManager();

        $parcours = $data->getParcours();

        require './vue/parcoursView.php';
    }

    public static function majParcours() {

        $data = new descriptionManager();

        $data->majParcours();

        require './vue/parcoursView.php';
    }

    public static function recupereLeParcours() {

        $data = new descriptionManager();

        $unParcours = $data->afficherLeParcours();

        require './vue/parcoursSeulView.php';
    }

    public static function saveNewParcours() {

        $data = new descriptionManager();

        $data->saveNewParcours();

        require './vue/parcoursView.php';
    }

    public static function supprimerParcours() {

        $data = new descriptionManager();

        $data->deleteParcours();

        require './vue/parcoursView.php';
    }



}