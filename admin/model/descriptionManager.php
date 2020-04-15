<?php


class descriptionManager extends Manager {

    public function getDescription() {

        $data = $this->dbConnect();

        $gp = $data->query('SELECT * FROM description');

        return $gp->fetch();
    }

    public function countDescription() {

        $data = $this->dbConnect();

        $cd = $data->query('SELECT COUNT(id) as nbrDesc FROM description');

        return $cd->fetch();
    }

    public function updateDescription() {

        $data = $this->dbConnect();

        $ud = $data->prepare('UPDATE description 
                              SET contenu = ?  WHERE id = 1');
        $ud->execute(array($_POST['description']));

    }

    public function insertDescription() {

        $data = $this->dbConnect();

        $id = $data->prepare('INSERT INTO description(contenu)
                       VALUES(?)');
        $id->execute(array($_POST['description']));

    }
}