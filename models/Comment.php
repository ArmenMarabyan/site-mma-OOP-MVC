<?php

/*
 * Класс для комментарий под новостями
*/
class Comment {
	/**
	*Вывод комментарий для конкретного поста
    */
	public static function getCommentsList($id) {
    	$db = Db::getConnection();

    	$sql = "SELECT id, name, user_comment, page_id, date FROM comments WHERE page_id = :id ORDER BY id DESC";

    	$result = $db->prepare($sql);
    	$result->bindParam(':id', $id, PDO::PARAM_INT);
    	$result->execute();

    	return $result->fetchAll();
    }

    /**
	*Добавляет комментарий в базу
    */
    public static function createComment($id, $name, $userComment) {
    	//Соединение с БД
    	$db = Db::getConnection();
    	//текст запроса к БД
    	$sql = "INSERT INTO comments (name, user_comment, page_id) VALUES (:name, :userComment, :page_id)";
    	//Получение и возврат результатов, подготовленный запрос
    	$result = $db->prepare($sql);
    	$result->bindParam(':name', $name, PDO::PARAM_STR);
    	$result->bindParam(':userComment', $userComment, PDO::PARAM_STR);
    	$result->bindParam(':page_id', $id, PDO::PARAM_INT);
        $result->execute();
    	return $db->lastInsertId();
    }

    public static function getLastComment($lastCommentId, $page_id) {
        //Соединение с БД
        $db = Db::getConnection();
        //текст запроса к БД
        $sql = "SELECT id, name, user_comment, page_id, date FROM comments WHERE id = :id AND page_id = :page_id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $lastCommentId, PDO::PARAM_INT);
        $result->bindParam(':page_id', $page_id, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();
    }
  
}