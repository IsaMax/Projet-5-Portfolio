<?php
ob_start();
?>

<div class="scroll">scroll 	&rarr;</div>
<div class="block-white av">

    <div class="bloc-competences">
    
        <?php
        foreach ($competences as $competence) {
            ?>
            <div class="logo <?php $competence['nom'] ?>">
                <img src="<?php $competence['icone'] ?>" width="50" alt="<?php $competence['alt'] ?>">
                <div class="progress">

                    <?php
                    for ($i = 0; $i < $competence['niveau']; $i++) {
                       echo'<span class="active"></span>';
                    }
                    for ($i ; $i < 5; $i++) {
                        echo'<span></span>';
                    }
                    ?>

                </div>
            </div>

            <?
        }
        ?>
    </div>

</div>


<h3>A propos</h3>
<div class="a-propos">

    <?php

        if(isset($descriptions)) {
            echo htmlspecialchars($descriptions['contenu']);
        }

    ?>

</div>

<?php

$mainContent = ob_get_clean();

$navbar1 = true;
$navbar2 = false;

$titlePage = 'Présentation de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
$cheminFichierCss = 'style.css';
$cheminFichierJs = 'apropos.js';

?>
