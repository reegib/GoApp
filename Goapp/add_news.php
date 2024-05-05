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
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">

        <title>Document</title>
    </head>

    <body>
        <?php include('header.php'); ?>

        <h1>Добавление приложения</h1>

        <?php
        if (isset($_POST['add_app'])) {
            $name = $_POST['title'];
            $text = $_POST['description'];

            $category = $_POST['category_id'];

            $path = 'uploads/' . time() . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], $path);


            $sql2 = "INSERT INTO web_applications (title, description, category_id, photo1, user_id)
                    VALUES ('$name','$text', '$category', '$path', '$user_id')";
            $result2 = $connect -> query($sql2);
            header("Location:mod.php");
        }

        ?>

        <form class="login" method="POST" name="add_app" enctype="multipart/form-data">
            <input class="input" type="text" name="title" placeholder="Заголовок">
            <input class="input" type="text" name="description" placeholder="Описание">
            <select  class="input" name="category_id" id="" placeholder="Категория">
            <option value="0"> Выберите категорию  </option>
            <?php 
            $sql="SELECT * FROM categories";
            $result = $connecti -> query($sql);
            while ($category= $result -> fetch_assoc()){
                echo '<option value="'.$category['category_id'].'">' .$category['name']. '</option>';
            }
            ?>
        </select>
                <div class="inputBox">
                    <span class="user">Добавление фотографии</span>

                    <input  type="file"  name="photo">
                </div>
                <button type="submit" name="add_app" class="header_nav_but">Создать приложение</button> 
        </form>

        <?php include('footer.php'); ?>

    </body>

    </html>

<?  ?>