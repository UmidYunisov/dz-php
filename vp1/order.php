<?php
require('functions/database.php');

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
}
$db = DB::connect();
$sql = "SELECT * FROM users WHERE `email`=:email";
$stmt = $db->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $data)
{
	$user_id = $data['id'];
}

if($rows != null)
{
	$stmt = $db->prepare("INSERT INTO orders (user_id, address) VALUES (:user_id, :address)");
	$stmt->bindParam(':user_id', $user_id);
	$stmt->bindParam(':address', $address);
	$res = $stmt->execute();
	$id = $db->lastInsertId();

	$count=$db->query("SELECT COUNT(*) FROM orders WHERE user_id=$user_id")->fetchColumn();
	
	if($res == true)
	{
		if($count == 1)
			$count = 'Спасибо - это ваш первый заказ';
		else
			$count = 'Спасибо! Это уже '.$count.' заказ';

		$to      = $email;
		$subject = 'Заказ № '.$id;
		$message = 'DarkBeefBurger за 500 рублей, 1 шт
		'.$count;
		$headers = 'Ваш заказ будет доставлен по адресу: ' .$address. "\r\n";

	mail($to, $subject, $message, $headers);
	}
	echo "Спасибо, ваш заказ принят!";
}
else
{
	header('Location: register.php');
}
