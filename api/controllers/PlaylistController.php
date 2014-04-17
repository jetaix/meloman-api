<?php

class PlaylistController{


        private $model = null;
        public function __construct(){
                $this->model = new playlist();
        }

        // Display all song
        public function actionFind(){
                
                $data = $this->model->getPlaylists();

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(204, 'Nosong');
                endif;
        }

        // Display one song
        public function actionFindOne(){
                $id_playlist = F3::get('PARAMS.id');

                $data = $this->model->getPlaylist($id_playlist);

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(404, 'Error 404');
                endif;
        }

}