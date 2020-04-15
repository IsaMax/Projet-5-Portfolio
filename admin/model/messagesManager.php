<?php


class messagesManager extends Manager {

    public function afficherLesMessages() {

        $data = $this->dbConnect();

        $alm = $data->query('SELECT * FROM message');

        return $alm->fetchAll();
    }


    public function deleteProjet() {

        $data = $this->dbConnect();

        $dp = $data->prepare('DELETE FROM message
                       WHERE id=?');
        $dp->execute(array($_GET['id_message']));

    }


    public function compterMessages() {

        $data = $this->dbConnect();

        $nbr = $data->query('SELECT COUNT(id) as nombre_message FROM message');
        return$nbr->fetch();
    }


}