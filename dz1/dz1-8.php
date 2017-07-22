<?php
/*Задание #8
 
Создайте переменную $str, которой присвойте строковое значение, содержащее отдельные слова разделённые пробелом. Выведите строку на экран.
Затем разбейте строку на массив. Выведите массив. Затем используя циклы while или do-while (на ваше усмотрение) развернуть массив и склеить в строку используя любой символ, кроме пробела. Вывести результат.
*/

echo '<b>Задание #8</b><br>';
	$string = 'word1 word2 word3 word4 word5';
echo $string;
	$array = explode(' ', $string);
echo '<pre>';
print_r($array);
echo '</pre>';
	$new_array = [];
	$count = count($array);
		while ($count)
		{
				$new_array[] = $array[$count-1];
				$count--;
		}
$res = implode(' | ', $new_array);
echo $res;