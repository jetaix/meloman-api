<?php

class CategoryController{

        private $model = null;
        public function __construct(){
                $this->model = new category();
        }

        // Display all song
        public function actionFind(){
                $id_category = F3::get('PARAMS.category');
                
                $data = $this->model->getCategory($id_category);

                if (!empty($data)):
                        Api::response(200, $data);
                else:
                        Api::response(204, 'No caegory');
                endif;
        }

}