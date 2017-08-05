<?php
require('functions/database.php');

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
}
$db = DB::connect();
$stmt = $db->prepare("INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$res = $stmt->execute();
if ($res == true) {
	echo "<h3>Спасибо, успешно зарегистрирован!</h3>";
	echo "<a href='index.php'>Заказать</a>";
}
?>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
<h1>Регистрация</h1>
<form name="order" method="post">
			<p><input type="text" name="name" placeholder="Имя"></p>
			<p><input type="text" name="phone" placeholder="Телефон +7 -- -- --"></p>
			<p><input type="text" name="email" placeholder="E-mail"></p>
			<p><input type="submit" name="submit" value="Регистрировать"></p>
		</form>

</body>
</html>