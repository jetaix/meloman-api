<?php

    function db() {
        return new DB\SQL(
                'mysql:host=127.0.0.1;port=8889;dbname=meloman',
                'root',
                'root'
        );
        $db = $this->db();
    }

class user{

        function getUsers(){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM user');

                return $data;
        }

        function getUser($id_user){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM user 
                                   WHERE id_user = ' . $id_user .' LIMIT 1');

                return $data;
        }

}