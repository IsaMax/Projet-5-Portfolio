<?php
ob_start();

?>

<?php

if($success == 1) {
    echo '<div class="success" data-success="1">&#10003;   Message envoyé</div>';
}
else {
    echo '<div class="success" data-success="0">&#10003;   Message envoyé</div>';
}
?>


<div class="infos-contact">
    <div class="tel">
        <span>Téléphone</span>
        <a href="tel:07 71 70 83 64">07 71 70 83 64</a>
    </div>
    <div class="mail">
        <span>Email</span>
        <a href="mailto:maxime.isambert@gmail.com">maxime.isambert@gmail.com</a>
    </div>
</div>
<div class="container-contact">

    <form method="POST" action="contact">
        <div class="group nom">
            <input type="text" name="nom" id="name">
            <label for="nom">Nom</label>
        </div>
        <div class="group objet">
            <input type="text" name="objet">
            <label for="objet">Objet</label>
        </div>
        <div class="group mail">
            <input type="mail" name="mail" id="mail">
            <label for="mail">Mail</label>
        </div>
        <div class="group texte">
            <textarea name="message" id="message"></textarea>
            <label for="objet">Votre message</label>
        </div>
        <div class="group chekbox">
            <input type="checkbox" name="chekbox" id="chekbox" required>
            <label for="chekbox">En cochant cette case, vous acceptez que les informations envoyées soient conservées à des fins strictements personnelles</label>
        </div>
        <div class="send">
            <input type="submit" name="envoie" value="Valider">
        </div>
    </form>

</div>

<?php

$mainContent = ob_get_clean();

$navbar1 = false;
$navbar2 = true;

$titlePage = 'Prendre contact avec Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End';
$cheminFichierCss = 'contact.css';
$cheminFichierJs = 'contact.js';
$classDuBody = 'body--contact';

require 'template.php';
?>
