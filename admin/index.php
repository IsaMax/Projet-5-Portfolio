<?php

require 'autoload.php';
require 'autoCo.php';

try {

    if (isset($_SESSION['email']) AND isset($_SESSION['id'])) {

        switch ($_GET['action']) {

            case 'dashboard':
                projetsController::afficherLesProjets();
                messageController::compterMessage();
                projetsController::compterLesProjets();
                parcoursController::compterParcours();
                break;

            case 'description':

                if (isset($_GET['save'])) {

                    if ($_GET['save'] == 'ok') {
                        descriptionController::enregistrerDescription();

                        header('Location: dashboard');
                    } else {
                        throw new Exception('Votre formulaire n\'a pas été sauvegardé');
                    }
                } else {
                    descriptionController::editerDescription();
                }

                break;

            case 'parcours':

                if (isset($_POST['bodyParcours']) && isset($_POST['sous_titre']) && isset($_POST['annee']) && isset($_POST['titre']) && empty($_GET['maj'])) {


                    parcoursController::saveNewParcours();
                    header('Location: parcours');

                } elseif (isset($_GET['modifier'])) {

                    if ($_GET['modifier'] == 'true') {
                        if (isset($_GET['id_parcours'])) {

                            $_GET['id_parcours'] = (int)$_GET['id_parcours'];

                            if ($_GET['id_parcours'] > 0) {
                                
                                parcoursController::recupereLeParcours();
                            } else {
                                throw new Exception('erreur: ce parcours n\'est pas reconnu');
                            }
                        } else {
                            throw new Exception('erreur: Aucune informations à afficher');
                        }
                    } else {
                        header('Location: parcours');
                    }
                } elseif (isset($_GET['maj'])) {
                    if ($_GET['maj'] == 'true') {
                        if (isset($_GET['id_parcours']) && !empty($_GET['id_parcours'])) {
                            $_GET['id_parcours'] = (int)$_GET['id_parcours'];

                            if ($_GET['id_parcours'] > 0) {
                                parcoursController::majParcours();
                                header('Location: parcours');
                            } else {
                                throw new Exception('erreur: ce parcours n\'est pas reconnu');
                            }
                        } else {
                            throw new Exception('erreur: Aucune informations à mettre à jour');
                        }
                    }
                } elseif (isset($_GET['supprimer'])) {
                    if ($_GET['supprimer'] == 'true') {

                        if (isset($_GET['id_parcours']) && !empty($_GET['id_parcours'])) {
                            $_GET['id_parcours'] = (int)$_GET['id_parcours'];

                            if ($_GET['id_parcours'] > 0) {
                                parcoursController::supprimerParcours();
                                header('Location: parcours');
                            } else {
                                throw new Exception('erreur: ce parcours n\'est pas reconnu');
                            }
                        } else {
                            throw new Exception('erreur: Aucune informations à supprimer');
                        }
                    }
                } else {
                    parcoursController::afficherLesParcours();
                }

                break;

            case 'projets':

                if (isset($_POST['bodyNouveauProjet']) && isset($_POST['nom']) && isset($_POST['url']) && isset($_GET['nom_projet']) && empty($_GET['maj'])) {

                        projetsController::saveNewProjet();
                        header('Location: dashboard');

                } elseif (isset($_GET['supprimerPhoto']) && isset($_GET['id_photo'])) {

                    $_GET['id_photo'] = (int)$_GET['id_photo'];

                    if ($_GET['supprimerPhoto'] == 'true' && $_GET['id_photo'] > 0) {

                        projetsController::supprimerPhoto();
                        header('Location: dashboard');
                    }
                } elseif (isset($_GET['modifier'])) {

                    if ($_GET['modifier'] == 'true') {

                        if (isset($_GET['id_projets'])) {

                            $_GET['id_projets'] = (int) $_GET['id_projets'];

                            if ($_GET['id_projets'] > 0) {

                                projetsController::recupereLeProjet();

                            } else {
                                throw new Exception('erreur: ce parcours n\'est pas reconnu');
                            }
                        } else {
                            throw new Exception('erreur: Aucune informations à afficher');
                        }
                    } else {
                        header('Location: dashboard');
                    }
                } elseif (isset($_GET['maj'])) {

                    if ($_GET['maj'] == 'true') {

                        if (isset($_GET['id_projets']) && !empty($_GET['id_projets']) && isset($_GET['nom_projet']) && !empty($_GET['nom_projet'])) {

                            $_GET['id_projets'] = (int)$_GET['id_projets'];

                            if ($_GET['id_projets'] > 0) {

                                projetsController::majProjet();
                                header('Location: dashboard');
                            } else {
                                throw new Exception('erreur: ce projet n\'est pas reconnu');
                            }
                        } else {
                            throw new Exception('erreur: Aucune informations à mettre à jour');
                        }
                    }
                } elseif (isset($_GET['supprimer'])) {

                    if ($_GET['supprimer'] == 'true') {

                        if (isset($_GET['id_projets']) && !empty($_GET['id_projets']) && isset($_GET['nom_projet'])) {

                            $_GET['id_projets'] = (int)$_GET['id_projets'];

                            if ($_GET['id_projets'] > 0) {

                                projetsController::supprimerProjet();

                                header('Location: dashboard');
                            } else {
                                throw new Exception('erreur: ce projet n\'est pas reconnu');
                            }
                        } else {
                            throw new Exception('erreur: Aucune informations à supprimer');
                        }
                    }
                }
            else {
                projetsController::afficherLesProjets();
            }
                break;

            case 'messages':

                if (isset($_GET['supprimer']) && $_GET['supprimer'] == 'true') {

                    if (isset($_GET['id_message'])) {
                        $_GET['id_message'] = (int)$_GET['id_message'];

                        if ($_GET['id_message'] > 0) {
                            messageController::supprimerMessage();
                            header('Location: dashboard');
                        } else {
                            throw new Exception('erreur: ce message n\'est pas reconnu');
                        }
                    } else {
                        throw new Exception('erreur: Aucun message à supprimer');
                    }
                } else {
                    messageController::afficherLesMessages();
                }

                break;

            case 'deconnecter':

                require 'deconnexion.php';
                break;


            default:
                header('Location: dashboard');
                break;
        }
    } else {

        switch ($_GET['auth']) {

            case 'connexion':

                authentificationController::connexion();
                break;
            case 'inscription':

                authentificationController::inscription();
                break;
            default:
                header('Location: se-connecter');
                break;
        }
    }
}
catch(Exception $erreur) {

    $messageErreur = $erreur->getMessage();

    echo $messageErreur;
   // require 'vue/erreurView.php';

    /*  header('Location: index.php?action=erreur&erreur='.$erreur->getMessage());*/
}
