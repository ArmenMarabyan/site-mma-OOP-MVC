<?php 
//автоподключеные классов
spl_autoload_register(function($class_name){
	$array_paths = array(
		'/models/',
		'/components/'
	);

	foreach($array_paths as $path) {
		$path = ROOT . $path . $class_name . '.php';

		if(is_file($path)) {
			include_once $path;
		}
	}
});


// spl_autoload_register(function ($class) {
//     $path = str_replace('\\', '/', $class.'.php');
//     $path = ROOT . '/'. $path;

//     echo $path;
//    	if(file_exists($path)) {
//    		require $path;
//    	}
// });