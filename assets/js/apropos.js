window.addEventListener('load', function() {

    // lance les animations de la page avec la timeline t2
    var t2 = gsap.timeline({delay:.05})

    t2.to('.section-intro', {

        scale: .93,
        duration:.7,
    })

        .to(".a-propos p", {
            opacity:1,
            y:0,
            stagger:.1,
            duration: 1.5,
            ease: 'expo.out',
        })

    .to('.main-menu', {
        bottom:0,
        opacity: 1,
        duration: .5
    })

    .to("section.section-intro h3", {
        visibility: 'visible',
        opacity:1
    })

    .to('.logo img', {
        visibility: 'visible',
        opacity:1,
        stagger :.05,
    })

   .to('.logo .progress .active', {

        backgroundColor: '#0088fd',
        x:0,
        y:0,
        scale:1,
        opacity:1,
        stagger: {
            each:.05,
        },

    })

    .to('.logo .progress span:not(.active)', {

        backgroundColor: 'white',
        x:0,
        y:0,
        scale:1,
        opacity:1,

    });

    window.setTimeout(function() {
        var temp1 =  document.querySelectorAll('.a-propos strong');

        for(var i = 0 ; i < temp1.length ; i++) {

            temp1[i].classList.add('active');
        }

    }, 1500);

    activeMenuCercle();
    compteCompetences();

       var menuLien = document.querySelectorAll('.main-menu .sub-menu a');

       for(var a = 0 ; a < menuLien.length ; a++) {

           menuLien[a].addEventListener('click', function (e) {

               e.preventDefault();

               var href = e.target.attributes.href.value;

               t2.timeScale(4);
               t2.reverse();

               window.setTimeout(function() {

                   window.location.href = href;

               }, 1500)

           });

       }

    // if(window.outerWidth <= 630) {
    //
    //     loadAjax('https://'+window.location.hostname+'/projet5/view/navbar/navbar2View.php','.menu-temp');
    // }


function activeMenuCercle() {

   // si clique sur le menu
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
}
 

function compteCompetences() {

    var tabElts = ['adobe', 'css', 'js', 'presta', 'sass', 'vue', 'html', 'wp', 'php', 'jquery', 'drupal'];
    var tabDivnonO = [];
    var tabDiv = [];
    var eltActives = [];

    for(var i = 0 ; i < tabElts.length ; i++) {

        eltActives.push(document.querySelectorAll('.logo.'+tabElts[i]+' .progress .active'));

        tabDiv.push({'elt': document.querySelectorAll('.logo.'+tabElts[i]),
            'nbr': eltActives[i].length});

        tabDivnonO[i] = tabDiv[i];

    }

    tabDiv.sort(function(a,b) {
        return b.nbr - a.nbr;
    })

    afficherCompetencesTriees(tabDiv, tabDivnonO);
}


function afficherCompetencesTriees(tabO, tabnnO) {

    setTimeout(function() {

        for(var i = 0 ; i < tabO.length ; i++) {

            if(tabO[i].elt[0].classList.value !== tabnnO[i].elt[0].classList.value) {

                gsap.to(tabO[i].elt[0], {

                    top: 'calc('+5*i+'rem)',
                    duration: 1.5,

                });

            }
        }

    },6500);
}

    // function loadAjax(url, target) {
    //
    //     var xhr = new XMLHttpRequest();
    //
    //     // On souhaite juste récupérer le contenu du fichier, la méthode GET suffit amplement :
    //     xhr.open('GET', url);
    //
    //     xhr.addEventListener('readystatechange', function() { // On gère ici une requête asynchrone
    //
    //         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { // Si le fichier est chargé sans erreur
    //             document.querySelector(target).innerHTML =  xhr.responseText; // Et on affiche !
    //             lanceMenu();
    //
    //         }
    //     });
    //
    //     xhr.send(null); // La requête est prête, on envoie tout !
    // }

});