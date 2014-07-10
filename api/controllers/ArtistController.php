<?php

class ArtistController{

        private $model = null;
        public function __construct(){
                $this->model = new artist();
        }

        // Display all song
        public function actionFindArtistSongs(){
                $name_artist = F3::get('PARAMS.artist');
                
                $data = $this->model->getArtistSong($name_artist);

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(204, 'No song for this artist');
                endif;
        }


}