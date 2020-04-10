window.addEventListener('load', function() {

    // TinyMCE
    tinymce.init({
        selector: '#contenu_edit'
    });

    // TinyMCE
    tinymce.init({
        selector: '#addBodyParcours'
    });


    //On récupère avec ajax le formulaire de la page parcoursSeulView.php que l'on insère dans la page parcoursView.php

    var editionParcours = document.querySelectorAll('.table-responsive .table .editerParcours');
    var divForm = document.getElementById('FormJs');

    for(var i = 0 ; i < editionParcours ; i++) {
        
        editionParcours[i].addEventListener('click', function(e) {
            
            e.preventDefault();

            var id = this.dataset.id;

            var reponse = loadAjax('./admin/index.php?action=parcours&modifier=true&id_parcours='+id);

            divForm.style.zIndex = '50';
            divForm.style.opacity = '1';

            divForm.innerHTML = reponse;

        });
    }

    // On vide le formulaire et on ferme la fenêtre
    document.querySelector('#FormJs .close').addEventListener('click', function (ev) {

        document.getElementById('formModif').reset();

        divForm.style.zIndex = '-1';
        divForm.style.opacity = '0';

    });


    // On envoie le formulaire du parcours modifié via le bouton
    document.getElementById('submitModif').addEventListener('click', function (ev) {

        document.getElementById('formModif').submit();
    });

    // On envoie le formulaire du nouveau parcours via le bouton
    document.getElementById('submitNewParcours').addEventListener('click', function (ev) {

        document.getElementById('formModif').submit();
    });


    function loadAjax(url) {

        var xhr = new XMLHttpRequest();

        // On souhaite juste récupérer le contenu du fichier, la méthode GET suffit amplement :
        xhr.open('GET', url);

        xhr.addEventListener('readystatechange', function() { // On gère ici une requête asynchrone
            
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { // Si le fichier est chargé sans erreur

                return xhr.responseText; // Et on affiche !
            }
        });

        xhr.send(null); // La requête est prête, on envoie tout !
    }

});
