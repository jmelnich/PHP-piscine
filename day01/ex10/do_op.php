#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$regex = '/\s+/';
		$arr = preg_split($regex, $str, -1, PREG_SPLIT_NO_EMPTY);
		return ($arr);
	}

	function ssap($arr_total)
	{
		$arr = array();
		for ($i = 0; $i < count($arr_total); $i++) {
			$tmp_arr = ft_split($arr_total[$i]);
			$arr = array_merge($arr, $tmp_arr);
		}
		return ($arr);
	}

	function find_op($sb){
		if ($sb == "+")
			return 1;
		if ($sb == "-")
			return 2;
		if ($sb == "*")
			return 3;
		if ($sb == "/")
			return 4;
		if ($sb == "%")
			return 5;
		else
			return 0;
	}

	if ($argc != 4)
		echo "Wrong quantity of parameters\n";
	array_shift($argv);
	$arr = ssap($argv);
	$op = find_op($arr[1]);
	if ($op == 1)
		$res = $arr[0] + $arr[2];
	else if ($op == 2)
		$res = $arr[0] - $arr[2];
	else if ($op == 3)
		$res = $arr[0] * $arr[2];
	else if ($op == 4)
		$res = $arr[0] / $arr[2];
	else if ($op == 5)
		$res = $arr[0] % $arr[2];
	else
		echo "Wrong operator\n";
	echo "$res\n";
?>