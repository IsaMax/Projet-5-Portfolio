<?php

class pageProjetController {

    public static function getPageProjet() {

        $data = new pageProjetManager();

        $page = $data->getPage();

        $photos = $data->getPhotos();

        require 'view/pageProjetView.php';
    }
}