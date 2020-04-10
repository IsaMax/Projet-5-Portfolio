<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php $titlePage ?></title>
    <meta name="description" content="Portfolio de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="assets/css/<?php $cheminFichierCss ?>">
</head>
<body class="<?php $classDuBody ?>">
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


    <?php
        if(isset($navbar1)) {
            require 'view/navbar/navbar1View.php';
        }

        if(isset($navbar2)) {
            require 'view/navbar/navbar2View.php';
        }

        if(isset($mainContent)) {
            echo $mainContent;
        }
    ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/TextPlugin.min.js"></script>

<script src="assets/js/<?php $cheminFichierJs ?>" async defer></script>
</body>
</html>