<?php

// Une table description avec les 3 premiers paragraphes et une competence

class homeManager extends Manager {

    public function getDescription() {

        $data = $this->dbConnect();
        $gd = $data->query('SELECT *  FROM description');
        return $gd->fetch();
    }

    public function getCompetences() {

        $data = $this->dbConnect();
        $gc = $data->query('SELECT * FROM competence');
        return $gc->fetchAll();
    }
}

