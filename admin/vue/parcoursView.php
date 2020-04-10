
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Parcours</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Annee</th>
                    <th>Titre</th>
                    <th>Sous-titre</th>
                    <th>Contenu</th>
                    <th>Icône Étude</th>
                    <th>Icône Job</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Annee</th>
                    <th>Titre</th>
                    <th>Sous-titre</th>
                    <th>Contenu</th>
                    <th>Icône Étude</th>
                    <th>Icône Job</th>
                    <th colspan="2">Action</th>
                </tr>
                </tfoot>
                <tbody>


                <?php foreach ($parcours as $elt) { ?>
                    <tr>
                        <td><?= htmlspecialchars($parcours['id']); ?></td>
                        <td><?= htmlspecialchars($parcours['annee']); ?></td>
                        <td><?= htmlspecialchars($parcours['sous_titre']); ?></td>
                        <td><?= htmlspecialchars($parcours['contenu']); ?></td>
                        <td><?php

                            $iconeEtude = (int) $parcours['iconeEtude'];
                            if($iconeEtude == 1) {
                                echo '&#x2714;';
                            }
                            else {
                                echo '&#10008;';
                            }
                            ?></td>
                        <td><?php
                            $iconeJob = (int) $parcours['iconeJob'];
                            if($iconeJob == 1) {
                                echo '&#x2714;';
                            }
                            else {
                                echo '&#10008;';
                            }
                            ?></td>
                    </tr>
                    <tr><a id="editerParcours" href="" data-id="<?= $parcours['id'] ?>" >&#x270E;</a></tr>
                    <tr><a href="./projet5/index.php?action=parcours&amp;supprimer=true&amp;id_parcours=<?= $parcours['id'] ?>" onclick="confirm('Voulez-vous supprimer cette entrée ?')">&#x1f5d1;</a></tr>

                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="FormJs">

</div>

<!-- ICI la variable POST['bodyParcours'] sert à l'enregistrer -->
<form method="POST" action="./projet5/index.php?action=parcours">

   <div class="form-group">
       <label for="annee">Année</label>
       <input type="text" name="annee" required />
   </div>

    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" required />
    </div>

    <div class="form-group">
        <label for="sous_titre">Sous-Titre</label>
        <input type="text" name="sous_titre" required />
    </div>

    <div class="form-group">
        <label for="bodyParcours">Description</label>
        <textarea name="bodyParcours" id="addBodyParcours" required></textarea>
    </div>

<!--    <div class="group-input">-->
        <p>Icônes</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="etude" value="1">
            <label class="form-check-label" for="inlineCheckbox1">Icône Étude</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="job" value="1">
            <label class="form-check-label" for="inlineCheckbox2">Icône Job</label>
        </div>
<!--    </div>-->

    <button id="submitNewParcours" type="submit" class="btn btn-primary">Ajouter</button>

</form>