<span class="close">x</span>
<form id="formModifProjet" data-id="<?= $unProjet['id']; ?>" method="POST" action="index.php?action=projets&amp;maj=true&amp;id_projets=<?= $unProjet['id']; ?>&amp;nom_projet=<?= $unProjet['nom_projet_encode']; ?>" enctype="multipart/form-data">

    <div class="form-group">
        <label for="annee">Nom</label>
        <input type="text" name="nom" value="<?= $unProjet['nom']; ?>" class="form-control" id="majNomProjet" disabled />
    </div>

    <div class="form-group">
        <label for="titre">url</label>
        <input type="text" name="url" value="<?= $unProjet['url']; ?>" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="titre">categorie</label>
        <input type="text" name="categorie" value="<?= $unProjet['categorie']; ?>" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="bodyParcours">Description</label>
        <textarea name="bodyProjet" id="addBodyProjet" class="form-control" required><?= $unProjet['description']; ?></textarea>
    </div>

    <div class="container-photo">
    <?php

        foreach ($lesPhotos as $photo) {
            ?>

            <div class="bloc-photos">
                <div width="300" height="200" style="background-image: url(<?= $photo["url_photo"] ?>)"  class="photoAModifier"></div>
                <a href="index.php?action=projets&amp;supprimerPhoto=true&amp;id_photo=<?= $photo["id"] ?>">&#x1f5d1;</a>
            </div>
            <?php
        }

    ?>
    </div>

    <div id="imageField" class="form-group">
        <label for="imageField">Ajouter des images</label>
        <input type="file" name="image[]" class="input--image"  multiple />

    </div>


    <button type="submit" id="submitModifProjet" class="btn btn-primary">Modifier</button>

</form>
