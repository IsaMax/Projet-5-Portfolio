<?php
ob_start();

?>

<div class="container-projet">

    <h1><?= $page[0]['nom']; ?></h1>

    <div class="cp--body">

        <div class="hover--img">
             <img src="./admin/<?= $page[0]['url_photo']; ?>" alt="<?= $elt['nom']; ?>" />
        </div>
        <div class="cp--desc">
            <?= $page[0]['description']; ?>

            <div class="show-lien">
                <a href="<?= $page[0]['url']; ?>" target="_blank">Voir le site</a>
            </div>

        </div>

    </div>

<!--    <a href="projets---><?//= $_GET['categorie']; ?><!--">Retour</a>-->
</div>


<?php
$mainContent = ob_get_clean();

$navbar1 = false;
$navbar2 = true;

$titlePage = 'Projets professionnels et scolaires de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
$cheminFichierCss = 'portfolios.css';
$cheminFichierJs = 'page_projet.js';
require 'template.php';
?>
