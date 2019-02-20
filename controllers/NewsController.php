<?php
/**
*NewsController - вывод новостей на сайте
*/	
class NewsController {

	/**
    *Action - вывод новостей на главную страницу сайта
    */
	public function actionIndex() {
		//получаем список новостей
		$newsList = News::getNewsList();

		require_once(ROOT.'/views/news/index.php');

	}
	/**
    *Action - просмотр одной новости по id
    */
	public function actionView($id) {
		
		if($id) {
			//получаем новость по id
			$newsItem = News::getNewsItemById($id);
			//получаем количество просмотров новостя
			$views = $newsItem['views'];
			//обновление просмотов
			News::updateViewsCount($views, $id);
			//получаем последние новости
			$latestNews = News::getLatestNews();
			//получаем список комментариев к конкретной новости
			$commentsList = Comment::getCommentsList($id);
		

			require_once(ROOT.'/views/news/view.php');

		}

	}


	public function actionAddComment($id) {
		$errors = false;
		$name = '';
		$userComment = '';

		if(isset($_POST["user_comment"]) && isset($_POST["name"])) {
			$name = trim(htmlspecialchars($_POST['name']));
			$userComment = trim(htmlspecialchars($_POST['user_comment']));

			//валидируем поля
			if(!User::checkName($name)) {
				$errors[] = 'Заполните поле Имя';
			}

			if($userComment == '') {
				$errors[] = 'Пустое поле комментариев';
			}

			//если все ок
			if(!$errors) {
				//добавляем коммент в базу и возвращаем его id
				$lastCommentId = Comment::createComment($id, $name, $userComment);
				//Получаем последний добавленный комментарий
				$lastComment = Comment::getLastComment($lastCommentId, $id);

				echo json_encode($lastComment);

				//реддирект обратно 
				// header("Location: ". $_SERVER['HTTP_REFERER']);
			}
		} 
	}
}