#!/usr/bin/php
<?php
		function ft_split($str)
	{
		$regex = '/\s+/';
		$arr = preg_split($regex, $str, -1, PREG_SPLIT_NO_EMPTY);
		return ($arr);
	}

	function filter_nums($arr)
	{
		$arr_num = array();
		for ($i = 0; $i < count($arr); $i++) { 
			if (is_numeric($arr[$i]))
				array_push($arr_num, $arr[$i]);
		}
		sort($arr_num);
		return ($arr_num);
	}

	$arr = array();

	for ($i = 1; $i < $argc; $i++) {
		$tmp_arr = ft_split($argv[$i]);
		$arr = array_merge($arr, $tmp_arr);
	}
	$arr_num = filter_nums($arr);
	for ($i = 1; $i < $argc; $i++) {
		if(is_numeric($arr[$i]))
			unset($arr[$i]);
	}
	//array_values($arr);
	sort($arr);
	//$arr = array_merge($arr, $arr_num);

//print
	for ($i = 0; $i < count($arr); $i++) { 
		echo "$arr[$i]\n";
	}
?>