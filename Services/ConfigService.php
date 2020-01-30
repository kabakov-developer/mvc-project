<?php  

	namespace Services;

	class ConfigService 
	{
		public static function getConfig()
		{
			$jsonStr 	= file_get_contents(__DIR__ . "/../config/config.json");
			$config 	= json_decode($jsonStr);

			return $config;
		}

		public static function getRoutes()
		{
			$jsonStr 	= file_get_contents(__DIR__ . "/../config/routes.json");
			$config 	= json_decode($jsonStr, true);

			return $config;
		}
	}
?>