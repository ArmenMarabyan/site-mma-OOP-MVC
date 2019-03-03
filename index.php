<?php
	
	// front controller
	
	
	// 1. общие настрокйи
	
	ini_set('display_errors', 1);

	error_reporting(E_ALL);
	session_start();
	// 2. подключение файлов системы
	define('ROOT', dirname(__FILE__));
	require_once(ROOT.'/components/Autoload.php');

	function debug($arr) {
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}
	

// 	$uri = trim($_SERVER['REQUEST_URI'], '/');

// 	Router::add('', ['controller' => 'SiteController', 'action' => 'index']);


// if(Router::matchRoute($uri)) {
// 	print_r(Router::getRoute());
// }

	// 4. Вызов роутера

	$router = new Router;
	$router->dispatch();

?>

