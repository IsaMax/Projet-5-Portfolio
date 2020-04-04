window.addEventListener('load', function() {

    gsap.registerPlugin(TextPlugin);

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
            width: (window.innerWidth/2),
            delay:1,
            duration:.7,
            ease: Power3.easeInOut
        });

        gsap.to('.section-intro', {

            scale: .93,
            duration:.7,
            delay: 1.4,
        });

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

        gsap.to('.scroll', { opacity:1, delay:4});
        
        if(!deuxiemePageActive) {
            gsap.to('.wrapper-jesuis', { opacity:1, delay:5, left:'26%' });
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

                if(url === 'https://'+window.location.hostname+'/projet5/aPropos.php')
                    executeJSApropos();
            }
        });

        xhr.send(null); // La requête est prête, on envoie tout !
    }

        document.querySelector('.sub-menu.desc a').addEventListener('click', function(e) {
            e.preventDefault();

            loadAjax('https://'+window.location.hostname+'/projet5/aPropos.php','.section-intro');
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
                    loadAjax('https://'+window.location.hostname+'/projet5/aPropos.php', '.section-intro');
                }, 1800)
            }

            else if(e.deltaY < 0) {

                deuxiemePageActive = false;
                t2.timeScale(2);
                t2.reverse();

                window.setTimeout(function() {

                    window.location.href = 'https://maxime.agences.tw/projet5';

                }, 2500);
            }
   });

    function executeJSApropos() {

        var blockRouge = document.querySelector('.section-intro .block-red');

        //if(document.querySelector('.wrapper-jesuis').style.opacity == '1') {

        t2.to(".a-propos div", {
            opacity: 1,
            scale: 1,
            duration:.8,
            stagger: { each: .2, ease: 'bounce.out' }
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
        .to('.scroll', { opacity:1});

        window.setTimeout(function () {
            var temp1 = document.querySelectorAll('.a-propos .desc1 strong');
            var temp2 = document.querySelectorAll('.a-propos .desc2 strong');
            var temp3 = document.querySelectorAll('.a-propos .desc3 strong');
            console.log(temp3)
            for (var i = 0; i < 3; i++) {

                temp1[i].classList.add('active');
                temp2[i].classList.add('active');
                temp3[i].classList.add('active');
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

