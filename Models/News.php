<?php  

	namespace Models;


	class News extends Model
	{

		public function getTableName()
		{
			return 'News'; 
		}

		// public function insertData(string $title, string $description)
		// {
		// 	$sql = "INSERT INTO News (title, description) VALUES ('$title', '$description')";

		// 	return $this->getPdo()->exec($sql);
		// }
		public function insertData($key, $value)
		{
			$array = [
				$key => $value,
			];

			var_dump($array);exit;
			$sql = "INSERT INTO News ('$array[$key]') VALUES ('$value')";
			var_dump($sql);exit;


			return $this->getPdo()->exec($sql);
		}

	}

?>