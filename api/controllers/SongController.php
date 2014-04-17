<?php

class SongController{

        private $model = null;
        public function __construct(){
                $this->model = new song();
        }

        // Display all song
        public function actionFind(){
                
                $data = $this->model->getSongs();

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(204, 'Nosong');
                endif;
        }

        // Display one song
        public function actionFindOne(){
                $id_song = F3::get('PARAMS.id');

                $data = $this->model->getSong($id_song);

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(404, 'Error 404');
                endif;
        }

        // Display all musics for one tag
        public function actionFindTag(){
                $tag = F3::get('PARAMS.tag');
                $data = $this->model->getSongTag($tag);

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(404, 'Error 404');
                endif;
        }

        // Display music for one string
        public function actionSearch(){
                $search = F3::get('PARAMS.search');
                $data = $this->model->getSongSearch($search);

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(404, 'Error 404');
                endif;
        }

}