<?php

class pageProjetController {

    public static function getPageProjet() {

        $data = new pageProjetManager();

        $page = $data->getPage();

        require 'view/pageProjetView.php';
    }
}