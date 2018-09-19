<?php
	session_start();
	$_SESSION['loggued_on_user'] = '';
	unset($_SESSION['basket']);
	header('Location: index.php');
?>