window.addEventListener('load', function() {

    document.querySelector('.container-parcours .bloc-desc').classList.add('afficher');
    document.querySelector('.container-annees').classList.add('afficher');

    document.querySelector('.bloc-droit li:nth-child(2)').classList.add('active');

    var compteur = 0;

    var aElts = document.querySelectorAll('.container-annees ul li a');
    var blocAnnee = document.querySelectorAll('.bloc-desc .container-desc');
    var nombreAnnees = document.querySelectorAll('.container-annees ul li').length;

    if (window.outerWidth > 380) {


        document.querySelector('.container-annees ul').addEventListener('wheel', function (e) {

            e.preventDefault();


            if (window.outerWidth <= 1370 && window.outerWidth > 1250) {

                if (e.deltaY > 0) {

                    if (Math.abs(compteur) < (nombreAnnees - 1)) {
                        compteur--;
                        gsap.to(this, {
                            top: 120 * compteur,
                        })
                    }
                } else if (e.deltaY < 0) {

                    if (Math.abs(compteur) > 0) {
                        compteur++;
                        gsap.to(this, {
                            top: 120 * compteur,
                        })
                    }
                }
            } else if (window.outerWidth <= 1250 && window.outerWidth > 400) {

                if (e.deltaY > 0) {

                    if (Math.abs(compteur) < (nombreAnnees - 1)) {
                        compteur--;
                        gsap.to(this, {
                            top: 100 * compteur,
                        })
                    }
                } else if (e.deltaY < 0) {

                    if (Math.abs(compteur) > 0) {
                        compteur++;
                        gsap.to(this, {
                            top: 100 * compteur,
                        })
                    }
                }
            } else if (window.outerWidth <= 400) {

                if (e.deltaY > 0) {

                    if (Math.abs(compteur) < (nombreAnnees - 1)) {
                        compteur--;
                        gsap.to(this, {
                            top: 70 * compteur,
                        })
                    }
                } else if (e.deltaY < 0) {

                    if (Math.abs(compteur) > 0) {
                        compteur++;
                        gsap.to(this, {
                            top: 70 * compteur,
                        })
                    }
                }
            } else {

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

            }

            definiCompteur();
        });
    }

    else {
        document.querySelector('html').classList.add('mobile');
        var distance;
        document.querySelector('.container-annees ul').addEventListener('touchstart', function (e) {

            var swipe = e.touches,
                start = swipe[0].pageY;

            this.addEventListener('touchmove', function (e) {

                var contact = e.touches,
                    end = contact[0].pageY;
                    distance = end - start;

            });

        });

        document.querySelector('.container-annees ul').addEventListener('touchend', function (e) {

            console.log(compteur)
            if (distance < -10) // up
            {

                if (Math.abs(compteur) < (nombreAnnees - 1)) {
                    compteur--;
                    gsap.to(this, {
                        top: 80 * compteur,
                    })
                }

            }
            else if (distance > 10) { // down

                if (Math.abs(compteur) > 0) {
                    compteur++;
                    gsap.to(this, {
                        top: 80 * compteur,
                    })
                }
            }
            definiCompteur();

        });

    }


    function definiCompteur() {


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
    }
});