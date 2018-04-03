#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$regex = '/\s+/';
		$arr = preg_split($regex, $str, -1, PREG_SPLIT_NO_EMPTY);
		return ($arr);
	}
	$tmp_array = ft_split($argv[1]);
	for ($i = 1; $i < count($tmp_array); $i++) { 
		echo "$tmp_array[$i] ";
	}
	echo "$tmp_array[0]\n";
?>