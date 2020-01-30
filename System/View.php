<?php  

	namespace System; 

	class View
	{

		public static function render(string $path, array $data = [])
		{
			// Получаем путь, где лежат все представления
			$fullPath = __DIR__  . '/../Views/' . $path . '.php';

			// Если представление не было найдено, выбрасываем исключение
			if(!file_exists($fullPath)) {
				throw new \ErrorException("view cannot be found");
			}

			// Если данные были переданы, то из элменетов массива
			// создаются переменные, которые будут доступны в представлении
			if (!empty($data)) {
				foreach ($data as $key => $value) {
					$$key = $value;
				}
			}

			ob_start();
			include $fullPath;

			$content = ob_get_contents();
			ob_end_clean();

			// Отображаем представление
			include __DIR__ . '/../Views/layout.php';
			// include($fullPath);

		} 

	}
?>