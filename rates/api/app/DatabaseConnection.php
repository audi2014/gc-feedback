<?php 
// DatabaseConnection.php
class DatabaseConnection {
	private static $_instance;
	private $_pdo;
	private $_pdoUrl;
	private $_pdoUser;
	private $_pdoPassword;
	private $_pdoPrm;

	/**
	* Constructor
	*/
	private function __construct($host, $db, $login, $pass) {
		$this->_pdoUrl = "mysql:host=$host;dbname=$db;charset=utf8";
		$this->_pdoUser = $login;
		$this->_pdoPassword = $pass;
		$this->_pdoPrm = [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		$this->_pdo = new PDO(
			$this->_pdoUrl, 
			$this->_pdoUser, 
			$this->_pdoPassword, $this->_pdoPrm
		);
	}
	
	/**
	* Singleton
	*/
	private function __clone() {}
	private function __wakeup() {} 
	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new self(
				'greencleaning.ctvx8xrocfco.us-west-2.rds.amazonaws.com',
				'gc_statistic',
				'vabe1337',
				'4Vdxwmop2ndpd1Ni'
			);  
		}
		return self::$_instance;
	}
	/**
	* Get connection
	*/
	public static function getConnection() {
		return self::getInstance()->_pdo;
	}

}
