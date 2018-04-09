<?php
include 'auth.php';
include 'hello.php';
session_start();
if (auth($_POST['login'], $_POST['passwd'])) {
	$_SESSION['loggued_on_user'] = $_POST['login'];
	//hello($_SESSION['loggued_on_user']);
	echo "<script>window.location = 'index.php'</script>";
} else {
	$_SESSION['loggued_on_user'] = '';
	echo "<div style='margin-top: 250px; margin-left: 100px;'>No such user!!!\n</div>";
}
?>
