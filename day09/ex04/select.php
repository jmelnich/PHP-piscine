<?php
$core_path = dirname(__FILE__);
include("{core_path}/todo.csv");

function read_csv($filename) {
	$rows = array();

	$rows = file($filename, FILE_IGNORE_NEW_LINES);
	return $rows;

}

function write_csv($filename, $rows) {

}
print_r(read_csv('todo.csv'));
?>