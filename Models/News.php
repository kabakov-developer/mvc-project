<?php  

	namespace Models;

	class News extends Model
	{

		public function displayAll()
		{
			// $model = new Model('mysql:host=127.0.0.1;dbname=mvc_lesson;', 'root', 'admin');
			// SQL запрос на получение всех новостей
			$sql = 'SELECT * FROM News';

			// Возвращаем полученные из БД данные 
			$arr = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
			return $arr;
		}
	}

?>