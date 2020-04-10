<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End</title>
    <meta name="description" content="Portfolio de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/contact.css" rel="stylesheet">

</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<nav class="second-menu">
    <div>
        <div class="default"><a class="home-item" href="/projet5/index.php">M. Isambert</a></div>
        <div class="hover"><a class="home-item" href="/projet5/index.php">M. Isambert</a></div>
    </div>
    <ul class="bloc-droit">
        <li>
            <a class="sub-item" href="/projet5/aPropos.php">A propos</a>
        </li>
        <li>
            <a class="sub-item" href="/projet5/parcours.php">Parcours</a>
        </li>
        <li>
            <a class="sub-item" href="/projet5/contact.php">Contact</a>
        </li>
    </ul>
</nav>



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
    <form>
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
            <textarea></textarea>
            <label for="objet">Votre message</label>
        </div>
        <div class="send">
            <input type="submit" name="envoie" value="Valider">
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
<script src="assets/js/contact.js" type="text/javascript"></script>

</body>
</html>