<?php


class creationsManager extends Manager {

    public function getCreations() {

        $data = $this->dbConnect();

        if($_GET['categorie'] == 'all') {
            $gc = $data->query('SELECT * FROM projet');
        }
        else {
            $gc = $data->query('SELECT * FROM projet WHERE categorie = ?');
            $gc->execute(array($_GET['categorie']));
        }

        return $gc->fetchAll();
    }

    public function getFiltres() {

        $data = $this->dbConnect();

        $gf = $data->query('SELECT categorie FROM projet GROUP BY categorie');

        return $gf->fetchAll();
    }
}