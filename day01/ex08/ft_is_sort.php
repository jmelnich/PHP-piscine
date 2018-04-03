#!/usr/bin/php
<?php
	function ft_is_sort($arr){
		for ($i = 0; $i < count($arr) - 1; $i++) {
			if (strcmp($arr[$i], $arr[$i + 1]) > 0)
				return (false);
		}
			return (true);
	}
?>