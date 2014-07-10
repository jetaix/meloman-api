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
                $data = $db->exec(' SELECT * 
                                    FROM m_song
                                    INNER JOIN m_category
                                    ON m_category.id_category = m_song.fk_id_category
                                    INNER JOIN m_user
                                    ON m_user.id_user = m_song.fk_id_user
                                    INNER JOIN m_bg
                                    ON m_bg.id_bg = m_song.fk_id_bg');

                return $data;
        }
        /* Get only one songs by ID */
        function getSong($id_song){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT * FROM m_song 
                                   WHERE id_song = ' . $id_song .' LIMIT 1');

                return $data;
        }
        /* Get all songs by tag name */
        function getSongTag($tag){

                $db = db();
                $db->begin();
                $data = $db->exec(' SELECT * FROM m_song
                                    INNER JOIN m_songtags
                                    ON references m_songtags.fk_id_song = m_song.id_song
                                    INNER JOIN m_tag
                                    ON references m_songtags.fk_id_tag = m_tag.id_tag 
                                    WHERE tag.name_tag
                                    LIKE "%'.$tag.'%"
                                ');

                return $data;
        }

        /* Get all song by search name ( on title_song, author_song, decription_song, tag_sound) */
        function getSongSearch($search){

                $db = db();
                $db->begin();
                $data = $db->exec(' SELECT * FROM m_song 
                                    WHERE title_song LIKE "%'.$search.'%"
                                    OR author_song LIKE "%'.$search.'%"
                                    OR description_song LIKE "%'.$search.'%"
                                    OR tag_song LIKE "%'.$search.'%"
                                ');

                return $data;
        }

}