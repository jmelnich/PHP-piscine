#!/usr/bin/php
<?php
	$regex = '/\s+/';
	$arr = preg_split($regex, $argv[1], -1, PREG_SPLIT_NO_EMPTY);
	echo join(" ", $arr);
	echo "\n";
?>