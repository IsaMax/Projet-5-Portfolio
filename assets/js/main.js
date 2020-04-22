window.addEventListener('load', function() {

    if(!deuxiemePageActive) {

        document.querySelector('body').classList.add('body--premiere-page')
    }

  //  gsap.registerPlugin(TextPlugin);

    /* Animation MENU */
    var menu = document.querySelectorAll("[class^='wrapper-sub-menu']");

    var boxCircle = document.querySelector('.main-menu');
    boxCircle.addEventListener('click', function(e) {

        if(boxCircle.classList.contains('active')) {    

            for(var i=0 ; i < menu.length ; i++) {
        
                gsap.to('.'+menu[i].classList.value,
                 {rotate:0}); 
            }

            window.setTimeout(function() {

                for(var i=0 ; i < menu.length ; i++) {

                    gsap.to('.'+menu[i].classList.value,{y:'100%', duration:.3});
                }
            },400);

            gsap.to('.circle', {y:'50%',rotation: '0', delay: .5});

            boxCircle.classList.remove('active');
        }
        else {
            
            gsap.to('.circle', {y:'50%',rotation: '180deg'});

            for(var i=0 ; i < menu.length ; i++) {

                gsap.to('.'+menu[i].classList.value,{y:0, duration:.3});
            } 
        
            window.setTimeout(function() {
        
                for(var i=0 ; i < menu.length ; i++) {
        
                    gsap.to('.'+menu[i].classList.value,
                     {rotate:37*menu[i].dataset.dir}); 
                }
        
            }, 300);

            boxCircle.classList.add('active');
        }
    });

    gsap.to('.main-menu', {
        bottom:0,
        opacity: 1,
        delay: 3.2,
        duration: .6
    });


    var pathIsambert = document.querySelectorAll('#isambert g path');
    var pathMaxime = document.querySelectorAll('#maxime g path');

    executeJSIndex();

    /** On charge le js retour de la page index **/
    function executeJSIndex() {

        /* Animation INTRO HOME */
        gsap.to('.block-red.av', {
            width: window.innerWidth,
            left: 0,
            delay:.5,
            duration: .7,
            ease: Power3.easeInOut
        });

        gsap.to('.block-red.av',{
            width: '50vw',
            delay:1,
            duration:.7,
            ease: Power3.easeInOut
        });

        if(window.outerWidth > 1100 || document.querySelector('body').classList.contains('body--premiere-page')) {

             if(window.outerWidth > 900) {
                 gsap.to('.section-intro', {

                     scale: .93,
                     duration:.7,
                     delay: 1.4,
                 });

             }

        }


        window.setTimeout(function() {
            for(var i=0 ; i < pathIsambert.length ; i++) {

                gsap.to('#'+pathIsambert[i].id, {

                    strokeDashoffset: 0,
                    duration: 1.5,
                });
            }
        }, 2200);

        window.setTimeout(function() {
            for(var i=0 ; i < pathMaxime.length ; i++) {

                gsap.to('#'+pathMaxime[i].id, {

                    strokeDashoffset: 0,
                    duration: 1.5,

                });
            }

             gsap.to('#isambert path', {
                fillOpacity:1,
                delay:1.8
            });

            gsap.to('#maxime path', {
                fillOpacity:1,
                delay:1.8
            });
        }, 3400);


        if(window.outerWidth > 550)
            gsap.to('.scroll', { opacity:1, delay:4});

        if(!deuxiemePageActive) {

            var lg = window.outerWidth;
            var left = '44.2%';

            if(lg > 1722) { left = '44.2%'; }
            else if(lg <= 1722 && lg > 1595) { left = '43%'; }
            else if(lg <= 1595 && lg > 1440) { left = '42.3%'; }
            else if(lg <= 1440 && lg > 1300) { left = '41.5%'; }
            else if(lg <= 1300 && lg > 1180) { left = '40.8%'; }
            else if(lg <= 1180 && lg > 1082) { left = '39.8%'; }
            else if(lg <= 1082 && lg > 992) { left = '39%'; }
            else if(lg <= 992 && lg > 908) { left = '37.8%'; }
            else if(lg <= 908 && lg > 822) { left = '36.7%'; }
            else if(lg <= 822 && lg > 756) { left = '35.5%'; }
            else if(lg <= 756 && lg > 685) { left = '38%'; }
            else if(lg <= 685 && lg > 630) { left = '37%'; }
            else if(lg <= 630 && lg > 575) { left = '35%'; }
            else if(lg <= 575 && lg > 508) { left = '36%'; }
            else if(lg <= 508 && lg > 466) { left = '34.5%'; }
            else if(lg <= 466 && lg > 425) { left = '37%'; }
            else if(lg <= 425 && lg > 388) { left = '35.7%'; }
            else if(lg <= 388 && lg > 354) { left = '34.5%'; }
            else if(lg <= 354 && lg > 326) { left = '33.9%'; }

            gsap.to('.wrapper-jesuis', { opacity:1, delay:5, left: left });

        }

        var text = document.querySelector(".textChange");
        var tl = new TimelineMax({repeat:-1, yoyo:false, repeatDelay:2, delay:5});

        tl.to(text, 0.8, {text:{value:"Développeur Front-End", type:'diff', padSpace:true, ease:Linear.easeNone}, speed: 3});
        tl.to(text, 0.8, {text:{value:"Curieux", padSpace:true, type:'diff', ease:Linear.easeNone},delay:2, speed: 3});
        tl.to(text, 0.8, {text:{value:"Développeur Drupal", type:'diff', padSpace:true, ease:Linear.easeNone}, speed: 3, delay:2});
        tl.to(text, 0.8, {text:{value:"Rigoureux", padSpace:true, type:'diff', ease:Linear.easeNone},delay:2, speed: 3});
        tl.to(text, 0.8, {text:{value:"Développeur web", padSpace:true, type:'diff', ease:Linear.easeNone},delay:2, speed: 3});
        tl.to(text, 0.8, {text:{value:"Proactif", padSpace:true, type:'diff', ease:Linear.easeNone},delay:2, speed: 3});

    }


    /*      ****** FIN PREMIER SLIDE ******* */

    function loadAjax(url, target) {

        var xhr = new XMLHttpRequest();

        // On souhaite juste récupérer le contenu du fichier, la méthode GET suffit amplement :
        xhr.open('GET', url);

        xhr.addEventListener('readystatechange', function() { // On gère ici une requête asynchrone

            if (xhr.readyState === XMLHttpRequest.LOADING) {
                document.querySelector(target).innerHTML = 'bonjour';
            }
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { // Si le fichier est chargé sans erreur

                document.querySelector(target).innerHTML =  xhr.responseText; // Et on affiche !

                if(url === 'https://'+window.location.hostname+'/projet5/a-propos') {

                    if(window.outerWidth <= 1002) {
                        document.querySelector('body').style.overflow = 'visible';
                    }
                    executeJSApropos();
                }
            }
        });

        xhr.send(null); // La requête est prête, on envoie tout !
    }

        document.querySelector('.sub-menu.desc a').addEventListener('click', function(e) {
            e.preventDefault();

            loadAjax('https://'+window.location.hostname+'/projet5/a-propos','.section-intro');
        });

    var deuxiemePageActive = false;
    var t3 = gsap.timeline({delay:.3});
    var t2 = gsap.timeline({delay: .3});

   window.addEventListener('wheel', function(e) {

        var blockRouge = document.querySelector('.section-intro .block-red');


            if(e.deltaY > 0 && deuxiemePageActive === false) {


                deuxiemePageActive = true;
                t3.to('.nom-prenom', {y: -50, opacity: 0, duration: 1});
                t3.to('.wrapper-jesuis', {opacity: 0});
                t3.to(blockRouge, {top: '150%'});

                window.setTimeout(function() {
                    loadAjax('https://'+window.location.hostname+'/projet5/a-propos', '.section-intro');
                }, 1800)
            }

            else if(e.deltaY < 0) {

                if(window.outerWidth > 1002) {

                    deuxiemePageActive = false;
                    t2.timeScale(2);
                    t2.reverse();

                    window.setTimeout(function() {

                        window.location.href = 'https://maxime.agences.tw/projet5';

                    }, 2500);
                }

            }
   });

    function executeJSApropos() {

        var blockRouge = document.querySelector('.section-intro .block-red');

        //if(document.querySelector('.wrapper-jesuis').style.opacity == '1') {
        document.querySelector('body').classList.remove('body--premiere-page');
        document.querySelector('body').classList.add('body--second-page');

        t2.to(".a-propos p", {
            opacity:1,
            y:0,
            stagger:.1,
            duration: 1.5,
            ease: 'expo.out',
        })
        .to("section.section-intro h3", { opacity: 1 })
        .to('.logo img', {
            opacity: 1,
            scale:1,
            stagger: { each: .1 }
        })
        .to('.logo .progress .active', {
            backgroundColor: '#0088fd',
            x: 0,
            y: 0,
            scale: 1,
            opacity: 1,
            stagger: { each: .05 }
        })
        .to('.logo .progress span:not(.active)', {
            backgroundColor: 'white',
            x: 0,
            y: 0,
            scale: 1,
            opacity: 1,
        })
        .to('.scroll', { opacity:0});

        window.setTimeout(function () {
            var temp1 = document.querySelectorAll('.a-propos strong');
            // var temp2 = document.querySelectorAll('.a-propos .desc2 strong');
            // var temp3 = document.querySelectorAll('.a-propos .desc3 strong');
            console.log(temp1)
            for (var i = 0; i < temp1.length; i++) {

                temp1[i].classList.add('active');
                // temp2[i].classList.add('active');
                // temp3[i].classList.add('active');
            }
        },4000);



        compteCompetences();


        function compteCompetences() {

            var tabElts = ['adobe', 'css', 'js', 'presta', 'sass', 'vue', 'html', 'wp', 'php', 'jquery', 'drupal'];
            var tabDivnonO = [];
            var tabDiv = [];
            var eltActives = [];

            for (var i = 0; i < tabElts.length; i++) {

                eltActives.push(document.querySelectorAll('.logo.' + tabElts[i] + ' .progress .active'));

                tabDiv.push({
                    'elt': document.querySelectorAll('.logo.' + tabElts[i]),
                    'nbr': eltActives[i].length
                });

                tabDivnonO[i] = tabDiv[i];

            }

            tabDiv.sort(function (a, b) {
                return b.nbr - a.nbr;
            });

            console.log(tabDiv.length)

            afficherCompetencesTriees(tabDiv, tabDivnonO);

        }


        function afficherCompetencesTriees(tabO, tabnnO) {

            setTimeout(function () {

                for (var i = 0; i < tabO.length; i++) {
                    console.log(tabnnO[i].elt[0].classList.value == tabO[i].elt[0].classList.value)
                    if (tabO[i].elt[0].classList.value !== tabnnO[i].elt[0].classList.value) {

                        gsap.to(tabO[i].elt[0], {
                            top: 'calc(' + 5 * i + 'rem)',
                        });
                    }
                }
            }, 5600);
        }
    }
});

