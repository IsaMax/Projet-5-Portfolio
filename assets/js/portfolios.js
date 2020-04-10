window.addEventListener('load', function() {

    var spanElt = document.querySelector('.container-filtres span');
    var timeFiltre = gsap.timeline({delay:.2});

    spanElt.addEventListener('click', function(e) {
        e.preventDefault();


        timeFiltre.to('.container-filtres .filtres', { opacity:1 })

            .to('.container-filtres .filtres', {

                left: '0vw',
                duration: .6,
            })

            .to('.container-filtres .filtres ul', { opacity:1 });
    });


    document.querySelector('.container-filtres .filtres:not(ul)').addEventListener('click', function(e) {
        e.preventDefault();

        var t0 = gsap.timeline({delay:.2});

        t0.to('.container-filtres .filtres', {
            opacity: 0,
            duration:.3,
        })
            .to('.container-filtres .filtres', {

                left: '110vw',
                duration:0
            })
            .to('.container-filtres .filtres ul', {
                opacity:0
            })
    });


    var menuPort = document.querySelectorAll('.position-portfolio .sub-elt a');
    var portfoliosElt = document.querySelectorAll('.portfolio');
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

            if(e.target.classList.contains('portfolio')) {

                var ancre = e.target.id;


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


    var projets =  document.querySelectorAll('.bloc-central a');

    for(var i = 0 ; i < filtres.length ; i++) {

        projets[i].addEventListener('click', function (e) {

            e.preventDefault();

            var id_projet = this.dataset.id;
            var url = 'projet5/index.php?action=page_creation&id_projet=' + id_projet;

            loadProjetAjax(url);

        });
    }

    var filtres = document.querySelectorAll('.container-filtres .filtres a');

    for(var i = 0 ; i < filtres.length ; i++) {

        filtres[i].addEventListener('click', function(e) {
            e.preventDefault();
            
            var categorie = this.dataset.categorie;
            var url = 'projet5/index.php?action=creations&categorie='+categorie;
            loadProjetAjax()
        });

    }


    //charger en Ajax la page creation appropriée
    function loadProjetAjax(url) {

        var xhr = new XMLHttpRequest();

        // On souhaite juste récupérer le contenu du fichier, la méthode GET suffit amplement :
        xhr.open('GET', url);

        xhr.addEventListener('readystatechange', function() { // On gère ici une requête asynchrone

            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { // Si le fichier est chargé sans erreur

                document.querySelector('body').innerHTML =  xhr.responseText; // Et on affiche !
            }
        });

        xhr.send(null); // La requête est prête, on envoie tout !
    }

});