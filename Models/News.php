<?php  

	namespace Models;


	class News extends Model
	{

		public function getTableName()
		{
			return 'News'; 
		}

		public function insertData(string $title, string $description)
		{
			$sql = "INSERT INTO News (title, description) VALUES ('$title', '$description')";

			return $this->getPdo()->exec($sql);
		}

	}

?>