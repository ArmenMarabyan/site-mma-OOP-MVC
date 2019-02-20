<?php


/*
 * Класс для для раздела - бойцы
*/
class Fighter {
	//отображение по дэфолту
	const SHOW_BY_DEFAULT = 18;

	/**
	*Возвращает список бойцов
    */
	public static function getFightersList($page, $count = self::SHOW_BY_DEFAULT) {
		//Текущая страница
		$page = (int) $page;
		//Сколько страниц будет в пагинации
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		//подключение к бд
		$db = Db::getConnection();

		$fightersList = array();
		//запрос к бд
		$result = $db->query('SELECT * FROM fighters ORDER BY id DESC LIMIT '.$count .' OFFSET '.$offset);
		// $i = 0;
		$result->setFetchMode(PDO::FETCH_ASSOC);

		// while($row = $result->fetch()) {
		// 	$fightersList[$i]['id'] = $row['id'];
		// 	$fightersList[$i]['name'] = $row['name'];
		// 	$fightersList[$i]['image'] = $row['image'];
		// 	$fightersList[$i]['alias'] = $row['alias'];
		// 	$i++;
		// }

		return $result->fetchAll();		
	}

	/**
	*Возвращает бойца по id
    */
	public static function getFighterById($id) {
		//
		$id = (int) $id;
		//подключение к бд
		$db = Db::getConnection();
		//запрс и возврат данных
		$result = $db->query('SELECT * FROM fighters WHERE id = '.$id);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$fighter = $result->fetch();
		return $fighter;
	}
	/**
	*Возвращает количество бойцов в БД
    */
	public static function getTotalFighters() {
		//подключение к бд
		$db = Db::getConnection();
		//запрос
		$result = $db->query('SELECT COUNT(id) AS count FROM fighters');

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
		//возвращаем количество бойцов
		return $row['count'];
	}
	/**
	*Возвращает список найденных бойцов 
    */
	public static function getSearchedFightersList($page, $query) {
		//подключение к бд
		$db = Db::getConnection();
		$fightersList = array();
		//запрос
		$result = $db->query("SELECT * FROM fighters WHERE name LIKE '%$query%' ORDER BY id DESC");

		$i = 0;

		while($row = $result->fetch()) {
			$fightersList[$i]['id'] = $row['id'];
			$fightersList[$i]['name'] = $row['name'];
			$fightersList[$i]['image'] = $row['image'];
			$fightersList[$i]['alias'] = $row['alias'];
			$i++;
		}

		return $fightersList;
	}
	/**
	*Удаляет бойца по id
    */
	public static function deleteFighterById($id) {
		$db = Db::getConnection();

		$sql = 'DELETE FROM fighters WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}

	/**
	*Создание бойца
    */
	public static function createFighter($opt) {
		$db = Db::getConnection();

		$sql = 'INSERT INTO fighters (name, description, nickname, nationality, bday, height, arm_span, w_category, insta, tw, wins, loses, not_heald, meta_title, meta_description, meta_keyword) VALUES(:name, :description, :nickname, :nationality, :bday, :height, :arm_span, :w_category, :insta, :tw, :wins, :loses, :not_heald,:meta_title, :meta_description, :meta_keyword)';

		$result = $db->prepare($sql);

		$result->bindParam(':name', $opt['name'], PDO::PARAM_STR);
		$result->bindParam(':nickname', $opt['nickname'], PDO::PARAM_STR);
		$result->bindParam(':description', $opt['description'], PDO::PARAM_STR);
		$result->bindParam(':nationality', $opt['nationality'], PDO::PARAM_STR);
		$result->bindParam(':bday', $opt['bday'], PDO::PARAM_STR);
		$result->bindParam(':height', $opt['height'], PDO::PARAM_STR);
		$result->bindParam(':arm_span', $opt['arm_span'], PDO::PARAM_STR);
		$result->bindParam(':w_category', $opt['w_category'], PDO::PARAM_STR);
		$result->bindParam(':insta', $opt['insta'], PDO::PARAM_STR);
		$result->bindParam(':tw', $opt['tw'], PDO::PARAM_STR);
		$result->bindParam(':wins', $opt['wins'], PDO::PARAM_INT);
		$result->bindParam(':loses', $opt['loses'], PDO::PARAM_INT);
		$result->bindParam(':not_heald', $opt['not_heald'], PDO::PARAM_INT);
		$result->bindParam(':meta_title', $opt['meta_title'], PDO::PARAM_STR);
		$result->bindParam(':meta_description', $opt['meta_description'], PDO::PARAM_STR);
		$result->bindParam(':meta_keyword', $opt['meta_keyword'], PDO::PARAM_STR);


		if($result->execute()) {
			return 1;
		}

		return 0;

	}

	/**
	*Редактирование бойца
    */
	public static function editFighterById($id, $opt) {
		$db = Db::getConnection();

		$sql = "UPDATE fighters SET name = :name, description = :description, nickname = :nickname, nationality = :nationality, bday = :bday, height = :height, arm_span = :arm_span, w_category = :w_category, insta = :insta, tw = :tw, wins = :wins, loses = :loses, not_heald = :not_heald, meta_title = :meta_title, meta_description = :meta_description, meta_keyword = :meta_keyword WHERE id = :id";

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->bindParam(':name', $opt['name'], PDO::PARAM_STR);
		$result->bindParam(':nickname', $opt['nickname'], PDO::PARAM_STR);
		$result->bindParam(':description', $opt['description'], PDO::PARAM_STR);
		$result->bindParam(':nationality', $opt['nationality'], PDO::PARAM_STR);
		$result->bindParam(':bday', $opt['bday'], PDO::PARAM_STR);
		$result->bindParam(':height', $opt['height'], PDO::PARAM_STR);
		$result->bindParam(':arm_span', $opt['arm_span'], PDO::PARAM_STR);
		$result->bindParam(':w_category', $opt['w_category'], PDO::PARAM_STR);
		$result->bindParam(':insta', $opt['insta'], PDO::PARAM_STR);
		$result->bindParam(':tw', $opt['tw'], PDO::PARAM_STR);
		$result->bindParam(':wins', $opt['wins'], PDO::PARAM_INT);
		$result->bindParam(':loses', $opt['loses'], PDO::PARAM_INT);
		$result->bindParam(':not_heald', $opt['not_heald'], PDO::PARAM_INT);
		$result->bindParam(':meta_title', $opt['meta_title'], PDO::PARAM_STR);
		$result->bindParam(':meta_description', $opt['meta_description'], PDO::PARAM_STR);
		$result->bindParam(':meta_keyword', $opt['meta_keyword'], PDO::PARAM_STR);

		return $result->execute();
	}


	

}