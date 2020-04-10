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
    <link href="assets/css/parcours.css" rel="stylesheet">

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

<div class="container-parcours">

    <div class="container-annees">
        <ul>
            <li>
                <a href="#annee" class="active" data-annee="annee2005">2005</a>
            </li>
            <li>
                <a href="#annee" class="suivant" data-annee="annee2006">2006</a>
            </li>
            <li>
                <a href="#annee" data-annee="annee2007">2007</a>
            </li>
            <li>
                <a href="#annee" data-annee="annee2008" >2008</a>
            </li>
            <li>
                <a href="#annee" data-annee="annee2009" >2009</a>
            </li>
            <li>
                <a href="#annee" data-annee="annee2010">2010</a>
            </li>
            <li>
                <a href="#annee" data-annee="annee2011">2011</a>
            </li>

        </ul>
    </div>

    <div class="bloc-desc">
        <div id="annee2005" class="container-desc active">
            <div class="couverture">
                <i class="material-icons">school</i>
                <i class="material-icons">business_center</i>
            </div>
            <div class="content">
                annee 2005
            </div>
        </div>

        <div id="annee2006" class="container-desc">
            <div class="couverture">
                <i class="material-icons">school</i>
                <i class="material-icons">business_center</i>
            </div>
            <div class="content">
                annee 2006
            </div>
        </div>

        <div id="annee2007" class="container-desc">
            <div class="couverture">
                <i class="material-icons">school</i>
                <i class="material-icons">business_center</i>
            </div>
            <div class="content">
                annee 2007
            </div>
        </div>

        <div id="annee2008" class="container-desc">
            <div class="couverture">
                <i class="material-icons">school</i>
                <i class="material-icons">business_center</i>
            </div>
            <div class="content">
                annee 2008
            </div>
        </div>

        <div id="annee2009" class="container-desc">
            <div class="couverture">
                <i class="material-icons">school</i>
                <i class="material-icons">business_center</i>
            </div>
            <div class="content">
                annee 2009
            </div>
        </div>

        <div id="annee2010" class="container-desc">
            <div class="couverture">
                <i class="material-icons">school</i>
                <i class="material-icons">business_center</i>
            </div>
            <div class="content">
                annee 2010
            </div>
        </div>

        <div id="annee2011" class="container-desc">
            <div class="couverture">
                <i class="material-icons">school</i>
                <i class="material-icons">business_center</i>
            </div>
            <div class="content">
                annee 2011
            </div>
        </div>

    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
<script type="text/javascript" src="assets/js/parcours.js"></script>

</body>
</html>