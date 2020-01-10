<?php  

	namespace Controllers;

	use System\View;
	use Models\News;

	class newsController
	{
		// Действие отвечающее за отображение всех новостей
		public function actionNews()
		{
			// Создаём модель 
			$news = new News('mysql:host=127.0.0.1;dbname=mvc_lesson;', 'root', 'admin');

			// Получаем данные используя модель
			$data = $news->displayAll();

			// Передаём данные представления для их отображения 
			View::render('news', [
				'data' => $data,
			]);
		}
	}

?>