<?php
ob_start();
?>

<section class="container-portfolio">
    <nav class="position-portfolio">

        <ul>
            <?php

            $i = 1;

            foreach ($creations as $creation) {

            ?>

            <li class="sub-elt">
                <a href="" data-nombre= '<?= htmlspecialchars($creation['id']); ?>'>
                    <span class="nombre"> <?php if($i > 9) { echo $i; } else { echo '0'.$i; } ?></span>
                    <span class="texte-fin"><?= htmlspecialchars($creation['nom']); ?></span>
                </a>
            </li>

            <?php
                $i++;
            }
            ?>
        </ul>

    </nav>


    <section class="bloc-central">

        <div class="bloc-mvt">

            <?php
                foreach ($creations as $creation) {

                    ?>

                    <a class="a--portfolio" href="projets-<?= htmlspecialchars($creation['categorie']); ?>-<?= htmlspecialchars($creation['nom_projet_encode']); ?>-<?= htmlspecialchars($creation['id_projet']); ?>" id="<?= htmlspecialchars($creation['id']); ?>" data-id="<?= htmlspecialchars($creation['id']); ?>" data-nom-projet="<?= htmlspecialchars($creation['nom_projet_encode']); ?>"
                        <?php if($creation['id'] == 26 || $creation['id'] == 44 ) { echo 'style=" margin-bottom: 11rem !important"'; } ?>>
                        <div class="portfolio">
                            <div class="img-transparente" style="background-image:url(./admin/<?= htmlspecialchars($creation['url_photo']); ?>)"></div>
                            <h2><?= htmlspecialchars($creation['nom']); ?></h2>
<!--                            <h3>--><?//= $creation['description']; ?><!--</h3>-->
                            <div class="categorie"><span>Intégration responsive</span>
                                <span><?= htmlspecialchars($creation['categorie']); ?></span></div>
                        </div>
                    </a>

                    <?php
                }
            ?>
        </div>

    </section>

    <div class="container-filtres">
        <span>Filtres</span>
        <div class="filtres">
            <ul>
                <li>
                    <a href="projets-all" data-categorie="all">Tous</a>
                </li>

                <?php
                foreach ($filtres as $filtre) {

                    ?>

                    <li>
                        <a href="projets-<?= htmlspecialchars($filtre['categorie']); ?>" data-categorie="<?= htmlspecialchars($filtre['categorie']); ?>"><?= str_replace('-',' ', htmlspecialchars($filtre['categorie'])); ?></a>
                    </li>

                    <?php
                }
                ?>
            </ul>
        </div>
    </div>


</section>

<?php

    $mainContent = ob_get_clean();

    $navbar1 = false;
    $navbar2 = true;

    $titlePage = 'Projets professionnels et scolaires de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
    $cheminFichierCss = 'portfolios.css';
    $cheminFichierJs = 'portfolios.js';


require 'template.php';

?>
