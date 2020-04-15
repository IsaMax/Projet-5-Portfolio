<?php
ob_start();
?>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><?php
                if(!empty($nombreProjet)) {
                    $nombreProjet['nombre_projet'];
                } else {
                    echo '0';
                }?> Projets réalisés</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><?php
                if(!empty($nombreMessage)) {
                    $nombreMessage['nombre_message'];
                } else {
                    echo '0';
                }?> Messages</div>

        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Success Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Danger Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>

<div id="FormJsProjet">

</div>
    <h3 class="h3--ajouter-projet">Tous les projets</h3>
<div class="row bloc-projets">
<?php

    foreach ($projets as $projet) {
        ?>

            <div class="col-xl-4">
                <div class="bloc-projet">
                    <div class="carousel slide" data-ride="carousel">
                        <div class="bloc-images carousel-inner">

                            <?php
                            $i = 0;
                                foreach ($lesPhotos as $url) {

                                    if($url['nom_projet'] == $projet['nom_projet_encode']) {


                                        ?>
                                        <div class="carousel-item
                                        <?php
                                        if($i == 0) { echo 'active'; }
                                        ?>">
                                            <div class="photo-elt d-block w-100" style="background-image: url(<?= $url['url']; ?>)"></div>
                                        </div>

                                      <?php
                                        $i++;
                                    }
                                }
                            ?>
                        </div>

                     </div>


                    <div class="bloc-description nomProjet">
                        <?= substr(htmlspecialchars($projet['nom']), 0, 100); ?>
                    </div>

                    <div class="bloc-description">
                        <?= substr(htmlspecialchars($projet['url']), 0, 100); ?>
                    </div>
                    <div class="bloc-description">
                        <?= substr(htmlspecialchars($projet['categorie']), 0, 100); ?>
                    </div>

                    <div class="bloc-description">
                        <?= substr(strip_tags($projet['description']), 0, 100); ?>
                    </div>

                    <a title="modifier" class="a--actionProjet editerProjet" href="" data-id="<?= $projet['id'] ?>" data-nom-encode="<?= $projet['nom_projet_encode'] ?>" >&#x270E;</a>
                    <a title="supprimer" class="a--actionProjet" href="index.php?action=projets&amp;supprimer=true&amp;nom_projet=<?= $projet['nom_projet_encode']; ?>&amp;id_projets=<?= $projet['id']; ?>" onclick="confirm('Voulez-vous supprimer ce projet ?')">&#x1f5d1;</a>

                </div>
            </div>

        <?php
    }

    #Il faut récupérer la valeur du prochain ID des projets pour l'affecter à la table qui rassemblera les photos de ce nouveau projet
?>
</div>
    <h3 class="h3--ajouter-projet">Ajouter un projet</h3>

<div class="row">
    <form id="formNouveauProjet" method="POST" action="" enctype="multipart/form-data">

        <div class="form-group">
            <label for="annee">Nom</label>
            <input type="text" name="nom" class="form-control" id="nomProjet" required  onblur="getNomProjet()"/>
        </div>

        <div class="form-group">
            <label for="titre">url</label>
            <input type="text" name="url" class="form-control" required />
        </div>

        <div class="form-group">
            <label for="titre">categorie</label>
            <input type="text" name="categorie" class="form-control" required />
        </div>

        <div class="form-group">
            <label for="bodyParcours">Description</label>
            <textarea name="bodyNouveauProjet" id="newBodyProjet" class="form-control"></textarea>
        </div>

        <div id="imageField" class="form-group">
            <label for="imageField">Ajouter des images</label>
            <input type="file" name="image[]" class="input--image"   multiple />

<!--            <button id="btnAjoutImage">Nouvelle image</button>-->
        </div>


        <button type="submit" id="submitNouveauProjet" class="btn btn-primary">Ajouter</button>

    </form>

</div>

<?php

$content = ob_get_clean();

require 'template.php';
?>

<script>
    function getNomProjet() {

        var x =  document.getElementById('nomProjet');
        console.log(x)
        var nomTab = x.value.split(' ');

        var nom = nomTab.join('_');

        var accent = [
            /[\300-\306]/g, /[\340-\346]/g, // A, a
            /[\310-\313]/g, /[\350-\353]/g, // E, e
            /[\314-\317]/g, /[\354-\357]/g, // I, i
            /[\322-\330]/g, /[\362-\370]/g, // O, o
            /[\331-\334]/g, /[\371-\374]/g, // U, u
            /[\321]/g, /[\361]/g, // N, n
            /[\307]/g, /[\347]/g, // C, c
            /[']/g
        ];
        var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c','_'];


        for(var i = 0; i < accent.length; i++){
            nom = nom.replace(accent[i], noaccent[i]);
        }

        document.getElementById('formNouveauProjet').setAttribute('action', 'index.php?action=projets&nom_projet='+nom) ;
    }


</script>
