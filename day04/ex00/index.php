<?php
	session_start();
	if ($_GET['submit'] === 'OK'){
		if ($_GET['login'] && $_GET['passwd']){
			$_SESSION['user'] = $_GET['login'];
			$_SESSION['pass'] = $_GET['passwd'];
		}
	}
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign in</title>
	<style>
		form{
			margin-top: 20%;
		}
		.cn{
			margin: 20px auto;
			text-align: center;
		}
		input[type="submit"]{
			background: none;
			border: 1px solid green;
			border-radius: 5px;
			display: block;
			margin: 20px auto;
			width: 150px;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<form method="GET">
			<?php
	if ($_GET['submit'] === 'OK' && (!$_GET['login'] || !$_GET['passwd']))
	{
		echo "<p>Field cannot be empty</p>";
	}
	?>
		<div class="cn">Username: <input type="text" name="login" value="<?php echo $_SESSION['user']?>"></div>
		<div class="cn">Password: <input type="password" name="passwd" value="<?php echo $_SESSION['pass']?>"></div>
		<input type="submit" name="submit" value="OK">
	</form>
</body>
</html>