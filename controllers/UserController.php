<?php

class UserController {
	public function actionRegister() {
		$name = '';
		$email = '';
		$password = '';
		$result = false;

		if(isset($_POST['submit'])) {

			$name = trim(htmlspecialchars($_POST['name']));
			$email = trim(htmlspecialchars($_POST['email']));
			$password = trim(htmlspecialchars($_POST['password']));
			$password_confirm = trim(htmlspecialchars($_POST['password_confirm']));

			$errors = false;

			if(!User::checkName($name)) {
				$errors[] = 'Имя больше 2 символа';
			}

			if(!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}

			if(!User::checkPassword($password)) {
				$errors[] = 'пароль больше 6 символа';
			}

			if(!User::checkPasswordConfirm($password, $password_confirm)) {
				$errors[] = 'Пароли не совпадают';
			}

			if(User::checkEmailExists($email)) {
				$errors[] = 'Такой email уже существует';
			}

			if($errors == false) {
				$result = User::register($name, $email, $password);
			}
		}

		require_once(ROOT.'/views/user/register.php');
		return true;
	}

	public function actionLogin() {
		$email = '';
		$password = '';
		$errors = false;

		if(isset($_POST['login'])) {

			$email = trim(htmlspecialchars($_POST['email']));
			$password = trim(htmlspecialchars($_POST['password']));

			if(!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}

			if(!User::checkPassword($password)) {
				$errors[] = 'пароль больше 6 символа';
			}

			$userId = User::checkUserData($email, $password);

			if($userId == false) {
				$errors[] = 'Неправильно логин или пароль';
			}else {
				User::auth($userId);

				header('Location: /cabinet/');
			}
		}

		require_once(ROOT.'/views/user/login.php');
		return true;
	}

	public function actionLogout() {

		unset($_SESSION['user']);

		header("Location: /");

		return true;
	}

	public function getRandomPassword($num) {
		$random_string = '';

		$symbols="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
		$symbols_length = strlen($symbols)-1;

		for($i = 0; $i < $num; $i++) {
			$random_num = rand(0, $symbols_length);
			$random_string .= $symbols[$random_num];
		}

		return $random_string;
	}

	public function actionRestore() {

		$email = '';
		$errors = false;
		$result = false;

		$new_password = $this->getRandomPassword(10);

		if(isset($_POST['restore'])) {
			$email = $_POST['email'];

			if(!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}

			if(!User::checkEmailExists($email)) {
				$errors[] = 'Такой email не существует';
			}

			if($errors == false) {
				$user_email = $email;
				$message = "Ваш новый пароль - $new_password";
				$subject = 'Новый пароль. mma-site';
				$result = mail($user_email, $subject, $message);

				if($result) {

					User::restorePassword($email, $new_password);
					header("location: /login");
				}
				

			}

			
		}

		require_once(ROOT.'/views/user/restore.php');
		return true;
	}
	
}