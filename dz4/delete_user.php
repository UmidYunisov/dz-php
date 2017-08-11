<?php
require 'config.php';
session_start();
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, $opt);

if($_SESSION['logged_user'])
{
	if (!filter_var($_GET['id'], FILTER_VALIDATE_INT) === false)
	{
		$id = $_GET['id'];
		$stmt = $pdo->prepare("DELETE FROM users WHERE id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		header('Location: list.php');
	}
	else
	{
		echo "Неправильные данные";
	}
}
?>