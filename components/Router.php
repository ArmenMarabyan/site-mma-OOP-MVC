<?php


/**
*Router - маршрутизация сайта
*/
class Router {
	//массив маршрутов из config/routes.php
	private $routes = [];
	private $route = [];

	//конструктор который добавляет массив маршрутов в переменную $routes
	public function __construct() {
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}


	//Получаем uri который ввел пользователь
	protected function getURI() {
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	//code


	//запускаем роутер
	public function matchRoute() {
		//uri который ввел пользователь	
		$uri = $this->getURI();
		//Разбиваем массив маршрутов на составляющие
		foreach($this->routes as $uriPattern => $path) {

			//если есть совпадение между тем что написал юзер и в массиве
			if(preg_match("#^{$uriPattern}$#i", $uri, $matches)) {
                foreach($matches as $key => $value) {

                    if(is_string($key)) {
                        $path[$key] = $value;
                    }
                }
                $internalRoute = preg_replace("#$uriPattern#", $path, $uri);
                $this->route = $internalRoute;

                return true;

			}
		}

		return false;

	}

    /**
     *
     */
	public function dispatch() {
        if($this->matchRoute()) {
            //Разбиваем строку с помощью разделителя
            $segments = explode('/', $this->route);
            //получаем имя контроллера который будет обрабатывать запрос
            $controllerName = array_shift($segments).'Controller';
            $controllerName = ucfirst($controllerName);

            //получаем имя метода
            $actionName = 'action'.ucfirst(array_shift($segments));
            //теперь в нашем массиве остались параметры
            $parameters = $segments;
            //путь к контроллеру
            $controllerFile = ROOT . '/controllers/'.$controllerName.'.php';
            //если файл существует - подлючаем в ином случае загружаем страницу 404
            if(file_exists($controllerFile)) {
                include_once($controllerFile);
            }else {
                $this->ErrorPage404();
            }

            //создаем экземпляр класса
            $controllerObject = new $controllerName;
            $result = false;
            //если существует метод - вызываем и передаем туда массив с параметрами, которые попдают туда как переменные
            if(method_exists($controllerObject, $actionName)) {
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                die;
            }else {
                $this->ErrorPage404();
            }
        }
    }



	// 404
	protected function ErrorPage404() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }

}
