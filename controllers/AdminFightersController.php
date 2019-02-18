<?php


class AdminFightersController extends AdminBase {
    
    /**
	* Action для страницы 'бойцы'
    */
    public function actionIndex($page = 1) {

    	//получаем список бойцов
    	$fighters = Fighter::getFightersList($page);

   	 	require_once ROOT . '/views/admin/fighters/index.php';

    }

    /**
	* Action для удаление 'бойца'
    */
    public function actionDestroy($id) {
    	if($id) {
    		//удаляем бойца из базы
    		Fighter::deleteFighterById($id);
    		//Редирект обратно
    		header("Location: ".$_SERVER['HTTP_REFERER']);
    	}
    }

    /**
	* Action для редактирования 'бойца'
    */
    public static function actionEdit($id) {

		$result = false;
		$errors = false;

    	if($id) {
    		//получаем конкретного бойца по id
    		$fighter = Fighter::getFighterById($id);

    		//если форма отправлена
    		if(isset($_POST['submit'])) {
    			//получаем данные
    			$opt['name'] = $_POST['name'];
				$opt['description'] = $_POST['description'];
				$opt['nickname'] = $_POST['nickname'];
				$opt['nationality'] = $_POST['nationality'];
				$opt['bday'] = $_POST['bday'];
				$opt['height'] = $_POST['height'];
				$opt['arm_span'] = $_POST['arm_span'];
				$opt['w_category'] = $_POST['w_category'];
				$opt['insta'] = $_POST['insta'];
				$opt['tw'] = $_POST['tw'];
				$opt['wins'] = $_POST['wins'];
				$opt['loses'] = $_POST['loses'];
				$opt['not_heald'] = $_POST['not_heald'];
				$opt['meta_title'] = $_POST['meta_title'];
				$opt['meta_description'] = $_POST['meta_description'];
				$opt['meta_keyword'] = $_POST['meta_keyword'];

				// валидируем поля todo-валидация всех полей
				if($opt['name'] == "") {
					$errors[] = 'Заполните поля';
				}

				//редактируем бойца, если редактирование прошла успешно возвращаем true
				if(Fighter::editFighterById($id, $opt)) {
					$result = true;
				}
    		}
    	}

    	require_once ROOT . '/views/admin/fighters/edit.php';
    }


    /**
	* Action для добавления 'бойца'
    */
    public function actionCreate() {
		$result = false;

		$errors = false;


		$opt['name'] = '';
		$opt['image'] = '';
		$opt['description'] = '';
		$opt['nickname'] = '';
		$opt['nationality'] = '';
		$opt['bday'] = '';
		$opt['height'] = '';
		$opt['arm_span'] = '';
		$opt['w_category'] = '';
		$opt['insta'] = '';
		$opt['tw'] = '';
		$opt['wins'] = '';
		$opt['loses'] = '';
		$opt['not_heald'] = '';
		$opt['meta_title'] = '';
		$opt['meta_description'] = '';
		$opt['meta_keyword'] = '';

		//если форма отправлена
		if(isset($_POST['submit'])) {
			//получаем данные
			$opt['name'] = $_POST['name'];
			$opt['description'] = $_POST['description'];
			$opt['nickname'] = $_POST['nickname'];
			$opt['nationality'] = $_POST['nationality'];
			$opt['bday'] = $_POST['bday'];
			$opt['height'] = $_POST['height'];
			$opt['arm_span'] = $_POST['arm_span'];
			$opt['w_category'] = $_POST['w_category'];
			$opt['insta'] = $_POST['insta'];
			$opt['tw'] = $_POST['tw'];
			$opt['wins'] = $_POST['wins'];
			$opt['loses'] = $_POST['loses'];
			$opt['not_heald'] = $_POST['not_heald'];
			$opt['meta_title'] = $_POST['meta_title'];
			$opt['meta_description'] = $_POST['meta_description'];
			$opt['meta_keyword'] = $_POST['meta_keyword'];

			//валидация полей
			if($opt['name'] == "") {
				$errors[] = 'Заполните поля';
			}

			//если ошибок нету
			if($errors == false) {
				//добавляем бойца в базу
				$id = Fighter::createFighter($opt);
				if($id) {
					$result = true;
				}
			}
		}

		require_once ROOT . '/views/admin/fighters/create.php';

    }
   
}