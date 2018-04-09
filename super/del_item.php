<?php

function	filter($var) {
	if ($var["id"] == $_POST["item_del"]) {
		return (FALSE);
	}
	return (TRUE);
}

function delproduct(){
	$file_path = "./products/data";
	$array = NULL;

	if (!$_POST["item_del"]) {
		return ;
	}

	if (file_exists($file_path)) {
		$file_str = file_get_contents($file_path);
		$array = unserialize($file_str);
		$array = array_filter($array, "filter");
		$file_str = serialize($array);
		file_put_contents($file_path, $file_str);
	}
}
delproduct();
header('Location: admin_page.php');
?>
