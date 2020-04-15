<?php

class descriptionController {

    public static function editerDescription() {

        $data = new descriptionManager();

        $desc = $data->getDescription();
        
        $nombre = $data->countDescription();

        require 'vue/descriptionView.php';
    }

    public static function enregistrerDescription() {

        $data = new descriptionManager();

        if(isset($_GET['etat'])) {

            if($_GET['etat'] == 'update') {
                $data->updateDescription();
            }
            elseif ($_GET['etat'] == 'insert') {
                $data->insertDescription();
            }
            else {
                throw new Exception('Impossible d\'effectuer cette action');
            }
        }
    }
    
}