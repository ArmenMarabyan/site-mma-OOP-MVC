<?php

/**
*SearchController - поиск на сайте
*/
class SearchController {

	/**
    *Action - вывод совпадений по новостям на сайте
    */
  	public function actionIndex($page = 1) {

  		//проверка на отправления формы и на пустату
		if(isset($_POST['search']) && $_POST['search'] != '') {
			//запись ключевого слово в переменную и валидация от XSS
			$query = trim(htmlspecialchars($_POST['search']));
			//Получение совпадений
			$searchedNewsList = News::getSearchedNewsList($page, $query);
			//получаем популярные новости для сайдбара
			$popularNewsList = News::getPopularNews();
			//получаем количество новостей для пагинации
			$total = News::getTotalSearchedNews($query);
			$pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

			require_once(ROOT.'/views/news/search.php');
		}else {
			echo '4444';
		}
  		
  		return true;
  	}

  	/**
    *Action - вывод совпадений по бойцам на сайте
    */
  	public function actionFighters($page = 1) {
  		//проверка на отправления формы и на пустату
		if(isset($_POST['search']) && $_POST['search'] != '') {
			//запись ключевого слово в переменную и валидация от XSS
			$query = trim(htmlspecialchars($_POST['search']));
			//Получение совпадений
			$searchedFightersList = Fighter::getSearchedFightersList($page, $query);


			// $total = News::getTotalSearchedNews($query);
			// $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

			require_once(ROOT.'/views/fighters/search.php');
		}else {
			echo '4444';
		}
  		
  		return true;
  	}
    
}