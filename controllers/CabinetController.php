<?php

/**
*CabinetController - прфиль юзера(кабинета)
*/
class CabinetController {

	/**
	* Action для главной страницы юзера(кабинета)
	*/
	public function actionIndex() {

		//проверка авторизирован ли юзерб если да - получаем id юзера
		$userId = User::checkLogged();
		//получаем конкретного юзера по id
		$user = User::getUserById($userId);

		require_once(ROOT.'/views/cabinet/index.php');

	}

	/**
	* Action для редактирования данных юзера
	*/
	public function actionEdit() {
		//проверка авторизации
		$userId = User::checkLogged();
		//получаем данные юзера по id
		$user = User::getUserById($userId);
		$name = $user['name'];
		$password = $user['password'];
		$id = $user['id'];


		if(!empty($user['image'])) {//если в базе у юзера загружена аватарка
			$avatar_path = '/template/images/users/user_'.$id.'.jpg';
		}else {//если не загружена, поставляем default аватарку
			$avatar_path = '/template/images/users/no_image.jpg';
		}

		
		
		$result = false;

		//если форма отправлена
		if(isset($_POST['submit'])) {
			//получаем данные из формы
			$name = trim(htmlspecialchars($_POST['name']));
			$password = trim(htmlspecialchars($_POST['password']));

			$errors = false;

			//валидация полей
			if(!User::checkName($name)) {
				$errors[] = 'Имя больше 2 символа';
			}

			if(!User::checkPassword($password)) {
				$errors[] = 'пароль больше 6 символа';
			}


			//если из формы загружена картинка - помещаем в папку
			if(is_uploaded_file($_FILES['avatar']['tmp_name'])) {
				$avatar_path = '/template/images/users/user_'.$id.'.jpg';
				move_uploaded_file($_FILES['avatar']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $avatar_path);
			}
			//если нет ошибок
			if($errors == false) {
				//редактируем данные юзера
				$result = User::editUserData($userId, $name, $password, $avatar_path);
				//редирект в кабинет
				header("Location: /cabinet/");
			}
		}
		require_once(ROOT.'/views/cabinet/edit.php');
	}
    
}