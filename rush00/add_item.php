<?php

$file_dir = "./products";
$file_path = "./products/data";
$array = NULL;

if (!file_exists($file_dir))
{
	mkdir($file_dir);
}

if (file_exists($file_path)) {
	$file_str = file_get_contents($file_path);
	$array = unserialize($file_str);
}

function get_id($arr){
	if (!$arr)
		return 0;
	$num = count($arr);
	return $num;
}

$id = get_id($array);
$name = $_POST["product-name"] ? $_POST["product-name"] : 't-shirt #' . $id;
$img = $_POST["product-image"] ? $_POST["product-image"] : 'products/img/default.png'; //TODO implement default image
$cost = $_POST["product-cost"] ? $_POST["product-cost"] : "9.99";
$gender = $_POST["product-gender"] ? $_POST["product-gender"] : "female";
$desc = $_POST["product-desc"] ? $_POST["product-desc"] : "default";

$array[] = ["id" => $id, "name" => $name, "img" => $img, "cost" => $cost, "gender" => $gender, "desc" => $desc];
file_put_contents($file_path, serialize($array));

?>