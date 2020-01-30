<?php  

	namespace Controllers;

	use System\View;

	// Главный контроллер приложения

	class mainController
	{
		
		public function actionMain()
		{
			View::render('index');
		}

		public function actionErrorPage()
		{
			View::render('404');
		}
	}

?>