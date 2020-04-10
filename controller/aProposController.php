<?php

class homeController {

    public static function getDescription() {

        $homeData = new aProposManager();

        $descriptions = $homeData->getDescription();
        $competences = $homeData->getCompetences();

        require 'view/aProposView.php';
    }
}