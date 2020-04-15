<?php


class parcoursManager extends Manager {

    public function afficherLeParcours() {

        $data = $this->dbConnect();

        $alp = $data->prepare('SELECT * FROM parcours WHERE id = :id');
        $alp->execute(array(':id' => $_GET['id_parcours']));

        return $alp->fetch();
    }

    public function getParcours() {

        $data = $this->dbConnect();

        $gp = $data->query('SELECT * FROM parcours');

        return $gp->fetchAll();
    }

    public function majParcours($iconeJob, $iconeEtude) {

        $data = $this->dbConnect();

        $mp = $data->prepare('UPDATE parcours 
                              SET titre = :titre, sous_titre = :sous_titre, body = :body, annee = :annee, iconeEtude = :iconeEtude, iconeJob = :iconeJob
                              WHERE id = :id');

        $mp->execute(array(
                       ':titre' => $_POST['titreMaj'],
                        ':sous_titre' => $_POST['sous_titreMaj'],
                        ':body' => $_POST['bodyParcoursMaj'],
                        ':annee' => $_POST['anneeMaj'],
                        ':iconeEtude' => $iconeEtude,
                        ':iconeJob' => $iconeJob,
                        ':id' => $_GET['id_parcours']
        ));



    }

    public function saveNewParcours($iconeJob, $iconeEtude) {

        $data = $this->dbConnect();

        $id = $data->prepare('INSERT INTO parcours(titre, sous_titre, body, annee, iconeEtude, iconeJob)
                       VALUES(:titre, :sous_titre, :body, :annee, :iconeEtude, :iconeJob)');

        $id->execute(array(
            ':titre' => $_POST['titre'],
            ':sous_titre' => $_POST['sous_titre'],
            ':body' => $_POST['bodyParcours'],
            ':annee' => $_POST['annee'],
            ':iconeEtude' => $iconeEtude,
            ':iconeJob' => $iconeJob
        ));

    }

    public function deleteParcours() {

        $data = $this->dbConnect();

        $id = $data->prepare('DELETE FROM parcours
                       WHERE id=?');
        $id->execute(array($_GET['id_parcours']));

    }

}