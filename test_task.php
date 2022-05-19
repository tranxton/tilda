<?php


$k = $j = 1;
for ($i = 1; $i <= 100; $i++) {
 echo $i;
 if ($k === $j) {
  echo "\n";
  
  $k++;
  $j = 1;
  
  continue;
 }
 $j++;
}

/**
*
*/

$arrSize = [5, 7];
$arrLengthNeedle = $arrSize[0] * $arrSize[1];
$rang = [0, 1000];


$arr = makeRandomlyFilledArray($arrLengthNeedle, $rang[0], $rang[1]);
while(true) {
	$arrLength = count($arr);
	if ($arrLength < $arrLengthNeedle) {
		$arr = array_unique(array_merge($arr, makeRandomlyFilledArray($arrLengthNeedle - $arrLength, $rang[0], $rang[1])));
		continue;
	}	
	
	break;
}
	
echo buildHTMLTable($arr, $arrSize[0]);
	

function makeRandomlyFilledArray(int $length, int $minVal, int $maxVal) 
{
	return array_unique(array_map(function() use ($minVal, $maxVal) {
		return rand($minVal, $maxVal);
	}, array_fill(0, $length, null)));
}

function buildHTMLTable(array $arr, int $columnsAmount)
{
	$table = '';
	$i = 1;

	$table .= "<table>";
	foreach ($arr as $item) {
		if ($i === 1) {
			$table .= "<tr>";	
		}
		
		$table .= "<td>{$item}</td>";
		
		if ($i === $columnsAmount) {
			$table .= "</tr>";	
			$i = 1;
			
			continue;
		}
		
		$i++;
	}
	$table .= "</table>";
	
	return $table;
}
