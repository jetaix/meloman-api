<?php

    function db() {
        return new DB\SQL(
                'mysql:host=localhost;port=3306;dbname=meloman',
                'root',
                'root'
        );
        $db = $this->db();
    }

class song{

        function getSong(){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM song');

                return $data;
        }

}