<span class="close">x</span>

<form id="formModif" method="POST" action="index.php?action=parcours&amp;maj=true&amp;id_parcours=<?= $unParcours['id']; ?>">

    <div class="form-group">
        <label for="annee">Année</label>
        <input type="text" name="anneeMaj" value="<?= $unParcours['annee']; ?>" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titreMaj" value="<?= $unParcours['titre']; ?>" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="sous_titre">Sous-Titre</label>
        <input type="text" name="sous_titreMaj" value="<?= $unParcours['sous_titre']; ?>" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="bodyParcours">Description</label>
        <textarea name="bodyParcoursMaj" id="addBodyParcoursSeul" class="form-control addBodyParcoursSeul" required><?= $unParcours['body']; ?></textarea>
    </div>

    <!--    <div class="group-input">-->
    <p>Icônes</p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="iconeEtudeMaj" value="1"
            <?php
                $etude = (int) $unParcours['iconeEtude'];

                if($unParcours['iconeEtude'] == 1) {
                    echo 'checked';
                }
            ?> >
        <label class="form-check-label" for="inlineCheckbox1">Icône Étude</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="iconeJobMaj" value="1" <?php
        $etude = (int) $unParcours['iconeEtude'];

        if($unParcours['iconeJob'] == 1) {
            echo 'checked';
        }
        ?> >
        <label class="form-check-label" for="inlineCheckbox2">Icône Job</label>
    </div>
    <!--    </div>-->

    <button type="submit" id="submitModif" class="btn btn-primary">Modifier</button>

</form>
