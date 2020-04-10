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
                    <a href="#<?= htmlspecialchars($evenement['annee']) ?>" class="<?php if($i == 0) { echo 'active'; } ?>" data-annee="annee<?= htmlspecialchars($evenement['annee']) ?>"><?= htmlspecialchars($evenement['annee']) ?></a>
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

                <?php
                    if($evenement['icone_couverture'] == 'etude') {
                        echo '<i class="material-icons">school</i>';
                    }
                    elseif ($evenement['icone_couverture'] == 'job') {
                        echo '<i class="material-icons">business_center</i>';
                    }
                    else {
                        echo ' <i class="material-icons">school</i>
                               <i class="material-icons">business_center</i>';
                    }
                ?>

            </div>
            <div class="content">
                <?= htmlspecialchars($evenement['body']); ?>
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
?>
