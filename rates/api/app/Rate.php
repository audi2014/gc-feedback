<?php 
class Rate {
	public static function GetList($pdo) {
		return $pdo->query("SELECT * FROM `rate`")->fetchAll();
	}

	public static function Insert($pdo, $contact, $description, $rate) {
		if( ! ini_get('date.timezone') ){
			date_default_timezone_set('GMT');
		}
		$date = date('Y-m-d H:i:s');
		$q = $pdo->prepare("INSERT INTO `rate` (`contact`, `description`, `rate`, `date`) VALUES (?,?,?,?)");
		$q->execute([$contact, $description, $rate,$date]);
	}

	//INSERT INTO `gc_statistic`.`TestTable` (`id`, `contact`, `description`, `rate`, `date`) VALUES (NULL, 'sdfsdfds', 'sdfsdfds', '3', '2018-09-13 00:00:00');
}