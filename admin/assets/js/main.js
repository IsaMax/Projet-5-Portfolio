window.addEventListener('load', function() {

    // TinyMCE
    tinymce.init({
        selector: '#contenu_edit',
        height: '500px'
    });

    // TinyMCE
    tinymce.init({
        selector: '#addBodyParcours',
        height: '300px'
    });

    // TinyMCE
    tinymce.init({
        selector: '#newBodyProjet',
        height: '300px'
    });


    //On récupère avec ajax le formulaire de la page parcoursSeulView.php que l'on insère dans la page parcoursView.php

    var editionParcours = document.querySelectorAll('.editerParcours');
    var divForm = document.getElementById('FormJs');

    for(var i = 0 ; i < editionParcours.length ; i++) {

        editionParcours[i].addEventListener('click', function(e) {

            e.preventDefault();

            var id = this.dataset.id;

            loadAjax('index.php?action=parcours&modifier=true&id_parcours='+id, afficherAjax);

            divForm.style.zIndex = '50';
            divForm.style.opacity = '1';

            function afficherAjax(reponse) {

                divForm.innerHTML = reponse;
                lanceTinyMCEParcours();

                // On vide le formulaire et on ferme la fenêtre
                document.querySelector('#FormJs .close').addEventListener('click', function (ev) {

                    document.getElementById('formModif').reset();

                    divForm.style.zIndex = '-1';
                    divForm.style.opacity = '0';
                    tinyMCE.remove();
                });

                // On envoie le formulaire du parcours modifié via le bouton
                document.getElementById('submitModif').addEventListener('click', function (ev) {

                    console.log('send')
                    document.getElementById('formModif').submit();
                });


            }
        });
    }

    function lanceTinyMCEParcours() {
        // TinyMCE
        console.log('àok')
        tinymce.init({
            selector: '.addBodyParcoursSeul',
            height: '300px'
        });
    }

    function lanceTinyMCEProjet() {
        // TinyMCE
        console.log('àok')
        tinymce.init({
            selector: '#addBodyProjet',
            height: '300px'
        });
    }

    //On récupère avec ajax le formulaire de la page projetView.php que l'on insère dans la page dashboardView.php

    var editionProjet = document.querySelectorAll('.editerProjet');
    var divForm = document.getElementById('FormJsProjet');

    for(var i = 0 ; i < editionProjet.length ; i++) {

        editionProjet[i].addEventListener('click', function(e) {

            e.preventDefault();

            var id = this.dataset.id;

            var nomEncode = this.dataset.nomEncode;
            console.log(nomEncode)
            console.log('index.php?action=projets&modifier=true&id_projets='+id+'&nom_projet='+nomEncode)
            loadAjax('index.php?action=projets&modifier=true&id_projets='+id+'&nom_projet='+nomEncode, afficherAjax);

            divForm.style.zIndex = '50';
            divForm.style.opacity = '1';

            function afficherAjax(reponse) {
                divForm.innerHTML = reponse;
                lanceTinyMCEProjet();

                // On vide le formulaire et on ferme la fenêtre
                document.querySelector('#FormJsProjet .close').addEventListener('click', function (ev) {

                    document.getElementById('formModifProjet').reset();

                    divForm.style.zIndex = '-1';
                    divForm.style.opacity = '0';
                    tinyMCE.remove();
                });

                // On envoie le formulaire du parcours modifié via le bouton
                document.getElementById('submitModifProjet').addEventListener('click', function (ev) {

                    console.log('send')
                    document.getElementById('formModifProjet').submit();
                });


            }
        });
    }

    function lanceTinyMCE() {
        // TinyMCE
        console.log('àok')
        tinymce.init({
            selector: '.addBodyParcoursSeul',
            height: '300px'
        });
    }



    // On envoie le formulaire du projet modifié via le bouton
    document.getElementById('submitModif').addEventListener('click', function (ev) {

        document.getElementById('formModifProjet').submit();
    });


    // On envoie le formulaire du nouveau parcours via le bouton
    document.getElementById('submitNewParcours').addEventListener('click', function (ev) {

        document.getElementById('formModif').submit();
    });

    // On envoie le formulaire du nouveau projet via le bouton
    document.getElementById('submitNouveauProjet').addEventListener('click', function (ev) {

        document.getElementById('formNouveauProjet').submit();
    });


    function loadAjax(url, callback) {

        var xhr = new XMLHttpRequest();


        xhr.open('GET', url);

        xhr.addEventListener('readystatechange', function() { // On gère ici une requête asynchrone

            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { // Si le fichier est chargé sans erreur

               callback(xhr.responseText); // Et on affiche
            }
        });

        xhr.send(null);
    }

 

        //document.getElementById('formNouveauProjet').setAttribute('action', 'index.php?action=projets&amp;nom_projet=');


});
