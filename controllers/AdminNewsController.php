<?php
/**
*AdminNewsController - управление новостями в админке
*/
class AdminNewsController extends AdminBase {

	/**
	*Action для страницы новостей в админке
	*/
	public function actionIndex($page = 1) {
		//получаем список новостей
		$newsList = News::getNewsList($page);

		require_once ROOT . '/views/admin/news/index.php';
	}

	/**
	*Action для добавления новостей в базу
	*/
	public function actionCreate() {
		$result = false;
		

		$opt['name'] = '';
		$opt['short_description'] = '';
		$opt['description'] = '';
		$opt['main_article'] = '';
		$opt['source'] = '';
		$opt['meta_title'] = '';
		$opt['meta_description'] = '';
		$opt['meta_keyword'] = '';
		//если форма отправлена
		if(isset($_POST['submit'])) {
			//получаем данные из формы
			$opt['name'] = $_POST['name'];
			$opt['short_description'] = $_POST['short_description'];
			$opt['description'] = $_POST['description'];
			$opt['main_article'] = $_POST['main_article'];
			$opt['source'] = $_POST['source'];
			$opt['meta_title'] = $_POST['meta_title'];
			$opt['meta_description'] = $_POST['meta_description'];
			$opt['meta_keyword'] = $_POST['meta_keyword'];

			$errors = false;
			//валидация полей
			if($opt['name'] == '') {
				$errors[] = 'Заполните поля';
			}
			//если ошибок нету
			if($errors == false) {
				//добавляем новость в базу
				$id = News::createNews($opt);
				if($id) {
					$result = true;
				}
			}
		}
		require_once ROOT . '/views/admin/news/create.php';
	}

	/**
	*Action для удаления новостя из базы по id
	*/
	public function actionDestroy($id) {

		if($id) {
			//удаляем конкретную новость
			News::deleteNewsById($id);
			//редирект
			header("Location: /admin/news");
		}
	}

	/**
	*Action для редактирования новостя в админке
	*/
	public static function actionEdit($id) {

		$result = false;
		
		if($id) {
			//получаем конкретную новость по id
			$newsItem = News::getNewsItemById($id);

			//если форма отправлена
			if(isset($_POST['submit'])) {
				//получаем данные из формы
				$opt['name'] = $_POST['name'];
				$opt['short_description'] = $_POST['short_description'];
				$opt['description'] = $_POST['description'];
				$opt['main_article'] = $_POST['main_article'];
				$opt['source'] = $_POST['source'];
				$opt['meta_title'] = $_POST['meta_title'];
				$opt['meta_description'] = $_POST['meta_description'];
				$opt['meta_keyword'] = $_POST['meta_keyword'];

				$errors = false;
				//валидация данных
				if($opt['name'] == '') {
					$errors[] = 'Заполните поля';
				}

				//редактируем новость, если все ок возвращаем true
				if(News::editNews($id, $opt)) {
					$result = true;
				}

				// if($errors == false) {
					
				// 	if($id) {
				// 		$result = true;
				// 	}
				// }
			}
		}
		require_once ROOT . '/views/admin/news/edit.php';
	}
}