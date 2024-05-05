<?php
session_start();
include('connecti.php');
include('connect.php');


if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
}

// Получение данных пользователя из БД
$user_id = $_SESSION['user_id'];
$query = "SELECT username, email FROM users WHERE user_id='$user_id'";
$result = mysqli_query($connecti, $query);
$user_data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('header.php');?>

    <div class="screen1">
        <h1>Профиль пользователя</h1>

        <p><strong>Username:</strong>
            <?= $user_data['username'] ?>
        </p>
        <p><strong>Email:</strong>
            <?= $user_data['email'] ?>
        </p>
        <div class="prof_but">
            <a href="logout.php" class="header_nav_but">Выйти</a>
           



            <?php
            $sql_query = "SELECT * FROM users WHERE user_id=$user_id";
            $result = $connecti->query($sql_query);
            $us = $result->fetch_assoc();
            if ($us['user_role'] == 'admin') {
                echo ' <a href="add_news.php" class="header_nav_but"> Добавить приложение</a>';
                echo '<a href="mod.php" class="header_nav_but"> Модерация</a>';
            }
            if ($us['user_role'] == 'creator') {
                echo ' <a href="add_news.php" class="header_nav_but"> Добавить работу</a>';
            }
            ?>
        </div>
</div>

       <? if ($us['user_role'] == 'admin') {?>
    <h1>Опубликованные вами приложения</h1>
    <div class="container">
    <div class="tovar_list">
        
        <?php
       
        $app_list_sql = "SELECT * FROM web_applications WHERE user_id = '$user_id' ";
        $result = $connect->query($app_list_sql);

        while ($app = $result->fetch(2)) { ?>

           
            <div class="card">
            <div class="card-details">
            <img class="tovar_item_img" src="<?php echo $app['photo1']; ?>" >

                <p class="text-title"> <?= $app['title'] ?></p>
                  
            </div>
            <a class="card-button" href="item.php?id=<?php echo $app['app_id'] ?>">Подробнее</a>
            </div>



        <? }}
         
        ?>
        </div>
       
    </div>
    

</div>



        
        <?php
                // SQL-запрос для получения приложений в корзине пользователя
                $cart_items_sql = "SELECT web_applications.title, web_applications.description, web_applications.photo1, web_applications.app_id
                                FROM favorites 
                                JOIN web_applications ON favorites.item_id = web_applications.app_id 
                                WHERE favorites.user_id = $user_id";
                $result = $connect->query($cart_items_sql);

                if ($result->rowCount() > 0) {
                    // Вывод списка приложений в корзине пользователя
                    echo '<h1 class="qqq">Ваши избранные приложения</h1>';
                    echo '<div class="container">
                         <div class="tovar_list">';
                    while ($app = $result->fetch(2)) {?>
                    <div class="card">
                        <div class="card-details">
                            <div class="tovar_item_img">
                                <img class="tovar_item_img" src="<?php echo $app['photo1']; ?>" >
                            </div>
                            <p class="text-title"><?= $app['title'] ?></p>
                        </div>
                        <a class="card-button" href="item.php?id=<?php echo $app['app_id'] ?>">Подробнее</a>
                    </div>
                    <?
                        
                    }?>
                    <?} else {
                       echo '<h3 class="new-title">Избранных приложений нет</h3>';
                    }?>
    <?php include('footer.php');?>


</body>

</html>