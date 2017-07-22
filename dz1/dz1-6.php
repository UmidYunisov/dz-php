<?php
/*Задание #6 
 
Создайте массив $bmw с ячейками: 
model 
speed 
doors 
year 
 Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015” 
Создайте   массивы   $toyota   и   $opel   аналогичные   массиву   $bmw   (заполните  данными) 
Объедините три массива в один многомерный массив
Выведите значения всех трех массивов в виде:
CAR name
name ­ model ­speed ­ doors ­ year
*/
$bmw = ['model'=>'X5','speed'=>120,'doors'=>5,'year'=>'2017'];
$toyota = ['model'=>'Corolla','speed'=>200,'doors'=>5,'year'=>'2017'];
$opel = ['model'=>'Mokka','speed'=>200,'doors'=>5,'year'=>'2017'];
$res = ['bmw'=>$bmw, 'toyota'=>$toyota,'opel'=>$opel];
	echo '<b>Задание #6</b><br>';
	foreach ($res as $key => $value)
	{
		echo "CAR ".$key."<br>";
		foreach ($value as $key => $value) 
		{
			echo $value." ";
		}
		echo "<br>";
	}