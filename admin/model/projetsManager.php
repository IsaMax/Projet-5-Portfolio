<?php


class descriptionManager extends Manager {

    public function afficherLeProjet() {

        $data = $this->dbConnect();

        $alp = $data->query('SELECT * FROM projet WHERE id = ?');
        $alp->execute(array($_GET['id_projet']));

        return $alp->fetch();
    }

    public function getProjets() {

        $data = $this->dbConnect();

        $gp = $data->query('SELECT * FROM projet');

        return $gp->fetchAll();
    }

    public function majProjet() {

        $data = $this->dbConnect();

        $mp = $data->prepare('UPDATE projet 
                              SET nom = :nom, description = :description, url = :url, categorie = :categorie
                              WHERE id = :id');

        $mp->execute(array(
            ':nom' => $_POST['nom'],
            ':description' => $_POST['description'],
            ':url' => $_POST['url'],
            ':categorie' => $_POST['categorie'],
            ':id' => $_GET['id_projet']
        ));
    }

    public function majPhotos($url) {

        $data = $this->dbConnect();

        $mp = $data->prepare('INSERT INTO photo_projet(id_projet, url)
                       VALUES(:id_projet, :url)');

        $id->execute(array(
            ':id_projet' => $_GET['id_projet'],
            ':url' => $url,
        ));
    }


    public function saveNewProjet() {

        $data = $this->dbConnect();

        $id = $data->prepare('INSERT INTO projet(titre, sous_titre, body, annee, iconeEtude, iconeJob)
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

    public function saveNewPhotos($url) {

        $data = $this->dbConnect();

        $id = $data->prepare('INSERT INTO photo_projet(id_projet, url)
                       VALUES(:id_projet, :url)');

        $id->execute(array(
            ':id_projet' => $_GET['id_projet'],
            ':url' => $url,
        ));
    }

    public function deleteProjet() {

        $data = $this->dbConnect();

        $id = $data->prepare('DELETE FROM projet
                       WHERE id=?');
        $id->execute(array($_GET['id_projet']));

    }

    public function deletePhotos() {

        $data = $this->dbConnect();

        $id = $data->prepare('DELETE FROM photo_projet
                       WHERE id_projet=?');
        $id->execute(array($_GET['id_projet']));

    }

    public function deletePhoto() {

        $data = $this->dbConnect();

        $id = $data->prepare('DELETE FROM photo_projet
                       WHERE id=?');
        $id->execute(array($_GET['id_photo']));

    }
}