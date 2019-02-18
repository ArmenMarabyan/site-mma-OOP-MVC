<?php
/**
*FightersController - управление бойцами в админке
*/
class FightersController {

    /**
    *Action - главной страницы 'бойцы' в админке
    */
    public function actionIndex($page = 1) {
        //получаем список бойцов
        $fighters = Fighter::getFighterslist($page);
        //получаем количество бойцов для создания пагинации
        $total = Fighter::getTotalFighters();
        //пагинация
        $pagination = new Pagination($total, $page, Fighter::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/fighters/index.php');

    }

    /**
    *Action - просмотра одной страницы бойца по id
    */
    public function actionView($id) {

        if($id) {
            //получаем конкретного бойца по id
            $fighter = Fighter::getFighterById($id);

            //отрезаем имя бойца до скобок - Имя(Name) - Имя
            $str=strpos($fighter['name'], "(");
			$fighter_name=substr($fighter['name'], 0, $str);
            //получаем новости с конкретным бойцом
			$fighterNewsList = News::getFighterNews($fighter_name);

            require_once(ROOT.'/views/fighters/view.php');
        }
    }


}