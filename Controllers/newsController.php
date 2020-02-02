<?php

	namespace Controllers;

	use System\View;
	use Models\News;
	use Models\Model;

	class newsController
	{
		// Действие отвечающее за отображение всех новостей
		public function actionList() : void
		{
			// Создаём модель
			$news = new News();

			// Получаем данные используя модель
			$data = $news->displayAll();

			// Передаём данные представления для их отображения
			View::render('News/list', [
				'data' => $data,
			]);
		}


		public function actionItem() : void
		{
			// Получаем id через get параметр
			$id = $_GET['id'];

			// Создаём модель
			$news = new News();

			// Получаем данные используя модель
			$data = $news->displayOne($id);

			// Передаём данные представления для их отображения
			View::render('News/item', [
				'data' => $data,
			]);
		}

		public function actionForm()
		{
			$con = new News();

			if (isset($_POST['submit'])) {
				unset($_POST['submit']);

				// foreach ($_POST as $key => $value) {
				    // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
					// var_dump($key . ' - ' . $value);exit;
			    	// echo "Field ". $key ." is ". $value ."<br>";exit;
				// $title = $_POST['title'];
				// $description = $_POST['description'];
				// $con->insertData($title, $description);
					// $con->insertData($key, $value);

				// }
				//
					// $con->insertData();
				//
				foreach ($_POST as $key => $value) {
					// echo $keys . ' - ' . $values;
					$con->insertData($key, $value);
				}
			}

			// foreach ($_POST as $key => $value) {
			//     echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
			// }

			View::render('News/form');
		}
	}

?>