<?php

    function db() {
        return new DB\SQL(
                'mysql:host=127.0.0.1;port=8889;dbname=meloman',
                'root',
                'root'
        );
        $db = $this->db();
    }

class song{
        /* Get all songs */
        function getSongs(){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM song');

                return $data;
        }
        /* Get only one songs by ID */
        function getSong($id_song){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM song 
                                   WHERE id_song = ' . $id_song .' LIMIT 1');

                return $data;
        }
        /* Get all songs by tag name */
        function getSongTag($tag){

                $db = db();
                $db->begin();
                $data = $db->exec(' SELECT * FROM song 
                                    WHERE tag_song 
                                    LIKE "%'.$tag.'%"
                                ');

                return $data;
        }

        /* Get all song by search name ( on title_song, author_song, decription_song, tag_sound) */
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