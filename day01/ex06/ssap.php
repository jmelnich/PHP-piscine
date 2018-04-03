#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$regex = '/\s+/';
		$arr = preg_split($regex, $str, -1, PREG_SPLIT_NO_EMPTY);
		return ($arr);
	}

	$arr = array();

	for ($i = 1; $i < $argc; $i++) {
		$tmp_arr = ft_split($argv[$i]);
		$arr = array_merge($arr, $tmp_arr);
	}
	sort($arr);
	for ($i = 0; $i < count($arr); $i++) { 
		echo "$arr[$i]\n";
	}
?>