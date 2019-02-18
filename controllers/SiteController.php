<?php

/**
*SiteController - для отображения новостей на главной странице сайта
*/
class SiteController {

	public function actionIndex($page = 1) {
		//получаем главную новость для слайдера в header
		$main_article = News::getMainArticle();
		//получаем список новостей
		$newsList = News::getNewsList($page);
		//получаем популярные новосты для сайдбара
		$popularNewsList = News::getPopularNews();
		//количество новостей для пагинации
		$total = News::getTotalNews();
		$pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

		require_once(ROOT.'/views/site/index.php');
	}
}