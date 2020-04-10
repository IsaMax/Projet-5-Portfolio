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
                    <span class="nombre">0<?= $i; ?></span>
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

                    <a href="projet5/index.php?action=page_creation&amp;id_projet=<?= htmlspecialchars($filtre['id']); ?>" id="0<?= htmlspecialchars($creation['id']); ?>" data-id="<?= htmlspecialchars($filtre['id']); ?>">
                        <div class="portfolio">
                            <img src="<?= htmlspecialchars($creation['photo']); ?>">
                            <h2><?= htmlspecialchars($creation['nom']); ?></h2>
                            <h3><?= htmlspecialchars($creation['description']); ?></h3>
                            <div class="categorie"><span>Intégration responsive</span>
                                <span><?= htmlspecialchars($creation['categorie']); ?>/span></div>
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
                    <a href="">Tous</a>
                </li>

                <?php
                foreach ($filtres as $filtre) {
                    ?>

                    <li>
                        <a href="/projet5/index.php?action=creations&amp;categorie=<?= htmlspecialchars($filtre['categorie']); ?>" data-categorie="<?= htmlspecialchars($filtre['categorie']); ?>"><?= htmlspecialchars($filtre['categorie']); ?></a>
                    </li>

                    <?php
                }
                ?>
            </ul>
        </div>
    </div>


</section>

<?php

if($_GET['categorie'] == 'all') {
    $mainContent = ob_get_clean();

    $navbar1 = false;
    $navbar2 = true;

    $titlePage = 'Projets professionnels et scolaires de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
    $cheminFichierCss = 'portfolios.css';
    $cheminFichierJs = 'portfolios.js';
}

?>
