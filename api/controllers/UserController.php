<?php

class UserController{

        private $model = null;
        public function __construct(){
                $this->model = new user();
        }

        // Display all song
        public function actionFind(){
                
                $data = $this->model->getUsers();

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(204, 'Nosong');
                endif;
        }

        // Display one song
        public function actionFindOne(){
                $id_user = F3::get('PARAMS.id');

                $data = $this->model->getUser($id_user);

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(404, 'Error 404');
                endif;
        }

}