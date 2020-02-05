<?php  

	namespace Models;

	use Services\ConfigService;

	abstract class Model
	{

		private $pdo;

		public function __construct()
		{
			$config = ConfigService::getConfig();

			$this->pdo = new \PDO('mysql:host='.$config->database->host.';dbname='.$config->database->dbname, $config->database->username, $config->database->password);
		}

		public function getPdo()
		{
			return $this->pdo;
		}

		public function displayAll() : array
		{
			// SQL запрос на получение всех записей из таблицы, переданной в getTableName
			$sql = 'SELECT * FROM ' . static::getTableName();

			// Возвращаем полученные из БД данные 
			return $this->getPdo()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function displayOne(int $id) : array
		{
			$sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE id=' . $id;

			return $this->getPdo()->query($sql)->fetch(\PDO::FETCH_ASSOC);
		}

	}

?>