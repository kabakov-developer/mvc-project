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

			// foreach ($_POST as $key => $value) {
				$key = $key . ',';
				$value = "'". $value . "'" . ',';

				// echo $key . $value;
				$sql = "INSERT INTO news ($key) VALUES ($value)";
				echo $sql;
				return $this->getPdo()->exec($sql);

			// }

			// $sql = "INSERT INTO News ('$array[$key]') VALUES ('$value')";
			// var_dump($sql);exit;


			// return $this->getPdo()->exec($sql);
		}

		// public function insertTestData()
		// {
		// 	$sql = "INSERT INTO News (title, description) VALUES ('news 9', 'description 9')";
		// 	return $this->getPdo()->exec($sql);
		// }

	}

?>