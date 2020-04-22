<?php


class creationsManager extends Manager
{

    public function getCreations()
    {

        $data = $this->dbConnect();

        if ($_GET['categorie'] == 'all') {
            $gc = $data->query('SELECT *, projet.id as id_projet FROM projet
                                INNER JOIN photo_projet
                                ON projet.nom_projet_encode = photo_projet.nom_projet
                                GROUP BY photo_projet.nom_projet
                                ORDER BY projet.id');
        } else {
            $gc = $data->prepare('SELECT *, projet.id as id_projet FROM projet
                                INNER JOIN photo_projet
                                ON projet.nom_projet_encode = photo_projet.nom_projet
                                WHERE projet.categorie = ?
                                GROUP BY photo_projet.nom_projet');
            $gc->execute(array($_GET['categorie']));
        }

        return $gc->fetchAll();
    }

    public function getFiltres()
    {

        $data = $this->dbConnect();

        $gf = $data->query('SELECT categorie FROM projet GROUP BY categorie');

        return $gf->fetchAll();
    }
}