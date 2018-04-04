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

	function prioritize($c){
		if (ctype_alpha($c))
			return (1);
		if (is_numeric($c))
			return (2);
		else
			return (3);
	}

	function wise_srt($s1, $s2){
		if ($s1 == $s2)
			return (0);
		$s1 = strtolower($s1);
		$s2 = strtolower($s2);
		for ($i = 0; $i < strlen($s1) & $i < strlen($s2); $i++) { 
			$pr_s1 = prioritize($s1[$i]);
			$pr_s2 = prioritize($s2[$i]);
			if ($pr_s1 == $pr_s2)
				$res = strcmp($s1[$i], $s2[$i]);
			else
				$res = $pr_s1 - $pr_s2;
			if ($res > 0)
				return (1);
			else if ($res < 0)
				return (-1);
		}
		return (strcmp($s1, $s2));
	}
	
	array_shift($argv);
	$arr_total = ssap($argv);
	usort($arr_total, "wise_srt");
//print
	for ($i = 0; $i < count($arr_total); $i++) { 
		echo "$arr_total[$i]\n";
	}
?>