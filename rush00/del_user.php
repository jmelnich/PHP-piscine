<?php

function	filter($var) {
	echo $var['user'] . "  aa  " . $_POST["user_del"] . "\n";
	if ($var["user"] === $_POST["user_del"]) {
		return (FALSE);
	}
	return (TRUE);
}

function	del_usr() {
	$file_path = "private/passwd";
	$array = NULL;
	if ($_POST["user_del"]) {
		if (file_exists($file_path)) {
			$file_str = file_get_contents($file_path);
			$array = unserialize($file_str);
			$array = array_filter($array, "filter");
			$file_str = serialize($array);
			file_put_contents($file_path, $file_str);
		}
	}
}
del_usr();
header('Location: admin_page.php');
?>
