<?php

class homeController {

    public static function getParcours() {

        $homeData = new parcoursManager();

        $evenements = $homeData->getEvenements();

        require 'view/parcoursView.php';
    }
}