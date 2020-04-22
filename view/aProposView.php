<?php
ob_start();
?>
<div class="menu-temp"></div>

<section class="section-intro">
<div class="scroll">scroll 	&rarr;</div>
<div class="block-white av">

    <div class="bloc-competences">


        <div class="logo adobe">
            <img src="assets/img/icon/adobe.jpg" width="50" alt="logo suite Adobe">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>


        <div class="logo css">
            <img src="assets/img/icon/css3.jpg" width="50" alt="logo CSS3">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
            </div>
        </div>

        <div class="logo js">
            <img src="assets/img/icon/js.jpg" width="50" alt="logo Javascript">
            <div class="progress">
                <span class="active" class="active"></span>
                <span class="active" class="active"></span>
                <span class="active" class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>


        <div class="logo presta">
            <img src="assets/img/icon/presta.jpg" width="50" alt="logo jquery">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>


        <div class="logo sass">
            <img src="assets/img/icon/sass.jpg" width="50" alt="logo SASS">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="logo vue">
            <img src="assets/img/icon/vue.jpg" width="50" alt="logo Vue JS">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>



        <div class="logo html">
            <img src="assets/img/icon/html.jpg" width="50" alt="logo HTML5">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
            </div>
        </div>

        <div class="logo wp">
            <img src="assets/img/icon/wp.jpg" width="50" alt="logo Wordpress">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="logo php">
            <img src="assets/img/icon/php.jpg" width="50" alt="logo PHP">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="logo jquery">
            <img src="assets/img/icon/jquery.jpg" width="50" alt="logo jquery">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="logo drupal">
            <img src="assets/img/icon/drupal.jpg" width="50" alt="logo Drupal 8">
            <div class="progress">
                <span class="active"></span>
                <span class="active"></span>
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

</div>


<h3>A propos</h3>
<div class="a-propos">

    <?php

        if(isset($descriptions)) {
            echo $descriptions['contenu'];
        }

    ?>

</div>
</section>
<?php

$mainContent = ob_get_clean();

$navbar1 = true;
$navbar2 = false;

$titlePage = 'Présentation de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
$cheminFichierCss = 'style.css';
$cheminFichierJs = 'apropos.js';
$classDuBody = 'body--aPropos';

require 'template.php';
?>
