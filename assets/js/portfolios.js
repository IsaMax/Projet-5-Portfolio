window.addEventListener('load', function() {

    function lancePortfolio() {

       document.querySelector('.bloc-droit li:nth-child(3)').classList.add('active');

        var spanElt = document.querySelector('.container-filtres span');
        var timeFiltre;


        // Lance les filtres
        spanElt.addEventListener('click', function(e) {
            e.preventDefault();
            timeFiltre= gsap.timeline({delay:.2});

            timeFiltre.to('.container-filtres .filtres', {

                    left: '0',
                    duration: .6,
                })
                .to('.container-filtres .filtres ul li', {
                    duration: 1,
                    opacity:1,
                    y: 0,
                    stagger: 0.1,
                    ease: 'circ.out'
                })

        });


        // Ferme les filtres
        document.querySelector('.container-filtres .filtres:not(ul)').addEventListener('click', function(e) {

            timeFiltre.timeScale(1.5)
            timeFiltre.reverse();

        });


        var menuPort = document.querySelectorAll('.position-portfolio .sub-elt a');
        var portfoliosElt = document.querySelectorAll('.bloc-mvt .a--portfolio');


        var lienCible = document.querySelectorAll('.position-portfolio a');

        for(var i = 0 ; i < menuPort.length ; i++) {

            menuPort[i].addEventListener('click', function(e) {

                var number = this.dataset.nombre;
                var cible = document.getElementById(number)
                e.preventDefault();

                for(var i = 0 ; i < menuPort.length ; i++) {
                    menuPort[i].classList.remove('active');
                    portfoliosElt[i].classList.remove('active')
                }

                this.classList.add('active');

                cible.classList.add('active')

                cible.scrollIntoView({behavior: "smooth", block: "center"})

            });
        }

        for(var b = 0 ; b < portfoliosElt.length ; b++) {

            portfoliosElt[b].addEventListener('mouseover', function(e) {

                this.classList.remove('active')

                if(this.classList.contains('a--portfolio')) {

                    var ancre = this.id;

                    console.log(ancre)

                    for(var a = 0 ; a < lienCible.length ; a++) {

                        if(lienCible[a].dataset.nombre === ancre) {

                            lienCible[a].classList.add('hoverPortfolio');
                        }
                        else {
                            lienCible[a].classList.remove('hoverPortfolio');
                            lienCible[a].classList.remove('active');
                        }

                    }
                }
            })
        }

        document.querySelector('.position-portfolio').addEventListener('mouseover', function(e) {

            for(var a = 0 ; a < lienCible.length ; a++) {

                lienCible[a].classList.remove('hoverPortfolio');
            }
        });


        var filtres = document.querySelectorAll('.container-filtres .filtres a');

        var projets =  document.querySelectorAll('.bloc-central a');

        for(var i = 0 ; i < filtres.length ; i++) {

            filtres[i].addEventListener('click', function(e) {
                e.preventDefault();

                var categorie = this.dataset.categorie;
                var url = 'projets-'+categorie;
                console.log(url)
                loadProjetAjax(url)
            });

        }
    }
    lancePortfolio();

    //charger en Ajax la page creation appropriée
    function loadProjetAjax(url) {

        var xhr = new XMLHttpRequest();

        // On souhaite juste récupérer le contenu du fichier, la méthode GET suffit amplement :
        xhr.open('GET', url);

        xhr.addEventListener('readystatechange', function() { // On gère ici une requête asynchrone

            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { // Si le fichier est chargé sans erreur

                document.querySelector('body').innerHTML =  xhr.responseText; // Et on affiche !
                lancePortfolio();
            }
        });

        xhr.send(null); // La requête est prête, on envoie tout !
    }

});