<?php

class projetsController {

    public static function afficherLesProjets() {

        $data = new projetsManager();

        $projets = $data->getProjets();
        $lesPhotos = $data->afficherToutesLesPhotos();
        $nomProjet = $data->returnNomProjet();
        $nomProjetDef =  str_replace(" ", "_", $nomProjet);

        require 'vue/dashboardView.php';
    }


    public static function majProjet() {

        $data = new projetsManager();

        $search = [' ', 'é', 'è', '\''];
        $remplacement = ['-','e','e','-'];
        $_POST['categorie'] = str_replace($search, $remplacement, $_POST['categorie']);
        $data->majProjet();

        if(isset($_FILES)) {

            $urlPhotos = self::traitementDesPhotos();

            foreach ($urlPhotos as $url) {
                $data->majPhotos($url);
            }
        }

    }

    public static function recupereLeProjet() {

        $data = new projetsManager();

        $unProjet = $data->afficherLeProjet();
        $lesPhotos = $data->afficherLesPhotos();

        require 'vue/projetsView.php';
    }


    public static function saveNewProjet() {

        $data = new projetsManager();

        $search = [' ', 'é', 'è', '\''];
        $remplacement = ['-','e','e','-'];
        $_POST['categorie'] = str_replace($search, $remplacement, $_POST['categorie']);

        $data->saveNewProjet();


        if(isset($_FILES)) {

            $urlPhotos = self::traitementDesPhotos();

            foreach ($urlPhotos as $url) {
                $data->saveNewPhotos($url);
            }
        }
    }


    public static function supprimerProjet() {

        $data = new projetsManager();

        $data->deleteProjet();
        $data->deletePhotos();

    }

    public static function supprimerPhoto() {

        $data = new projetsManager();

        $data->deletePhoto();

    }

    public static function compterLesProjets() {

        $data = new projetsManager();

        $nombreProjet = $data->compterProjets();
        
    }

    private static function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);


        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }



    private static function traitementDesPhotos() {

        //On vérifie si il n'y a pas eu d'erreur
        $cheminArray = array();

        $file_ary = self::reArrayFiles($_FILES['image']);


        foreach ($file_ary as $file) {


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