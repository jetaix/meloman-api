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

        function getSongs(){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM song');

                return $data;
        }

        function getSong($id_song){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM song 
                                   WHERE id_song = ' . $id_song .' LIMIT 1');

                return $data;
        }

        function getSongTag($tag){

                $db = db();
                $db->begin();
                $data = $db->exec(' SELECT * FROM song 
                                    WHERE tag_song 
                                    LIKE "%'.$tag.'%"
                                ');

                return $data;
        }


        function getSongSearch($search){

                $db = db();
                $db->begin();
                $data = $db->exec(' SELECT * FROM song 
                                    WHERE title_song LIKE "%'.$search.'%"
                                    OR author_song LIKE "%'.$search.'%"
                                    OR description_song LIKE "%'.$search.'%"
                                    OR tag_song LIKE "%'.$search.'%"
                                ');

                return $data;
        }


}