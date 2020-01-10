<?php  
	// Включаем режим строгой типизации 
	declare(strict_types=1);

	// Подключаем файл реализцующий автозагрузку 
	require_once __DIR__ . '/System/autoload.php';

	// Запускаем приложение
	System\App::run(); // System/App.php
?>