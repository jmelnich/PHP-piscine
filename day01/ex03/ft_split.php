#!/usr/bin/php

<?php
function ft_split($str)
{
	$regex = '/\s+/';
	$arr = preg_split($regex, $str, -1, PREG_SPLIT_NO_EMPTY);
	if ($arr)
		sort($arr);
	return ($arr);
}
?>