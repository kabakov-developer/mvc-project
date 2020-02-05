<?php  

	namespace Models;


	class News extends Model
	{
		public function getTableName()
		{
			return 'News'; 
		}

		public function insertData($arr)
		{
			$columns = array_keys($arr);
			$values  = array_values($arr);
 
			// foreach ($arr as $column => $value) {
			// 	$columns[] = $column;
			// 	$values[]  = $value;
			// }

			$columns = implode(', ', $columns);
			$values  = implode("', '", $values);

			$sql = "INSERT INTO News ($columns) VALUES ('$values')";
			// echo $sql;
			
			return $this->getPdo()->exec($sql);
		}
	}

?>