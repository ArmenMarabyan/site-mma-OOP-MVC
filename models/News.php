<?php

/*
 * Класс для раздела - новости
*/
class News {
	//отображение новостей по дэфолту
	const SHOW_BY_DEFAULT = 6;
	/**
	*Возвращает новость по id
    */
	public static function getNewsItemById($id) {
		$id = (int) $id;

		if($id) {
			$db = Db::getConnection();

			$result = $db->query('SELECT * FROM news WHERE id = '.$id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();
			return $newsItem;
		}
	}

	/**
	*Возвращает список последных новостей
    */
	public static function getNewsList($page, $count = self::SHOW_BY_DEFAULT) {
		$page = (int) $page;
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

		$db = Db::getConnection();

		$newsList = array();

		$result = $db->query('SELECT * FROM news ORDER BY id DESC LIMIT '. $count . ' OFFSET '.$offset);

		$i = 0;

		while($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['name'] = $row['name'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['source'] = $row['source'];
			$newsList[$i]['views'] = $row['views'];
			$newsList[$i]['short_description'] = $row['short_description'];
			$newsList[$i]['description'] = $row['description'];
			$newsList[$i]['image'] = $row['image'];
			$newsList[$i]['main_article'] = $row['main_article'];
			$i++;
		}

		return $newsList;		
	}

	/**
	*Возвращает главную новость
    */
	public static function getMainArticle() {
		$db = Db::getConnection();

		$result = $db->query('SELECT * FROM news WHERE main_article = 1 ORDER BY id DESC');

		return $result->fetch();
	}

	/**
	*Возвращает популярные новости
    */
	public static function getPopularNews($count = 4) {
		$db = Db::getConnection();

		$popularNewsList = array();

		$result = $db->query('SELECT * FROM news ORDER BY views DESC LIMIT ' .$count);

		$i = 0;

		while($row = $result->fetch()) {
			$popularNewsList[$i]['id'] = $row['id'];
			$popularNewsList[$i]['name'] = $row['name'];
			$popularNewsList[$i]['date'] = $row['date'];
			$popularNewsList[$i]['source'] = $row['source'];
			$popularNewsList[$i]['image'] = $row['image'];
			$popularNewsList[$i]['views'] = $row['views'];
			$popularNewsList[$i]['short_description'] = $row['short_description'];
			$i++;
		}

		return $popularNewsList;	
	}

	/**
	*Возвращает свежые новости
    */
	public static function getLatestNews() {

		$db = Db::getConnection();

		$latestNews = array();
		$result = $db->query('SELECT id,name,image,views,alias FROM news ORDER BY id DESC LIMIT 3');

		$i = 0;

		while($row = $result->fetch()) {
			$latestNews[$i]['id'] = $row['id'];
			$latestNews[$i]['name'] = $row['name'];
			$latestNews[$i]['views'] = $row['views'];
			$latestNews[$i]['image'] = $row['image'];
			$latestNews[$i]['alias'] = $row['alias'];

			$i++;
		}


		return $latestNews;
	}

	/**
	*Возвращает количество новостей в бд
    */
	public static function getTotalNews() {
		$db = Db::getConnection();

		$result = $db->query('SELECT COUNT(id) AS count FROM news');

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();

		return $row['count'];

	}

	/**
	*Возвращает количество найденных новостей по поиску
    */
	public static function getTotalSearchedNews($query) {
		$db = Db::getConnection();

		$result = $db->query("SELECT COUNT(id) AS count FROM news WHERE name LIKE '%$query%' OR short_description LIKE '%$query%' OR description LIKE '%$query%' OR source LIKE '%$query%'");

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();

		return $row['count'];
	}

	/**
	*Возвращает список найденных новостей по поиску
    */
	public static function getSearchedNewsList($page, $query, $count = self::SHOW_BY_DEFAULT) {
		$page = (int) $page;
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;


		$db = Db::getConnection();

		$searchedNewsList = array();

		$result = $db->query("SELECT * FROM news WHERE name LIKE '%$query%' OR short_description LIKE '%$query%' OR description LIKE '%$query%' OR source LIKE '%$query%' ORDER BY id DESC LIMIT ". $count . " OFFSET ".$offset);

		$i = 0;

		while($row = $result->fetch()) {
			$searchedNewsList[$i]['id'] = $row['id'];
			$searchedNewsList[$i]['name'] = $row['name'];
			$searchedNewsList[$i]['date'] = $row['date'];
			$searchedNewsList[$i]['source'] = $row['source'];
			$searchedNewsList[$i]['views'] = $row['views'];
			$searchedNewsList[$i]['short_description'] = $row['short_description'];
			$searchedNewsList[$i]['image'] = $row['image'];

			$i++;
		}


		return $searchedNewsList;

	}

	/**
	*Возвращает новости с конкретным бойцом
    */
	public static function getFighterNews($fighter_name) {

		$db = Db::getConnection();

		$fighterNewsList = [];

		$result = $db->query("SELECT * FROM news WHERE name LIKE '%$fighter_name%' OR short_description LIKE '%$fighter_name%' OR description LIKE '%$fighter_name%' ORDER BY id DESC LIMIT 3");
		$i = 0;
		while($row = $result->fetch()) {
			$fighterNewsList[$i]['id'] = $row['id'];
			$fighterNewsList[$i]['alias'] = $row['alias'];
			$fighterNewsList[$i]['image'] = $row['image'];
			$fighterNewsList[$i]['name'] = $row['name'];
			$fighterNewsList[$i]['date'] = $row['date'];
			$i++;
		}

		return $fighterNewsList;
	}

	/**
	*обновляет счетчик просмотров и возрвращает количество просмотров 
    */
	public static function updateViewsCount($views, $id) {
		$db = Db::getConnection();
		$views++;
		$sql = 'UPDATE news SET views = :views WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':views', $views, PDO::PARAM_INT);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}



	/*admin*/

	/**
	*Создание новостя
    */
	public static function createNews($opt) {
		$db = Db::getConnection();

		$sql = 'INSERT INTO news (name, short_description, description, main_article, source, meta_title, meta_description, meta_keyword) VALUES(:name, :short_description, :description, :main_article, :source, :meta_title, :meta_description, :meta_keyword)';


		//подготовленный запрос
		$result = $db->prepare($sql);

		$result->bindParam(':name', $opt['name'], PDO::PARAM_STR);
		$result->bindParam(':short_description', $opt['short_description'], PDO::PARAM_STR);
		$result->bindParam(':description', $opt['description'], PDO::PARAM_STR);
		$result->bindParam(':main_article', $opt['main_article'], PDO::PARAM_STR);
		$result->bindParam(':source', $opt['source'], PDO::PARAM_STR);
		$result->bindParam(':meta_title', $opt['meta_title'], PDO::PARAM_STR);
		$result->bindParam(':meta_description', $opt['meta_description'], PDO::PARAM_STR);
		$result->bindParam(':meta_keyword', $opt['meta_keyword'], PDO::PARAM_STR);


		if($result->execute()) {
			return 1;
		}

		return 0;
	}

	/**
	*Редактирование новостя
    */
	public static function editNews($id, $opt) {
		$db = Db::getConnection();

		$sql = "UPDATE news SET name = :name, short_description = :short_description, description = :description, main_article = :main_article, source = :source, meta_title = :meta_title, meta_description = :meta_description, meta_keyword = :meta_keyword WHERE id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->bindParam(':name', $opt['name'], PDO::PARAM_STR);
		$result->bindParam(':short_description', $opt['short_description'], PDO::PARAM_STR);
		$result->bindParam(':description', $opt['description'], PDO::PARAM_STR);
		$result->bindParam(':main_article', $opt['main_article'], PDO::PARAM_INT);
		$result->bindParam(':source', $opt['source'], PDO::PARAM_STR);
		$result->bindParam(':meta_title', $opt['meta_title'], PDO::PARAM_STR);
		$result->bindParam(':meta_description', $opt['meta_description'], PDO::PARAM_STR);
		$result->bindParam(':meta_keyword', $opt['meta_keyword'], PDO::PARAM_STR);

		return $result->execute();


	}

	/**
	*Удаление новостя
    */
	public static function deleteNewsById($id) {
		$db = Db::getConnection();

		$sql = 'DELETE FROM news WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}

}