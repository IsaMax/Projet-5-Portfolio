<?php

class messageController {

    public static function afficherLesMessages() {

        $data = new messagesManager();

        $lesMessages = $data->afficherLesMessages();


        require 'vue/messagesView.php';
    }


    public static function supprimerMessage() {

        $data = new messagesManager();

        $data->deleteMessage();
        
    }

    public static function compterMessage() {

        $data = new messagesManager();

        $nombreMessage = $data->compterMessages();
        
    }


}