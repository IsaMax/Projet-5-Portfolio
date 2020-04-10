<span class="close"></span>

<form id="formModif" method="POST" action="./projet5/index.php?action=parcours&amp;maj=true&amp;id_parcours=<?= $unParcours['id']; ?>">

    <div class="form-group">
        <label for="annee">Année</label>
        <input type="text" name="annee" value="<?= $unParcours['annee']; ?>" required />
    </div>

    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" value="<?= $unParcours['titre']; ?>" required />
    </div>

    <div class="form-group">
        <label for="sous_titre">Sous-Titre</label>
        <input type="text" name="sous_titre" value="<?= $unParcours['sous_titre']; ?>" required />
    </div>

    <div class="form-group">
        <label for="bodyParcours">Description</label>
        <textarea name="bodyParcours" id="addBodyParcours" required><?= $unParcours['body']; ?></textarea>
    </div>

    <!--    <div class="group-input">-->
    <p>Icônes</p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="etude" value="1"
            <?php
                $etude = (int) $unParcours['iconeEtude'];

                if($unParcours['iconeEtude'] == 1) {
                    echo 'checked';
                }
            ?> >
        <label class="form-check-label" for="inlineCheckbox1">Icône Étude</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="job" value="1" <?php
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