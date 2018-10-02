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
}
/*
--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(11) NOT NULL,
  `contact` varchar(256) NOT NULL DEFAULT '',
  `description` varchar(256) NOT NULL DEFAULT '',
  `rate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
*/