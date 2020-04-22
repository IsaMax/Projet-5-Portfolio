<?php
ob_start();
?>

<div class="container-parcours">

    <div class="container-annees">
        <ul>
            <?php

            $i = 0;

            foreach ($evenements as $evenement) {

                ?>

                <li>
                    <a href="#<?= htmlspecialchars($evenement['annee']) ?>" class="<?php if($i == 0) { echo 'active'; } if($i == 1) { echo 'suivant'; } ?>" data-annee="annee<?= htmlspecialchars($evenement['annee']) ?>"><?= htmlspecialchars($evenement['annee']) ?></a>
                </li>

                <?php
                $i++;
            }
            ?>

        </ul>
    </div>

    <div class="bloc-desc">

        <?php

        $i = 0;

        foreach ($evenements as $evenement) {

        ?>

        <div id="annee<?= htmlspecialchars($evenement['annee']) ?>" class="container-desc <?php if($i == 0) { echo 'active'; } ?>">
            <div class="couverture">

                <div class="div--material-icones">

                    <?php
                        if($evenement['iconeEtude'] == 1) {
                            echo '<i class="material-icons">school</i>';

                            if ($evenement['iconeJob'] == 1) {
                                echo '<i class="icone-marge-droite"></i>';
                            }
                        }

                        if ($evenement['iconeJob'] == 1) {
                            echo '<i class="material-icons">business_center</i>';
                        }
                    ?>
                </div>
                <h2><?= $evenement['titre'] ?></h2>
                <h3><?= $evenement['sous_titre'] ?></h3>
            </div>
            <div class="content">
                <?= $evenement['body']; ?>
            </div>
        </div>

            <?php
            $i++;
        }
        ?>
    </div>

</div>

<?php
$mainContent = ob_get_clean();

$navbar1 = false;
$navbar2 = true;

$titlePage = 'Parcours scolaire et professionnel de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
$cheminFichierCss = 'parcours.css';
$cheminFichierJs = 'parcours.js';
$classDuBody = 'body--parcours';

require 'template.php';
?>
