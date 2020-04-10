window.addEventListener('load', function() {
    var compteur = 0;

    document.querySelector('.container-annees ul').addEventListener('wheel', function (e) {

        var aElts = document.querySelectorAll('.container-annees ul li a');
        var blocAnnee = document.querySelectorAll('.bloc-desc .container-desc');
        var nombreAnnees = document.querySelectorAll('.container-annees ul li').length;

        if (e.deltaY > 0) {

            if (Math.abs(compteur) < (nombreAnnees - 1)) {
                compteur--;
                gsap.to(this, {
                    top: 140 * compteur,
                })
            }
        } else if (e.deltaY < 0) {

            if (Math.abs(compteur) > 0) {
                compteur++;
                gsap.to(this, {
                    top: 140 * compteur,
                })
            }
        }


        for (var i = 0; i < nombreAnnees; i++) {

            aElts[i].classList.remove('active');
            aElts[i].classList.remove('precedent');
            aElts[i].classList.remove('suivant');
            blocAnnee[i].classList.remove('active');
        }

        for (var i = 0; i < nombreAnnees; i++) {

            if (i === Math.abs(compteur)) {

                aElts[i].classList.add('active');

                var blocAnneeActive = document.getElementById(aElts[i].dataset.annee);
                blocAnneeActive.classList.add('active');

                if (i > 0) {
                    aElts[i - 1].classList.add('precedent');
                }

                if (i < (nombreAnnees - 1)) {

                    aElts[i + 1].classList.add('suivant');
                }
            }
        }
    })
});