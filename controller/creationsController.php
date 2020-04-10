<?php

class creationsController {

    public static function getCreations() {

        $data = new creationsManager();
        
        $creations = $data->getCreations();

        $filtres = $data->getFiltres();

        require 'view/portfolioView.php';
    }
}