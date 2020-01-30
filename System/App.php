<?php  

	namespace System;
	use Services\ConfigService;

	// Главный класс приложения

	class App
	{
		public static function run()
		{
			// Получение routes.json для маршрутизации
			$routesArray = ConfigService::getRoutes();
			// Получаем URL запроса
			$path = $_SERVER['REQUEST_URI'];

			$path  = strtok($path , '?');

			if (array_key_exists($path, $routesArray)) {
				$path = $routesArray[$path];
			} else {
				header("Location: /404");
			}

			// Разбваем URL на части
			$pathParts = explode('/', $path);
			// Получаем имя контроллера 
			$controller = $pathParts[1];
			// Получаем имя действия
			$action = $pathParts[2];

			//  Формируем простанство имён для контроллера
			$controller = 'Controllers\\' . $controller . 'Controller';
			// Формируем наименование действия 
			$action = 'action' . ucfirst($action);

			// Если класса не существует, выбрасываем исключение 
			if (!class_exists($controller)) {
				throw new \ErrorException("Controller does not exist");
			}

			// Создаём экземпляр класса контроллера 
			$objController = new $controller;

			// Если действия у контроллера не существует, выбрасываем исключение 
			if (!method_exists($objController, $action)) {
				throw new \ErrorException("action does not exist");
			}

			// Вызываем действие контроллера 
			$objController->$action();
		}
	}

?>