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

		public function insertData($arr)
		{	
			try {
				
				$columns 	= array_keys($arr);
				$values  	= array_values($arr);

				$columnsX 	= array_keys($arr);	
				$columnsYX 	= array_keys($arr);	
				$columnsX 	= implode(', :', $columnsX);
				$valuesXY  	= array_values($arr);
	 
				$columns 	= implode(', ', $columns);
				$values  	= implode("', '", $values);

				$stmt 		= $this->getPdo()->prepare("INSERT INTO ". static::getTableName() . " ($columns) VALUES (:$columnsX)");

				$i = 0;
				foreach ($columnsYX as $col) {
					$mask = ":".$col;
					$stmt->bindParam($mask, $valuesXY[$i]);
					$i++;
				}

				$stmt->execute();
				header('Location: /');

			} catch (Exception $e) {
				var_dump("Ошибка вставки данных в базу данных: " . $e);
			}
		}

		public function updateData($arr, $id)
		{
			try {
				$columns 	= array_keys($arr);
				$columns 	= implode('=?, ', $columns) . '=?';
				$values  	= array_values($arr);
				array_push($values, $id);

				$sql = "UPDATE ". static::getTableName() . " SET $columns WHERE id=?";
				$update = $this->getPdo()->prepare($sql)->execute($values);
				header('Location: /');

			} catch (Exception $e) {
				var_dump("Ошибка вставки данных в базу данных: " . $e);
			}
		}

		public function deleteRecord($id)
		{
			try {
				$sql = "DELETE FROM " . static::getTableName() . " WHERE id = $id" ;
				$this->getPdo()->exec($sql);
			} catch (Exception $e) {
				var_dump("Ошибка удаления данных из базы данных: " . $e);
			}
			header('Location: /');
		}

	}

?>