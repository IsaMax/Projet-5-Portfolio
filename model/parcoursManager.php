<?php

// Une table description avec les 3 premiers paragraphes et une competence

class homeManager extends Manager {

    public function getEvenements() {

        $data = $this->dbConnect();
        $ge = $data->query('SELECT *  FROM parcours');
        return $ge->fetchAll();
    }

}

