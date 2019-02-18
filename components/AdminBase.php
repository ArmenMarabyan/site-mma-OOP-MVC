<?php

abstract class AdminBase {
	
	public function __construct() {
		self::checkAdmin();
	}
	//проверка привелегий пользователя
	public static function checkAdmin() {
		$userId = User::checkLogged();
		//получаем юзера и смотри админ ли он
		$user = User::getUserById($userId);
		//если админ, пускаем дальше
		if($user['role'] == 'admin') {
			return true;
		}
		// если не админ - останавливаем работу скрипта
		die('access denied');
	}
}