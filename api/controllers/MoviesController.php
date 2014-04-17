<?php

class SongController{

        private $model = null;
        public function __construct(){
                $this->model = new song();
        }

        // Display all movies
        public function actionFind(){
                
                $data = $this->model->getSong();

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(204, 'Nosong');
                endif;
        }


}