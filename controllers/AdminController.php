<?php

/**
*AdminController - главная страница админки
*/
class AdminController extends AdminBase {

	/**
	*Главная страница админки
    */
	public function actionIndex($page = 1) {

		$totalNews = News::getTotalNews();
		$totalFighters = Fighter::getTotalFighters();

		$newsList = News::getNewsList($page);
		$fightersList = Fighter::getFightersList($page);

		require_once ROOT . '/views/admin/dashboard.php';
	}
}