<?php
require('functions/database.php');
$db = DB::connect();
$sql = 'SELECT name,email FROM users';
$stmt = $db->query($sql);
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
$i = 1;
echo "<h1>Список пользователей</h1><table border='1'>";
foreach($res as $arr) {
  echo "<tr>
		<td>".$i."</td><td>".$arr['name']."</td><td>".$arr['email']."</td>
  		</tr>";
  $i++;
}
echo "</table>";


$sql = 'SELECT * FROM orders';
$stmt = $db->query($sql);
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
$i = 1;
echo "<h1>Список заказов</h1><table border='1'>";
foreach($res as $arr) {
  echo "<tr>
		<td>Заказ № ".$arr['id']."</td><td>".$arr['address']."</td>
  		</tr>";
  $i++;
}
echo "</table>";