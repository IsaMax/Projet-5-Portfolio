<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $titlePage ?></title>
    <meta name="description" content="Portfolio de Maxime Isambert, développeur Drupal 8, Wordpress, PHP, Javascript, développeur Front-End">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menus.css">
    <link rel="stylesheet" href="assets/css/<?= $cheminFichierCss ?>">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body class="<?= $classDuBody ?>">
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


    <?php
        if(isset($navbar1) && $navbar1) {
            require 'view/navbar/navbar1View.php';
        }

        if(isset($navbar2) && $navbar2) {
            require 'view/navbar/navbar2View.php';
        }

        if(isset($mainContent)) {
            echo $mainContent;
        }
    ?>

<script src="tarteaucitron/tarteaucitron.js"></script>

<script>
    tarteaucitron.init({
        "privacyUrl": "", /* Privacy policy url */

        "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
        "cookieName": "tarteaucitron", /* Cookie name */

        "orientation": "middle", /* Banner position (top - bottom) */
        "showAlertSmall": true, /* Show the small banner on bottom right */
        "cookieslist": true, /* Show the cookie list */

        "adblocker": false, /* Show a Warning if an adblocker is detected */
        "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
        "highPrivacy": true, /* Disable auto consent */
        "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

        "removeCredit": false, /* Remove credit link */
        "moreInfoLink": true, /* Show more info link */
        "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */

        //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

        "readmoreLink": "/cookiespolicy" /* Change the default readmore link */

    });
    var timeLine;

    function lanceMenu() {


        if (document.querySelector('.btn-hamburger')) {

            document.querySelector('.btn-hamburger').addEventListener('click', function (evt) {

                var body = document.querySelector('body');


                if (this.classList.contains('active')) {

                    this.classList.remove('active');
                    body.classList.remove('overflow');
                    timeLine.timeScale(1.5);
                    timeLine.reverse();

                } else {
                    timeLine = gsap.timeline({delay: .2});
                    this.classList.add('active');
                    body.classList.add('overflow');

                    timeLine.to('.bloc-droit', {
                        right: 0,
                        duration: .5
                    })
                        .to('.bloc-droit li', {
                            duration: 1,
                            opacity: 1,
                            y: 0,
                            stagger: 0.1,
                            ease: 'circ.out'
                        })
                }


            })
        }
    }

    lanceMenu();


    // document.querySelector('.btn-hamburger.active').addEventListener('click', function (evt) {
    //
    // });
    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/TextPlugin.min.js"></script>

<script src="assets/js/<?= $cheminFichierJs ?>" async defer></script>
</body>
</html>