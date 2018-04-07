<?php
	if (!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"] || $_POST["submit"] != 'OK' || !file_exists("../private/passwd"))
	{
		echo "ERROR\n";
		exit();
	}
	
	$pass_hash = hash("sha256", $_POST['oldpw']);
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $pr) {	
		if ($pr["user"] === $_POST['login']){
			if ($pass_hash === $pr["passwd"]){
				$data[$key]["passwd"] = hash("sha256", $_POST['newpw']);
				file_put_contents("../private/passwd", serialize($data));
				echo "OK\n";
				exit();
			} else {
				echo "ERROR\n";
				exit();
			}
		} 
	}
	echo "ERROR\n";
	exit();
?>