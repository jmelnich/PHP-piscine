<?php
 if ($_POST['submit'] == 'OK') 
 {
	if (!$_POST['passwd'] || !$_POST['login'])
	{
		echo "ERROR\n";
		exit();
	}
	if (!file_exists("../private"))
	{
		mkdir("../private");
	}
	else if (file_exists("../private/passwd"))
	{
		$data = unserialize(file_get_contents("../private/passwd"));
		foreach ($data as $key => $pr) {
			if($pr["user"] === $_POST['login']){
				echo "ERROR\n";
				exit();
			}
		}
	}
	$data[] = array('user' => $_POST['login'], 'passwd' => hash("sha256", $_POST['passwd']));
	file_put_contents("../private/passwd", serialize($data));
	echo "OK\n";
}

?>