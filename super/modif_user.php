<?php
$file_path = "./private/passwd";
$array = NULL;

if ($_POST["user"] || $_POST["oldpw"] || $_POST["newpw"] || $_POST["submit"] === "OK") {
	$user = $_POST["user"];
	$oldpw = hash(whirlpool, $_POST["oldpw"]);
	$newpw = hash(whirlpool, $_POST["newpw"]);

	if (file_exists($file_path)) {
		$file_str = file_get_contents($file_path);
		$array = unserialize($file_str);
		if ($array) {
			for ($i = 0; $i < count($array); $i++) {
				if ($array[$i]["user"] === $user) {
					if ($array[$i]["passwd"] === $oldpw) {
						$array[$i]["passwd"] = $newpw;
						$file_str = serialize($array);
						file_put_contents($file_path, $file_str);
						return ;
					}
				}
			}
		}
	}
}
?>
