<?php


class descriptionManager extends Manager {

    public function afficherLeParcours() {

        $data = $this->dbConnect();

        $alp = $data->query('SELECT * FROM parcours WHERE id = ?');
        $alp->execute(array($_GET['id_parcours']));

        return $alp->fetch();
    }

    public function getParcours() {

        $data = $this->dbConnect();

        $gp = $data->query('SELECT * FROM parcours');

        return $gp->fetchAll();
    }

    public function majParcours() {

        $data = $this->dbConnect();

        $mp = $data->prepare('UPDATE parcours 
                              SET titre = :titre, sous_titre = :sous_titre, body = :body, annee = :annee, icone_couverture = :icone
                              WHERE id = :id');

        $mp->execute(array(
                       ':titre' => $_POST['titre'],
                        ':sous_titre' => $_POST['sous_titre'],
                        ':body' => $_POST['body'],
                        ':annee' => $_POST['anneeParcours'],
                        ':icone' => $_POST['choixIcone'],
                        ':id' => $_GET['id_parcours']
        ));

    }

    public function saveNewParcours() {

        $data = $this->dbConnect();

        $id = $data->prepare('INSERT INTO parcours(titre, sous_titre, body, annee, iconeEtude, iconeJob)
                       VALUES(:titre, :sous_titre, :body, :annee, :iconeEtude, :iconeJob)');

        $id->execute(array(
            ':titre' => $_POST['titre'],
            ':sous_titre' => $_POST['sous_titre'],
            ':body' => $_POST['bodyParcours'],
            ':annee' => $_POST['anneeParcours'],
            ':iconeEtude' => $_POST['etude'],
            ':iconeJob' => $_POST['job'],
            ':id' => $_GET['id_parcours']
        ));

    }

    public function deleteParcours() {

        $data = $this->dbConnect();

        $id = $data->prepare('DELETE FROM parcours
                       WHERE id=?');
        $id->execute(array($_GET['id_parcours']));

    }

}