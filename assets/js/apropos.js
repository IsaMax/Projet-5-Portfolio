/*window.addEventListener('wheel', function(e) {*/

window.addEventListener('load', function() {



    var blockRouge = document.querySelector('.section-intro .block-red');
    var t2 = gsap.timeline({delay:.3})

    //if(document.querySelector('.wrapper-jesuis').style.opacity == '1') {

    //if(e.deltaY > 0) {

        gsap.to(".a-propos div", {
            opacity:1,
            scale:1,
            stagger: {
                each:.2,
                ease: 'bounce.out',
            },
            delay: 3
        });

        window.setTimeout(function() {
            var temp1 =  document.querySelectorAll('.a-propos .desc1 strong');
            var temp2 = document.querySelectorAll('.a-propos .desc2 strong');
            var temp3 = document.querySelectorAll('.a-propos .desc3 strong');
            console.log(temp3)
            for(var i = 0 ; i < 3 ; i++) {

                temp1[i].classList.add('active');
                temp2[i].classList.add('active');
                temp3[i].classList.add('active');
            }

        }, 7000);


        gsap.to("section.section-intro h3", {
            visibility: 'visible',
            delay:3
        });

        gsap.to('.logo img', {
            visibility: 'visible',

            stagger : {
                each: .05
            },
            delay: 4
        });

        gsap.to('.logo .progress .active', {

            backgroundColor: '#0088fd',
            x:0,
            y:0,
            scale:1,
            opacity:1,
            stagger: {
                each:.05,
            },

            delay: 4.55

        });

        gsap.to('.logo .progress span:not(.active)', {

            backgroundColor: 'white',
            x:0,
            y:0,
            scale:1,
            opacity:1,
            delay:5.5
        });

        compteCompetences();
   // }
    //}

   /* else if(e.deltaY < 0) {

        t2.to(blockRouge, { top: '0'});
        t2.to('.nom-prenom', { y: 0, opacity:1, duration:1 });
        t2.to('.wrapper-jesuis', {opacity:1});

        gsap.to(".desc div", {scale:0});

        gsap.to("section.section-intro h3", {
            visibility: 'visible',
            delay:3
        });



        gsap.from('.logo img', {
            visibility: 'visible',

            stagger : {
                each: .05
            },

            delay: 5
        });

        gsap.from('.logo .progress .active', {

            backgroundColor: '#0088fd',
            x:0,
            y:0,
            scale:1,
            opacity:1,
            stagger: {
                each:.1,
            },

            delay: 5.55

        });

        gsap.from('.logo .progress span:not(.active)', {

            backgroundColor: 'white',
            x:0,
            y:0,
            scale:1,
            opacity:1,
            delay:7.5
        });

    }*/
//});

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

    console.log(tabDiv.length)

    afficherCompetencesTriees(tabDiv, tabDivnonO);

}


function afficherCompetencesTriees(tabO, tabnnO) {

    setTimeout(function() {

        for(var i = 0 ; i < tabO.length ; i++) {
            console.log(tabnnO[i].elt[0].classList.value == tabO[i].elt[0].classList.value)
            if(tabO[i].elt[0].classList.value !== tabnnO[i].elt[0].classList.value) {

                gsap.to(tabO[i].elt[0], {

                    top: 'calc('+5*i+'rem)',
                    duration: 1.5,

                });

            }
        }

    },6500);

}

});