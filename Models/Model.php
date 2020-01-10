<?php  

	namespace Models;

	class Model
	{
		// public $dsn; 
		public $pdo;

		public function __construct($dsn, $login, $password)
		{
			$this->dsn = $dsn;
			// Строка соеденения с базой данных 
			// $this->dsn = 'mysql:host=127.0.0.1;dbname=mvc_lesson;';
			// Создаём экземпляр класса для работы с БД
			$this->pdo = new \PDO($dsn, $login, $password);
		}
	}

?>