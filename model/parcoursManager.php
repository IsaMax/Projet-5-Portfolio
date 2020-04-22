<?php

// Une table description avec les 3 premiers paragraphes et une competence

class parcoursManager extends Manager {

    public function getEvenements() {

        $data = $this->dbConnect();
        $ge = $data->query('SELECT *  FROM parcours ORDER BY annee');
        return $ge->fetchAll();
    }

}

