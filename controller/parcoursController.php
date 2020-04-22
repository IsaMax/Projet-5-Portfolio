<?php

class parcoursController {

    public static function getParcours() {

        $homeData = new parcoursManager();

        $evenements = $homeData->getEvenements();

        require 'view/parcoursView.php';
    }
}