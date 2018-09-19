<?php
function	filter($var) {
	if ($var == $_POST["basket_del"]) {
		return (FALSE);
	}
	return (TRUE);
}

function	del_basket() {
	session_start();
	$basket = $_SESSION["basket"];
	$_SESSION["basket"] = array_filter($basket, "filter");
}

del_basket();

?>
