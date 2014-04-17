<?php

    function db() {
        return new DB\SQL(
                'mysql:host=localhost;port=3306;dbname=api',
                'root',
                'root'
        );
        $db = $this->db();
    }
class myMovies{

        // Like

            function checkAction($user_id, $movie_id){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT id_like
                                   FROM likes
                                   WHERE id_user = "' . $user_id . '" AND id_movie = "' . $movie_id. '" ');

                return $data;
            }
            //get all like
            function getMyMoviesLiked(){
                    $db = db();
                    $db->begin();
                    $data = $db->exec('SELECT name_movie, author_movie, date_movie
                                    FROM likes 
                                    INNER JOIN movies ON likes.id_movie = movies.id_movie
                                    INNER JOIN users ON likes.id_user = users.id_user
                                    WHERE like_like = 1');

                    return $data;
            }

            // get like for one user
            function getMyMoviesLikedOne($user_id){
                    $db = db();
                    $db->begin();
                    $data = $db->exec('SELECT name_movie, author_movie, date_movie
                                    FROM likes 
                                    INNER JOIN movies ON likes.id_movie = movies.id_movie
                                    INNER JOIN users ON likes.id_user = users.id_user
                                    WHERE like_like = 1
                                    AND users.id_user = ' . $user_id . '');
                    return $data;
            }

            // create like for one user and one movie
            function createLike($user_id, $film_id){
                    $db = db();
                    $db->begin();
                    $data = $db->exec('INSERT INTO likes (id_user, id_movie, like_like, seen_like)
                                             VALUES ("' . $user_id . '", "' . $film_id . '", 1, 1 )');
                    $db->commit();

                    return $data;
            }

            // update like if a action (would or see) has been already create
            function updateLike($user_id, $movie_id){
                    $db = db();
                    $db->begin();
                    $update = $db->exec("UPDATE likes 
                                    SET like_like = 0 
                                    WHERE id_user = " . $user_id . " AND id_movie = " . $movie_id);
                    $db->commit();

                    return $update;
            }


        // See

            // get all movie see
            function getMyMoviesSee(){
                    $db = db();
                    $db->begin();
                    $data = $db->exec('SELECT name_movie, author_movie, date_movie
                                    FROM likes 
                                    INNER JOIN movies ON likes.id_movie = movies.id_movie
                                    INNER JOIN users ON likes.id_user = users.id_user
                                    WHERE seen_like = 1');

                    return $data;
            }

            //get see for one user
            function getMyMoviesSeeOne($user_id){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT name_movie, author_movie, date_movie
                                        FROM likes 
                                        INNER JOIN movies ON likes.id_movie = movies.id_movie
                                        INNER JOIN users ON likes.id_user = users.id_user
                                        WHERE seen_like = 1
                                        AND users.id_user = "' . $user_id . '"');

                return $data;
            }

            // create one see for one user and one movie
            function createSee($user_id, $movie_id){
                $db = db();
                $db->begin();
                $data = $db->exec("INSERT INTO likes (id_user, id_movie, seen_like)
                                   VALUES ('" . $user_id . "', '" . $movie_id . "', 1)");
                $db->commit();

                return $data;
            }

            function updateSee($user_id, $movie_id){
                    $db = db();
                    $db->begin();
                    $update = $db->exec("UPDATE likes 
                                    SET seen_like = 0 
                                    WHERE id_user = " . $user_id . " AND id_movie = " . $movie_id);
                    $db->commit();

                    return $update;
            }

        // Would see

            // get all would see movie

            function getMyMoviesWould(){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT name_movie, author_movie, date_movie
                                FROM likes 
                                INNER JOIN movies ON likes.id_movie = movies.id_movie
                                INNER JOIN users ON likes.id_user = users.id_user
                                WHERE would_see_like = 1');

                return $data;
            }

            //get would see for one user
            function getMyMoviesWouldOne($user_id){

                $db = db();
                $db->begin();
                $data = $db->exec('SELECT name_movie, author_movie, date_movie
                                FROM likes 
                                INNER JOIN movies ON likes.id_movie = movies.id_movie
                                INNER JOIN users ON likes.id_user = users.id_user
                                WHERE would_see_like = 1
                                AND users.id_user = ' . $user_id . '');

                return $data;
            }

            // create one would see for one user and one movie
            function createWouldSee($user_id, $movie_id){

                $db = db();
                $db->begin();
                $data = $db->exec("INSERT INTO likes (id_user, id_movie, would_see_like)
                                         VALUES ('" . $user_id . "', '" . $movie_id . "', 1)");
                $db->commit();

                return $data;
            }

            function updateWouldSee($user_id, $movie_id){
                    $db = db();
                    $db->begin();
                    $update = $db->exec("UPDATE likes 
                                    SET would_see_like = 0 
                                    WHERE id_user = " . $user_id . " AND id_movie = " . $movie_id);
                    $db->commit();

                    return $update;
            }

}