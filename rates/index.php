<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'api/app/Auth.php';
require 'api/app/DatabaseConnection.php';
require 'api/app/Rate.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	require 'pages/form.html';
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$contact = isset($_POST['contact']) ? $_POST['contact'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$rate = isset($_POST['rate']) ? (int)$_POST['rate'] : 0;

	Rate::Insert(
		DatabaseConnection::getConnection(), 
		$contact, 
		$description, 
		$rate
	);
	header( "refresh:3;url=http://susansgreencleaning.com/" );
	require 'pages/ok.html';

}