<?php
require 'config.php';
session_start();

if($_SESSION['logged_user'])
{
		$img = $_GET['img'];
		if(file_exists($img))
		{
			unlink($img);
			header('Location: filelist.php');
		}
		else
			echo "Файл не найден";
}