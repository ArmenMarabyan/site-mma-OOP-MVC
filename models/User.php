<?php

class User {
	/**
	*Регистрация юзера
    */
	public static function register($name, $email, $password) {
		$db = Db::getConnection();
		//текст запроса
		$sql = 'INSERT INTO users (name, email, password) VALUES(:name, :email, :password)';
		//подготовленный запрос и возврат данных
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);

		return $result->execute();
	}

	/**
	*Валидация полей формы
    */
	public static function checkName($name) {
		if(strlen($name) >= 2 && strlen($name) < 255) {
			return true;
		}
		return false;
	}

	public static function checkPassword($password) {
		if(strlen($password) >= 6 && strlen($password) < 255) {
			return true;
		}
		return false;
	}

	public static function checkPasswordConfirm($password, $password_confirm) {
		if($password === $password_confirm) {
			return true;
		}
		return false;
	}

	public static function checkEmail($email) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

	public static function checkEmailExists($email) {
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if($result->fetchColumn()) 
			return true;
		return false;
	}


	public static function checkUserData($email, $password) {
		$db = Db::getConnection();

		$sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->execute();

		$user = $result->fetch();

		if($user) {
			return $user['id'];
		}

		return false;
	}

	/**
	*Авторизируем юзера
    */
	public static function auth($userId) {
		//запысиваем в сессию id юзера
		$_SESSION['user'] = $userId;
	}

	/**
	*Проверка авторизирован ли пользователь
    */
	public static function checkLogged() {
		if(isset($_SESSION['user'])) {
			return $_SESSION['user'];
			
		}

		header("Location: /login");
	}

	
	public static function isGuest() {
		if(isset($_SESSION['user'])) {
			return false;
		}
		return true;
	}



	/**
	*Возвращает пользователя из БД по id
    */
 	public static function getUserById($userId) {
 		$db = Db::getConnection();

		$sql = 'SELECT * FROM users WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(":id", $userId, PDO::PARAM_INT);
		$result->execute();

		return $result->fetch();
 	}

 	/**
	*Редактирование данных пользователся
    */
 	public static function editUserData($userId, $name, $password, $avatar) {
 		$db = Db::getConnection();
 		$sql = "UPDATE users SET name = :name, password = :password, image = :avatar WHERE id = :id";

 		$result = $db->prepare($sql);
 		$result->bindParam(':id', $userId, PDO::PARAM_INT);
 		$result->bindParam(':name', $name, PDO::PARAM_STR);
 		$result->bindParam(':password', $password, PDO::PARAM_STR);
 		$result->bindParam(':avatar', $avatar, PDO::PARAM_STR);

 		return $result->execute();
 	}

 	/**
	*Восстановление пароля
    */
 	public static function restorePassword($email, $password) {
 		$db = Db::getConnection();

 		$sql = 'UPDATE users SET password = :password WHERE email = :email';

 		$result = $db->prepare($sql);
 		$result->bindParam(':password', $password, PDO::PARAM_STR);
 		$result->bindParam(':email', $email, PDO::PARAM_STR);

 		return $result->execute();
 	}


}