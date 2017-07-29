<?php
//------------------------------------------------------------------
/*Задание #1
Дан XML файл. Сохраните его под именем data.xml:
Написать скрипт, который выведет всю информацию из этого файла в удобно читаемом виде. Представьте, что результат вашего скрипта будет распечатан и выдан курьеру для доставки, разберется ли курьер в этой информации?
*/

function xmlRead()
{
	$xml = simplexml_load_file('data.xml');
	foreach ($xml->attributes() as $key => $value) {
		echo "$key : $value<br>";
	}
	foreach ($xml->Address as $adress) {
		echo "<br>Address ".$adress->attributes()[0]."<br>";
    	echo "Name: ".$adress->Name."<br>";
	    echo "Street: ".$adress->Street."<br>";
	    echo "City: ".$adress->City."<br>";
	    echo "State: ".$adress->State."<br>";
	    echo "Zip: ".$adress->Zip."<br>";
	    echo "Country: ".$adress->Country."<br>";
	}
	echo "<br>DeliveryNotes: ";
	echo $xml->DeliveryNotes."<br>";
	foreach ($xml->Items->Item as $item) 
	{
	    echo "<br>Item PartNumber: ";
	    echo $item->attributes()[0]."<br>";
	    echo "ProductName: ".$item->ProductName."<br>";
	    echo "Quantity: ".$item->Quantity."<br>";
	    echo "USPrice: ".$item->USPrice."<br>";
	    echo $item->Comment."<br>";
	}
}
//------------------------------------------------------------------
/*Задача #2
Создайте массив, в котором имеется как минимум 1 уровень вложенности. Преобразуйте его в JSON.  Сохраните как output.json
Откройте файл output.json. Случайным образом решите изменять данные или нет. Сохраните как output2.json
Откройте оба файла. Найдите разницу и выведите информацию об отличающихся элементах*/
function jsonFunction()
{
	$data = [
    "BMW" => "X6",
    "Opel" => "Mokka",
    "Mercedes" => [
        "Compressor" => [2000, 2005, 2007, 2010],
        "4matic" => [2009, 2011, 2014, 2016],
        "Sprinter" => [2001, 2003, 2007, 2011]
    ]
];
	$json = json_encode($data);
	file_put_contents("output.json", $json);
	$imp = file_get_contents("output.json");
	$data2 = json_decode($imp, true);

	$rand = rand(1, 10);
	if ($rand < 5)
	{
	    $data2['Mercedes']['Compressor'] = [2010, 2015, 2008, 2017];
	} 
	elseif ($r < 8)
	{
	    $data2['Opel'] = "Corsa";
	}
	else
	{
	    $data2['BMW'] = "X7";
	}
	file_put_contents("output2.json", json_encode($data2));
	$output1 = file_get_contents("output.json");
	$output2 = file_get_contents("output2.json");
	$data1 = json_decode($output1, true);
	$data2 = json_decode($output2, true);
	$res1 = array_udiff_assoc($data1, $data2, 'array_dif');
	echo "<pre>";
	print_r($res1);
	echo "</pre>";
	$res2 = array_udiff_assoc($data2, $data1, 'array_dif');
	echo "<pre>";
	print_r($res2);
	echo "</pre>";
	if (!empty($res1) || !empty($res2))
	    echo "<br>Разные<br>";
	else
	    echo "<br>Одинаковые<br>";

}
function array_dif($a, $b)
{
    if (is_array($a) && is_array($b)) 
    {
        if ((count($a) - count($a, COUNT_RECURSIVE) != 0) || (count($b) - count($b, COUNT_RECURSIVE) != 0)) 
            $rez = array_udiff_assoc($a, $b, 'array_dif');
        else
            $rez = array_diff_assoc($a, $b);
        if(empty($rez))
            return 0;
        else
            return 1;
    } 
    elseif 	(is_array($a) || is_array($b))
    		return 1;
    elseif ($a == $b)
    		return 0;
    else
     return 1;
}
//------------------------------------------------------------------
/*Задача #3
Программно создайте массив, в котором перечислено не менее 50 случайных числел от 1 до 100
Сохраните данные в файл csv
Откройте файл csv и посчитайте сумму четных чисел*/
function randArray()
{
	$i=1;
	while($i <= 30)
	{
		$array[$i] = rand(1,100);
		$i++;
	}
	$fp = fopen('array.csv', 'w');
	fputcsv($fp, $array);
	fclose($fp);

	$csvFile = fopen('array.csv', "r");
        if ($csvFile) 
        {
            $res = array();
            while (($csvData = fgetcsv($csvFile, 100, ",")) !== false)
            {
                $res = $csvData;
            }
        }
         	$sum = 0;
		    foreach($res as $elem)
		    {
		        if($elem%2 == 0)
		        $sum += $elem;
		    }
		    echo "Сумма четных чисел: ".$sum;
       
}
/*Задача #4
С помощью CURL запросить данные по адресу: https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json
Вывести title и page_id*/
function selectCurl()
{
$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	$output = curl_exec($ch);
	curl_close($ch);
	
	$result=json_decode($output,1);
	$id_page=array_keys($result['query']['pages']);
	echo "title: ".$result['query']['pages'][($id_page[0])]['title']."<br>pageid: ".$result['query']['pages'][($id_page[0])]['pageid'];
}