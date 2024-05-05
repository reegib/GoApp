<?php
session_start();
include('connect.php');
include('connecti.php');


if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
}

// Получение данных пользователя из БД
$user_id = $_SESSION['user_id'];
$query = "SELECT user_role FROM users WHERE user_id='$user_id'";
$result = mysqli_query($connecti, $query);
$user_data = mysqli_fetch_assoc($result);
if ($user_data['user_role'] == 'user') {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Модерация</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('header.php'); ?>

    <!-- admin -->
    <h1>Приложения на модерации</h1>

   


<div class="container">
    <div class="tovar_list">
        
        <?php
        
       
        $app_list_sql = "SELECT * FROM web_applications WHERE status = 'pending'  ORDER BY creation_date DESC" ;
        $result = $connect->query($app_list_sql);

        while ($app = $result->fetch(2)) { ?>

           
            <div class="card">
            <div class="card-details">
            <div class="tovar_item_img">
                    <img class="tovar_item_img" src="<?php echo $app['photo1']; ?>" >
                </div>
                <p class="text-title"> <?= $app['title'] ?></p>
                  
            </div>
            <a class="card-button" href="item.php?id=<?php echo $app['app_id'] ?>">Подробнее</a>
            </div>



        <? }
         
        ?>
        </div>
       
    </div>




    <!-- admin -->
    <?php include('footer.php');?>


</body>

</html>