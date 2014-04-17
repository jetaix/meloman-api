<?php

    function db() {
        return new DB\SQL(
                'mysql:host=localhost;port=3306;dbname=meloman',
                'root',
                'root'
        );
        $db = $this->db();
    }

class playlist{

        /* Recupere toute les playlists */
        function getPlaylists(){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT title_playlist FROM playlist');

                return $data;
        }

        /* Recupere la liste des playlist pour un utilisateur donné */
        function getPlaylist($id_user){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT title_playlist FROM playlist 
                                   WHERE user_id_user = '.$id_user.'');

                return $data;
        }

}