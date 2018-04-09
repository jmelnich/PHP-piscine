<?php
	function auth($login, $passwd) {
		if (!file_exists("../private/passwd")){ 
			return false;
		}
		$data = unserialize(file_get_contents("../private/passwd"));
		$pass_hash = hash("sha256", $passwd);
		foreach ($data as $key => $pr) {
			if ($pr["user"] === $login) {
				if ($pr["passwd"] === $pass_hash)
					return true;
				else 
					return false;
			}
		}
	}
?>
