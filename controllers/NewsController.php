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
			

			$errors = false;
			$name = '';
			$userComment = '';

			//если отправлена форма комментариев
			if(isset($_POST['submit'])) {
				//получаем данные и валидируем от XSS атак
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
					//добавляем коммент в базу
					Comment::createComment($id, $name, $userComment);
					//реддирект обратно 
					header("Location: ". $_SERVER['HTTP_REFERER']);
				}
			}

			require_once(ROOT.'/views/news/view.php');

		}

	}
}