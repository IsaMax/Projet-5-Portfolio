<?php


class contactManager extends Manager
{

    public function postMessage()
    {
        $data = $this->dbConnect();

        $pm = $data->prepare('INSERT INTO message(contenu, email, nom, sujet)
                       VALUES(:contenu, :email, :nom, :sujet)');

       $valretour = $pm->execute(array(
            ':contenu' => $_POST['message'],
            ':email' => $_POST['mail'],
            ':nom' => $_POST['nom'],
            ':sujet' => $_POST['objet'],
        ));

       return $valretour;

    }
}