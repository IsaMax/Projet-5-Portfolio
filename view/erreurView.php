<?php
ob_start();
?>

    <div class="messageErreur">Erreur <span class="erreur404">404</span> ! <br><?= $erreurAAfficher; ?> :(</div>


<?php

$mainContent = ob_get_clean();

$navbar1 = false;
$navbar2 = true;

$titlePage = 'Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
$cheminFichierCss = 'style.css';
$classDuBody = 'erreurVue';
require 'template.php';
?>