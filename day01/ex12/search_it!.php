#!/usr/bin/php
<?php
	function split_to_hash($str){
		$regex = '/:/';
		$arr = preg_split($regex, $str, -1, PREG_SPLIT_NO_EMPTY);
		$hash_arr[$arr[0]] = $arr[1];
		return ($hash_arr);
	}

	$hash_arr = Array();

	$buscando = $argv[1];
	for ($i = 2; $i < $argc; $i++) { 
		$tmp_arr = split_to_hash($argv[$i]);
		$hash_arr = array_merge($hash_arr, $tmp_arr);
	}
	foreach ($hash_arr as $key => $value)
	{
		if ($buscando == $key && ($key != '0' && $buscando != '0'))
			echo "$value\n";
		else if ($key == '0' && $buscando == '0')
			echo "$value\n";
	}
?>