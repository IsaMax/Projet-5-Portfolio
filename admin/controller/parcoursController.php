<?php

class parcoursController {

    public static function afficherLesParcours() {

        $data = new parcoursManager();

        $parcours = $data->getParcours();

        require 'vue/parcoursView.php';
    }

    public static function majParcours() {

        $data = new parcoursManager();

        if(isset($_POST['iconeJobMaj'])) {

            if(isset($_POST['iconeEtudeMaj'])) {
                $data->majParcours(1, 1);
            }
            else {
                $data->majParcours(1,0);
            }

        } elseif (isset($_POST['iconeEtudeMaj'])) {

            if(isset($_POST['iconeJobMaj'])) {
                $data->majParcours(1, 1);
            }
            else {
                $data->majParcours(0,1);
            }
        }

    }

    public static function recupereLeParcours() {

        $data = new parcoursManager();

        $unParcours = $data->afficherLeParcours();

        require 'vue/parcoursSeulView.php';
    }

    public static function saveNewParcours() {

        $data = new parcoursManager();

        if(isset($_POST['iconeJob'])) {

            if(isset($_POST['iconeEtude'])) {
                $data->saveNewParcours(1, 1);
            }
            else {
                $data->saveNewParcours(1,0);
            }

        } elseif (isset($_POST['iconeEtude'])) {
          
            if(isset($_POST['iconeJob'])) {
                $data->saveNewParcours(1, 1);
            }
            else {
                $data->saveNewParcours(0,1);
            }
        }
    }

    public static function supprimerParcours() {

        $data = new parcoursManager();

        $data->deleteParcours();
    }
}