<?php  

	namespace Controllers;

	use System\View;

	// Главный контроллер приложения

	class homeController
	{
		
		public function actionMain()
		{
			View::render('index');
		}

	}

?>