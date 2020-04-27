<?php

require 'autoload.php';

try {

    if(isset($_GET['action'])) {

        switch($_GET['action']) {

            case 'accueil':
                homeController::getHomepage();
                break;

            case 'a-propos':
                aProposController::getDescription();
                break;

            case 'parcours':
                parcoursController::getParcours();
                break;

            case 'creations':
                if(isset($_GET['categorie'])) {
                    creationsController::getCreations();
                }
                else {
                    header('Location: projets');
                }
                break;

            case 'page_creation':
                if(isset($_GET['id_projet'])) {
                    pageProjetController::getPageProjet();
                }
                else {
                    throw new Exception('Ce projet n\'existe pas');
                }
                break;

            case 'contact':
                if(isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['objet']) && isset($_POST['message'])) {

                    contactController::postMessage();
                }
                else {
                    contactController::afficherMessage();
                }
                break;

            default:
                throw new Exception('Cette page n\'existe pas');
                break;
        }
    }
    else { header('Location: accueil'); }
}

catch(Exception $erreur) {

    erreurController::afficheErreur($erreur->getMessage());

}