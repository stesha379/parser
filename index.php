<?php
	require_once 'config.php'; // підключаємо скрипт
	//Проводимо спробу підключення к серверу MySQL
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Помилка " . mysqli_error($link));
?>
<html>
	<head>
		<title>Авторизація</title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "css/style.css" type = "text/css">
	</head>
	<body>
		<header>
			<div class = "name">
				<h1>Авторизація</h1>
			</div>
		</header>
		<div class = "wrap">
			<div class = "content">
				<form action="auth.php" method="post" name="forma" class = 'auth'>
					<label for="login" class="label">Введіть логін:</label><br/>
					<input type="text" name="login" size="30"><br/>
					<label for="pass">Введіть пароль:</label><br/>
					<input type="text" name="pass" size="30"><br/>
					<br/>
					<input id="submit" type="submit" value="Авторизація" class="auth_button"><br/>
				</form>
			</div>
		</div>
		<footer>
		</footer>
	</body>
</html>
