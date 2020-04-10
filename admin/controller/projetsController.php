<?php

class descriptionController {

    public static function afficherLesProjets() {

        $data = new projetsManager();

        $projets = $data->getProjets();

        require './vue/dashboardView.php';
    }

    public static function majProjet() {

        $data = new projetsManager();

        $data->majProjet();

        $urlPhotos = self::traitementDesPhotos();

        foreach ($urlPhotos as $url) {
            $data->majPhotos($url);
        }

        require './vue/projetsView.php';
    }

    public static function recupereLeProjet() {

        $data = new projetsManager();

        $unProjet = $data->afficherLeProjet();

        require './vue/projetsView.php';
    }

    public static function saveNewProjet() {

        $data = new projetsManager();

        $data->saveNewProjet();

        $urlPhotos = self::traitementDesPhotos();

        foreach ($urlPhotos as $url) {
            $data->saveNewPhotos($url);
        }

        require './vue/dashboardView.php';
    }

    public static function supprimerProjet() {

        $data = new projetsManager();

        $data->deleteProjet();
        $data->deletePhotos();

        require './vue/dashboardView.php';
    }

    public static function supprimerPhoto() {

        $data = new projetsManager();

        $data->deletePhoto();

        require './vue/dashboardView.php';
    }


    private static function traitementDesPhotos() {

        //On vérifie si il n'y a pas eu d'erreur
        $cheminArray = array();

        foreach ($files as $file => $infos) {

            if($file['error'] == 0) {

                //On vérifie si la taille du fichier ne dépasse pas 1Mo
                if($file['size'] < 1000000) {

                    $extensionFichier = pathinfo($file['name']);

                    $extensionFichier = $extensionFichier['extension'];

                    $extensionsAutorisees = ['jpg', 'jpeg', 'png'];

                    //on vérifie qu'on a bien les extensions demandées et on envoie
                    if(in_array($extensionFichier, $extensionsAutorisees)) {

                        $cheminFichier = 'assets/img/uploads/'.$file['name'];

                        move_uploaded_file($file['tmp_name'], $cheminFichier);

                        array_push($cheminArray, $cheminFichier);
                    }
                }
            }
        }
        return $cheminArray;
    }
    
}