<?php

require 'autoload.php';
require 'autoCo.php';

if(isset($_SESSION['email']) AND isset($_SESSION['id'])) {

    switch($_GET['action']) {

        case 'accueil':

            dashboardController::afficherDashboard();
            break;

        case 'description':

            if(isset($_GET['save'])) {

                if($_GET['save'] == 'ok') {
                    descriptionController::enregistrerDescription();

                    header('Location: ./admin/index.php');
                }
                else {
                    throw new Exception('Votre formulaire n\'a pas été sauvegardé');
                }
            }
            else {
                descriptionController::editerDescription();
            }

            break;

        case 'parcours':

            if(isset($_POST['bodyParcours']) && isset($_POST['sous_titre']) && isset($_POST['annee']) && isset($_POST['titre']) ) {

                parcoursController::saveNewParcours();
            }

            elseif(isset($_GET['modifier'])) {
                if($_GET['modifier'] == 'true') {
                    if(isset($_GET['id_parcours'])) {

                        $_GET['id_parcours'] = (int) $_GET['id_parcours'];

                        if($_GET['id_parcours'] > 0) {
                            parcoursController::recupereLeParcours();
                        }
                        else {
                            throw new Exception('erreur: ce parcours n\'est pas reconnu');
                        }
                    }
                    else {
                        throw new Exception('erreur: Aucune informations à afficher');
                    }
                }
                else {
                    header('Location: ./projet5/admin/index.php?action=parcours');
                }
            }

            elseif(isset($_GET['maj'])) {
                if($_GET['maj'] == 'true') {
                    if(isset($_GET['id_parcours']) && !empty($_GET['id_parcours'])) {
                        $_GET['id_parcours'] = (int) $_GET['id_parcours'];

                        if($_GET['id_parcours'] > 0) {
                            parcoursController::majParcours();
                        }
                        else {
                            throw new Exception('erreur: ce parcours n\'est pas reconnu');
                        }
                    }
                    else {
                        throw new Exception('erreur: Aucune informations à mettre à jour');
                    }
                }
            }

            elseif (isset($_GET['supprimer'])){
                if($_GET['supprimer'] == 'true') {

                    if(isset($_GET['id_parcours']) && !empty($_GET['id_parcours'])) {
                        $_GET['id_parcours'] = (int)$_GET['id_parcours'];

                        if($_GET['id_parcours'] > 0) {
                            parcoursController::supprimerParcours();
                        }
                        else {
                            throw new Exception('erreur: ce parcours n\'est pas reconnu');
                        }
                    }
                    else {
                        throw new Exception('erreur: Aucune informations à supprimer');
                    }
                }
            }

            else {
                parcoursController::afficherLesParcours();
            }

            break;


        case 'deconnecter':

            require 'deconnexion.php';
            break;

        case 'projets':

            if(isset($_POST['bodyNouveauProjet']) && isset($_POST['nom'])) {

                projetsController::saveNewProjet();
            }

            elseif(isset($_GET['supprimerPhoto']) && isset($_GET['id_photo'])) {
                $_GET['id_photo'] = (int) $_GET['id_photo'];

                if($_GET['supprimerPhoto'] == 'true' && $_GET['id_photo'] > 0) {
                    projetsController::supprimerPhoto();
                }
            }

            elseif(isset($_GET['modifier'])) {
                if($_GET['modifier'] == 'true') {
                    if(isset($_GET['id_projets'])) {

                        $_GET['id_projets'] = (int) $_GET['id_projets'];

                        if($_GET['id_projets'] > 0) {
                            projetsController::recupereLeProjet();
                        }
                        else {
                            throw new Exception('erreur: ce parcours n\'est pas reconnu');
                        }
                    }
                    else {
                        throw new Exception('erreur: Aucune informations à afficher');
                    }
                }
                else {
                    header('Location: ./projet5/admin/index.php?action=projets');
                }
            }

            elseif(isset($_GET['maj'])) {
                if($_GET['maj'] == 'true') {
                    if(isset($_GET['id_projets']) && !empty($_GET['id_projets'])) {
                        $_GET['id_projets'] = (int) $_GET['id_projets'];

                        if($_GET['id_projets'] > 0) {

                            if(isset($_FILES)) {
                                projetsController::majPhotos();
                            }
                            projetsController::majProjet();
                        }
                        else {
                            throw new Exception('erreur: ce projet n\'est pas reconnu');
                        }
                    }
                    else {
                        throw new Exception('erreur: Aucune informations à mettre à jour');
                    }
                }
            }

            elseif (isset($_GET['supprimer'])){
                if($_GET['supprimer'] == 'true') {

                    if(isset($_GET['id_projets']) && !empty($_GET['id_projets'])) {
                        $_GET['id_projets'] = (int)$_GET['id_projets'];

                        if($_GET['id_projets'] > 0) {
                            projetsController::supprimerProjet();
                        }
                        else {
                            throw new Exception('erreur: ce projet n\'est pas reconnu');
                        }
                    }
                    else {
                        throw new Exception('erreur: Aucune informations à supprimer');
                    }
                }
            }

            else {
                projetsController::afficherLesProjets();
            }
            break;

        default:
            header('Location: accueil');
            break;
    }
}

else  {

    switch($_GET['auth']) {

        case 'connexion':
            require 'controller/authentificationController.php';
            $co = new authentificationController;

            $co->connexion();
            break;
        case 'inscription':

            AuthentificationController::inscription();
            break;
        default:
            header('Location: se-connecter');
            break;
    }
}
