<?php

    function db() {
        return new DB\SQL(
                'mysql:host=127.0.0.1;port=8889;dbname=meloman',
                'root',
                'root'
        );
        $db = $this->db();
    }

class category{
        /* Get all category */
        function getCategorys(){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT id_category, title_category FROM category');

                return $data;
        }
}