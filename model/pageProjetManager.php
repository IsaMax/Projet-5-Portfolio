<?php


class pageProjetManager extends Manager {

    public function getPage() {

        $data = $this->dbConnect();


        $gp = $data->prepare('SELECT * FROM photo_projet
                            INNER JOIN projet
                            ON photo_projet.nom_projet = projet.nom_projet_encode
                            WHERE projet.id = ?
                          
                           ');
        $gp->execute(array($_GET['id_projet']));

        return $gp->fetchAll();

    }
}