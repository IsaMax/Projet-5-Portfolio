<?php
ob_start();
?>
    <div id="FormJs">

    </div>
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>LISTE DES PARCOURS DISPONIBLES</div>
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
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>


                <?php

                foreach ($parcours as $elt) { ?>
                    <tr>
                        <td><?= htmlspecialchars($elt['id']); ?></td>
                        <td><?= htmlspecialchars($elt['annee']); ?></td>
                        <td><?= htmlspecialchars($elt['titre']); ?></td>
                        <td><?= htmlspecialchars($elt['sous_titre']); ?></td>
                        <td><?= substr(strip_tags($elt['body']), 0, 100); ?></td>
                        <td><?php

                            if($elt['iconeEtude'] == '1') {
                                echo '&#x2714;';
                            }
                            else {
                                echo '&#10008;';
                            }
                            ?></td>
                        <td><?php
                            if($elt['iconeJob'] == '1') {
                                echo '&#x2714;';
                            }
                            else {
                                echo '&#10008;';
                            }
                            ?></td>

                    <td><a title="modifier" class="a--actionParcours editerParcours" href="" data-id="<?= $elt['id'] ?>" >&#x270E;</a>
                  <a title="supprimer" class="a--actionParcours" href="index.php?action=parcours&amp;supprimer=true&amp;id_parcours=<?= $elt['id'] ?>" onclick="confirm('Voulez-vous supprimer cette entrée ?')">&#x1f5d1;</a></td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- ICI la variable POST['bodyParcours'] sert à l'enregistrer -->
<div class="ajout-parcours">
    <h3>Ajouter un nouveau parcours</h3>
    <form method="POST" action="index.php?action=parcours">

        <div class="form-row">
           <div class="form-group  col-md-6">
               <label for="annee">Année</label>
               <input type="text" name="annee" class="form-control" required />
           </div>

            <div class="form-group  col-md-6">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" required />
            </div>
        </div>
            <div class="form-group">
                <label for="sous_titre">Sous-Titre</label>
                <input type="text" name="sous_titre" class="form-control" required />
            </div>

            <div class="form-group">
                <label for="bodyParcours">Description</label>
                <textarea name="bodyParcours" id="addBodyParcours"></textarea>
            </div>

        <!--    <div class="group-input">-->
                <p class="p--icones">Icônes</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="iconeEtude" value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Icône Étude</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="iconeJob" value="1">
                    <label class="form-check-label" for="inlineCheckbox2">Icône Job</label>
                </div>
        <!--    </div>-->

            <button id="submitNewParcours" type="submit" class="btn btn-primary">Ajouter</button>

    </form>
</div>
<?php

$content = ob_get_clean();

require 'template.php';
?>