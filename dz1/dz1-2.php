<?php
/*Задание #2 
 
Дана задача: На школьной выставке 80 рисунков. 23 из них выполнены фломастерами, 40 карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?
Описать и вывести условия, решение этой задачи на PHP. Все числа должны быть указаны в переменных.
*/
$pictures = 80;
$pen = 23;
$pencil = 40;
$paint = $pictures - ($pen + $pencil);
	echo "<b>Задание #2</b><br>";
	echo "Рисунки выполненные красками: $paint";
