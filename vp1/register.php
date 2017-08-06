<?php
require_once('functions/database.php');

function register($user_id,$address)
{
	$stmt = $db->prepare("INSERT INTO orders (user_id, address) VALUES (:user_id, :address)");
	$stmt->bindParam(':user_id', $user_id);
	$stmt->bindParam(':address', $address);
	$res = $stmt->execute();
}