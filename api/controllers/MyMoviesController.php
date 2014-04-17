<?php

class MyMoviesController{

    private $model = null;
    public function __construct(){
            $this->model = new myMovies();
    }

	// Afficher tous les films aimés
	public function actionLikedFind(){
		$data = $this->model->getMyMoviesLiked();

		if (!empty($data)):
			Api::response(200, $data);
		else:
			Api::response(204, 'No Content');
		endif;
	}

	// Afficher tous les films aimés par un utilisateur
	public function actionLikedFindOne(){
		$user_id = F3::get('PARAMS.id');

		$data = $this->model->getMyMoviesLikedOne($user_id);

		if (!empty($data)):
			Api::response(200, $data);
		else:
			Api::response(204, 'No Content');
		endif;
	}

	// un utilisateur like un film
	public function actionLikedCreate(){
		$user_id = F3::get('POST.user_id');
		$film_id = F3::get('POST.movie_id');

		$data = $this->model->createLike($user_id, $film_id);

		if (!empty($data)):
			Api::response(200, $data);
		else:
			Api::response(204, 'No Content');
		endif;

	}

	// un utilisateur dislike un film
	public function actionLikedUpdate(){

			$data = Put::get();

			$check = $this->model->checkAction($data['user'], $data['movie']);

			if(!empty($check) && (!empty($data['user']) && !empty($data['movie'])) ):
				$this->model->updateLike($data['user'], $data['movie']);
				Api::response(200, 'Like update (dislike)');
			
            else:
            		$this->model->createLike($data['user'], $data['movie']);
                    Api::response(204, 'Like create');
            endif;			
	}


	// Afficher tous les films vue 
	public function actionSeeFind(){

		$data = $this->model->getMyMoviesSee();

		if (!empty($data)):
			Api::response(200, $data);
		else:
			Api::response(204, 'No Content');
		endif;
	}

	// Afficher tous les films vue par un utilisateur
	public function actionSeeFindOne(){
		$user_id = F3::get('PARAMS.id');

		$data = $this->model->getMyMoviesSeeOne($user_id);
		
		if (!empty($data)):
			Api::response(200, $data);
		else:
			Api::response(204, 'No Content');
		endif;
	}

	// Créer un film que l'utilisateur a vu
	public function actionSeeCreate(){
		$user_id = f3::get('POST.user_id');
		$movie_id = f3::get('POST.movie_id');

		$data = $this->model->createSee($user_id, $movie_id);

		if (!empty($user_id) && !empty($movie_id)):
			Api::response(200, 'See create ');
		else:
			Api::response(400, 'Bad Request');
		endif;
	}

	// un utilisateur suprimme le fait d'avoir vu un film
	public function actionSeeUpdate(){

			$data = Put::get();
			$check = $this->model->checkAction($data['user'], $data['movie']);

			if(!empty($check) && (!empty($data['user']) && !empty($data['movie'])) ):
				$this->model->updateSee($data['user'], $data['movie']);
				Api::response(200, 'See remove');
			
            else:
            		$this->model->createSee($data['user'], $data['movie']);
                    Api::response(204, 'See create');
            endif;		
	}

	// Afficher tous les films qui veulent être vue 
	public function actionWould_seeFind(){

		$data = $this->model->getMyMoviesWould();

		if (!empty($data)):
			Api::response(200, $data);
		else:
			Api::response(204, 'No Content');
		endif;
	}

	// Afficher tous les films qui veulent être vue par un utilisateur
	public function actionWould_seeFindOne(){
		$user_id = F3::get('PARAMS.id');

		$data = $this->model->getMyMoviesWouldOne($user_id);

		if (!empty($data)):
			Api::response(200, $data);
		else:
			Api::response(204, 'No Content');
		endif;
	}

	// Créer un film que l'utilisateur veu voir
	public function actionWould_seeCreate(){
		$user_id = f3::get('POST.user_id');
		$movie_id = f3::get('POST.movie_id');

		$data = $this->model->createWouldSee($user_id, $movie_id);

		if (!empty($user_id) && !empty($movie_id)):
			Api::response(200, 'Film ' . $movie_id . ' veux etre vu par ' . $user_id);
		else:
			Api::response(400, 'Bad Request');
		endif;
	}

	// un utilisateur suprimme le fait de vouloir voir un film
	public function actionWould_seeUpdate(){

		$data = Put::get();
		$check = $this->model->checkAction($data['user'], $data['movie']);

		if(!empty($check) && (!empty($data['user']) && !empty($data['movie'])) ):
			$this->model->updateWouldSee($data['user'], $data['movie']);
			Api::response(200, 'Would See remove');
		
        else:
        		$this->model->createWouldSee($data['user'], $data['movie']);
                Api::response(204, 'Would see create');
        endif;

	}

}