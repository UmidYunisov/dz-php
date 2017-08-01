<?php
// Задание #1 ---------------------------------------------------------------
/*Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.*/

function task1($arg = [], $par = false)
{
	if($par == true)
	{
		$res = '';
		foreach ($arg as $data)
		{
			$res .=" $data";
		}
		return $res;
	}
	else
	{
		foreach ($arg as $data)
		{
			echo "<p>$data</p>"; 
		}
	}
}
// Задание #2 ---------------------------------------------------------------
/*Функция должна принимать 2 параметра:
массив чисел;
строку, обозначающую арифметическое действие,    которое нужно выполнить со всеми элементами массива.
Функция должна вывести результат на экран.
Функция должна обрабатывать любой ввод, в том числе некорректный и выдавать сообщения об этом
*/
function task2($arr, $operation)
{
    		switch ($operation) 
    		{
    			case '+':
    				echo $arr[0];
    				$sum = $arr[0];
	    				for ($value = 1; $value < count($arr); $value++)
	    				{ 
	    					echo " + " . $arr[$value];
	    					$sum += $arr[$value];
	    				}
    				echo " = " . $sum;
    				break;
				case '-':
    				echo $arr[0];
    				$sum = $arr[0];
    				for ($value = 1; $value < count($arr); $value++)
    				{ 
    					echo " - " . $arr[$value];
    					$sum -= $arr[$value];
    				}
    				echo " = " . $sum;
    				break;
    			case '*':
    				echo $arr[0];
    				$sum = $arr[0];
    				for ($value = 1; $value < count($arr); $value++)
    				{ 
    					echo " * " . $arr[$value];
    					$sum *= $arr[$value];
    				}
    				echo " = " . $sum;
    				break;
    			case '/':
    				echo $arr[0];
    				$sum = $arr[0];
					for ($value = 1; $value < count($arr); $value++)
    				{ 
    					echo " / " . $arr[$value];
    					$sum /= $arr[$value];
    				}
    				echo " = " . $sum;
    				break;
    			default:
    				echo "Операция неправильно";
    				break;
    		}
}

