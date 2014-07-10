<?php

    function db() {
        return new DB\SQL(
                'mysql:host=127.0.0.1;port=8889;dbname=meloman',
                'root',
                'root'
        );
        $db = $this->db();
    }

class artist {
        /* Get all songs */
        function getArtistSong($name_artist){
                $db = db();
                $db->begin();
                $data = $db->exec(' SELECT * 
                                    FROM m_song
                                    WHERE artist_song like "%'.$name_artist.'%"');

                return $data;
        }


}