<?php
session_start();
include('connect.php');
include('connecti.php');


if (isset($_SESSION['user_id'])) {
	header('Location: profile.php');
}

// if (isset($_POST["submit"])) {
// 	$name = $_POST["username"];
// 	$email = $_POST["email"];
// 	$password = $_POST["password_hash"];
// 	$confirm_password = $_POST["confirm_password"];

// 	$errors = array();

// 	if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
// 		$errors[] = "Все поля обязательны для заполнения";
// 	}

// 	if (strlen($name) < 2) {
// 		$errors[] = "Минимальная длина имени - 2 символа";
// 	}

// 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// 		$errors[] = "Неверный формат электронной почты";
// 	}

// 	$sql = "SELECT user_id FROM users WHERE email='$email'";
// 	$result = mysqli_query($connect, $sql);

// 	if (mysqli_num_rows($result) > 0) {
// 		$errors[] = "Электронная почта уже используется";
// 	}

// 	if (strlen($password) < 6) {
// 		$errors[] = "Минимальная длина пароля - 6 символов";
// 	}

// 	if ($password !== $confirm_password) {
// 		$errors[] = "Пароли не совпадают";
// 	}

// 	if (empty($errors)) {
// 		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// 		$sql = "INSERT INTO users (username, email, password_hash) VALUES ('$name', '$email', '$hashed_password')";

// 		if (mysqli_query($connect, $sql)) {
// 			echo "Вы успешно зарегистрировались";
// 		} else {
// 			echo "Ошибка: " . mysqli_error($conn);
// 		}
// 	} else {
// 		foreach ($errors as $error) {
// 			echo "<p>$error</p>";
// 		}
// 	}
// }

// ?>

<!DOCTYPE html>
<html>

<head>
	<title>Регистрация</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include('header.php'); ?>

	<div class="screen">
		<div class="container">

		
		<h1>Регистрация</h1>

		
				<form method="post" class="login" action="">
					<?php if (isset($error)): ?>
						<p style="color:red;">
							<?= $error ?>
						</p>
					<?php endif ?>
					<label>Имя:</label>
					<input class="input" type="text" id="username" name="username" placeholder="Введите username"
						value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
					<label>Электронная почта:</label>
					<input class="input" type="text" name="email" placeholder="Введите email"
						value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
					<label>Пароль:</label>
					<input class="input" type="password" name="password_hash" placeholder="Введите пароль"
						value="<?php echo isset($_POST['password_hash']) ? $_POST['password_hash'] : ''; ?>">
					<label>Подтверждение пароля:</label>
					<input  class="input" type="password" id="confirm_password" name="confirm_password" placeholder="Подтвердите пароль"> 
					<button type="submit" name="submit" class="header_nav_but">Зарегистрироваться</button> <p>Уже есть аккаунт? <a href="login.php" class="bold">Войти</a>.</p>

				</form>

</div>


</body>

</html>
<?php


if (!$connect) {
	die("Ошибка подключения: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
	$name = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password_hash"];
	$confirm_password = $_POST["confirm_password"];

	$errors = array();

	if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
		$errors[] = "Все поля обязательны для заполнения";
	}

	if (strlen($name) < 2) {
		$errors[] = "Минимальная длина имени - 2 символа";
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Неверный формат электронной почты";
	}

	$sql = "SELECT user_id FROM users WHERE email='$email'";
	$result = mysqli_query($connecti, $sql);

	if (mysqli_num_rows($result) > 0) {
		$errors[] = "Электронная почта уже используется";
	}

	if (strlen($password) < 6) {
		$errors[] = "Минимальная длина пароля - 6 символов";
	}

	if ($password !== $confirm_password) {
		$errors[] = "Пароли не совпадают";
	}

	if (empty($errors)) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (username, email, password_hash) VALUES ('$name', '$email', '$hashed_password')";

		if (mysqli_query($connecti, $sql)) {
			echo "Вы успешно зарегистрировались";
			header('Location: login.php');

			
		} else {
			echo "Ошибка: " . mysqli_error($connecti);
		}
	} else {
		foreach ($errors as $error) {
			echo "<p>$error</p>";
		}
	}
}
?>
<?php include('footer.php'); ?>

</body>

</html>