// Задание #3 ---------------------------------------------------------------
/*Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.

Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2
*/
function task3()
{
    /*$numbers = array();
    	for ($i = 1; $i < func_num_args(); $i++)
	    	{
	        	$numbers[] = func_get_arg($i);
	    	}

        if (is_array($numbers))
	        {
	        	echo "<pre>";
	        	print_r($numbers);
	        	echo "</p>";
	        }*/
	        $operation = func_get_arg(0);
	        $sum = '';
	        switch ($operation) 
    		{
    			case '+':
    				echo func_get_arg(1);
    				$sum = func_get_arg(1);
	    				for ($value = 2; $value < func_num_args(); $value++)
	    				{ 
	    					echo " + " . func_get_arg($value);
	    					$sum += func_get_arg($value);
	    				}
    				echo " = " . $sum;
    				break;
				case '-':
    				echo func_get_arg(1);
    				$sum = func_get_arg(1);
    				for ($value = 2; $value < func_num_args(); $value++)
    				{ 
    					echo " - " . func_get_arg($value);
    					$sum -= func_get_arg($value);
    				}
    				echo " = " . $sum;
    				break;
    			case '*':
    				echo func_get_arg(1);
    				$sum = func_get_arg(1);
    				for ($value = 2; $value < func_num_args(); $value++)
    				{ 
    					echo " * " . func_get_arg($value);
    					$sum *= func_get_arg($value);
    				}
    				echo " = " . $sum;
    				break;
    			case '/':
    				echo func_get_arg(1);
    				$sum = func_get_arg(1);
					for ($value = 2; $value < func_num_args(); $value++)
    				{ 
    					echo " / " . func_get_arg($value);
    					$sum /= func_get_arg($value);
    				}
    				echo " = " . $sum;
    				break;
    			default:
    				echo "Операция неправильно";
    				break;
    		}
			

}
// Задание #4 ---------------------------------------------------------------
/*Функция должна принимать два параметра – целые числа. 
Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
 В остальных случаях выдавать корректную ошибку.
*/
function task4($rows, $cols)
{
	if(is_numeric($rows) && is_numeric($cols))
	{
		echo "<table border=1>";
			for($row = 1; $row <= $rows; $row++)
			{
				echo "<tr>";
					for ($col=1; $col <= $cols; $col++)
					{ 
						echo "<td>".$row * $col."</td>";
					}
				echo "</tr>";
			}
		echo "</table>";
	}
	else
		echo "Ошыбка: Вы не ввели чисел";
}
// Задание #5 ---------------------------------------------------------------
/*Написать две функции.
Функция №1 принимает 1 строковый параметр и возвращает true, если строка является палиндромом*, false в противном случае. Пробелы и регистр не должны учитываться.
Функция №2 выводит сообщение в котором на русском языке оговаривается результат из функции №1
*/
function is_palindrom($a)
{
	$a = mb_strtolower($a);
	$a = str_replace(" ", "", $a);
	$b =  strrev($a);
	    $string_reverse = str_split($b);
	    $palin = '';
		    foreach($string_reverse as $value)
		    {
				$palin.= $value; 
		    }
	    print $palin;
		    if($a !== $palin)
					return false;
	        	else
	        		return true;
}
function task5($a)
{
	echo '<br>Строка '. (is_palindrom($a)? ' - Палиндром' : ' - Не Палиндром').'<br>';
}
// Задание #6 ---------------------------------------------------------------
/*Выведите информацию о текущей дате в формате 31.12.2016 23:59
Выведите unixtime время соответствующее 24.02.2016 00:00:00.
*/
function task6()
{
	echo date('d.m.Y H:i');
	echo "<br>";
	
	echo date ("d.m.Y H:i:s", mktime (0,0,0,2,24,2016));
	echo "<br>"; 
}
// Задание #7 ---------------------------------------------------------------
/*Дана строка: “Карл у Клары украл Кораллы”. удалить из этой строки все заглавные буквы “К”.
Дана строка “Две бутылки лимонада”. Заменить “Две”, на “Три”. По желанию дополнить задание.
*/
function task7($string1, $string2)
{
	$res1 = str_replace('К', ' ', $string1);
	$res2 = str_replace('Две', 'Три', $string2);
	echo $res1.'<br>'.$res2.'<br>';
}
// Задание #8 ---------------------------------------------------------------
/*Напишите функцию, которая с помощью регулярных выражений, получит информацию о переданных RX пакетах из переданной строки:
Пример строки: “RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. “
Если кол-во пакетов более 1000, то выдавать сообщение: “Сеть есть”
Если в переданной в функцию строке есть “:)”, то нарисовать смайл в ASCII и не выдавать сообщение из пункта №3. Смайл должен храниться в отдельной функции
*/
function task8($string)
{
	$pattern = "~[\d+]{1,6}~";
	$smile = "~\:\)~";
	preg_match($pattern, $string, $match);
	preg_match($smile, $string, $sm);
	if($sm)
		{
			smile();
		}
	elseif($match[0] > 1000)
		{
			echo "Сеть есть<br>";
		}
}
function smile()
{
	echo "☺☺☺";
}
// Задание #9 ---------------------------------------------------------------
/*Создайте средствами ОС файл test.txt и поместите в него текст “Hello, world” 
Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.
*/
function task9($file)
{
	$result = file_get_contents($file);
	return $result;
}
// Задание #10 ---------------------------------------------------------------
/*Создайте файл anothertest.txt средствами PHP. Поместите в него текст - “Hello again!”*/
function task10()
{
	$file = "anothertext.txt";

	if (!file_exists($file))
	{
	    $fp = fopen($file, "w");
	    fwrite($fp, "Hello World Again!");
	    fclose($fp);
	}
	$result = file_get_contents($file);
	return $result;
}