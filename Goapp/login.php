<?php
    require_once('connect.php');
    require_once('connecti.php');

    session_start();


    if (isset($_SESSION['user_id'])) {
        header('Location: profile.php');
        exit();
    }

    $error = '';
    if (isset($_POST['submit'])) {
        // получаем данные из формы
        $email = mysqli_real_escape_string($connecti, $_POST['email']);
        $password_hash = mysqli_real_escape_string($connecti, $_POST['password_hash']);

        // обратное хеширование пароля
        $sql = "SELECT user_id, password_hash FROM users WHERE email='$email'";
        $result = mysqli_query($connecti, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password_hash, $row['password_hash'])) {
            // авторизация успешна, сохраняем id пользователя в сессии
            $_SESSION['user_id'] = $row['user_id'];

            // переход на страницу профиля с передачей id пользователя
            header('Location: profile.php?id=' . $row['user_id']);
            exit();
        } else {
            $error = 'Неверный email или пароль';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход в аккаунт</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include('header.php');?>

        <div class="container">
    <h1>Вход в аккаунт</h1>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" class="login">
        <p>
            <label>Email:</label>
            <input  class="input" type="text" name="email"  value="<?php if(isset($email)) echo $email?>">
        </p>
        <p>
            <label>Пароль:</label>
            <input   class="input" type="password" name="password_hash" >
        </p>
        <p>
            <button type="submit" name="submit" class="header_nav_but">Войти</button> <p>Еще нет аккаунта? <a href="register.php" class="bold">Зарегистрироваться</a>.</p>
        </p>
    </form>
    </div>
    <?php include('footer.php');?>

</body>
</html>

