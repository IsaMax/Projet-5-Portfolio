<?php


class projetsManager extends Manager {

    public function afficherLeProjet() {

        $data = $this->dbConnect();

        $alp = $data->prepare('SELECT * FROM projet WHERE id = ?');

        $alp->execute(array($_GET['id_projets']));

        return $alp->fetch();
    }

    public function afficherLesPhotos() {

        $data = $this->dbConnect();

        $alp = $data->prepare('SELECT * FROM photo_projet WHERE nom_projet = ?');
        $alp->execute(array($_GET['nom_projet']));

        return $alp->fetchAll();
    }

    public function afficherToutesLesPhotos() {

        $data = $this->dbConnect();

        $alp = $data->query('SELECT * FROM photo_projet');

        return $alp->fetchAll();
    }


    public function getProjets() {

        $data = $this->dbConnect();

        $gp = $data->query('SELECT * FROM projet');

        return $gp->fetchAll();
    }

    public function majProjet() {

        $data = $this->dbConnect();

        $mp = $data->prepare('UPDATE projet 
                              SET description = :description, url = :url, categorie = :categorie, nom_projet_encode = :nom_projet_encode
                              WHERE id = :id');

        $mp->execute(array(
            ':description' => $_POST['bodyProjet'],
            ':url' => $_POST['url'],
            ':categorie' => $_POST['categorie'],
            ':nom_projet_encode' => $_GET['nom_projet'],
            ':id' => $_GET['id_projets']
        ));
    }


    public function majPhotos($url) {

        $data = $this->dbConnect();

        $mp = $data->prepare('INSERT INTO photo_projet(nom_projet, url)
                       VALUES(:nom_projet, :url)');
        
        $mp->execute(array(
            ':nom_projet' => $_GET['nom_projet'],
            ':url' => $url,
        ));
    }


    public function saveNewProjet() {

        $data = $this->dbConnect();

        $id = $data->prepare('INSERT INTO projet(nom, description, url, categorie, nom_projet_encode)
                       VALUES(:nom, :description, :url, :categorie, :nom_projet_encode)');

        $id->execute(array(
            ':nom' => $_POST['nom'],
            ':description' => $_POST['bodyNouveauProjet'],
            ':url' => $_POST['url'],
            ':categorie' => $_POST['categorie'],
            ':nom_projet_encode' => $_GET['nom_projet']
        ));
    }

    public function saveNewPhotos($url) {

        $data = $this->dbConnect();

        $id = $data->prepare('INSERT INTO photo_projet(nom_projet, url_photo)
                       VALUES(:nom_projet, :url)');

        $id->execute(array(
            ':nom_projet' => $_GET['nom_projet'],
            ':url' => $url,
        ));
    }

    public function returnNomProjet() {

        $data = $this->dbConnect();

        $rmi = $data->query('SELECT nom FROM projet');

        return $rmi->fetch();
    }

    public function deleteProjet() {

        $data = $this->dbConnect();

        $dp = $data->prepare('DELETE FROM projet
                       WHERE id=?');
        $dp->execute(array($_GET['id_projets']));

    }

    public function deletePhotos() {

        $data = $this->dbConnect();

        $id = $data->prepare('DELETE FROM photo_projet
                       WHERE nom_projet=?');
        $id->execute(array($_GET['nom_projet']));

    }

    public function deletePhoto() {

        $data = $this->dbConnect();

        $id = $data->prepare('DELETE FROM photo_projet
                       WHERE id=?');
        $id->execute(array($_GET['id_photo']));

    }

    public function compterProjets() {

        $data = $this->dbConnect();

        $nbr = $data->query('SELECT COUNT(id) as nombre_projet FROM projet');
        return$nbr->fetch();
    }


}