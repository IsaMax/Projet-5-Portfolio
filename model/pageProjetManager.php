<?php


class pageProjetManager extends Manager {

    public function getPage() {

        $data = $this->dbConnect();

        $gp = $data->query('SELECT * FROM page_creation WHERE id_projet = ?');
        $gp->execute(array($_GET['id_projet']));

        return $gp->fetch();
    }

    public function getPhotos() {

        $data = $this->dbConnect();

        $gp = $data->query('SELECT * FROM photo_projet WHERE id_projet = ?');
        $gp->execute(array($_GET['id_projet']));

        return $gp->fetchAll();
    }
}